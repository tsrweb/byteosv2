<?php

	session_start();	
	
	$logado = $_SESSION['nome'];
	
	if($logado != "Byte OS"){
		header('location: index.php');
	}

    $pagina = "finalizarTicket";

$idTicket = $_REQUEST['idTicket'];

	include "conecta.php";	
	
		$con = "SELECT * FROM tb_ticket WHERE id_ticket ='$idTicket'";
		
		$res = $link->query($con);
	
	if ($res->num_rows == 0) {
	
		echo "<script>alert('Ticket não encontrado!!!');window.location=('procurar.php');</script>";
	} 
	
		else{ 
            while($reg = $res->fetch_array()){

                if($reg['te_situacao'] == 'Em Aberto'){
                    $cor = 'class="alert alert-danger text-center"';
                }  if($reg['te_situacao'] == 'Encerrada'){
                    $cor = 'class="alert alert-success text-center"';
                }
        
            $idTicket = $reg['id_ticket'];
            $idEmpresa = $reg['id_empresa'];
            $equipamento = $reg['nm_equipamento'];
            $codEquipamento = $reg['nu_codEquipamento'];
            $modelo = $reg['te_marcaModelo'];
            $defeito = $reg['te_defeitoRelatado'];
            $solucao = $reg['te_servicoRealizado'];
            $nomeTecnico = $reg['nm_tecnico'];
            $setor = $reg['nm_setor'];
            $situacao = $reg['te_situacao'];
            }

            if($situacao == 'Em Aberto'){
                $servico = "placeholder='Descreva o serviço'";
                $tecnico = "placeholder='Descreva o serviço'";
            }if ($situacao == "Encerrada"){
                $servico = "placeholder='$solucao' disabled";
                $tecnico = "placeholder='$nomeTecnico' disabled";
            }

            $con1 = "SELECT * FROM tb_empresa WHERE id_empresa = '$idEmpresa'";

            $res2 = $link->query($con1);
        
                while($reg2 = $res2->fetch_array()){
        
                    $empresa = $reg2['nm_empresa'];
                }
            };//end else
        $link->close();
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
                    <h3>Finalizar Ticket</h3>
                    <div class="card">
                        <div class="card-header">
                            Ticket N° <?php echo"$idTicket";?>
                        </div>
                        <div class="card-body">

                            <div <?php echo"$cor"?> role="alert">
                                <strong>Situação:</strong> <?php echo"$situacao"?>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col col-lg-12">
                                        <label for="Empresa" class="form-label">Empresa:</label>
                                        <input class="form-control" type="text" placeholder="<?php echo"$empresa";?>"
                                            disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-lg-6">
                                        <label for="equipamento" class="form-label">Equipamento:</label>
                                        <input class="form-control" type="text"
                                            placeholder="<?php echo"$equipamento";?>" disabled>
                                    </div>
                                    <div class="col col col-lg-6">
                                        <label for="cnpj" class="form-label">Marca / Modelo:</label>
                                        <input class="form-control" type="text" placeholder="<?php echo"$modelo";?>"
                                            disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col col-lg-7">
                                        <label for="logradouro" class="form-label">Código do Equipamento /
                                            Serial:</label>
                                        <input class="form-control" type="text"
                                            placeholder="<?php echo"$codEquipamento";?>" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col col-lg-12">
                                        <label for="logradouro" class="form-label">Defeito Relatado:</label>
                                        <textarea class="form-control" rows="5" placeholder="<?php echo"$defeito";?>"
                                            disabled></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col col-lg-12">
                                        <label for="servRealizado" class="form-label">Serviço Realizado:</label>
                                        <textarea class="form-control" rows="5" <?php echo"$servico";?>></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col col-lg-7">
                                        <label for="tecnico" class="form-label">Técnico:</label>
                                        <input type="text" class="form-control" <?php echo"$tecnico";?>>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <?php if($situacao == 'Em Aberto'){echo'<buttom type="submit" class="btn btn-primary">Finalizar</buttom>';}?>
                                        <buttom type="buttom" class="btn btn-primary" onClick="history.go(-1)">
                                            Voltar</button>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>