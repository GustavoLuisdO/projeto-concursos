<?php
    
    class Conexao{

        //conectar no mysql
        protected $servidor = "127.0.0.1";
        protected $usuario = "root";
        protected $senha = "";
        protected $banco = "Enade";

        public function Conectar($servidor, $usuario, $senha, $banco){

            $conn = mysqli_connect($servidor, $usuario, $senha, $banco);

            if($conn->mysqli_erro){
                die("Erro na abertura do banco " . mysqli_error($conn));
            }
            mysqli_close($conn);
        }
    }