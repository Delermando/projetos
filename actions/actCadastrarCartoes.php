<?php

if ($cadastrarCartoes == true && Validation::duplicatedPost() == true) {
    $dataEnvio = $selectDia . "/" . $selectMes . "/" . $selectAno;
    if ($txtEmailDestinatario != "" && $txtNomeDestinatario != "" && $txtEmailRemetente != "" && $txtNomeRemetente != "" && $txtMensagem != "" && $dataEnvio) {
        $query = new QueryStatement();
        $queryInsert = $query->insertUserAgenda($txtEmailDestinatario, $txtNomeDestinatario, $txtEmailRemetente, $txtNomeRemetente, $txtMensagem, $dataEnvio);

        if ($queryInsert == true) {
            $mensagem = $systemMensages['registrationSucess'];
        } else {
            $mensagem = $systemMensages['registratioFailed'];
        }
        extract(Mensages::show($queryInsert, $mensagem));
    } else {
        extract(Mensages::show(false, $systemMensages['fieldIncomplete']));
    }
}

