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
			
		

                                        
de 2015.



<?php

include("seguranca.php"); // Inclui o arquivo com o sistema de seguran�a
protegePagina(); // Chama a fun��o que protege a p�gina
echo "Ol�, " . $_SESSION['usuarioNome']." Seja bem vindo(a).";

?>  
<br><br>




<?php 
   include "sql.php";//conex�o com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM banco_horas ORDER BY id")  or die(mysql_error());
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
	   print'<td><b>FAIXA</td>';
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
		print '<td>'.$faixa.'</td>';
	   }
	   if ($tipo =='BANCO_HORAS'){
		   print '<td>'.$faixa.'</td>';
			if ($faixa == '100%'){			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada*2),2,'.','');
				$horas_100 = ($horas_100 +$hora_trabalhada);
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			}
			if ($faixa == '60%'){			
				$horas_acumuladas = number_format(( $horas_acumuladas + $hora_trabalhada*1.6),2,'.','');
				$horas_60 = ($horas_60 +$hora_trabalhada);
				$hora_s_acrescimo = ($hora_s_acrescimo  + $hora_trabalhada);
			}
	   }
				print '<td>'.$data.'</td>';	   
				print '</tr>';	
           }
				print'</table>';


?>
<br>
<hr>
<?php
print '<br>';

print '<font color=green size=4>';
print '<i>';
print 'Calculos:';
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
print 'Detalhamento dos Calculos:';
print '</i>';
print '<br>';
print '<font color=grow size=4>';

print 'Horas a calcular c/ 100%:';
print '<font color=blue>';
print number_format($horas_100,2,'.','');
print '</font>';
print '  ||  ';
print 'Horas a calculadas c/ 100%:';
print '<font color=blue>';
print number_format($horas_100*2,2,'.','');
print '</font>';
print '<br>';

print 'Horas a calcular c/ 60%:';
print '<font color=blue>';
print number_format($horas_60,2,'.','');
print '</font>';
print '  ||  ';
print 'Horas a calculadas c/ 60%:';
print '<font color=blue>';
print number_format(($horas_60*1.6),2,'.','');
print '</font>';


print '<br>';

print 'Total Horas Sem 100%/60%:';
print '<font color=blue>';
print number_format($hora_s_acrescimo,2,'.','');
print '</font>';
print '  ||  ';

print 'Total Horas Com 100%/60%:';
print '<font color=blue>';
print number_format(($horas_100*2 +$horas_60*1.6),2,'.','');
print '</font>';
print '<hr>';
?>
<br>
</font></font></font>
<a href="index.php"><img src=images/voltar.png></a>
Voltar 


</body>
</html>

