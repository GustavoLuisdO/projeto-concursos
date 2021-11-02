<?php

require_once"../DTO/ProvaDTO.php";
require_once"../DAL/ProvaDAL.php";

class ProvaController {

    private $provaDAL;
    private $provaDTO;    
    public function __construct() {
        $this->provaDAL = new ProvaDAL();
        $this->provaDTO = new ProvaDTO();
    }

    public function RetornarProvas() {
        return $this->provaDAL->select('*','prova','',array());
    }
}
