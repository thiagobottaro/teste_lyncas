<?php
	include('config.php');
 	//var_dump($_POST);
 
	if(!empty($_REQUEST['acao'])){
		$acao = $_REQUEST['acao']; 
	}
 	$acao=strtoupper($acao);

    switch ($acao) {
		case 'CAD' ://cadastra item
			$qtde_reg = count($_POST);
			$conta = 0;
		   
			while ($conta <= $qtde_reg)  {
		   
  	    		if(isset($_POST['idopt'.$conta])){
					$ins_isbn = $_POST['isbn'.$conta];
					$ins_title = $_POST['title'.$conta];
					if(!$db->existeRegistro('favorito',$ins_isbn,'isbn_livro')){
						$db->Q("INSERT INTO favorito (isbn_livro,desc_livro) VALUES ('$ins_isbn','$ins_title')");
					}					
				}
			   $conta++;
			}
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=index.html'>";
		break;

		case 'LIST': //listar itens favoritos

			$select_favoritos =  $db->Q("SELECT * FROM favorito order by id_livro ");

			$i = 1;
			$body = "";

			while($a_favorito = $select_favoritos->fetch()){			   
			   $body .= '<li><span class=\'spprox\'><input type=\'hidden\' value=\''.$a_favorito['isbn_livro'].'\' name=\'isbn'.$i.'\' />';
			   $body .= '<input type=\'checkbox\' value=\''.$a_favorito['id_livro'].'\' name=\'idopt'.$i.'\' /><label class=\'check\'> Titulo: '.$a_favorito['desc_livro'].' - ISBN: '.$a_favorito['isbn_livro'].' </label></span></li>';			   
				
			   $i++;
			}
		break;

		case 'DEL': // remover itens dos favoritos
			$qtde_reg = count($_POST);
			$conta = 0;
		   
			while ($conta <= $qtde_reg)  {
				$removeuFavorito = false;
  	    		if(isset($_POST['idopt'.$conta])){
					$removeuFavorito = true;
					$del_id = $_POST['idopt'.$conta];
					$del_isbn = $_POST['isbn'.$conta];
					//echo " delete from favorito where isbn_livro = '{$ins_isbn}' and id_livro = '$ins_title')";
					$db->Q(" delete from favorito where isbn_livro = '{$del_isbn}' and id_livro = '{$del_id}' ");
					echo "<script>alert('Livro ISBN: {$del_isbn} foi removido dos favoritos com sucesso! ')</script>";				
				}
				
			   	$conta++;
			}
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=favoritos.php?acao=LIST'>";
		break;
    }

 ?>

<!DOCTYPE hml>
<html>
    <head>
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    </head>
    <body>        
        <nav id="menu">			
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="pesquisa.html">Pesquisar</a></li>
                <li><a href="favoritos.php?acao=LIST">Favoritos</a></li>
            </ul>
		</nav>
		<form method='post' action=""  enctype="multipart/form-data">
        	<input type='hidden' name='acao' value="del" /> 
			<div class="container">
				<h1 id="title" class="text-center mt-5">Marque os itens que deseja remover de favorito</h1> 
				<ul>
					<?php echo $body; ?>
				</ul>
			</div>
			<input type="submit" name="excluir" value="Confirmar Exclusao">
        </form>

		<script src="js/jquery-3.1.0.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/app.js"></script>
    </body>
</html>