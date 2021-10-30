<?php 

    class Disciplina {

        private $id;
        private $id_curso;
        private $id_disciplina;
        private $descricao;
        private $ano;
        private $data_cadastro;

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getIdCurso() {
            return $this->id_curso;
        }

        public function setIdCurso($id_curso) {
            $this->id_curso = $id_curso;
        }
        
        public function getIdDisciplina() {
            return $this->id_disciplina;
        }

        public function setIdDisciplina($id_disciplina) {
            $this->id_disciplina = $id_disciplina;
        }
        
        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }
        
        public function getAno() {
            return $this->ano;
        }

        public function setAno($ano) {
            $this->ano = $ano;
        }
        
        public function getDataCadastro() {
            return $this->data_cadastro;
        }

        public function setDataCadastro($data_cadastro) {
            $this->data_cadastro = $data_cadastro;
        }                                
    }