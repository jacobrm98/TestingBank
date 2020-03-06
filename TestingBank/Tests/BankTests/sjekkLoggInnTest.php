<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/bankDatabaseStub.php';
include_once '../../BLL/bankLogikk.php';


class sjekkLogginnTest extends PHPUnit\Framework\TestCase {

    public function test_sjekkLoggInnOK()
    {
        // arrange
        $kunde = new kunde();
        $kunde->personnummer = "12121212121";
        $kunde->passord = "HeiHei";
        $bankLogikk = new Bank(new BankDBStub());

        // act
        $OK = $bankLogikk->sjekkLoggInn($kunde->personnummer, $kunde->passord);

        // assert
        $this->assertEquals("OK", $OK);
    }

    public function test_sjekkLoggInnFeilPassord()
    {
        // arrange
        $kunde = new kunde();
        $kunde->personnummer = "12121212121";
        $kunde->passord = "Heihei";  // Feil passord
        $bankLogikk = new Bank(new BankDBStub());

        // act
        $Feil = $bankLogikk->sjekkLoggInn($kunde->personnummer, $kunde->passord);

        // assert
        $this->assertEquals("Feil", $Feil);
    }

    public function test_sjekkLoggInnFeilPersonnummer()
    {
        // arrange
        $kunde = new kunde();
        $kunde->personnummer = "99999999999";  // Feil personnummer
        $kunde->passord = "HeiHei";
        $bankLogikk = new Bank(new BankDBStub());

        // act
        $Feil = $bankLogikk->sjekkLoggInn($kunde->personnummer, $kunde->passord);

        // assert
        $this->assertEquals("Feil", $Feil);
    }

    public function test_sjekkLoggInn_RegExFeilPersonnummer()
    {
        // arrange
        $kunde = new kunde();
        $kunde->personnummer = "99999999AAA";  // RegEx feil personnummer
        $kunde->passord = "HeiHei";
        $bankLogikk = new Bank(new BankDBStub());

        // act
        $Feil = $bankLogikk->sjekkLoggInn($kunde->personnummer, $kunde->passord);

        // assert
        $this->assertEquals("Feil i personnummer", $Feil);
    }

    public function test_sjekkLoggInn_ForKortPassord()
    {
        // arrange
        $kunde = new kunde();
        $kunde->personnummer = "12121212121";
        $kunde->passord = "Hei";  // RegEx feil passord
        $bankLogikk = new Bank(new BankDBStub());

        // act
        $Feil = $bankLogikk->sjekkLoggInn($kunde->personnummer, $kunde->passord);

        // assert
        $this->assertEquals("Feil i passord", $Feil);
    }

    public function test_sjekkLoggInn_ForLangtPassord() // Funnet feil i BankLogikk, mulig å ha for lang passord
    {
        // arrange
        $kunde = new kunde();
        $kunde->personnummer = "12121212121";
        $kunde->passord = "HeiHeiHeiHeiHeiHeiHeiHeiHeiHeiHeiHei";  // RegEx feil passord
        $bankLogikk = new Bank(new BankDBStub());

        // act
        $Feil = $bankLogikk->sjekkLoggInn($kunde->personnummer, $kunde->passord);

        // assert
        $this->assertEquals("Feil i passord", $Feil);
    }
}
?>