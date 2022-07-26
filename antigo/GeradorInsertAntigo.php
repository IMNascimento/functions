<?php
$fim = 7000;
for($i=0;$i<$fim;$i++){

	$quant= rand(5, 100);
	$string = 'AaBbCcDdEeFghijlmopqre';
	$desc = str_shuffle($string);
	$prec = number_format(rand(5,900),2,".",".");
	if(rand(1,2)== 2){
	$tipo = "C";
	}else{
	$tipo = "D";
	}

	$dia = rand(1, 27);
	$mes = rand(1, 12);
	$ano = rand(2000, 2019);
	$date = "".$ano."-".$mes."-".$dia."";
	$insert= "INSERT INTO movimento (descricao, quantidade, preco,tipo, data, id_cliente) VALUES ("."'".$desc."'	".",".$quant.", ".$prec.", "."'".$tipo."'".","."'".$date."'".", '1');";
	echo $insert;
	echo "<br>";
}


?>
