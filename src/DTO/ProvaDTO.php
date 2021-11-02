<?php

class ProvaDTO
{
    // ID
    public $_id;
    public function getId(): int {
        return $this->_id;
    }
    public function setId($id) {
        $this->_id = $id;
    }

    // ID CURSO
    public $id_curso;
    public function getIdCurso():int {
        return $this->_id_curso;
    }
    public function setIdCurso($id_curso):int {
        return $this->_id_curso = $id_curso;
    }

    // ID DISCIPLINA
    public $id_disciplina;
    public function getIdDisciplina():int {
        return $this->_id_disciplina;
    }
    public function setIdDisciplina($id_disciplina):int {
        return $this->_id_disciplina = $id_disciplina;
    }

    // DESCRIÇÂO
    public $descricao;
    public function getDescricao(): string {
        return $this->_descricao;
    }
    public function setDescricao($descricao) {
        $this->_descricao = $descricao;
    } 

    // ANO
    public $ano;
    public function getAno(): int {
        return $this->_ano;
    }
    public function setAno($ano){
        return $this->_ano = $ano;
    }
}