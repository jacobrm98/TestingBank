<?php
    include_once '../Model/domeneModell.php';

    class BankDBStub
    {
        function hentEnKunde($personnummer)
        {
           $enKunde = new kunde();
           $enKunde->personnummer = $personnummer;
           $enKunde->fornavn = "Per";
           $enKunde->etternavn = "Olsen";
           $enKunde->adresse = "Osloveien 82, 0270 Oslo";
           $enKunde->telefonnr = "12345678";
           return $enKunde;
        }
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
        function hentTransaksjoner($kontoNr,$fraDato,$tilDato)
        {
            date_default_timezone_set("Europe/Oslo");
            $fraDato = strtotime($fraDato);
            $tilDato = strtotime($tilDato);
            if($fraDato>$tilDato)
            {
                return "Fra dato må være større enn tildato";
            }
            $konto = new konto();
            $konto->personnummer = "010101234567";
            $konto->kontonummer = $kontoNr;
            $konto->type = "Sparekonto";
            $konto->saldo = 2300.34;
            $konto->valuta = "NOK";
            if($tilDato < strtotime('2015-03-26'))
            {
                return $konto;
            }
            $dato = $fraDato;
            while ($dato <= $tilDato)
            {
                switch($dato)
                {
                    case strtotime('2015-03-26') :
                        $transaksjon1 = new transaksjon();
                        $transaksjon1->dato = '2015-03-26';
                        $transaksjon1->transaksjonBelop = 134.4;
                        $transaksjon1->fraTilKontonummer = "22342344556";
                        $transaksjon1->melding = "Meny Holtet";
                        $konto->transaksjoner[] = $transaksjon1;
                        break;
                    case strtotime('2015-03-27') :
                        $transaksjon2 = new transaksjon();
                        $transaksjon2->dato = '2015-03-27';
                        $transaksjon2->transaksjonBelop = -2056.45;
                        $transaksjon2->fraTilKontonummer = "114342344556";
                        $transaksjon2->melding = "Husleie";
                        $konto->transaksjoner[] = $transaksjon2; 
                        break;
                    case strtotime('2015-03-29') :
                        $transaksjon3 = new transaksjon();
                        $transaksjon3->dato = '2015-03-29';
                        $transaksjon3->transaksjonBelop = 1454.45;
                        $transaksjon3->fraTilKontonummer = "114342344511";
                        $transaksjon3->melding = "Lekeland";
                        $konto->transaksjoner[] = $transaksjon3;
                        break;
                }
                $dato += (60*60*24); // en dag i tillegg i sekunder
            }
            return $konto;
        }
      function sjekkLoggInn($personnnummer,$passord)
      {
          $kunde = new kunde();
          $kunde->personnummer = "12121212121";
          $kunde->passord = "HeiHei";
          if($kunde->personnummer == $personnnummer && $kunde->passord == $passord)
          {
              return "OK";
          }
          else
          {
              return "Feil";
          }
      }
      function hentKonti($personnummer)
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
      function hentSaldi($personnummer)
      {
          $allSaldi = array();

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
          
          if($konti1->personnummer == $personnummer)
          {
               $allSaldi[] = $konti1;
               $allSaldi[] = $konti2;
               
          }
          return $allSaldi;
      }
      
      function registrerBetaling($kontoNr, $transaksjon)
    {
          if($kontoNr == 1 && $transaksjon == 1)
          {
              return "OK";
          }
          else
          {
              return "Feil";
          }
          
      }
      function hentBetalinger($personnummer)
    {
          $konto = new konto();
          $konto->personnummer = "1234567654321";
          if($personnummer == $konto->personnummer)
          {
              $konto->transaksjoner = array();
              
              $transaksjon1 = new transaksjon();
              $transaksjon1->dato = '2015-03-26';
              $transaksjon1->transaksjonBelop = 134.4;
              $transaksjon1->fraTilKontonummer = "22342344556";
              $transaksjon1->melding = "Meny Holtet";
              $konto->transaksjoner[] = $transaksjon1;

              $transaksjon2 = new transaksjon();
              $transaksjon2->dato = '2015-03-27';
              $transaksjon2->transaksjonBelop = -2056.45;
              $transaksjon2->fraTilKontonummer = "114342344556";
              $transaksjon2->melding = "Husleie";
              $konto->transaksjoner[] = $transaksjon2;

              $transaksjon3 = new transaksjon();
              $transaksjon3->dato = '2015-03-29';
              $transaksjon3->transaksjonBelop = 1454.45;
              $transaksjon3->fraTilKontonummer = "114342344511";
              $transaksjon3->melding = "Lekeland";
              $konto->transaksjoner[] = $transaksjon3;
          }
          return $konto->transaksjoner;
      }
      function utforBetaling($TxID)
    {
          $feil = false;
          if($TxID == 1)
          {
              return "OK";
          }
          else
          {
              $feil = true; 
              return "Feil";
          }
          
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
      function hentKundeinfo($personnummer) {
            $kunde1 = new kunde();
            $kunde1->personnummer = "12345678901";

            if($personnummer == $kunde1->personnummer) {
                $kunde1->fornavn = "Ola";
                $kunde1->etternavn = "Nordmann";
                $kunde1->adresse = "Heiaveien 5";
                $kunde1->postnr = "0477";
                $kunde1->telefonnr = "12345678";
                $kunde1->passord = "HeiHei";
                return $kunde1;
            } else {
                return "Feil";
            }
        }
}
    