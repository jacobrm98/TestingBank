<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';
class endreKundeinfoTest extends PHPUnit\Framework\TestCase {
    public function test_endreKundeinfo()
    {
        //arrange
        $bankLogikk=new Bank(new BankDBStub());
        $kunde=new kunde();
        $kunde->fornavn="Ola";
        $kunde->etternavn="Nordmann";
        //act
        $OK=$bankLogikk->endreKundeInfo($kunde);
        //assert
        $this->assertEquals($OK,"OK");    
    }
    public function test_endreKundeInfoFEIL()
    {
        //arrange
        $bankLogikk=new Bank(new BankDBStub());
        $kunde=new kunde();
        $kunde->passord="NeiFeil";
        $kunde->adresse="Heiaveien 5";
        //act
        $feil=$bankLogikk->endreKundeInfo($kunde);
        //assert
        $this->assertEquals($feil,"Feil");
    }
}
?>

