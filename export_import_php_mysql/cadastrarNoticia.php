<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
	header("location: login.php");
	exit();	
}

if($_SESSION['id_perfil'] <> 1){
	header("location: index.php");
	exit();	
}
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Noticias</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
            </head>
            <body>
                <div class="container mt-5 card-header">
                    <h1 class="mb-5">Cadastro de Noticias</h1>                    
                    <div class="form-row">
                        <form action="upload/inserirCSV.php" enctype="multipart/form-data" method="POST">
                            <div class="form-group">                                
                                <input type="file" name="arquivo" class="btn btn-secondary mr-3">

                                <input type="submit" value="Enviar" class="mr-5">       
                            </div>
                        </form>

                        <form method="post" action="upload/export.php">
                            <div class="form-group">
                                <button type="submit" name="export" class="btn btn-danger ml-5">
                                    Download CSV
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            <table class="table container">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Descrição</th>
                        <th>Data Inclusão</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                         <?php 
                            require_once 'upload/mostrar.php';
                          ?>
                </tbody>
            </table>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>