<?php
abstract class Conexao
{
    private static $cnx;

    private function setConn()
    {
        return is_null(self::$cnx) ? self::$cnx=new PDO("mysql:host=127.0.0.1:3306;dbname=enade","root","") : self::$cnx;
        $this->cnx->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function getConn()
    {
        return $this->setConn();
    }
}