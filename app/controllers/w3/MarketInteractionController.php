<?php
namespace app\controllers\w3;

use app\models\w2\userModel;
use Flight;
use app\models\w3\AvalaibleAnimalsModel;
use app\models\w3\GenericDAOModel;

class MarketInteractionController
{
    public function __construct()
    {

    }

    public function renderMarketplace()
    {
        $model = new AvalaibleAnimalsModel(Flight::mysql());
        $availableAnimals = $model->getAvailableAnimals();
        $data = ['title' => 'Marketplace', 'page' => 'marketplace', 'availableAnimals' => $availableAnimals];
        FLight::render('user/template', $data);
    }

    public function sendToMarket($data)
    {
        $market_table_name = "breeding_animal_market_mvt";
        $market_data = ['animal_id' => $data['animal_id'], 'user_id' => $data['user_id'], 'admin_id' => $data['admin_id'], 'insert_date' => $data['insert_date'], 'mvt_type' => $data['type'], 'mvt_price' => $data['money']];
        $marketInsertionModel = new GenericDAOModel(Flight::mysql(), "mvt", $market_table_name, "mvt_id");
        $marketInsertionModel->insert($market_data);


        $user_table_name = "breeding_user_animal_mvt";
        $user_data = ['animal_id' => $data['animal_id'], 'user_id' => $data['user_id'], 'insert_date' => $data['insert_date'], 'mvt_type' => "OUT", 'mvt_price' => $data['money']];
        $userInsertionModel = new GenericDAOModel(Flight::mysql(), "mvt", $user_table_name, "mvt_id");
        $userInsertionModel->insert($user_data);



        //debit immediat du montant de la vente dans le compte de l'utilisateur
        $wallet_table_name = "breeding_user_wallet";
        $walletnsertionModel = new GenericDAOModel(Flight::mysql(), "wallet", $wallet_table_name, "wallet_id");
        $walletData = ['user_id' => $data['user_id'], 'money' => $data['money'], 'description' => $data['description'], 'insert_date' => $data['insert_date']];

        $walletnsertionModel->insert($walletData);
        //atao eto ny insertion ana data anatin'ny table ho an'ny market
    }

    public function getFromMarket()
    {
        $animalId = $_GET['animalId'];
        $buyerId = $_SESSION['user']['user_id'];

        $db = Flight::mysql();
        $marketTable = "breeding_animal_market_mvt";
        $walletTable = "breeding_user_wallet";

        try {
            $db->beginTransaction();

            // 1. Check if the animal is available for purchase
            $query = "SELECT * FROM $marketTable WHERE animal_id = ? AND mvt_type = 'OUT' ORDER BY insert_date DESC LIMIT 1";
            $stmt = $db->prepare($query);
            $stmt->execute([$animalId]);
            $animal = $stmt->fetch(\PDO::FETCH_ASSOC);

            if (!$animal) {
                echo json_encode(['success' => false, 'message' => "Animal is not available for sale"]);
                exit();
            }

            $sellerId = $animal['user_id'];
            $price = $animal['mvt_price'];

            // 2. Check buyer's balance
            
            $usermodel = new UserModel(Flight::mysql());
            $buyerBalance= $usermodel->getUserBalance($buyerId);

            if ($buyerBalance < $price) {
                echo json_encode(['success' => false, 'message' => " Insufficient funds"]);
                exit();
            }

            // 3. Insert new movement (buyer takes ownership)
            $query = "INSERT INTO $marketTable (animal_id, user_id, admin_id, insert_date, mvt_type, mvt_price) VALUES (?, ?, NULL, NOW(), 'IN', ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$animalId, $buyerId, $price]);

            // 4. Deduct money from buyer's wallet
            $query = "INSERT INTO $walletTable (user_id, money, description, insert_date) VALUES (?, ?, ?, NOW())";
            $stmt = $db->prepare($query);
            $stmt->execute([$buyerId, -$price, "Purchase of animal $animalId"]);

            // 5. Credit seller's wallet
            $query = "INSERT INTO $walletTable (user_id, money, description, insert_date) VALUES (?, ?, ?, NOW())";
            $stmt = $db->prepare($query);
            $stmt->execute([$sellerId, $price, "Sale of animal $animalId"]);

            $db->commit();
            
            echo json_encode(['success' => true, 'message' => "Animal $animalId successfully purchased"]);

        } catch (\Exception $e) {
            $db->rollBack();
            echo json_encode(['success' => false, 'message' => "$e"]);
            exit();
        }
    }


    public function insert()
    {
        $data = [
            'animal_id' => $_POST['animal_id'],
            'user_id' => $_POST['user_id'],
            'admin_id' => NULL,
            'insert_date' => $_POST['insert_date'],
            'type' => "IN", //IN-OUT
            'money' => $_POST['price'],
            'description' => 'Vente animal:' . $_POST['animal_id'] . 'le [' . $_POST['insert_date'] . ']'
        ];
        $this->sendToMarket($data);
        Flight::redirect('/user/dashboard');
    }
}