<?php
    $clients = [];
    $telephones = [];
    $codes = [];
    $soldes = [];
    $transactions = [];

    function saisirWallet(){
        $wallet = [];
        $wallet[] = readline("Entrer votre nom :");
        $wallet[] = readline("Entrer votre telephone :");
        $wallet[] = readline("Entrer votre secret :");
        $wallet[] = 0;

        return $wallet;
    }

    function creerWallet(array $nouveauWallet){
        global $clients;
        global $telephones;
        global $codes;
        global $soldes;

        $clients[] = $nouveauWallet[0];
        $telephones[] = $nouveauWallet[1];
        $codes[] = $nouveauWallet[2];
        $soldes[] = $nouveauWallet[3];
    }
    
    function depot(int $somme, int $index, array &$soldes){
        $soldes[$index] += $somme;
    }

    function retrait(int $somme, int $index, array &$soldes){
        $soldes[$index] -= $somme;
    }

?>