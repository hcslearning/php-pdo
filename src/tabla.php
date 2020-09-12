<?php
require_once __DIR__.'/../vendor/autoload.php';

use factory\PDOFactory;

try {
    $pdo = PDOFactory::createPDO();
    $sql = <<<SQL
CREATE TABLE pagos(
    id SERIAL PRIMARY KEY,
    cliente VARCHAR(255),
    orden_compra BIGINT,
    monto FLOAT,
    fecha DATE,
    token VARCHAR(255),
    estado VARCHAR(255),
    tarjeta VARCHAR(255),
    codigo_autorizacion VARCHAR(255),
    tarjeta_expiracion VARCHAR(50),
    accounting_date VARCHAR(50),
    transaction_date VARCHAR(50),
    vci VARCHAR(10),
    tipo_pago VARCHAR(5),
    cuotas INT,
    codigo_comercio BIGINT
);
SQL;
    $pdo->exec( $sql );
} catch (Exception $ex) {
    echo $ex->getMessage();
} finally {
    $pdo = null;
}

