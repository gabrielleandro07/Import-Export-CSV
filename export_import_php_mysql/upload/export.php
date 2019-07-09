<?php
  if(isset($_POST["export"])) {
    $conn = mysqli_connect("localhost", "root", "", "db_gabriel_leandro") or die ('Ocorreu um erro ao conectar com o banco de dados');
     
    $arquivo = 'teste.xls';

    $tabela = '<table border="1">';
    $tabela .= '<tr>';
    $tabela .= '<td colspan="2">Tabela de noticias CSV</tr>';
    $tabela .= '</tr>';
    $tabela .= '<tr>';
    $tabela .= '<td><b>ID</b></td>';
    $tabela .= '<td><b>TITULO</b></td>';
    $tabela .= '<td><b>DESCRICAO</b></td>';
    $tabela .= '<td><b>DATA PUBLICACAO</b></td>';
    $tabela .= '</tr>';


    header('Content-Disposition: attachment; filename=teste.csv');

    $output = fopen("php://output", "w");

    $query = "SELECT * FROM noticia ORDER BY id";

    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)) {
      $tabela .= '<tr>';
      $tabela .= '<td>'.$row['id'].'</td>';
      $tabela .= '<td>'.$row['titulo'].'</td>';
      $tabela .= '<td>'.$row['descricao'].'</td>';
      $tabela .= '<td>'.$row['data_publicacao'].'</td>';
      $tabela .= '</tr>';
    }

    $tabela .= '</table>';
    header ('Cache-Control: no-cache, must-revalidate');
    header ('Pragma: no-cache');
    header('Content-Type: application/x-msexcel');
    header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
    echo $tabela;
  }
?>