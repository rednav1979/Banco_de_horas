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



<?php
print '<font size=2 color=black>';
//criar a conexÃ£o com o banco

include "sql.php";



if(isset($_POST['done'])){   

    $usuario_consulta = $_POST['usuario_consulta'];
    

    if(empty($usuario_consulta)){

        $erro = "Atenção, você deve preencher o campo Consulta";

    }else{        

       //$sql = mysql_query("SELECT str_to_date(data, '%d/%m/%Y') data1,data,nome,hora_inicio,hora_final,descricao,horas_baixa,faixa,data_criacao,usuario,ip FROM `banco_horas` where NOME = '$usuario_consulta' ORDER BY data1,hora_inicio ") or die(mysql_error());
		 $sql = mysql_query("SELECT str_to_date(data, '%d/%m/%Y') data1,data,nome,hora_inicio,hora_final,descricao,horas_baixa,faixa,data_criacao,usuario,ip FROM `banco_horas` where NOME = '$usuario_consulta' ORDER BY data1,hora_inicio ") or die(mysql_error());
            if($sql){

                $erro2 = "Pesquisa Feita  com sucesso!";

              } else{

                  $erro = "Não foi possivel  recuperar os dados";

              }

    }

}

?>


<blockquote>
<form name="form1" action="detalhamento_geral.php" method="POST" style="padding-top:40px;">

<?php

if(isset($erro)){

    print '<div style="width:80%; background:red; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro.'</div>';

}


if(isset($erro2)){

    print '<div style="width:80%; background:green; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro2.'</div>';

}
?>

<table>

<thead>

<tr>


</tr>

</thead>

<tbody>



<td valign="top">Selecione o Colaborador a Pesquisar </td>
<td><select name="usuario_consulta" class="campo" id="usuario_consulta">

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

</select>
</td>
</tr>



<tr>
<td></td>
<td><input type="submit" value="Pesquisar" /><input type="hidden" name="done"  value="" /></td>
</tr>


</tbody>

</table>

</form>
</blockquote>
</font>

<?php 
// INICIO DA CONSULTA PERSONALIZADA

   include "sql.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT str_to_date(data, '%d/%m/%Y') data1,data,nome,hora_inicio,hora_final,descricao,horas_baixa,faixa,data_criacao,usuario,id FROM `banco_horas` where NOME = '$usuario_consulta' ORDER BY id")  or die(mysql_error()); 
           $colunas = mysql_num_rows($sqltudo);         
	   print'<br>';		
	   print'<br>';		   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';
	   print'<td><b>ID</td>';
	   print'<td><b>NOME</td>';
	   print'<td><b>HORA INICIO</td>';
	   print'<td><b>HORA FINAL</td>';
	   print'<td><b>TOTAL HORAS</td>';
	   print'<td><b>DESCRICAO</td>';
	   print'<td><b>TIPO</td>';
	   print'<td><b>DATA</td>';	
	   print'</tr></b>';

           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");/*pegando os valores do banco referente ao evento*/
           $nome = @mysql_result($sqltudo, $j, "nome");
		   $hora_inicio = @mysql_result($sqltudo, $j, "hora_inicio");
           $hora_final = @mysql_result($sqltudo, $j, "hora_final");		   
		   $total_horas = $hora_final-hora_inicio;
           $descricao = @mysql_result($sqltudo, $j, "descricao");           
		   $tipo = @mysql_result($sqltudo, $j, "horas_baixa");           
		   $faixa = @mysql_result($sqltudo, $j, "faixa");           
           $data = @mysql_result($sqltudo, $j, "data");
		   $data_criacao = @mysql_result($sqltudo, $j, "data_criacao");
		   $usuario = @mysql_result($sqltudo, $j, "usuario");
		   $ip = @mysql_result($sqltudo, $j, "ip");
           				   
		   $horaini = strtotime($hora_inicio)."<br>"; /*Transformando as horas em segundos*/
		   $horafin = strtotime($hora_final); /*Transformando as horas em segundos*/
           $total = $horafin - $horaini; /*Resultado em segundos*/
		   $hora_trabalhada = ($total/60)/60; /*Convertendo os segundos para horas*/
		   
		   
	
	/*print '<table border=1>';/*monta a tabela */

	   print'<tr>';
	   print '<td>'.$id.'	</td>';
	   print '<td>'.$nome.'</td>';
	   print '<td>'.$hora_inicio.'</td>';
	   print '<td>'.$hora_final.'</td>';	   
	   print '<td>'.number_format($hora_trabalhada,2,'.','').'</td>';	   
	   print '<td>'.$descricao.'</td>';
	   print '<td>'.$tipo.'</td>';
	   
	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){
		  
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');
				$horas_60 = ($horas_60 +$hora_trabalhada);
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }
				print '<td>'.$data.'</td>';	   
				print '</tr>';	
           }
				print'</table>';

// FIM DA CONSULTA PERSONALIZADA

?>

<blockquote>
<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print $usuario_consulta;
print '</i>';
print '<font color=grow size=4>';
print'<br>';
print 'Total Horas Acumuladas:';
print '<font color=blue>';
print $horas_acumuladas;
print'<br>';
print '<font>';
print '<font color=grow size=4>';
print 'Total de Horas Folga:';
print '<font color=blue>';
print $horas_folga;
$saldo_horas =($horas_acumuladas-$horas_folga);
print '</font>';
print'<br>';

if ($saldo_horas >= 0 ){
	print '<font color=grow size=4>';
	print 'Saldo de Horas:';
	print '</font>';
	print '<font color=green size=4>';
	print $saldo_horas; 
	print '</font>';
}

if ($saldo_horas < 0 ){
	print '<font color=grow size=4>';
	print 'Saldo de Horas:';	
	print '<font color=red size=4>';
	print $saldo_horas;
	print '</font>';
}
print '<hr>';
print '<i>';
print '<font color=green size=4>';
?>
</blockquote>
<br>











<font size=2 color=orange>
<br>
<a href="index.php"><img src=images/voltar.png width=50 height=50></a>



</body>
</html>

