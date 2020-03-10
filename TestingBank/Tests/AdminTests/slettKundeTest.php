<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/adminDatabaseStub.php';
include_once '../../BLL/adminLogikk.php';

class slettKundeTest extends PHPUnit\Framework\TestCase {
public function test_slettKunde_OK()
     {
   
        $kunde1 = new kunde();
        $kunde1->personnummer="12345678901";
        
        $adminLogikk= new Admin(new AdminDBStub());
        
        // Act 
        $OK=$adminLogikk->slettKunde($kunde1->personnummer);
        
        // Assert
        $this->assertEquals("OK",$OK );
     }
     public function test_slettKunde_FeilPersonnummer()
     {
        $kunde1 = new kunde();
        $kunde1->personnummer="12345678901";
        
        $adminLogikk= new Admin(new AdminDBStub());
        
        // Act 
        $feil=$adminLogikk->slettKunde($kunde1->personnummer);
        
        // Assert
        $this->assertEquals("Feil",$feil);
     }
     
}
?>