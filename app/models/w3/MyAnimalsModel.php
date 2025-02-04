<?php
namespace app\models\w3;
use Flight;
use PDO;
class MyAnimalsModel
{
    private $idUser;
    private $db;
    private $table = "breeding_user_animal_mvt";
    private $picsTable = "breeding_animal_pic";
    private $animalTable = "breeding_animal";
    private $animalDWE_special_values = "breeding_animal_day_without_eating";
    private $animalDWE_default_values = "breeding_species_day_without_eating";
    private $animalWL_special_values = "breeding_animal_weight_loss";
    private $animalWL_default_values = "breeding_species_weight_loss";
    private $animal_weight_table = "breeding_animal_weight";

    public function __construct($db, $idUser)
    {
        $this->db = $db;
        $this->idUser = $idUser;
    }
    public function getMyAnimals()
    {
        $availableAnimals = [];

        // Récupérer les animaux dont le dernier mouvement est 'IN'
        $sql = "SELECT animal_id 
                    FROM $this->table AS bam 
                    WHERE bam.insert_date = (SELECT MAX(bam2.insert_date) 
                                        FROM $this->table AS bam2 
                                        WHERE bam2.animal_id = bam.animal_id)
                    AND bam.mvt_type = 'IN'
                    AND bam.user_id = '$this->idUser'
                    ";

        $stmt = $this->db->query($sql);
        $animalsId = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($animalsId as $row) {
            $animalId = $row['animal_id'];
            $animal = $this->getAnimal($animalId);

            if ($animal) { // Vérifier que getAnimal() ne renvoie pas NULL
                $availableAnimals[] = $animal;
            }
        }

        return $availableAnimals;
    }

    public function getMyAnimalsForADate($date)
    {
        $availableAnimals = [];

        // Récupérer les animaux dont le dernier mouvement est 'IN'
        $sql = "SELECT animal_id 
                    FROM $this->table AS bam 
                    WHERE bam.insert_date = (SELECT MAX(bam2.insert_date) 
                                        FROM $this->table AS bam2 
                                        WHERE bam2.animal_id = bam.animal_id
                                        AND bam2.insert_date <= '$date'
                                        )
                    AND bam.mvt_type = 'IN'
                    AND bam.user_id = '$this->idUser'
                    ";

        $stmt = $this->db->query($sql);
        $animalsId = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($animalsId as $row) {
            $animalId = $row['animal_id'];
            $animal = $this->getAnimal($animalId);

            if ($animal) { // Vérifier que getAnimal() ne renvoie pas NULL
                $availableAnimals[] = $animal;
            }
        }

        return $availableAnimals;
    }


    public function getPhotos($idAnimal)
    {
        $sql = "SELECT * FROM $this->picsTable WHERE animal_id = :idAnimal";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':idAnimal' => $idAnimal]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAnimal($idAnimal)
    {
        $responseArray = [];

        $sql = "SELECT * 
                FROM $this->animalTable A 
                JOIN breeding_animal_species S 
                ON A.animal_species = S.species_id
                WHERE animal_id = :idAnimal";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['idAnimal' => $idAnimal]);
        $animal = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($animal) {  // Vérifie que l'animal existe
            $responseArray['animal_id'] = $idAnimal;
            $responseArray['animal_name'] = $animal['animal_name'];
            $responseArray['description'] = $animal['description'];
            $responseArray['animal_species'] = $animal['animal_species'];
            $responseArray['species_name'] = $animal['species_name'];
            $responseArray['day_without_eating'] = $this->getAnimalDayWithoutEating($idAnimal);
            $responseArray['weight_loss_percent'] = $this->getAnimalWeightLoss($idAnimal);
            $responseArray['weight'] = $this->getAnimalWeight($idAnimal);
            $responseArray['pic'] = $this->getPhotos($idAnimal);
        }

        return $responseArray;
    }

    public function getAnimalDayWithoutEating($idAnimal)
    {
        $sql = "SELECT * FROM $this->animalDWE_special_values WHERE animal_id = :idAnimal ORDER BY insert_date DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['idAnimal' => $idAnimal]);
        $animalDWE = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($animalDWE) {
            return $animalDWE['day_without_eating'];
        } else {
            $idSpecies = $this->db->query("SELECT * FROM $this->animalTable WHERE animal_id = '$idAnimal'")->fetch()['animal_species'];
            $sql = "SELECT * FROM $this->animalDWE_default_values WHERE species_id = :idSpecies ORDER BY insert_date DESC LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['idSpecies' => $idSpecies]);
            return $stmt->fetch(PDO::FETCH_ASSOC)['day_without_eating'] ?? null;
        }

    }
    public function getAnimalWeightLoss($idAnimal)
    {
        $sql = "SELECT * FROM $this->animalWL_special_values WHERE animal_id = :idAnimal ORDER BY insert_date DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['idAnimal' => $idAnimal]);
        $animalWL = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($animalWL) {
            return $animalWL['weight_loss_percent'];
        } else {
            $idSpecies = $this->db->query("SELECT * FROM $this->animalTable WHERE animal_id = '$idAnimal'")->fetch()['animal_species'];
            $sql = "SELECT * FROM $this->animalWL_default_values WHERE species_id = :idSpecies ORDER BY insert_date DESC LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['idSpecies' => $idSpecies]);
            return $stmt->fetch(PDO::FETCH_ASSOC)['weight_loss_percent'] ?? null;
        }
    }
    public function getAnimalWeight($idAnimal)
    {
        $sql = "SELECT weight FROM $this->animal_weight_table WHERE animal_id = :idAnimal ORDER BY insert_date DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['idAnimal' => $idAnimal]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['weight'] ?? null; // Renvoie null si aucun résultat
    }

}
