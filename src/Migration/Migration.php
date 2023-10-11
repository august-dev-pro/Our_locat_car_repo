<?php
namespace August\migration;
   
    use August\Helpers\Connection;

   class Migration
    {
        protected $connection;

        public function __construct()
        {
            $dbConnection = new Connection();
            $this->connection = $dbConnection->getConnection();
        }

        public function createTable()
        {
            $car = "
            CREATE TABLE IF NOT EXISTS Cars(
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                description TEXT NOT NULL,
                model VARCHAR(255) NOT NULL,
                marque VARCHAR(255) NOT NULL,
                statut VARCHAR(255) NOT NULL,
                places VARCHAR(255) NOT NULL,
                type VARCHAR(255) NOT NULL,
                immatriculation VARCHAR(255) NOT NULL,
                prix_location VARCHAR(255) NOT NULL
            )";

            $user= "
            CREATE TABLE IF NOT EXISTS Users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                username VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                phone VARCHAR(255),
                password VARCHAR(255) NOT NULL,
                role VARCHAR(255) NOT NULL
               );
                ";

            $administrator = "
            CREATE TABLE IF NOT EXISTS Administrators(
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(225) NOT NULL,
                password_hash VARCHAR(225) NOT NULL,
                email VARCHAR(225) NOT NULL,
                username VARCHAR(225) NOT NULL
            );
            ";

            $paiement = "
            CREATE TABLE IF NOT EXISTS Paiements(
            id INT AUTO_INCREMENT PRIMARY KEY,
            amount FLOAT,
            PaiementDate DATE,
            PaiementMethod VARCHAR(225),
            Reservation_id INT NOT NULL,
            FOREIGN KEY (Reservation_id) REFERENCES Reservations(id)
            );
            ";

            $reservation = "
            CREATE TABLE IF NOT EXISTS Reservations(
            id INT AUTO_INCREMENT PRIMARY KEY,
            startDate DATE NOT NULL,
            endDate DATE NOT NULL,
            statut  VARCHAR(225) NOT NULL,
            user_id INT NOT NULL,
            Car_id INT NOT NULL,
            FOREIGN KEY (User_id) REFERENCES Users(id),
            FOREIGN KEY (Car_id) REFERENCES Cars(id)
            );
            ";

            $supportTicket = "
            CREATE TABLE IF NOT EXISTS SupportTickets(
            id INT AUTO_INCREMENT PRIMARY KEY,
            sbuject VARCHAR(225) NOT NULL,
            description TEXT NOT NULL,
            statut VARCHAR(225) NOT NULL,
            user_id INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES Users(id)
            );
            ";

            try {
                $this->connection->exec($car);
                $this->connection->exec($user);
                $this->connection->exec($administrator);
                $this->connection->exec($paiement);
                $this->connection->exec($reservation);
                $this->connection->exec($supportTicket);
                echo "Tables créées avec succès!";
            } catch (\PDOException $e) {
                echo "Erreur lors de la création des tables : " . $e->getMessage();
            }
        }
    }


    


?>