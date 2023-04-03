<?php ini_set('default_charset','ISO-8859-1');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en"><head>    <meta http-equiv="Content-Type" content="text/html;/>    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />        <script type="text/javascript" src="script.js"></script>    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]--></head><?phpinclude("seguranca.php"); // Inclui o arquivo com o sistema de segurançaprotegePagina(); // Chama a função que protege a páginaecho "Olá, " . $_SESSION['usuarioNome']." Seja bem vindo(a) Oque Deseja Fazer Hoje?";$usuariosql = $_SESSION['usuarioNome'];ini_set('default_charset','ISO-8859-1');?>	<?php
include "sql.php";
$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM banco_horas WHERE id = '$id'");
$linha = mysql_num_rows($sql);
$sql = mysql_query("DELETE FROM banco_horas WHERE id = '$id'");
//DISPARO DE E-MAIL QUANDO CADASTRADO BANCO DE HORA.	$mensagem_email= $usuariosql.", Deletou um registro no banco de horas ID: ".$id." para verificar detalhes utilize o seguinte link a seguir: http://intranet.costasul.com.br/ti/banco_horas/";    $recebe_email = "vanderlei@costasul.com.br";    $cabecalho = "From: bancodehoras@costasul.com.br" . "\r\n" . "Reply-To: ti@costasul.com.br" . "\r\n";    mail($recebe_email,"*** BANCO DE HORAS - REGISTRO DELETADO ***",$mensagem_email,$cabecalho ) ;		//DISPARO DE E-MAIL QUANDO CADASTRADO BANCO DE HORA.	$mensagem_email= $usuariosql.", Deletou um registro no banco de horas ID: ".$id." para verificar detalhes utilize o seguinte link a seguir: http://intranet.costasul.com.br/ti/banco_horas/";    $recebe_email = "rh-costasul@costasul.com.br";    $cabecalho = "From: bancodehoras@costasul.com.br" . "\r\n" . "Reply-To: ti@costasul.com.br" . "\r\n";    mail($recebe_email,"*** BANCO DE HORAS - REGISTRO DELETADO ***",$mensagem_email,$cabecalho ) ;

if($sql){
    header("location:lista_registro.php");		
}else{
    print "Não foi possivel deletar o recado. Tente mais tarde!";
}


?>
