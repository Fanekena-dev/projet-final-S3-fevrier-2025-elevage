<?php
namespace app\controllers\w3;

use Flight;
use app\models\w3\AvalaibleAnimalsModel;
use app\models\w3\GenericDAOModel;

class MarketInteractionController {
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
        $market_table_name="breeding_animal_market_mvt";
        $market_data=['animal_id'=>$data['animal_id'],'user_id'=>$data['user_id'],'admin_id'=>$data['admin_id'],'insert_date'=>$data['insert_date'],'mvt_type'=>$data['type'],'mvt_price'=>$data['money']];
        $marketInsertionModel=new GenericDAOModel(Flight::mysql(),"mvt",$market_table_name,"mvt_id");
        $marketInsertionModel->insert($market_data);


        //debit immediat du montant de la vente dans le compte de l'utilisateur
        $wallet_table_name="breeding_user_wallet";
        $walletnsertionModel=new GenericDAOModel(Flight::mysql(),"wallet",$wallet_table_name,"wallet_id");
        $walletData=['user_id'=>$data['user_id'],'money'=>$data['money'],'description'=>$data['description'],'insert_date'=>$data['insert_date']];
        
        $walletnsertionModel->insert($walletData);
        //atao eto ny insertion ana data anatin'ny table ho an'ny market

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