<?php    

require_once"Conexao.php";
require_once"../DTO/DisciplinaDTO.php";

class DisciplinaDAL extends Conexao
{
    private $query;

    //private $disciplinaDTO;    
    public function __construct() {
        //$this->disciplinaDTO = new disciplinaDTO();
    }    

    private function prepExec($prep,$exec)
    {
        $this->query=$this->getConn()->prepare($prep);
        $this->query->execute($exec);
    }

    public function insert($table,$prep,$exec){
        $this->prepExec('INSERT INTO '.$table.' SET '.$prep.'',$exec);
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
#$disciplina=new DisciplinaDAL;
#var_dump($disciplina->insert('disciplina','nome=?',array('matematica')));

#SELECT
#$disciplina=new DisciplinaDAL;
#$sel=$disciplina->select('*','disciplina','',array());
#foreach($sel as $reg)
#{
#    var_dump($reg);
#}

#UPDATE
#$disciplina=new DisciplinaDAL;
#$upd=$disciplina->update('disciplina','nome=? WHERE id=?',array('Matematica',1));
#var_dump($upd->rowCount());
#print $upd->rowCount() < 1 ? 'Não há atualizações a fazer!' : 'Atualização executada com suceso!';

#DELETE
#$disciplina=new DisciplinaDAL;
#$upd=$disciplina->delete('disciplina','WHERE id=?',array(1));
#var_dump($upd->rowCount());
#print $upd->rowCount() < 1 ? 'Não há atualizações a fazer!' : 'Atualização executada com suceso!';