<?php

namespace App\Core;

use App\Core\ApiInterface;
use PDO;


class PdoConnect

{
    private $pdo;


    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=127.0.0.1;port=3336;dbname=football', 'root', 'demo');
        } catch (\PDOException $e) {
            echo "Connection Failed: {$e->getMessage()}";
        }
    }


    public function fetchAll()
    {
        $pdo = $this->pdo;

        $query = $pdo->prepare("Select * FROM teamsTable WHERE liga = 'bundesLiga'");
        $query->execute();

        $result = $query->fetchAll();
        return $result;
    }
}

