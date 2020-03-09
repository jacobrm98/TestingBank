<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/adminDatabaseStub.php';
include_once '../../BLL/adminLogikk.php';

class hentAlleKunderTest extends PHPUnit\Framework\TestCase {

    public function test_hentAlleKunder_Ok() {
        // Arrange
        $adminLogikk = new Admin(new AdminDBStub());

        // Act
        $alleKunder = $adminLogikk->hentAlleKunder();

        // Assert
        $this->assertEquals("01010122344", $alleKunder[0]->personnummer);
        $this->assertEquals("Per Olsen", $alleKunder[0]->navn);
        $this->assertEquals("Osloveien 82 0270 Oslo", $alleKunder[0]->adresse);
        $this->assertEquals("12345678", $alleKunder[0]->telefonnr);

        $this->assertEquals("01010122344", $alleKunder[1]->personnummer);
        $this->assertEquals("Line Jensen", $alleKunder[1]->navn);
        $this->assertEquals("Askerveien 100, 1379 Asker", $alleKunder[1]->adresse);
        $this->assertEquals("92876789", $alleKunder[1]->telefonnr);

        $this->assertEquals("02020233455", $alleKunder[2]->personnummer);
        $this->assertEquals("Ole Olsen", $alleKunder[2]->navn);
        $this->assertEquals("Bærumsveien 23, 1234 Bærum", $alleKunder[2]->adresse);
        $this->assertEquals("99889988", $alleKunder[2]->telefonnr);
    }
}
?>