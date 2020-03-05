<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/bankDatabaseStub.php';
include_once '../../BLL/bankLogikk.php';

class hentBetalingerTest extends PHPUnit\Framework\TestCase {
    public function test_hentEnBetaling()
    {
        // arrange
        $personnummer="1234567654321";
        $bankLogikk=new Bank(new BankDBStub());
        // act
        $konto = $bankLogikk->hentBetalinger($personnummer);
        // assert
        $this->assertEquals("2015-03-26", $konto[0]->dato);
        $this->assertEquals(134.4, $konto[0]->transaksjonBelop);
        $this->assertEquals("22342344556", $konto[0]->fraTilKontonummer);
        $this->assertEquals("Meny Holtet", $konto[0]->melding);
       
    }
    public function test_toBetalinger() 
    {
        // arrange
       $personnummer = "1234567654321";
        $bankLogikk = new Bank(new BankDBStub());
        // act
        $konto = $bankLogikk->hentBetalinger($personnummer);
        // assert
        $this->assertEquals("2015-03-27", $konto[1]->dato);
        $this->assertEquals(-2056.45, $konto[1]->transaksjonBelop);
        $this->assertEquals("114342344556", $konto[1]->fraTilKontonummer);
        $this->assertEquals("Husleie", $konto[1]->melding);

        $this->assertEquals("2015-03-29", $konto[2]->dato);
        $this->assertEquals(1454.45, $konto[2]->transaksjonBelop);
        $this->assertEquals("114342344511", $konto[2]->fraTilKontonummer);
        $this->assertEquals("Lekeland", $konto[2]->melding);
      
    }
    public function testAlleBetalinger() 
    {
        // arrange
        $personnummer = "1234567654321";
        $bankLogikk = new Bank(new BankDBStub());
        // act
        $konto = $bankLogikk->hentBetalinger($personnummer);
        // assert
        $this->assertEquals("2015-03-26", $konto[0]->dato);
        $this->assertEquals(134.4, $konto[0]->transaksjonBelop);
        $this->assertEquals("22342344556", $konto[0]->fraTilKontonummer);
        $this->assertEquals("Meny Holtet", $konto[0]->melding);

        $this->assertEquals("2015-03-27", $konto[1]->dato);
        $this->assertEquals(-2056.45, $konto[1]->transaksjonBelop);
        $this->assertEquals("114342344556", $konto[1]->fraTilKontonummer);
        $this->assertEquals("Husleie", $konto[1]->melding);

        $this->assertEquals("2015-03-29", $konto[2]->dato);
        $this->assertEquals(1454.45, $konto[2]->transaksjonBelop);
        $this->assertEquals("114342344511", $konto[2]->fraTilKontonummer);
        $this->assertEquals("Lekeland", $konto[2]->melding);
    }
}
?>