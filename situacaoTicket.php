<?php 

function corstatus ($status){
    if($status == 'Em Aberto'){
        $cor = 'class="text-danger"';
    }  if($status == 'Encerrada'){
        $cor = 'class="text-success"';
    }

    return $cor;
}

?>