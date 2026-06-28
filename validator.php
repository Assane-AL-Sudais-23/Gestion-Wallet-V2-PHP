<?php

function validerTelCode(string $tel, string $code): int{
        $lenTel = strlen($tel);
        $lenCode = strlen($code);
        if($lenTel !== 9 || $lenCode !== 4){
            return 4;
        }

        return 7;
    }

    function validerOperateur(string $tel): int{
        $operateur = ['0', '1', '5', '6', '7', '8'];
        for($i = 0; $i < count($operateur); $i++){
            if($tel[0] === '7' && $tel[1] === $operateur[$i]){
                return 7;
            }
        }
        return 4;
    }

    function verifierWallet(string $tel, array $telephones): int{
        for($i = 0; $i < count($telephones); $i++){
            if($tel === $telephones[$i]){
                return 7;
            }
        }
        return 4;
    }

    function verifierMontant(int $somme,int $max): int{
        if($somme < $max){
            return 4;
        }

        return 7;
    }

    function retournerIndex(string $tel, array $telephones): int{
        for($i = 0; $i < count($telephones); $i++){
            if($tel === $telephones[$i]){
                return $i;
            }
        }

        return -1;
    }

    function verifierName(string $name): int{
        $lenName = strlen($name);
        if($lenName < 3){
            return 4;
        }

        return 7;
    }

?>