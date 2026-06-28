<?php
    require_once "validator.php";
    require_once "repository.php";

    function choixUser(){
        $choix = (int)readline("Entrer votre choix : ");
        return $choix;
    }

    function controller(array $telephones, array $soldes){
        $choix = choixUser();

        switch($choix){
            case 1: 
                echo "Crée Wallet \n";
                $nouveauWallet = saisirWallet();
                $valName = verifierName($nouveauWallet['client']);
                $valTelCode = validerTelCode($nouveauWallet['telephone'], $nouveauWallet['code']);
                $valOp = validerOperateur($nouveauWallet['telephone']);

                if($valName !== 7 || $valTelCode !== 7 || $valOp !== 7){
                    echo "saisie incorrect ! \n";
                } else {
                    creerWallet($nouveauWallet);
                    echo "compte crée avec succes ! \n";
                }
                break;
            case 2: 
                echo "Faire Depot \n";
                $tel = readline("Entrer le numero : ");
                $indexTel = retournerIndex($tel, $telephones);
                if($indexTel === -1){
                    echo "compte inexistant";
                } else {
                    $montant = (int)readline("Entrer le montant a deposer : ");
                    $valSolde = verifierMontant($montant, 100);
                    
                    if($valSolde !== 4){
                        $soldes[$indexTel] += $montant;
                        $transactions[$indexTel][] = $montant;
                        echo "Depot reussi ! \n";
                    } else {
                        echo "depot impossible avec ce montant ! \n";
                    }       
                }
            
        }
    }


?>