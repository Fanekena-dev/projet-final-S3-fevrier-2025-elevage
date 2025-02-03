<?php
    namespace app\models\w3;
    class AvalaibleAnimalsModel
     {
        private $db;
        private $table="breeding_animal_market_mvt";
        private $picsTable="breeding_animal_pic";
        private $animalTable="breeding_animal";
        public function __construct($db)
        {
            $this->db=$db;
        }
        public function getAvailableAnimals()
        {
            $availableAnimals = [];
            $animalsIdQuery = "SELECT animal_id FROM $this->animalTable";
            $animalsId = $this->db->query($animalsIdQuery)->fetchAll(PDO::FETCH_ASSOC);

            foreach ($animalsId as $animalId) {
                $animalId = $animalId['animal_id'];
                $animalQuery = "SELECT animal_id FROM $this->table WHERE animal_id = :animalId AND mvt_type = 'IN' AND insert_date = (SELECT MAX(insert_date) FROM breeding_animal WHERE animal_id = :animalId)";
                $stmt = $this->db->prepare($animalQuery);
                $stmt->execute(['animalId' => $animalId]);
                $idAvailableAnimalActu = $stmt->fetch(PDO::FETCH_ASSOC)['animal_id'];
                $animal = $this->getAnimal($idAvailableAnimalActu);
                $availableAnimals[] = $animal;

                //mbola mila asiana ny anarana sy ny sary
            }
            return $availableAnimals;
        }

        public function getPhotos($idAnimal)
        {
            $sql = "SELECT * FROM $this->animalTable WHERE animal_id = :idAnimal";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['idAnimal' => $idAnimal]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAnimal($idAnimal)
        {
            $sql = "SELECT * FROM $this->picsTable WHERE animal_id = :idAnimal";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['idAnimal' => $idAnimal]);
            $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($animals as &$animal) {
                $animal['pic'] = $this->getPhotos($animal['animal_id']);
            }

            return $animals;
        }
    }
