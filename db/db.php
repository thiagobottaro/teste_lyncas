<?php
  class Db {

    private function validarSql($sql){
      return $sql;
    }

    public function Q($sql){
      global $pdo;
	  	  
      if((DEBUG_MODE) or ($_GET['DEBUG_HOOK']==42))
        //echo($sql."<br/><br/><br/>");
      $stmt = $pdo->prepare($this->validarSql($sql));
      $stmt->execute();
      if((DEBUG_MODE) and ($stmt->errorCode() <> 0))
        echo ' :: ERRO INTERNO:: '.$stmt->errorCode().'-'.$stmt->errorInfo();

      return $stmt;
    }		


	public function existeRegistro($table,$id,$campo=false){
		$RES = $this->Q("SELECT * FROM $table WHERE {$campo} = {$id} ");
		//echo("SELECT * FROM $table WHERE {$campo} = {$id} ");
		if($RES->fetch()){
			return true;
		}else{
			return false;
		}
	}

}
?>
