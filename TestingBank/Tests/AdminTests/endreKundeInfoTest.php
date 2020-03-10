<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/adminDatabaseStub.php';
include_once '../../BLL/adminLogikk.php';

class endreKundeInfoTest extends PHPUnit\Framework\TestCase {

    public function endreKundeInfo_Ok()
    {
        // Arrange
        $adminLogikk = new Admin(new AdminDBStub());
        $kunde = new kunde();
        $kunde->fornavn = "Ola";
        $kunde->etternavn = "Nordmann";

        // Act
        $OK = $adminLogikk->endreKundeInfo($kunde);

        // Assert
        $this->assertEquals("OK", $OK);
    }

    public function test_endreKundeInfo_FeilEtternavn()
    {
        // Arrange
        $adminLogikk = new Admin(new AdminDBStub());
        $kunde = new kunde();
        $kunde->fornavn = "Ola";
        $kunde->etternavn = "Vestmann";  // Feil etternavn

        // Act
        $feil = $adminLogikk->endreKundeInfo($kunde);

        // Assert
        $this->assertEquals("Feil", $feil);
    }
}