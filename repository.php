<?php
    $clients = [];
    $telephones = [];
    $codes = [];
    $soldes = [];
    $transactions = [];

    function saisirWallet(){
        $wallet = [];
        $wallet['client'] = readline("Entrer votre nom :");
        $wallet['telephone'] = readline("Entrer votre telephone :");
        $wallet['code'] = readline("Entrer votre secret :");
        $wallet['solde'] = 0;

        return $wallet;
    }

    function creerWallet(array $nouveauWallet){
        global $clients;
        global $telephones;
        global $codes;
        global $soldes;

        $clients[] = $nouveauWallet['client'];
        $telephones[] = $nouveauWallet['telephone'];
        $codes[] = $nouveauWallet['code'];
        $soldes[] = $nouveauWallet['solde'];
    }
    
    function depot(int $somme, int $index, array &$soldes){
        $soldes[$index] += $somme;
    }

    function retrait(int $somme, int $index, array &$soldes){
        $soldes[$index] -= $somme;
    }

?>