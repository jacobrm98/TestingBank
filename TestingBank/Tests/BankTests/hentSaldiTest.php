<?php

include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentSalditest extends PHPUnit\Framework\TestCase {
    /*public function test_hentSaldi()
    {
        //arrange
       $personnummer=12345432345;
        $bankLogikk=new Bank(new BankDBStub());
        //act
        $saldi=$bankLogikk->hentSaldi($personnummer);
        //assert
        $this->assertEquals(1,$saldi);
    }*/
    public function testWithCorrectPersonnr(){
        $personnr = 01010122344;
        $bank=new Bank(new BankDBStub());
        $saldo = sizeof($bank->hentSaldi($personnr));
        $this->assertEquals(1,$saldo); 
    }
 
}
