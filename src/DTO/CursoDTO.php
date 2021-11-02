<?php

class CursoDTO
{
    public $_id;
    public function getId(): int {
        return $this->_id;
    }
    public function setId($id) {
        $this->_id = $id;
    }

    public $nome;
    public function getNome(): string {
        return $this->_nome;
    }
    public function setNome($nome) {
        $this->_nome = $nome;
    } 
}