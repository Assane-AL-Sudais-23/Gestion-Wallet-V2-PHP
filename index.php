<?php
    require_once "controller.php";

    function menu(){
        echo " Menu \n";
        echo " 1. Creer Wallet \n 2. Faire Depot \n 3. Faire Retrait \n 4. Lister les transactions \n 0. Quitter \n";
    }



    do {
        menu();
        controller();
    } while(1 !== 0);



?>