<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/bankDatabaseStub.php';
include_once '../../BLL/bankLogikk.php';


class hentSalditest extends PHPUnit\Framework\TestCase {
    public function test_hentSaldi_OK()
    {
        // arrange
        $personnummer = "01010122344";
        $bankLogikk = new Bank(new BankDBStub());

        // act
        $allSaldi = $bankLogikk->hentSaldi($personnummer);

        // assert
        $this->assertEquals(2000, $allSaldi[0]->saldo);
        $this->assertEquals("98765432123", $allSaldi[0]->kontonummer);
        $this->assertEquals("Brukskonto", $allSaldi[0]->type);
        $this->assertEquals("NOK", $allSaldi[0]->valuta);

        $this->assertEquals(7000, $allSaldi[1]->saldo);
        $this->assertEquals("23456543456", $allSaldi[1]->kontonummer);
        $this->assertEquals("Sparekonto", $allSaldi[1]->type);
        $this->assertEquals("NOK", $allSaldi[1]->valuta);
    }

    public function test_hentSaldi_FeilPersonnummer()
    {
        // arrange
        $personnummer = "12345678901";  // Feil personnummer
        $bankLogikk = new Bank(new BankDBStub());

        // act
        $allSaldi = $bankLogikk->hentSaldi($personnummer);

        // assert
        $this->assertEquals(0, sizeof($allSaldi));
    }
}
