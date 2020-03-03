<?php

include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class sjekkLogginnTest extends PHPUnit\Framework\TestCase {
    
    public function test_sjekkLoggInn()
    {
    //arrange
    $bankLogikk=new Bank(new BankDBStub());
    $personnummer="12121212123";
    $passord="HeiHei";
    //act
    $OK=$bankLogikk->sjekkLoggInn($personnummer,$passord);
    //assert
    $this->assertEquals($OK,"OK");
    }
    public function test_sjekkLogginnFeilPersonnummer()
    {
        //arrange
        $bankLogikk=new Bank(new BankDBStub());
        $personnummer=1234567;
        $passord="HeiHei";
        //act
        $OK=$bankLogikk->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals($OK,"Feil i personnummer");
    }
    public function test_sjekkLogginnFeilPassord()
    {
         //arrange
        $bankLogikk=new Bank (new BankDBStub());
        $personnummer=12345678909;
        $passord="Pass";
        //act
        $feil=$bankLogikk->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals($feil,"Feil i passord");
    }
}
?>