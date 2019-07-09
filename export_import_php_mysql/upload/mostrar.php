<?php
    $conn = mysqli_connect('localhost', 'root', '', 'db_gabriel_leandro') or die ('Ocorreu um erro ao conectar com o banco de dados');
    $query = 'SELECT * FROM noticia';
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        foreach ($row as $data) {
            echo '<td>';
            echo $data;
            echo '</td>';
        }

        echo "<td>
        <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalLong".$row['id']."\">
          Informações
        </button>  ";


        echo "
        <!-- Modal -->
        <div class=\"modal fade\" id=\"exampleModalLong".$row['id']."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLongTitle\" aria-hidden=\"true\">
          <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
              <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"exampleModalLongTitle\">Informações do Usuário</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                  <span aria-hidden=\"true\">&times;</span>
                </button>
              </div>
              <div class=\"modal-body\">";

               foreach ($row as $name=> $data) {
          
                echo "<h4> $name </h4>";
                echo "<p> $data </p>";
    
                }
                echo "
              </div>
              <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Fechar</button>
              </div>
            </div>
          </div>
        </div>";

        echo '</tr>';
    }
?>