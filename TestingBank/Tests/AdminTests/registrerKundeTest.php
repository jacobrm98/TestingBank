<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/adminDatabaseStub.php';
include_once '../../BLL/adminLogikk.php';

class registrerKundeTest extends PHPUnit\Framework\TestCase {

    public function testRiktigPersonNr()
    {
        //arrange
        $adminLogikk = new Admin(new AdminDBStub());
        $kunde = new kunde();
        $kunde->personnummer = "12345678901";

        //act
        $result = $adminLogikk->registrerKunde($kunde);

        //assert
        $this->assertEquals("OK", $result);

    }
    public function testFeilPersonNr()
    {
        //arrange
        $adminLogikk = new Admin(new AdminDBStub());
        $kunde = new kunde();
        $kunde->personnummer = "01987654321";

        //act
        $result = $adminLogikk->registrerKunde($kunde);

        //assert
        $this->assertEquals("Feil", $result);

    }
    public function testIngenPersonNr()
    {
        //arrange
        $adminLogikk = new Admin(new AdminDBStub());
        $kunde = new kunde();
        $kunde->personnummer = "";

        //act
        $result = $adminLogikk->registrerKunde($kunde);

        //assert
        $this->assertEquals("Feil", $result);



    }

}