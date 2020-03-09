<?php
include_once '../Model/domeneModell.php';

class AdminDBStub
{

    function hentAlleKunder()
    {
        $alleKunder = array();
        $kunde1 = new kunde();
        $kunde1->personnummer = "01010122344";
        $kunde1->navn = "Per Olsen";
        $kunde1->adresse = "Osloveien 82 0270 Oslo";
        $kunde1->telefonnr = "12345678";
        $alleKunder[] = $kunde1;

        $kunde2 = new kunde();
        $kunde2->personnummer = "01010122344";
        $kunde2->navn = "Line Jensen";
        $kunde2->adresse = "Askerveien 100, 1379 Asker";
        $kunde2->telefonnr = "92876789";
        $alleKunder[] = $kunde2;

        $kunde3 = new kunde();
        $kunde3->personnummer = "02020233455";
        $kunde3->navn = "Ole Olsen";
        $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
        $kunde3->telefonnr = "99889988";
        $alleKunder[] = $kunde3;
        return $alleKunder;
    }
    function endreKundeInfo($kunde)
    {
        $kunde1 = new kunde();
        $kunde1->fornavn = "Ola";
        $kunde1->etternavn = "Nordmann";
        $kunde1->adresse = "Heiaveien 5";
        $kunde1->postnr = "0477";
        $kunde1->telefonnr = "12345678";
        $kunde1->passord = "HeiHei";
        $kunde1->personnummer = "12345678901";
        if($kunde->fornavn == $kunde1->fornavn && $kunde->etternavn == $kunde1->etternavn)
        {
            return "OK";
        }
        else
        {
            return "Feil";
        }

    }
    function registrerKunde($kunde)
    {
        if($kunde->ID == 1)
        {
            return "OK";
        }
        else
        {
            return "Feil";
        }

    }
    function slettKunde($personnummer)
    {
        if($personnummer == 1)
        {
            return "OK";
        }
        else
        {
            return"Feil";
        }

    }
    function registrerKonto($kunde)
    {

    }
    function endreKonto($konto)
    {

    }

    function hentAlleKonti()
    {
        $allKonti = array();

        $konti1 = new konto();
        $konti1->personnummer = "01010122344";
        $konti1->kontonummer = "98765432123";
        $konti1->saldo = 2000;
        $konti1->type = "Brukskonto";
        $konti1->valuta = "NOK";

        $konti2 = new konto();
        $konti2->personnummer = "01010122344";
        $konti2->kontonummer = "23456543456";
        $konti2->saldo = 7000;
        $konti2->type = "Sparekonto";
        $konti2->valuta = "NOK";

        if($personnummer == $konti1->personnummer)
        {
            $allKonti[] = $konti1->kontonummer;
            $allKonti[] = $konti2->kontonummer;
        }
        return $allKonti;
    }
    function slettKonto($kontonummer)
    {

    }
}
