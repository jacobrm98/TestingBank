<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/bankDatabaseStub.php';
include_once '../../BLL/bankLogikk.php';


class hentBetalingerTest extends PHPUnit\Framework\TestCase {
    public function test_hentEnBetaling()
    {
        // arrange
       $personnummer="12345678909";
        $bankLogikk=new Bank(new BankDBStub());
        // act
        $konto= $bankLogikk->hentBetalinger($personnummer);
        // assert
       
    }
    public function test_toBetalinger() 
    {
        // arrange
       $personnummer="12345678909";
        $bankLogikk=new Bank(new BankDBStub());
        // act
        $konto= $bankLogikk->hentBetalinger($personnummer);
        // assert
      
    }
    public function testAlleBetalinger() 
    {
        // arrange
        $personnummer="12345678909";
        $bankLogikk=new Bank(new BankDBStub());
        // act
        $konto= $bankLogikk->hentBetalinger($personnummer);
        // assert
        
    }
    }


   
?>