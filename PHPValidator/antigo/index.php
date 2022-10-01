<?php
@include('functions.php');
$camp = array("number","name","teste","num");
$type = array("int","int","string","string");
$d = check($_POST,$camp, $type);
// exemplos de saida com chave e com o extract
extract($d, EXTR_SKIP);
echo $number;
echo $name;
echo $teste;
echo $num;
echo "<br />";
echo $d['number'];
echo $d['name'];
echo $d['teste'];
echo $d['num'];

























?>
