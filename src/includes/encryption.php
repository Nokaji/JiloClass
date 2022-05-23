<?php

function dbase64($password){
    $encoded_password = base64_encode($password); 
    $encoded_password = base64_encode($encoded_password); 
    return $encoded_password
}

function enc($password){ // TODO: changer tous ça
    $password = dbase64($password)
    for($i = 0; $i < count($numbersArray); $i++) {
        if strtolower($password[$i]) == 'a'{
            $password = $password . "x013";}

        if strtolower($password[$i]) == 'b'{
            $password = $password . "x198";}

        if strtolower($password[$i]) == 'c'{
            $password = $password . "x368";}

        if strtolower($password[$i]) == 'd'{
            $password = $password . "y136";}

        if strtolower($password[$i]) == 'e'{
            $password = $password . "y367";}

        if strtolower($password[$i]) == 'f'{
            $password = $password . "y486";}

        if strtolower($password[$i]) == 'g'{
            $password = $password . "\e97";}

        if strtolower($password[$i]) == 'h'{
            $password = $password . "_H13";}

        if strtolower($password[$i]) == 'i'{
            $password = $password . "913d";}

        if strtolower($password[$i]) == 'j'{
            $password = $password . "13GD";}

        if strtolower($password[$i]) == 'k'{
            $password = $password . "1376";}

        if strtolower($password[$i]) == 'l'{
            $password = $password . "T163";}
            
        if strtolower($password[$i]) == 'm'{
            $password = $password . "Ø☻K1";}
        if strtolower($password[$i]) == 'n'{
            $password = $password . "◄8♥☺";}

        if strtolower($password[$i]) == 'o'{
            $password = $password. "N§\\";}

        if strtolower($password[$i]) == 'p'{
            $password = $password . "Ä♠_3";}

        if strtolower($password[$i]) == 'q'{
            $password = $password . "±&é^";}

        if strtolower($password[$i]) == 'r'{
            $password = $password . "è_'-";}

        if strtolower($password[$i]) == 's'{
            $password = $password . "=àç)";}

        if strtolower($password[$i]) == 't'{
            $password = $password . "-è'{";}

        if strtolower($password[$i]) == 'u'{
            $password = $password . "bW-_";}

        if strtolower($password[$i]) == 'v'{
            $password = $password . "r-&é";}

        if strtolower($password[$i]) == "w"{
            $password = $password . "`^@]";}

        if strtolower($password[$i]) == "x"{
            $password = $password . "`^@]";}

        if strtolower($password[$i]) == 'y'{
            $password = $password . "}¤€k";}

        if strtolower($password[$i]) == 'z'{
            $password = $password . "ù/☼å";}
            
        if strtolower($password[$i]) == ' '{
            $password = $password . "&çei";}
    }   
}
?>
<!--
letters = 'abcdefghijklmnopqrstuvwxyz'

def Z2H(text):
    SText = []
    for i in range(len(text)):
        SText.append(text[i])
    return SText
def H2Z(text):
    return ''.join(str(e) for e in text)

def encrypt(text,key,hash=False):
    texte = []
    text = Z2H(text)
    j = 1
    for i in range(len(text)):
        if hash:
            j = i
        else:
            j=1
    return H2Z(texte)
