<?php
    require_once "validator.php";
    require_once "repository.php";
    require_once "index.php";



    function controller(string $choix, array $telephones, array &$soldes,array $clients, array &$transactions){
    

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
                $numb = readline("Entrer votre numero de telephone : ");
                $indexNumb = retournerIndex($numb, $telephones);

                if($indexNumb === -1){
                    echo "compte inexistant ! \n";
                } else {

                    $montant = (int)readline("Entrer le montant a retirer :");
                    $valMontant = verifierMontant($montant, 1);
                    $valSomme = verifierMontant($soldes[$indexNumb], $montant);
                    var_dump($soldes);
                    if($valMontant !== 7 || $valSomme !== 7){
                        echo "Retrait impossible avec cette somme ! \n";
                    } else {
                        retrait($montant, $indexNumb, $soldes);
                        $transactions[$indexNumb][] = -$montant;
                        var_dump($transactions[$indexNumb]);
                        echo "Retrait reussi ! \n";
                    }
                }
                break;
            case 4:
                echo "Lister les Transactions \n";
                afficherTransaction($clients, $transactions);
                break;
            case 0:
                echo "Fin Programme \n";
        }
    }


?>