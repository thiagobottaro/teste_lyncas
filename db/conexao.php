<?php
class conexao {

  public function conexao(){
    try{
      global $pdo;
      //echo htmlentities('Entrou Aquiiiiiii: ');  
	  $pdo = new PDO(DBDSN,DBUSER,DBSENHA);
	  //print_r($pdo);
    }
    catch(PDOException $exec){
      echo htmlentities('Ocorreu erro ao tentar efetuar a conexão com o banco de dados: <br />'. $exec->getMessage());   
    }
  }

}
	
?>
