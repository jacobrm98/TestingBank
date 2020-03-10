<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/adminDatabaseStub.php';
include_once '../../BLL/adminLogikk.php';

class slettKontoTest extends PHPUnit\Framework\TestCase{

    public function test_slettKonto_RIKTIG(){

        //assert
        $adminLogikk = new Admin(new AdminDBStub());
        $konto = new konto();
        $konto->kontonummer = "0101010101";

        //act
        $OK = $adminLogikk->slettKonto($konto->kontonummer);

        //assert
        $this->assertEquals("OK", $OK);

    }

    public function test_slettKonto_FEIL(){

        //assert
        $adminLogikk = new Admin(new AdminDBStub());
        $konto = new konto();
        $konto->kontonummer = "0101010110";

        //act
        $FEIL = $adminLogikk->slettKonto($konto->kontonummer);

        //assert
        $this->assertEquals("Feil i kontonummer", $FEIL);

    }


}