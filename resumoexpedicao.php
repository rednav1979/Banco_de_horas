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
day = " Ter�a - Feira, " 

else if(myday == 3)
day = " Quarta - Feira, " 

else if(myday == 4)
day = " Quinta - Feira, " 

else if(myday == 5)
day = " Sexta - Feira, " 

else if(myday == 6)
day = " S�bado, " 

if(mymonth == 0)
month = "Janeiro " 

else if(mymonth ==1)
month = "Fevereiro " 

else if(mymonth ==2)
month = "Mar�o " 

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
include("seguranca.php"); // Inclui o arquivo com o sistema de seguran�a
protegePagina(); // Chama a fun��o que protege a p�gina
echo "Ol�, " . $_SESSION['usuarioNome']." Seja bem vindo(a)";
$usuariosql = $_SESSION['usuarioNome'];
?>  

<!-- <blockquote> 

<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'ALESSON' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print ALESSON;
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

if ($saldo_horas > 0 ){
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

</blockquote> -->


<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'CRISTIANO' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print CRISTIANO;
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

if ($saldo_horas > 0 ){
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





<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'EDMILSON' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print EDMILSON;
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

if ($saldo_horas > 0 ){
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


<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'CRISTIANO_AGUIAR' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print CRISTIANO_AGUIAR;
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

if ($saldo_horas > 0 ){
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

<!-- <blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'JOSE' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print JOSE;
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

if ($saldo_horas > 0 ){
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

</blockquote> -->

<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'CARLOS_ANTONIO' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print CARLOS_ANTONIO;
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

if ($saldo_horas > 0 ){
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


<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'CARLOS_AUGUSTO' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print CARLOS_AUGUSTO;
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

if ($saldo_horas > 0 ){
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


<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'CLAUDIOMIRO' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print CLAUDIOMIRO;
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

if ($saldo_horas > 0 ){
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

<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'DIEGO' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print DIEGO;
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

if ($saldo_horas > 0 ){
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

<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'IZAKSON' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print IZAKSON;
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

if ($saldo_horas > 0 ){
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

<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'JEFFERSON' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print JEFFERSON;
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

if ($saldo_horas > 0 ){
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

<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'JOAO' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print JOAO;
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

if ($saldo_horas > 0 ){
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

<!-- <blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'LENILSON' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print LENILSON;
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

if ($saldo_horas > 0 ){
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

</blockquote> -->


<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'FRANCIVAN' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print FRANCIVAN;
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

if ($saldo_horas > 0 ){
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



<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'RAFAEL_VALADARES' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print RAFAEL_VALADARES;
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

if ($saldo_horas > 0 ){
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

<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'GUSTAVO_DE_PAULA' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print GUSTAVO_DE_PAULA;
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

if ($saldo_horas > 0 ){
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


<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'ANDRIEL_RANGUETT' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print ANDRIEL_RANGUETT;
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

if ($saldo_horas > 0 ){
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

<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'RICARDO_JOSE' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print RICARDO_JOSE;
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

if ($saldo_horas > 0 ){
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
<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'QUEREN_SUNAMITA' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print QUEREN_SUNAMITA;
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

if ($saldo_horas > 0 ){
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
<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'JOSE_ANTONIO' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print JOSE_ANTONIO;
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

if ($saldo_horas > 0 ){
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
<blockquote>
<?php 
// ZERANENTO DE VARIAVEIS
$horas_100=0;
$horas_60=0;
$hora_s_acrescimo=0;
$hora_trabalhada=0;
$saldo_horas=0;
$horas_folga=0;
$horas_acumuladas=0;
$hora_inicio =0;
$hora_final =0;
$total_horas=0;
$total=0;
$horaini=0;
$horafin=0;

   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas where NOME = 'LARISSA_ROSA' ORDER BY data_criacao")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);

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
		   

	   if ($tipo =='FOLGA'){	   
		$horas_folga = number_format( $horas_folga + $hora_trabalhada,2,'.','');
		$faixa = '-';
		
	   }
	   if ($tipo =='BANCO_HORAS'){		   
			
			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada),2,'.','');				
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			
	   }

				print '</tr>';	
           }
				print'</table>';


?>

<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculo de Horas:';
print LARISSA_ROSA;
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

if ($saldo_horas > 0 ){
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
</font>
</font></font>
<br>
<a href="index.php"><img src=images/voltar.png width=50 height=50></a>



</body>
</html>
