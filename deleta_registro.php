﻿<?php
include "sql.php";
$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM banco_horas WHERE id = '$id'");
$linha = mysql_num_rows($sql);
$sql = mysql_query("DELETE FROM banco_horas WHERE id = '$id'");
//DISPARO DE E-MAIL QUANDO CADASTRADO BANCO DE HORA.

if($sql){
    header("location:lista_registro.php");
}else{
    print "Não foi possivel deletar o recado. Tente mais tarde!";
}


?>