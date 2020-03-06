<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/bankDatabaseStub.php';
include_once '../../BLL/bankLogikk.php';


class registrerBetalingTest extends PHPUnit\Framework\TestCase {
    public function test_registrerBetaling()
    {
        // arrange
        $bankLogikk = new Bank(new BankDBStub());
        $kontoNr = 1;
        $transaksjon = 1;

        // act
        $OK = $bankLogikk->registrerBetaling($kontoNr, $transaksjon);

        // assert
        $this->assertEquals("OK",$OK);
    }
    public function test_registrerBetalingFEIL()
    {
        // arrange
        $bankLogikk = new Bank(new BankDBStub());
        $kontoNr = -1;
        $transaksjon = -1;

        // act
        $feil = $bankLogikk->registrerBetaling($kontoNr, $transaksjon);

        // assert
        $this->assertEquals($feil,"Feil");
    }
}
?>
