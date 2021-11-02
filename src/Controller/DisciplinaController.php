<?php

require_once"../DTO/DisciplinaDTO.php";
require_once"../DAL/DisciplinaDAL.php";

class DisciplinaController {

    private $disciplinaDAL;
    private $disciplinaDTO;    
    public function __construct() {
        $this->disciplinaDAL = new DisciplinaDAL();
        $this->disciplinaDTO = new DisciplinaDTO();
    }

    public function RetornarDisciplinas() {
        return $this->disciplinaDAL->select('*','disciplina','',array());
    }
}

#RETORNAR DISCIPLINAS
#$disciplinaController = new DisciplinaController();
#$result = $disciplinaController->RetornarDisciplinas();
#foreach($result as $reg)
#{
#    var_dump($reg);
#}