<?php

class CSV
{
  private $name;
  private $title = array();
  private $array_content = array();

  public function getName(): string
  {
      return $this->name;
  }

  public function setName(string $name)
  {
      $this->name = $name;
      return $this;
  }

  public function setTitle($array_title)
  {
      $this->title = $array_title;
  }

  public function getTitle():array
  {
      return $this->title;
  }

  public function setContent($array_content)
  {
      $this->array_content = $array_content;
  }

  public function getContent():array
  {
      $return_array = array();
      //Verifica se existem dados para serem adicionados ao arquivo
      if (count($this->array_content) > 0)
      {
          foreach ($this->array_content as $value)
          {
              $array_temp = array();
              foreach ($value as $col) {
                  $array_temp[] = $col;
              }
              $return_array[] = $array_temp;
              unset($array_temp);
          }
      }
      return $return_array;
  }

  public function generateAndDownloadFileCSV()
  {
      header('Cache-Control: max-age=0');
      header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename="'. $this->getName() .'.csv";');
      $output = fopen('php://output', 'w');
      if (!empty($this->getTitle())) { // Titulo Opcional
          fputcsv($output, $this->getTitle(), ';');
      }
      foreach ($this->getContent() as $value) {
          fputcsv($output, $value, ';');
      }
  }


}

// teste de implementação
$array_header = array(
    'Coluna 1',
    'Coluna 2',
    'Coluna 3',
    'Coluna 4',
    'Coluna 5',
);
$array_content = array(
    array(
        'col_1' => ' line 1.1',
        'col_2' => ' line 1.2',
        'col_3' => ' line 1.3',
        'col_4' => ' line 1.4',
        'col_5' => ' line 1.5',),
    array(
        'col_1' => ' line 2.1',
        'col_2' => ' line 2.2',
        'col_3' => ' line 2.3',
        'col_4' => ' line 2.4',
        'col_5' => ' line 2.5',),
    array(
        'col_1' => ' line 3.1',
        'col_2' => ' line 3.2',
        'col_3' => ' line 3.3',
        'col_4' => ' line 3.4',
        'col_5' => ' line 3.5',),
);
$csv = new CSV();
$csv->setName('MeuCSV');
$csv->setHeader($array_header);
$csv->setContent($array_content);
$csv->generateAndDownloadFileCSV();
