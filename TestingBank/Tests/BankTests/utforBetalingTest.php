<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/bankDatabaseStub.php';
include_once '../../BLL/bankLogikk.php';


class utforBetalingTest extends PHPUnit\Framework\TestCase {
    public function test_utforBetaling_Ok()
    {
        // arrange
        $bankLogikk = new Bank(new BankDBStub());
        $TxID = 1;

        // act
        $OK = $bankLogikk->utforBetaling($TxID);

        // assert
        $this->assertEquals("OK",$OK);
    }
    public function test_utforBetaling_Feil()
    {
        // arrange
        $bankLogikk = new Bank(new BankDBStub());
        $TxID = 2;

        // act
        $feil = $bankLogikk->utforBetaling($TxID);

        // assert
        $this->assertEquals("Feil", $feil);
    }
    
}
?>