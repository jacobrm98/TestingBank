<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/adminDatabaseStub.php';
include_once '../../BLL/adminLogikk.php';

//Fungerer kun hvis registerKonto er endret til registrerKonto i adminlogikk.

class registrerKontoTest extends PHPUnit\Framework\TestCase{

    public function test_registrerKonto_RIKTIG(){

        //arrange
        $adminLogikk = new Admin(new AdminDBStub());
        $konto = new konto();
        $konto->personnummer = "01010122344";

        //act
        $OK = $adminLogikk->registrerKonto($konto);

        //assert
        $this->assertEquals("OK", $OK);

    }

    public function test_registrerKonto_FEIL(){

        //arrange
        $adminLogikk = new Admin(new AdminDBStub());
        $konto = new konto();
        $konto->personnummer = "01010122355";

        //act
        $Feil = $adminLogikk->registrerKonto($konto);

        //assert
        $this->assertEquals("Feil", $Feil);
    }
}