<?php
require_once __DIR__.'/../vendor/autoload.php';

use factory\PDOFactory;

try {
    $pdo = PDOFactory::createPDO();
    $sql = <<<SQL
DROP TABLE pagos;
SQL;
    $pdo->exec( $sql );
} catch (Exception $ex) {
    echo $ex->getMessage();
} finally {
    $pdo = null;
}

