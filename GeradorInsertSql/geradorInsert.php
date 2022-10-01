<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Gerador</title>
    <script type="text/javascript">
      var controleCampo = 1;
      function adicionarCampo() {
          controleCampo++;
          document.getElementById('formulario').insertAdjacentHTML('beforeend', '<div class="form-group" id="campo' + controleCampo + '"><label>Campo: </label><input type="text" name="campo[]" id="campo' + controleCampo + '" placeholder="Digite o nome do seu campo" /><label> Tipo: </label><select name="tipo[]"><option value="string">String</option><option value="int">inteiro</option><option value="float">Float</option><option value="pk">Chave Primaria</option><option value="char">Char</option><option value="date">Data</option></select><input type="hidden" name="id' + controleCampo + '" id="id' + controleCampo + '" /> <button type="button" id="' + controleCampo + '"onclick="removerCampo(' + controleCampo + ')"> - </button></div>');
          document.getElementById("qnt_campo").value = controleCampo;
      }

      function removerCampo(idCampo){
          document.getElementById('campo' + idCampo).remove();
      }
    </script>
  </head>
  <body>
    <form method="POST" action="geradorInsert.php">
      <div id="formulario">
          <input type="hidden" name="qnt_campo" id="qnt_campo" />
          <div class="form-group">
              <label>Campo: </label>
              <input type="text" name="campo[]" id="campo" placeholder="Digite o nome do seu campo" />

              <label>Tipo: </label>
              <select name="tipo[]">
                <option value="string">String</option>
                <option value="int">inteiro</option>
                <option value="float">Float</option>
                <option value="pk">Chave Primaria</option>
                <option value="char">Char</option>
                <option value="date">Data</option>
              </select>
              <input type="text" name="quantidade" id="quantidade" placeholder="quantos inserts" />
              <input type="hidden" name="id1" id="id1" />
              <button type="button" onclick="adicionarCampo()"> + </button>
          </div>
      </div>
      <div class="form-group">
          <input type="submit" value="Salvar" name="EditUsuario">
      </div>
    </form>
  </body>
</html>
<?php
class Gerador{
  public function TypeMod($type, $comp){
    $result = array();
    for ($i=0; $i < $comp ; $i++) {
      switch ($type[$i]) {
        case 'string':
          $string = 'AaBbCcDdEeFghijlmopqre';
          $std = "'". str_shuffle($string)."'";
          $case =$std;
          array_push($result, $case);
          break;
        case 'int':
          $case = rand(5,10000);
          array_push($result, $case);
          break;
        case 'char':
          $case ='N';
          array_push($result, $case);
          break;
        case 'date':
          $dia = rand(1, 27);
        	$mes = rand(1, 12);
        	$ano = rand(2000, 2019);
        	$case = "'".$ano."-".$mes."-".$dia."'";
          array_push($result, $case);
          break;
        case 'float':
            $case = number_format(rand(5,900),2,".",".");
            array_push($result, $case);
            break;
        case 'pk':
            $c =rand(5,100000);
            $case = "'".$c."'";
            array_push($result, $case);
            break;
        default:
          $case = 6;
          array_push($result, $case);
          break;
      }
    }
    return $result;
  }
  function Generate($col, $quant, $tipo){
    $tam = @(count($col));
    for ($j=0; $j < $quant ; $j++) {
      $dados = $this->TypeMod($tipo, $tam);
      $iq = implode($col, ',');
      $v = implode($dados, ',');
      $insert = "INSERT INTO movimento(" . $iq. ") VALUES(". $v.")";
      echo $insert;
      echo "<br>";

    }

  }
}


class GeradorInsert extends Gerador
{

  function __construct(){
    // construtor e validador
  }

  protected function Gerador($camp, $type, $quant){
    // fazer função futura
  }


}

$teste = New GeradorInsert;
@($teste->Generate($_POST["campo"], $_POST["quantidade"], $_POST["tipo"]));



?>
