<?php
 ini_set('default_charset','ISO-8859-1');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;/>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    

    <script type="text/javascript" src="script.js"></script>

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
</head>
<body onload="aviso()">
    <div id="art-page-background-gradient"></div>
    <div id="art-main">
        <div class="art-Sheet">
                
        
                                       
                        <h1 id="name-text" class="art-Logo-name"><a href="#">CONTROLE DE BANCO DE HORAS </a></h1>
     \                   
                        <div id="slogan-text" class="art-Logo-text">TECNOLOGIA DA INFORMACAO</div>
                        
                    </div>
                </div>
                <div class="art-contentLayout">                    
                                              
                        
                                  
                                         
                                        </h2>
                                     Hoje, 
                                        

<script language=javascript>
function janelaSecundaria (URL){
   window.open(URL,"janela1","width=1000,height=600,scrollbars=YES")
}


</script> 
                                        
                                        <script Language="JavaScript">
<!--
mydate = new Date();
myday = mydate.getDay();
mymonth = mydate.getMonth();
myweekday= mydate.getDate();
weekday= myweekday; 

if(myday == 0)
day = " Domingo, " 

else if(myday == 1)
day = " Segunda - Feira, " 

else if(myday == 2)
day = " Terça - Feira, " 

else if(myday == 3)
day = " Quarta - Feira, " 

else if(myday == 4)
day = " Quinta - Feira, " 

else if(myday == 5)
day = " Sexta - Feira, " 

else if(myday == 6)
day = " Sábado, " 

if(mymonth == 0)
month = "Janeiro " 

else if(mymonth ==1)
month = "Fevereiro " 

else if(mymonth ==2)
month = "Março " 

else if(mymonth ==3)
month = "Abril " 

else if(mymonth ==4)
month = "Maio " 

else if(mymonth ==5)
month = "Junho " 

else if(mymonth ==6)
month = "Julho " 

else if(mymonth ==7)
month = "Agosto " 

else if(mymonth ==8)
month = "Setembro " 

else if(mymonth ==9)
month = "Outubro " 

else if(mymonth ==10)
month = "Novembro " 

else if(mymonth ==11)
month = "Dezembro " 

document.write("<font face=arial, size=2>"+ day);
document.write(myweekday+" de "+month+ "</font>");
// -->
</script>


 

<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
echo "Olá, " . $_SESSION['usuarioNome']." Seja bem vindo(a)";
$usuariosql = $_SESSION['usuarioNome'];
?>  
    <script>  

    
function maiuscula(z){
        v = z.value.toUpperCase();
        z.value = v;
    }
	
function Mascara_Hora(hora){ 
var hora01 = ''; 
hora01 = hora01 + hora; 
if (hora01.length == 2){ 
hora01 = hora01 + ':'; 
document.forms[0].hora_inicio.value = hora01; 
} 
if (hora01.length == 5){ 
Verifica_Hora(); 
} 
} 
           
function Verifica_Hora(){ 
hrs = (document.forms[0].hora_inicio.value.substring(0,2)); 

min = (document.forms[0].hora_inicio.value.substring(3,5)); 
               
               
estado = ""; 
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
estado = "errada"; 
} 
               
if (document.forms[0].hora_inicio.value == "") { 
estado = "errada"; 
} 



if (estado == "errada") { 
alert("Por Favor, Verifique os valores de Hora Inicial !"); 
document.forms[0].hora_inicio.focus(); 
} 
} 



function Mascara_Hora2(Hora){ 
var hora01 = ''; 
hora01 = hora01 + Hora; 
if (hora01.length == 2){ 
hora01 = hora01 + ':'; 
document.forms[0].hora_final.value = hora01; 
} 
if (hora01.length == 5){ 
Verifica_Hora2(); 
} 
} 
           
function Verifica_Hora2(){ 
hrs = (document.forms[0].hora_final.value.substring(0,2)); 

min = (document.forms[0].hora_final.value.substring(3,5)); 
               
               
estado2 = ""; 
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
estado2 = "errada"; 
} 
               
if (document.forms[0].hora_final.value == "") { 
estado2 = "errada"; 
} 



if (estado2 == "errada") { 
alert("Por Favor, Verifique os valores de Hora Final!"); 
document.forms[0].hora_final.focus(); 
} 
} 
function mascaraData(campoData){
              var data = campoData.value;
              if (data.length == 2){
                  data = data + '/';
                  document.forms[0].data.value = data;
      return true;              
              }
              if (data.length == 5){
                  data = data + '/';
                  document.forms[0].data.value = data;
                  return true;
              }
         }
//-->
</script>
                                       

<br><br>
<br>



 <?php

include "sql.php";
       
if(isset($_POST['done'])){   

    $nome = $_POST['nome'];
	$hora_inicio = $_POST['hora_inicio'];
    $hora_final = $_POST['hora_final'];
	$descricao = $_POST['descricao'];
	$tipo = $_POST['tipo'];
	$faixa = $_POST['faixa'];
	$data = $_POST['data'];
	$validar_data =$data;	
	$data_atual = date('d/m/Y', strtotime('-3 days'));
	
	$data_atual = DateTime::createFromFormat('d/m/Y', $data_atual);
	$validar_data = DateTime::createFromFormat('d/m/Y', $validar_data);
	
	
     	
	// AUDITORIA 
    $ip = $_SERVER['REMOTE_ADDR'];
    $usuario = $_SESSION['usuarioNome'];    
	

    

	
 

    if(empty($nome) || empty($hora_inicio) || empty($hora_final)|| empty($descricao)){

        $erro = "Atenção, você deve preencher todos os campos";

    }else{        

       $sql = mysql_query("INSERT INTO `banco_horas`(`data`,`nome`, `hora_inicio`, `hora_final`, `descricao`, `horas_baixa`,`usuario`,`faixa`,`ip`,`data_criacao`) VALUES ('$data','$nome', '$hora_inicio', '$hora_final','$descricao','$tipo','$usuario','$faixa','$ip',now())") or die(mysql_error());

            if($sql){

                $erro2 = "Dados cadastrados com sucesso!";
				//DISPARO DE E-MAIL QUANDO CADASTRADO BANCO DE HORA.
	$mensagem_email= $usuario.", Cadastrou um registro no banco de horas para: ".$nome." Do tipo: ".$tipo.",a respeito de: ".$descricao.", Executado no dia: ".$data.", das: ".$hora_inicio.", as: ".$hora_final." para verificar detalhes utilize o seguinte link a seguir: http://intranet.costasul.com.br/ti/banco_horas/";
    $recebe_email = "vanderlei@costasul.com.br";
    $cabecalho = "From: bancodehoras@costasul.com.br" . "\r\n" . "Reply-To: ti@costasul.com.br" . "\r\n";
    mail($recebe_email,"*** BANCO DE HORAS ***",$mensagem_email,$cabecalho ) ;

	//DISPARO DE E-MAIL QUANDO CADASTRADO BANCO DE HORA.
	$mensagem_email= $usuario.", Cadastrou um registro no banco de horas para: ".$nome." Do tipo: ".$tipo.",a respeito de: ".$descricao.", Executado no dia: ".$data.", das: ".$hora_inicio.", as: ".$hora_final." para verificar detalhes utilize o seguinte link a seguir: http://intranet.costasul.com.br/ti/banco_horas/";
    $recebe_email = "alexandra@costasul.com.br";
    $cabecalho = "From: bancodehoras@costasul.com.br" . "\r\n" . "Reply-To: ti@costasul.com.br" . "\r\n";
    mail($recebe_email,"*** BANCO DE HORAS ***",$mensagem_email,$cabecalho ) ;
	

	//DISPARO DE E-MAIL QUANDO CADASTRADO BANCO DE HORA.
	$mensagem_email= $usuario.", Cadastrou um registro no banco de horas para: ".$nome." Do tipo: ".$tipo.",a respeito de: ".$descricao.", Executado no dia: ".$data.", das: ".$hora_inicio.", as: ".$hora_final." para verificar detalhes utilize o seguinte link a seguir: http://intranet.costasul.com.br/ti/banco_horas/";
    $recebe_email = "joice@costasul.com.br";
    $cabecalho = "From: bancodehoras@costasul.com.br" . "\r\n" . "Reply-To: ti@costasul.com.br" . "\r\n";
    mail($recebe_email,"*** BANCO DE HORAS ***",$mensagem_email,$cabecalho ) ;
	
	//DISPARO DE E-MAIL QUANDO CADASTRADO BANCO DE HORA.
	$mensagem_email= $usuario.", Cadastrou um registro no banco de horas para: ".$nome." Do tipo: ".$tipo.",a respeito de: ".$descricao.", Executado no dia: ".$data.", das: ".$hora_inicio.", as: ".$hora_final." para verificar detalhes utilize o seguinte link a seguir: http://intranet.costasul.com.br/ti/banco_horas/";
    $recebe_email = "Janaina.rodrigues@costasul.com.br";
    $cabecalho = "From: bancodehoras@costasul.com.br" . "\r\n" . "Reply-To: ti@costasul.com.br" . "\r\n";
    mail($recebe_email,"*** BANCO DE HORAS ***",$mensagem_email,$cabecalho ) ;


	
				

              } else{

                  $erro = "Não foi possivel cadastrar os dados";

              }

    }

}

?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<style type="text/css">
.campo{
width:400px;
}
</style>



</head>



<form name="form1" action="index_valida.php" method="POST" style="padding-top:40px;">

<?php

if(isset($erro)){

    print '<div style="width:80%; background:red; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro.'</div>';

}


if(isset($erro2)){

    print '<div style="width:80%; background:green; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro2.'</div>';

}

?>
<blockquote>
<table border="0" >

<thead>

<tr>

<th colspan="2">.:: CADASTRO DOS DADOS::.</th>
</tr>

</thead>

<tbody>

<tr>

<td width="20%">Nome Completo:</td>
<td><select name="nome" class="campo" id="nome">
<option>GEMERSON GOMES</option>
<option>--------------</option>
<option>T.I</option>
<option>--------------</option>
<!-- <option>VANDERLEI</option> -->
<option>GUSTAVO_SCHEPP</option>
<option>ERICK</option>
<option>EDUARDO</option>
<option>--------------</option>
<option>COMPRAS</option>
<option>--------------</option>
<option>ANDREIA</option>
<option>MAURA</option>
<option>GERALDO</option>
<option>JEFFERSON_CAMILO</option>
<option>--------------</option>
<option>ALM_PECAS</option>
<option>--------------</option>
<option>SUZANA</option>
<option>--------------</option>
<option>FINANCEIRO</option>
<option>--------------</option>
<!-- <option>EDICLEIA</option> -->
<option>ANA_ULIANA</option>
<option>HELKA MARA</option>
<option>MAYARA</option>
<option>JULIANA_RIVA</option>
<option>LAIRA</option>
<!-- <option>ELOISA</option> -->
<option>--------------</option>
<option>COMERCIAL</option>
<option>--------------</option>
<!--<option>MARILIA</option>-->
<option>THISBE</option>
<option>SAFIRA</option>
<option>ISIS_CRUZ</option>
<option>--------------</option>
<option>LOGISTICA</option>
<option>--------------</option>
<option>ROBSON</option>
<option>CARLOS_NEVES</option>
<option>DIONATHAN</option>
<option>LUCIANA_KELLER</option>
<option>--------------</option>
<option>COMEX</option>
<option>--------------</option>
<option>GESSICA</option>
<option>ARYANE_GOMES</option>
<option>--------------</option>
<option>P.I</option>
<option>--------------</option>
<!-- <option>ALESSON</option> -->
<option>CRISTIANO</option>
<option>CRISTIANO_AGUIAR</option>
<option>EDMILSON</option>
<option>JAILTON_SOUZA</option>
<!-- <option>JOSE</option> -->
<option>CARLOS_ANTONIO</option>
<!-- <option>CARLOS_AUGUSTO</option> -->
<option>CLAUDIOMIRO</option>
<option>DIEGO</option>
<option>IZAKSON</option>
<!-- <option>JEFFERSON</option> -->
<option>JOAO</option>
<!-- <option>LENILSON</option> -->
<option>FRANCIVAN</option>
<option>RAFAEL_VALADARES</option>
<option>GUSTAVO_DE_PAULA</option>
<option>RICARDO_JOSE</option>
<option>QUEREN_SUNAMITA</option>
<option>JOSE_ANTONIO</option>
<option>LARISSA_ROSA</option>
<!--<option>ANDRIEL_RANGUETT</option>-->
<option>--------------</option>
<option>MANUTENCAO</option>
<option>--------------</option>
<option>ALEX</option>
<option>VANDERSIR</option>
<option>SILVIO</option>
<option>PAULO</option>
<option>CICERO</option>
<option>SEBASTIAO</option>
<option>LAUDECIR</option>
<option>DAVI</option>
<!-- <option>EDSON</option> -->
<!-- <option>RAMIRO</option> -->
<option>JURANDIR_ASSUNÇÃO</option>
<option>ROBSON_MANOEL</option>
<option>WILSON</option>
<!-- <option>FABIO_TINELLO</option> -->
<option>LEANDRO</option>
<option>FERNANDO</option>
<option>NELSON</option>
<!-- <option>PETERSON_KLIPPEL</option> -->
<!-- <option>OSIEL_SANTANA</option> -->
<!-- <option>NADILSON_OLIVEIRA</option> -->
<option>EVANDRO_JACUNIAK</option>
<option>ELTON_JONNES</option>
<option>--------------</option>
<option>ENCARREGADOS</option>
<option>--------------</option>
<option>WILLIAN</option>
<option>VALDECIR</option>
<option>EMIR</option>GESS
<option>ELIZETE</option>
<option>JOSE_HELIO</option>
<option>JOEL</option>
<!-- <option>BETO</option> -->
<!-- <option>VAGNER</option> -->
<!-- <option>ADRIANA</option> -->
<option>--------------</option>
<option>ALMOX CENTRAL</option>
<option>--------------</option>
<option>LUCIANO</option>
<option>LUCIANA</option>
<option>KATIA</option>
<option>ANA_VALENTIM</option>
<option>--------------</option>
<option>R.H</option>
<option>--------------</option>
<option>LORENA</option>
<option>JOICE</option>
<option>CRISTINA</option>
<option>SIBELY</option>
<option>NATHÁLIA_PAGOTTO</option>
<option>JAQUELINE VENERAL</option>
<option>PATRICIA_NUTINI</option>
<!-- <option>RAYSSA</option> -->
<option>ANDREZA</option>
<option>THIAGO</option>
<option>--------------</option>
<option>CARREGAMENTO</option>
<option>--------------</option>
<option>ARTILIO</option>
<option>LEOCIR</option>
<option>NILTON</option>
<option>RODRIGO</option>
<option>VALDIR</option>
<option>ALBERI</option>
<option>VANDERLEI_PASSOS</option>
<option>WILLIAMS</option>
<!-- <option>OZIEL</option> -->
<!-- <option>RAUL</option> -->
<!-- <option>JOSE_MARCOS</option> -->
<option>WLYSSES</option>
<!-- <option>ANDRE_NUNES</option> -->
<option>ADRIAN_ABISAY</option>
<!-- <option>GEAM_SANTANA</option> -->
<option>JENILSON_SANTOS</option>
<option>--------------</option>
<option>LABORATORIO</option>
<option>--------------</option>
<!--<option>MARCOS</option>-->
<option>GEYSY</option>
<option>NIRTES</option>
<!-- <option>THAIS</option> -->
<option>SANDRA</option>
<option>JOCIANE</option>
<!-- <option>JESSICA_FERREIRA</option> -->
<option>WESLEY</option>
<!-- <option>MARYELLA</option> -->
<option>CATIA_DENISE</option>
<option>JAQUELINE_SANTOS</option>
<option>--------------</option>
<option>BARCOS</option>
<option>--------------</option>
<option>LIDIANE</option>
<!-- <option>ALINE</option> -->
<option>--------------</option>





</select>
</td>
</tr>

<tr>

<td>Hora Inicio:</td>

<td><input name="hora_inicio" type="text" class="campo"  maxlength="5" OnKeyUp="Mascara_Hora(this.value)" id="hora_inicio" /></td>

</tr>
<tr>

<td>Hora Final:</td>

<td><input name="hora_final" type="text" class="campo" maxlength="5" OnKeyUp="Mascara_Hora2(this.value)" id="hora_final" /></td>

</tr>

<tr>

<tr>

<td>Data:</td>

<td><input name="data" type="text" class="campo"  id="data" OnKeyUp="mascaraData(this);" maxlength="10" /><FONT COLOR=RED>MÁXIMO 3 DIAS ATRAS</font></td> 

</tr>

<tr>

<td>Observações:</td>

<td><input name="descricao" type="text" class="campo" onkeyup="maiuscula(this)" id="descricao" /></td>

</tr>

<tr>

<td>Tipo de Registro:</td>

<td><select name="tipo">
	
		<option>BANCO_HORAS</option>
		<option>FOLGA</option>
		      
</select>
 </td>

</tr>

<td><input type="submit" value="Cadastrar" /><input type="hidden" name="done"  value="" /></td>

</tr>

</tbody>

</table>

</form>

<hr>



</blockquote>



<br>
</font>
</font></font>
<br>
<a href="login.php"><img src=images/sair.png width=50 height=50></a>
Sair


</body>
</html>

