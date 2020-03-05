<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/bankDatabaseStub.php';
include_once '../../BLL/bankLogikk.php';

class hentKundeInfoTest extends PHPUnit\Framework\TestCase
{
    public function test_HentKundeInfo()
    {
        // Arrange
        $personnummer = "12345678901";
        $bankLogikk = new Bank(new BankDBStub());

        // Act
        $kunde = $bankLogikk->hentKundeInfo($personnummer);

        // Assert
        $this->assertEquals("Ola", $kunde->fornavn);
        $this->assertEquals("Nordmann", $kunde->etternavn);
        $this->assertEquals("Heiaveien 5", $kunde->adresse);
        $this->assertEquals("0477", $kunde->postnr);
        $this->assertEquals("12345678", $kunde->telefonnr);
        $this->assertEquals("HeiHei", $kunde->passord);
        $this->assertEquals("12345678901", $kunde->personnummer);
    }
    public function test_HentKundeInfoFeil()
    {
        // Arrange
        $personnummer = "12345678901111"; // Feil personnummer
        $bankLogikk = new Bank(new BankDBStub());

        // Act
        $kunde = $bankLogikk->hentKundeInfo($personnummer);

        // Assert
        $this->assertEquals("Feil", $kunde);
    }
}
?>