<?php	/* Desenvolvido por Tiago Rodrigues */
	
    include "session.php";
    $pagina = "novoTicket";

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
                <div class="col col-lg-6">
                    <h3><?=$logado?></h3>
                    <div class="card">
                        <div class="card-header">
                            Cadastrar Ticket
                        </div>
                        <div class="card-body">

                            <div class="alert alert-danger" role="alert">
                                <strong>Alerta!</strong> Texto de alerta
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col col-lg-6">
                                        <label for="equipamento" class="form-label">Selecione o Equipamento:</label>
                                        <select class="form-select" id="equipamento">
                                            <option value=""></option>
                                            <option value="CPU">CPU</option>
                                            <option value="Monitor">Monitor</option>
                                            <option value="Notebook">Notebook</option>
                                            <option value="Teclado">Teclado</option>
                                            <option value="Mouse">Mouse</option>
                                            <option value="Estabilizador">Estabilizador</option>
                                            <option value="NoBreak">NoBreak</option>
                                            <option value="Módulo Isolador">Módulo Isolador</option>
                                            <option value="Caixa De Som">Caixa de Som</option>
                                            <option value="Projetor">Projetor</option>
                                            <option value="Impressora a Laser">Impressora a Laser</option>
                                            <option value="Impressora Jato de Tinta">Impressora Jato de Tinta</option>
                                            <option value="Multifuncional a Laser">Multifuncional a Laser</option>
                                            <option value="Multifuncional Jato de Tinta">Multifuncional Jato de Tinta</option>
                                            <option value="DVR">DVR</option>
                                            <option value="Cameras">Cameras</option>
                                            <option value="Outros">Outros...</option>
                                        </select>
                                    </div>
                                    <div class="col col col-lg-6">
                                        <label for="cnpj" class="form-label">Marca / Modelo:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col col-lg-7">
                                        <label for="logradouro" class="form-label">Código do Equipamento /
                                            Serial:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col col-lg-12">
                                        <label for="logradouro" class="form-label">Defeito Relatado:</label>
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col col-lg-7">
                                        <label for="Solicitante" class="form-label">Solicitante:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-5">
                                        <label for="Setor" class="form-label">Setor:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-5">
                                        <label for="telefone" class="form-label">Telefone:</label>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col">
                                            <buttom type="submit" class="btn btn-primary">Cadastrar</buttom>
                                            <buttom type="submit" class="btn btn-primary" onClick="history.go(-1)">Voltar</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

</body>
</html>