<?php 

    class QestaoEscolhaItem {

        private $id;
        private $id_questao_escolha;
        private $letra_numero;
        private $resposta;
        private $correta;

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getIdQuestaoEscolha() {
            return $this->id_questao_escolha;
        }

        public function setIdQuestaoEscolha($id_questao_escolha) {
            $this->id_questao_escolha = $id_questao_escolha;
        }

        public function getLetraNumero() {
            return $this->letra_numero;
        }

        public function setLetraNumero($letra_numero) {
            $this->letra_numero = $letra_numero;
        }   
        
        public function getResposta() {
            return $this->resposta;
        }

        public function setResposta($resposta) {
            $this->resposta = $resposta;
        }
        
        public function getCorreta() {
            return $this->correta;
        }

        public function setCorreta($correta) {
            $this->correta = $correta;
        }           
    }