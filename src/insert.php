<?php
require_once __DIR__.'/../vendor/autoload.php';

use factory\PDOFactory;

function insertarPago($cliente, $ordenCompra, $monto, $fecha, $token, $estado, $tarjeta, $codigoAutorizacion, $tarjetaExpiracion, $accountingDate, $transactionDate, $vci, $tipoPago, $cuotas, $codigoComercio){
    try {
        $pdo = PDOFactory::createPDO();
        $sql = <<<SQL
INSERT INTO 
    pagos(cliente, orden_compra, monto, fecha, token, estado, tarjeta, codigo_autorizacion, tarjeta_expiracion, accounting_date, transaction_date, vci, tipo_pago, cuotas, codigo_comercio) 
    VALUES(:cliente, :orden_compra, :monto, :fecha, :token, :estado, :tarjeta, :codigo_autorizacion, :tarjeta_expiracion, :accounting_date, :transaction_date, :vci, :tipo_pago, :cuotas, :codigo_comercio);
SQL;
        $statement = $pdo->prepare( $sql );
        $statement->bindParam(":cliente", $cliente);
        $statement->bindParam(":orden_compra", $ordenCompra);
        $statement->bindParam(":monto", $monto);
        $statement->bindParam(":fecha", $fecha);
        $statement->bindParam(":token", $token);
        $statement->bindParam(":estado", $estado);
        $statement->bindParam(":tarjeta", $tarjeta);
        $statement->bindParam(":codigo_autorizacion", $codigoAutorizacion);
        $statement->bindParam(":tarjeta_expiracion", $tarjetaExpiracion);
        $statement->bindParam(":accounting_date", $accountingDate);
        $statement->bindParam(":transaction_date", $transactionDate);
        $statement->bindParam(":vci", $vci);
        $statement->bindParam(":tipo_pago", $tipoPago);
        $statement->bindParam(":cuotas", $cuotas);
        $statement->bindParam(":codigo_comercio", $codigoComercio);
        
        $res = $statement->execute();
        var_dump( $res );
    } catch (Exception $ex) {
        echo $ex->getMessage();
    } finally {
        $pdo = null;
    }
}

insertarPago("Juanito", 202009112030, 500, '2020-09-11', 'e411e7c3e7e0a16daad91e04c88bae4d1ebd5206795949fe2fc192f519ed30ae',
        'APROBADO', '6623', '1213', null, "0911", "2020-09-11T06:00:08.926-03:00", "TSY", "VC", 12, 597020000540);