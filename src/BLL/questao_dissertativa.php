<?php 

    class questaoDissertativa {

        private $id;
        private $id_prova;
        private $numero;
        private $questao;
        private $resposta;

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }
        
        public function getIdProva() {
            return $this->id_prova;
        }

        public function setIdProva($id_prova) {
            $this->id_prova = $id_prova;
        }
        
        public function getNumero() {
            return $this->numero;
        }

        public function setNumero($numero) {
            $this->numero = $numero;
        }
        
        public function getQuestao() {
            return $this->questao;
        }

        public function setQuestao($questao) {
            $this->questao = $questao;
        }
        
        public function getResposta() {
            return $this->resposta;
        }

        public function setResposta($resposta) {
            $this->resposta = $resposta;
        }                                
    }