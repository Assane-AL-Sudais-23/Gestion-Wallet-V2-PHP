<?php
    require_once "controller.php";
    require_once "repository.php";

    global $telephones;
    global $soldes;

    function menu(){
        echo " Menu \n";
        echo " 1. Creer Wallet \n 2. Faire Depot \n 3. Faire Retrait \n 4. Lister les transactions \n 0. Quitter \n";
    }

    function choixUser(){
        $ch = (int)readline("Entrer votre choix : ");
        return $ch;
    }

    // function afficherMessage(string $message): void{
    //     echo $message;
    // }


    do {
        menu();
        $choix = choixUser();
        
        controller($choix,$telephones,$soldes);

        
    } while(1 !== 0);



?>