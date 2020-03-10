<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/adminDatabaseStub.php';
include_once '../../BLL/adminLogikk.php';

class registrerKontoTest extends PHPUnit_Framework_TestCase{

    public function registrerKontoTest(){

        //arrange
        $adminLogikk = new Admin(new AdminDBStub());
        $konto = new konto();
        $konto->personnummer = "01010122344";

        //act
        $OK = $adminLogikk->registrerKonto($konto);

        //assert
        $this->assertEquals("OK", $OK);

    }

    public function registrerKontoTest_FEIL(){

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