<?php
    require_once "controller.php";
    require_once "repository.php";

    global $telephones;
    global $soldes;
    global $clients;
    global $transactions;

    function menu(){
        echo " Menu \n";
        echo " 1. Creer Wallet \n 2. Faire Depot \n 3. Faire Retrait \n 4. Lister les transactions \n 0. Quitter \n";
    }

    function choixUser(){
        $ch = (int)readline("Entrer votre choix : ");
        return $ch;
    }

    function afficherTransaction(array $clients, array $transactions){
        for($i = 0; $i < count($clients); $i++){
            echo "Nom : " . $clients[$i] . "\n";
            for($j = 0; $j < count($transactions); $j++){
                echo "transaction : " . $transactions[$i][$j] . "cfa \n";
            }
        }
    }


    do {
        menu();
        $choix = choixUser();
        
        controller($choix,$telephones,$soldes, $clients, $transactions);

        
    } while($choix !== 0);



?>