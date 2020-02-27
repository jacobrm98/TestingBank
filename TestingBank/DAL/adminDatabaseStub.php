<?php
include_once '../Model/domeneModell.php';
class adminDBStub
{
    function hentAlleKunder()
        {
           $alleKunder = array();
           $kunde1 = new kunde();
           $kunde1->personnummer ="01010122344";
           $kunde1->navn = "Per Olsen";
           $kunde1->adresse = "Osloveien 82 0270 Oslo";
           $kunde1->telefonnr="12345678";
           $alleKunder[]=$kunde1;
           
           $kunde2 = new kunde();
           $kunde2->personnummer ="01010122344";
           $kunde2->navn = "Line Jensen";
           $kunde2->adresse = "Askerveien 100, 1379 Asker";
           $kunde2->telefonnr="92876789";
           $alleKunder[]=$kunde2;
           
           $kunde3 = new kunde();
           $kunde3->personnummer ="02020233455";
           $kunde3->navn = "Ole Olsen";
           $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
           $kunde3->telefonnr="99889988";
           $alleKunder[]=$kunde3;
           return $alleKunder;
        }
     function endreKundeInfo($kunde)
    {
          $kunde1=new kunde();
          $kunde1->fornavn="Ola";
          $kunde1->personnummer="12345678901";
          if($kunde->fornavn==$kunde1->fornavn && $kunde->personnummer==$kunde1->personnummer)
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
          $kunde1=new kunde();
          $kunde1->personnummer="12345678999";
          $kunde1->fornavn="Ola";
          $kunde1->etternavn="Hansen";
          $kunde1->adresse="Heiaveien 5";
          $kunde1->postnr="0234";
          $kunde1->telefonnr="12345678";
          $kunde1->passord="HeiaHeia";
          if($kunde==!null)
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
          if($personnummer=1)
          {
              return "OK";
          }
          else
          {
              return"Feil";
          }
          
      }
    
    function registerKonto($konto)
    {
       $konto1=new konto();
       $Kontor=array();
       if($konto1=!null)
       {
           $konto1="123456789123456789";
           $Kontor[]=$konto1;
           return "OK";
       }
       else
       {
           return "Feil";
       }
    }
    
    function endreKonto($konto)
    {
        $konto1=new $konto;
        $konto1->kontonummer=12345678912345;
        $konto1->personnummer=123456781234567;
        if($konto1->kontonummer=$konto && $konto1->personnummer=!null)
        {
            return "OK";
        }
    }
    function hentAlleKonti()
    {
        $konti=array();
        
        $konto1=new konto();
        $konto1->kontonummer=12345672345;
        $konti[]=$konto1;
        
         $konto2=new konto();
        $konto2->kontonummer=98765437654;
        $konti[]=$konto2;
        
         $konto3=new konto();
        $konto3->kontonummer=45676543234;
        $konti[]=$konto3;
        
        return $konti;
        
    }
    function slettKonto($kontonummer)
    {
        $kontonummer1=new $kontonummer;
        $kontonummer1->kontonummer=12345643234565;
        if($kontonummer=$kontonummer1->kontonummer)
       {
            return "OK";
       }
       else
       {
           return "Feil";
       }
    }
}
?>
