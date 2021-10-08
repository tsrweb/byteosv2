<?php 

function corstatus ($status){
    if($status == 'Em Aberto'){
        $cor = 'class="text-danger"';
    }  if($status == 'Encerrada'){
        $cor = 'class="text-success"';
    }

    return $cor;
}

function nunTicketAberto ($idEmpresa){

    include "conecta.php";

    if ($idEmpresa == 1){$con = "SELECT * FROM tb_ticket WHERE te_situacao = 'Em Aberto'";}
        else{$con = "SELECT * FROM tb_ticket WHERE te_situacao = 'Em Aberto' AND id_empresa = '$idEmpresa'";}

	$res = $link->query($con);
	$nunTickets = $res->num_rows;

    return $nunTickets;
}

function nunTicketEncerrado ($idEmpresa){

    include "conecta.php";

    if ($idEmpresa == 1){$con = "SELECT * FROM tb_ticket WHERE te_situacao = 'Encerrada'";}
        else{$con = "SELECT * FROM tb_ticket WHERE te_situacao = 'Encerrada' AND id_empresa = '$idEmpresa'";}

	$res = $link->query($con);
	$nunTickets = $res->num_rows;
    
    return $nunTickets;
}

function nomeEmpresa ($idEmpresa){

    include "conecta.php";
    
    $con = "SELECT * FROM tb_empresa WHERE id_empresa = '$idEmpresa'";
	$res = $link->query($con);
    
		while($reg = $res->fetch_array()){$nomeEmpresa = $reg['nm_empresa'];};
            
        return $nomeEmpresa;
}

function idEmpresa ($nomeEmpresa){

    include "conecta.php";

    $con0 = "SELECT * FROM tb_empresa WHERE nm_empresa = '$nomeEmpresa'";
	$res0 = $link->query($con0);

	    while($reg0 = $res0->fetch_array()){$idEmpresa = $reg0['id_empresa'];}

        return $idEmpresa;
}


?>