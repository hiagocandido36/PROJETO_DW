<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            border-style: solid;
            padding: 10px;
        }

        .postagens {
            border-color: blue;
        }

        .postagem {
            border-color: black;
            margin: 10px;
        }

        .comentarios {
            border-color: green;
        }
    </style>
</head>

<body>
    <h2>Lista de postagens</h2>

        <a href="home.php">voltar</a>
    <!-- tabela -->
    <div class="postagens">
        <?php
        require_once "conexao.php";

        $sql = "SELECT * FROM postagem";

        $resultados = mysqli_query($conexao, $sql);

        while ($linha = mysqli_fetch_array($resultados)) {
            $idpostagem = $linha['idpostagem'];
            $texto = $linha['texto'];
            $data_hora = $linha['data_hora'];
            $idusuario = $linha['idusuario'];

            $sql2 = "SELECT * FROM usuario WHERE idusuario = $idusuario";
            $resultado = mysqli_query($conexao, $sql2);
            $usuario = mysqli_fetch_array($resultado);

            $foto = $usuario['foto'];
            $nome = $usuario['nome'];

            echo "<div class='postagem'>";

            echo "<div>";
            echo "<img src='$foto'>";
            echo "$nome";
            echo $data_hora;
            echo "</div>";

            echo $texto;

            //caixa dos comentarios
            $sql3 = "SELECT * FROM comentario WHERE idpostagem = $idpostagem";
            $comentarios = mysqli_query($conexao, $sql3);

            if (mysqli_num_rows($comentarios) == 0) {
                echo "<br>Essa postagem não possui comentários.";
            } else {
                echo "<div class='comentarios'>";
                // listar comentários aqui

                while ($comentario = mysqli_fetch_array($comentarios)) {
                    $idusuario_comentario = $comentario['idusuario'];
                    $texto_comentario = $comentario['texto'];

                    $sql4 = "SELECT * FROM usuario WHERE idusuario = $idusuario_comentario";
                    $resultado = mysqli_query($conexao, $sql4);
                    $usuario = mysqli_fetch_array($resultado);

                    $foto_usuario_comentario = $usuario['foto'];

                    echo "<div>";
                    echo "<img src='imagem_usuario/$foto_usuario_comentario'>";
                    echo $texto_comentario;


                    echo "</div>";
                }
                ?>
                
                <form action="salvar_comentario.php" method="post">
                    <input type="hidden" name="idpostagem" value="<?= $idpostagem ?>">
                    <input type="text" name="comentario">
                    <input type="submit" value="Comentar">
                </form>

                <?php
                echo "</div>";
            }


            echo "</div>";
        }
        ?>
    </div>
</body>

</html>