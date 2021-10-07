<?php	/* Desenvolvido por Tiago Rodrigues */
	session_start();

	if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

	$logado = $_SESSION['nome'];	
	
	if($logado != "Byte OS"){
		echo "<style>#adm{display: none;}</style>";
	}

    $pagina = "inicio";

	include "conecta.php";

	if($logado != "Byte OS"){

	$con0 = "SELECT * FROM tb_empresa WHERE nm_empresa = '$logado'";
	$res0 = $link->query($con0);

	while($reg0 = $res0->fetch_array()){
		$idEmpresa = $reg0['id_empresa'];
	};

	$con1 = "SELECT * FROM tb_ticket WHERE te_situacao = 'Em Aberto' AND id_empresa = '$idEmpresa'";
	$res1 = $link->query($con1);
	$reg1 = $res1->num_rows;

	$con2 = "SELECT * FROM tb_ticket WHERE te_situacao = 'Encerrada' AND id_empresa = '$idEmpresa'";
	$res2 = $link->query($con2);
	$reg2 = $res2->num_rows;

    $con2 = "SELECT * FROM tb_ticket WHERE id_empresa='$idEmpresa' ORDER BY id_ticket DESC LIMIT 3";
	
	$res = $link->query($con2);

}else{

	$con1 = "SELECT * FROM tb_ticket WHERE te_situacao = 'Em Aberto'";
	$res1 = $link->query($con1);
	$reg1 = $res1->num_rows;

	$con2 = "SELECT * FROM tb_ticket WHERE te_situacao = 'Encerrada'";
	$res2 = $link->query($con2);
	$reg2 = $res2->num_rows;

    $con2 = "SELECT * FROM tb_ticket ORDER BY id_ticket DESC LIMIT 3";

	$res = $link->query($con2);

}

$soma = $reg1 + $reg2;

include "situacaoTicket.php";

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
                            Total de Tickets = <?=$soma?>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger" role="alert">
                                Em Aberto = <?=$reg1?>
                            </div>
                            <div class="alert alert-success" role="alert">
                                Encerrado = <?=$reg2?>
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
                                    
<?php   while($reg2 = $res->fetch_array()){?>

        <tr>
            <td scope='row'><?=$reg2['id_ticket']?></td>
<?php
/* Coletando nome da Empresa de acordo com o id da empresa contido no ticket e exibindo somente para o adm */

        $idEmpresa = $reg2['id_empresa'];
        $con3 = "SELECT * FROM tb_empresa WHERE id_empresa = '$idEmpresa'";
        $res3 = $link->query($con3);
            while($reg3 = $res3->fetch_array()){$nomeEmpresa = $reg3['nm_empresa'];};
                if($logado == "Byte OS"){echo "<td>".$nomeEmpresa."</td>";};

/*  Fim da coleta */
?>
    	<td><?=$reg2['nm_equipamento']?></td>
        <td><?=$reg2['dt_dataAberto']?></td>
        <td width="100px"<?=corstatus($reg2['te_situacao'])?>><?=$reg2['te_situacao']?></td>
        <td><?=$reg2['dt_dataFechado']?></td>
        <td width="90px"><a href="visualizarTicket.php?idTicket=<?=$reg2['id_ticket']?>" title="Visualizar"><buttom type="button" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></buttom></a>
<?php
/* Adicionando botão finalizar ticket caso usuário administrador e situação em aberto */
        if($logado == "Byte OS" && $reg2['te_situacao'] == 'Em Aberto'){?>
        <a href="finalizarTicket.php?idTicket=<?=$reg2['id_ticket']?>" title="Finalizar Ticket"><buttom type="button" class="btn btn-success btn-sm"><i class="bi bi-file-check"></i></buttom></a></td></tr>
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>