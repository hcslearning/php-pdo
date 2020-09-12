<?php

namespace factory;

use PDO;

class PDOFactory {
    
    public static function createPDO(): PDO {
        $url = "pgsql:host=localhos;port=5432;dbname=test;user=juanito;password=1234";
        $pdo = new PDO( $url );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } 
    
}
