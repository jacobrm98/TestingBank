<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/adminDatabaseStub.php';
include_once '../../BLL/adminLogikk.php';

class hentAlleKontiTest extends PHPUnit\Framework\TestCase{

    public function test_hentAlleKonto_RIKTIG(){

        //arrange
        $adminLogikk = new Admin(new AdminDBStub());

        //act
        $OK = $adminLogikk->hentAlleKonti();

        //assert
        $this->assertEquals(2,count($OK));
    }

    public function test_hentAlleKontoRIKTIG()
    {

        //arrange
        $adminLogikk = new Admin(new AdminDBStub());

        //act
        $OK = $adminLogikk->hentAlleKonti();

        //assert
        $this->assertEquals("01010122344", $OK[0]->personnummer);
        $this->assertEquals("98765432123", $OK[0]->kontonummer);
        $this->assertEquals(2000, $OK[0]->saldo);
        $this->assertEquals("Brukskonto", $OK[0]->type);
        $this->assertEquals("NOK", $OK[0]->valuta);

        $this->assertEquals("01010122355", $OK[1]->personnummer);
        $this->assertEquals("23456543456", $OK[1]->kontonummer);
        $this->assertEquals(7000, $OK[1]->saldo);
        $this->assertEquals("Sparekonto", $OK[1]->type);
        $this->assertEquals("NOK", $OK[1]->valuta);
    }
}