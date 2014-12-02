<?php
$status = array(true, true);
if (is_array($arrayExcluir)) {
    for($i=0; $i < sizeof($arrayExcluir); $i++){
        $query = new QueryStatement();
        $status[] =  $query->deleteCard($arrayExcluir[$i]);
    }
    
    if(array_search(false, $status) !== false){
        $mensagem = $systemMensages['dataExclusionFailed'];
        $statusFinal = false;
    }else {
        $mensagem = $systemMensages['dataExclusionSucess'].$i;
        $statusFinal = true;
    }
    extract(Mensages::show($statusFinal, $mensagem));
}


