<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/bankDatabaseStub.php';
include_once '../../BLL/bankLogikk.php';


class registrerBetalingTest extends PHPUnit\Framework\TestCase {
    public function test_registrerBetaling()
    {
        // arrange
        $bankLogikk = new Bank(new BankDBStub());
        $kontoNr = "12345678910";
        $transaksjon = 1;

        // act
        $OK = $bankLogikk->registrerBetaling($kontoNr, $transaksjon);

        // assert
        $this->assertEquals("OK", $OK);
    }
    public function test_registrerBetaling_FeilKontonummer()
    {
        // arrange
        $bankLogikk = new Bank(new BankDBStub());
        $kontoNr = "10987654321";
        $transaksjon = 1;

        // act
        $feil = $bankLogikk->registrerBetaling($kontoNr, $transaksjon);

        // assert
        $this->assertEquals("Feil", $feil);
    }
    public function test_registrerBetaling_FeilTransaksjon()
    {
        // arrange
        $bankLogikk = new Bank(new BankDBStub());
        $kontoNr = "12345678910";
        $transaksjon = -5;

        // act
        $feil = $bankLogikk->registrerBetaling($kontoNr, $transaksjon);

        // assert
        $this->assertEquals("Feil", $feil);
    }
    public function test_registrerBetaling_AltFeil()
    {
        // arrange
        $bankLogikk = new Bank(new BankDBStub());
        $kontoNr = 7492758219;
        $transaksjon = 69.420;
        // act
        $feil = $bankLogikk->registrerBetaling($kontoNr, $transaksjon);

        // assert
        $this->assertEquals("Feil", $feil);
    }
}
?>
