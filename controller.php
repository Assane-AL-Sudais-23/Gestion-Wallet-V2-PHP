<?php
    require_once "validator.php";
    require_once "repository.php";



    function controller(string $choix, array $telephones, array $soldes){
    

        switch($choix){
            case 1: 
                echo "Creer Wallet \n";
                $nouveauWallet = saisirWallet();
                $valNam = verifierName($nouveauWallet[0]);
                $valNum = validerTelCode($nouveauWallet[1] , $nouveauWallet[2]);
                $valOp = validerOperateur($nouveauWallet[1]);

                if($valNam !== 7 || $valNum !== 7 || $valOp !== 7) {
                    echo "Saisie incorrect ! \n";
                } else {
                    creerWallet($nouveauWallet);
                    echo "compte crée avec succes ! \n";
                }
                break;
            case 2: 
                echo "Faire Depot \n";
                $numb = readline("Entrer votre numero :");
                $indexNumb = retournerIndex($numb, $telephones);

                if($indexNumb === -1){
                    echo "compte introuvable ! \n";
                } else {

                    $montant = (int)readline("Entrer le montant a deposer : ");
                    $valSolde = verifierMontant($montant, 100);

                    if($valSolde !== 4){
                        depot($montant, $indexNumb, $soldes);
                        $transactions[$indexNumb][] = $montant;
                        echo "Depot reussi ! \n";
                    } else {
                        echo "depot impossible avec ce montant ! \n";
                    }  
                }
                break;
            case 3:
                echo "Faire Retrait \n";
                
            
        }
    }


?>