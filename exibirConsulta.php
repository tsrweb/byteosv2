<?php

	session_start();

	if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

	$logado = $_SESSION['nome'];	
	
	if($logado != "Byte OS"){
		echo "<style>#adm{display: none;}</style>";
	}

    $pagina = "consultarTicket";

$idTicket = $_POST['idTicket'];


include "conecta.php";
	
	if($logado != "Byte OS"){

	$con1 = "SELECT * FROM tb_empresa WHERE nm_empresa = '$logado'";
	$res1 = $link->query($con1);

	while($reg1 = $res1->fetch_array()){
		$idEmpresa = $reg1['id_empresa'];
	}

	$con2 = "SELECT * FROM tb_ticket WHERE id_ticket='$idTicket'";
	
	$res2 = $link->query($con2);

	if ($res2->num_rows == 0) {	
	
		echo "<script type='text/javascript'>alert('Ticket não encontrado!!!');window.location=('sistema.php');</script>";
	}

	while($reg2 = $res2->fetch_array()){
		$idEmpresaTicket = $reg2['id_empresa'];
	}

	if($idEmpresa != $idEmpresaTicket){

		echo "<script type='text/javascript'>alert('Este Ticket não pertence a sua empresa!!!');window.location=('sistema.php');</script>";

	}
}else 

	$con2 = "SELECT * FROM tb_ticket WHERE id_ticket='$idTicket'";
	
	$res2 = $link->query($con2);

if ($res2->num_rows == 0) {	
		
		echo "<script type='text/javascript'>alert('Ticket não encontrado!!!');window.location=('sistema.php');</script>";
	
	}
	
else{ ?>

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
                            Consultar Ticket
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">N° do Ticket</th>
                                        <?php if($logado == "Byte OS"){echo '<th scope="col">Empresa</th>';}?>
                                        <th scope="col">Equipamento</th>
                                        <th scope="col" width='100px'>Data</th>
                                        <th scope="col">Situação</th>
                                        <th scope="col" width='100px'>Finalizado</th>
                                        <th scope="col">Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php   while($reg2 = $res2->fetch_array()){

		if($reg2['te_situacao'] == 'Em Aberto'){
			$cor = 'class="text-danger"';
		}  if($reg2['te_situacao'] == 'Encerrada'){
			$cor = 'class="text-success"';
		}
	
		echo	"<tr>
				<td scope='row'>".$reg2['id_ticket']."</td>";

		/* Coletando nome da Empresa de acordo com o id da empresa contido no ticket e exibindo somente para o adm */

				$idEmpresa = $reg2['id_empresa'];
				$con3 = "SELECT * FROM tb_empresa WHERE id_empresa = '$idEmpresa'";
					$res3 = $link->query($con3);
						while($reg3 = $res3->fetch_array()){$nomeEmpresa = $reg3['nm_empresa'];};
					if($logado == "Byte OS"){echo "<td>".$nomeEmpresa."</td>";};

		/*  Fim da coleta */

		echo	"<td>".$reg2['nm_equipamento']."</td>
				<td>".$reg2['dt_dataAberto']."</td>
				<td width='100px'".$cor.">".$reg2['te_situacao']."</td>
				<td>".$reg2['dt_dataFechado']."</td>
				<td width='90px'><a href='visualizarTicket.php?idTicket=".$reg2['id_ticket']."'title='Visualizar'><buttom type='button' class='btn btn-primary btn-sm'><i class='bi bi-eye'></i></buttom></a> ";

				if($logado == "Byte OS" && $reg2['te_situacao'] == 'Em Aberto'){
				echo"<a href='finalizarTicket.php?idTicket=".$reg2['id_ticket']."'title='Finalizar Ticket'><buttom type='button' class='btn btn-success btn-sm'><i class='bi bi-file-check'></i></buttom></a></td></tr>";}
				else if($logado != "Byte OS"){echo"</td></tr>";};
		
}
		}/* Fim do else */
$link->close();
?>



                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#consultarTicket">Nova Consulta</button>
                            <button type="button" class="btn btn-primary" onClick="history.go(-1)">Voltar</button>
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