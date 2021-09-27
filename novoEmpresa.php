<?php	/* Desenvolvido por Tiago Rodrigues */
	session_start();

	if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

	$logado = $_SESSION['nome'];	
	
	if($logado != "Byte OS"){
		echo "<style>#adm{display: none;}</style>";
	}

    $pagina = "cadastrarEmpresa";
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

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col col-lg-10">
                    <h3>Byte OS</h3>
                    <div class="card">
                        <div class="card-header">
                            Cadastrar Empresa
                        </div>
                        <div class="card-body">

                            <div class="alert alert-danger" role="alert">
                                <strong>Alerta!</strong> Texto de alerta
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col">
                                        <label for="empresa" class="form-label">Nome da Empresa:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="cnpj" class="form-label">CNPJ:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="logradouro" class="form-label">CEP:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="logradouro" class="form-label">Logradouro:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="numero" class="form-label">Número:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="cidade" class="form-label">Cidade:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="bairro" class="form-label">Bairro:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="UF" class="form-label">UF:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="telefone" class="form-label">Telefone:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="contato" class="form-label">Contato:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="usuario" class="form-label">Usuário:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="senha" class="form-label">Senha:</label>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <buttom type="submit" class="btn btn-primary">Cadastrar</buttom>
                                        <buttom type="buttom" class="btn btn-primary" onClick="history.go(-1)">Voltar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/ulg/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>