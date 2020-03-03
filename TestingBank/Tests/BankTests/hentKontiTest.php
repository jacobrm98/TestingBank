<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/bankDatabaseStub.php';
include_once '../../BLL/bankLogikk.php';

class hentKontiTest extends PHPUnit\Framework\TestCase {
    
 public function test_hentiKont()
 {
     //arrange
     $personnummer="12345654323";
     $bankLogikk=new Bank(new BankDBStub());
     //act
     $OK=$bankLogikk->hentKonti($personnummer);
     //assert
     $this->assertEquals(1,count($OK));
    }
 
    /*public function testhentKontiPersonnrFeil(){
        //arrange
        $personnummer = 0000000000; 
        $bank=new Bank(new BankDBStub());
        //act
        $konto = $bank->hentKonti($personnummer);
        //assert
        $this->assertEquals(" ",$konto[0]);
    }*/
    
}
?>
