        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'db_gabriel_leandro') or die ('Ocorreu um erro ao conectar com o banco de dados');
            // perfil
            $perfil = " SELECT * FROM tb_perfil ";
            $result_perfil = mysqli_query($conn, $perfil);

                $arquivo = $_FILES["arquivo"];
                $read = fopen($arquivo["tmp_name"],"r");

                    $contador = 0;
                        while($linha = fgetcsv($read,1000,";")){
                            if($contador>0){
                                $query= "INSERT INTO noticia (titulo,descricao,data_publicacao)values('$linha[0]','$linha[1]','$linha[2]')";
                                mysqli_query($conn,$query);

                            
                            }

                            $contador ++;
            }
            header('Location: ../cadastrarNoticia.php');
        ?>