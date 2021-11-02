<?php    

require_once"Conexao.php";
require_once"../DTO/CursoDTO.php";

class CursoDAL extends Conexao
{
    private $query;

    //private $cursoDTO;    
    public function __construct() {
        //$this->cursoDTO = new CursoDTO();
    }   

    private function prepExec($prep,$exec)
    {
        $this->query=$this->getConn()->prepare($prep);
        $this->query->execute($exec);
    }

    public function insert($table,$prep,$exec){
        $this->prepExec('INSERT INTO '.$table.' VALUES '.$prep.'',$exec);
        return $this->getConn()->lastInsertId();
    }

    public function select($fileds,$table,$prep,$exec){
        $this->prepExec('SELECT '.$fileds.' FROM '.$table.' '.$prep.'', $exec);
        return $this->query;
    }

    public function update($table,$prep,$exec){
        $this->prepExec('UPDATE '.$table.' SET '.$prep.'', $exec);
        return $this->query; 
    }
    
    public function delete($table,$prep,$exec){
        $this->prepExec('DELETE FROM '.$table.' '.$prep.'', $exec);
        return $this->query; 
    } 

}

#INSERT
#$curso=new CursoDAL;
#var_dump($curso->insert('curso','nome=?',array('matematica')));

#SELECT
#$curso=new CursoDAL;
#$sel=$curso->select('*','curso','',array());
#foreach($sel as $reg)
#{
#    var_dump($reg);
#}

#UPDATE
#$curso=new CursoDAL;
#$upd=$curso->update('curso','nome=? WHERE id=?',array('Matematica',1));
#var_dump($upd->rowCount());
#print $upd->rowCount() < 1 ? 'Não há atualizações a fazer!' : 'Atualização executada com suceso!';

#DELETE
#$curso=new CursoDAL;
#$upd=$curso->delete('curso','WHERE id=?',array(1));
#var_dump($upd->rowCount());
#print $upd->rowCount() < 1 ? 'Não há atualizações a fazer!' : 'Atualização executada com sucesso!';