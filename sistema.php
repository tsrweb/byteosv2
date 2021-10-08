<?php	/* Desenvolvido por Tiago Rodrigues */

    $pagina = "inicio";

    include "session.php";
	include "conecta.php";
    include "funcoes.php";

    $idEmpresa = idEmpresa($logado);
	$nunTicketsAberto = nunTicketAberto($idEmpresa);
	$nunTicketsEncerrado = nunTicketEncerrado($idEmpresa);

	if($logado != "Byte OS"){

    $con = "SELECT * FROM tb_ticket WHERE id_empresa='$idEmpresa' ORDER BY id_ticket DESC LIMIT 3";
	
	$res = $link->query($con);

}else{

    $con = "SELECT * FROM tb_ticket ORDER BY id_ticket DESC LIMIT 3";

	$res = $link->query($con);

}

$totalTickets = $nunTicketsAberto + $nunTicketsEncerrado;

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
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="main-header text-center">
                        <h3 class="p-4">Bem-Vindo <?=$logado?>!</h3>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-evenly">
                <div class="col col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Informações
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            Total de Tickets = <?=$totalTickets?>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger" role="alert">
                                Em Aberto = <?=$nunTicketsAberto?>
                            </div>
                            <div class="alert alert-success" role="alert">
                                Encerrado = <?=$nunTicketsEncerrado?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>

            <div class="row d-flex justify-content-center">
                <div class="col col-lg-10">
                    <div class="card">
                        <div class="card-header">
                            Últimos Tickets
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <?php if($logado == "Byte OS"){echo '<th scope="col">Empresa</th>';}?>
                                        <th scope="col">Equipamento</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Situação</th>
                                        <th scope="col">Finalizado</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    
<?php   while($reg = $res->fetch_array()){?>

        <tr>
            <td scope='row'><?=$reg['id_ticket']?></td>
<?php
/* Coletando nome da Empresa de acordo com o id da empresa contido no ticket e exibindo somente para o adm */

    if($logado == "Byte OS"){echo "<td>".nomeEmpresa($reg['id_empresa'])."</td>";};

/*  Fim da coleta */
?>
    	<td><?=$reg['nm_equipamento']?></td>
        <td><?=$reg['dt_dataAberto']?></td>
        <td width="100px"<?=corstatus($reg['te_situacao'])?>><?=$reg['te_situacao']?></td>
        <td><?=$reg['dt_dataFechado']?></td>
        <td width="90px"><a href="visualizarTicket.php?idTicket=<?=$reg['id_ticket']?>" title="Visualizar"><buttom type="button" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></buttom></a>
<?php
/* Adicionando botão finalizar ticket caso usuário administrador e situação em aberto */
        if($logado == "Byte OS" && $reg['te_situacao'] == 'Em Aberto'){?>
        <a href="finalizarTicket.php?idTicket=<?=$reg['id_ticket']?>" title="Finalizar Ticket"><buttom type="button" class="btn btn-success btn-sm"><i class="bi bi-file-check"></i></buttom></a></td></tr>
<?php
    }else{echo"</td></tr>";};
} /* End While */
$link->close();
?>
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