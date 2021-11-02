<?php

require_once"../DTO/CursoDTO.php";
require_once"../DAL/CursoDAL.php";

class CursoController {

    private $cursoDAL;
    public $cursoDTO;

    public function __construct() {
        $this->cursoDAL = new CursoDAL();
        $this->cursoDTO = new CursoDTO();
    }

    public function RetornarCursos() {
        return $this->cursoDAL->select('*','curso','',array());
    }
}

#RETORNAR CURSOS
#$cursoController = new CursoController();
#$result = $cursoController->RetornarCursos();
#foreach($result as $reg)
#{
#    var_dump($reg);
#}

// $curso = new CursoDAL;
// var_dump($curso->insert('curso','nome=?', array('matematica')));