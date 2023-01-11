<?php


class FormatBodyText
{
/*
Classe inicialmente feita para converter documentos em Markdown e HTML
Para utilizar em hatml deve mandar a string gravar em um txt pois no navegador
ela já executada direta.
*/
  function __construct()
  {

  }


  public function convertTags($frase, $item, $troca)
  {
    $array = explode(" ", $frase);

    for ($i=0; $i < count($array); $i++)
    {
      $array[$i] = str_replace($item, $troca, $array[$i]);
    }

    return  implode(" ", $array);

  }



}

// example
$d = new FormatBodyText;
$x = $d->convertTags($_POST['text'], '<title>', '<#title>');
$x1 = $d->convertTags($x, '</title>', '<#title>');
$x2 = $d->convertTags($x1, '<head>', '<#head>');
$x3 = $d->convertTags($x2, '</head>', '<#/head>');
$x4 = $d->convertTags($x3, '<html>', '<#html>');
$x5 = $d->convertTags($x4, '</html>', '<#/html>');
$x6 = $d->convertTags($x5, '</body>', '<#/body>');
echo "<br>";
echo "Original: " . $_POST['text'];
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
$f = $d->convertTags($x6, '<body>', '<#/body>');
echo "Segunda converter: " . $f;
?>
