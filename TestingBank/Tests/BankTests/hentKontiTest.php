<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/bankDatabaseStub.php';
include_once '../../BLL/bankLogikk.php';

class hentKontiTest extends PHPUnit\Framework\TestCase {
 public function test_hentKonti()
 {
     //arrange
     $personnummer = "01010122344"; // Korrekt personnummer
     $bankLogikk = new Bank(new BankDBStub());

     //act
     $allKonti = $bankLogikk->hentKonti($personnummer);

     //assert
     $this->assertEquals("98765432123", $allKonti[0]);
     $this->assertEquals("23456543456", $allKonti[1]);
     echo "Konti nr 1: ".$allKonti[0];
     echo "\n";
     echo "Konti nr 2: ".$allKonti[1];
 }
    public function test_hentKontiFeilPersonummer()
    {
        //arrange
        $personnummer = "01010122355"; // Feil personnummer
        $bankLogikk = new Bank(new BankDBStub());

        //act
        $allKonti = $bankLogikk->hentKonti($personnummer);

        //assert
        $this->assertEquals(0,count($allKonti));
        echo "Feil personnummer gir tomt array";

    }
}
?>
