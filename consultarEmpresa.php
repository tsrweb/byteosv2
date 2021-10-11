<?php

include "session.php";
include "conecta.php";

$pagina = "consultarEmpresa";

?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <title>Byte OS</title>
</head>

<body>
    <?php include "menu.php" ?>

    <main>

        <div class="container mt-4">
            <div class="row">
                <div class="col">

                    <div class="card">
                        <div class="card-header">
                            Empresas Cadastradas
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Empresa</th>
                                        <th scope="col">Contato</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">Opções</th>
                                    </tr>
                                </thead>
                                <tbody>

            <?php 
            	$con = "SELECT * FROM tb_empresa";
                $res = $link->query($con);
                while($reg = $res->fetch_array()){?>

            <tr>
                <th scope='row'><?=$reg['id_empresa']?></td>
                <td><?=$reg['nm_empresa']?></td>
                <td><?=$reg['nm_contato']?></td>
                <td><?=$reg['fn_empresa']?></td>
                <td><a href="visualizarEmpresa.php?idEmpresa=<?=$reg['id_empresa']?>" title="Visualizar"><buttom type="button" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></buttom></a>
                <a href="editarEmpresa.php?idEmpresa=<?=$reg['id_empresa']?>" title="Editar"><buttom type="button" class="btn btn-danger btn-sm"><i class="bi bi-pencil"></i></buttom></a>
                <a href="historicoEmpresa.php?idEmpresa=<?=$reg['id_empresa']?>" title="Histórico"><buttom type="button" class="btn btn-secondary btn-sm"><i class="bi bi-clipboard-data"></i></buttom></a></td>
            </tr>
<?php
    } /* End While */
    $link->close();?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>
</html>