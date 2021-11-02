<?php 

    namespace Model\bean;

    require __DIR__.'/../../../vendor/autoload.php';

    class Curso {

        /**
         * identificador unico do curso
         * @var integer 
         */
        public $id;

        /**
         * nome do curso
         * @var string
         */
        public $nome;

        /**
         * duração do curso em meses
         * @var int
         */
        public $duracao_meses;

        

        public function getId(): int {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNome(): string {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getDuracaoMeses(): int {
            return $this->duracao_meses;
        }

        public function setDuracaoMeses($duracao_meses) {
            $this->duracao_meses = $duracao_meses;
        }

    }