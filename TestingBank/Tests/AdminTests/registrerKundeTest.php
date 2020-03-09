<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/adminDatabaseStub.php';
include_once '../../BLL/adminLogikk.php';

class registrerKundeTest extends PHPUnit\Framework\TestCase {
//Usikker på om jeg må opprette hele kunden? Men det står "Select * from $kunde i adminDatabase"
    public function testRiktigPostNr()
    {
        //arrange
        $adminLogikk = new Admin(new AdminDBStub());
        $kunde = new kunde();
       /* $kunde->personnummer = "03048537488";
        $kunde->fornavn = "Ola";
        $kunde->etternavn = "Grønndal";
        $kunde->adresse = "Rappergata 42";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "38959299";
        $kunde->passord = "123456"; */
        $kunde->postnr = "0481";


        //act
        $result = $adminLogikk->registrerKunde($kunde);

        //assert
        $this->assertEquals("OK", $result);

    }
    public function testFeilPostNr()
    {
        //arrange
        $adminLogikk = new Admin(new AdminDBStub());
        $kunde = new kunde();
       /* $kunde->personnummer = "03048537488";
        $kunde->fornavn = "Ola";
        $kunde->etternavn = "Grønndal";
        $kunde->adresse = "Rappergata 42";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "38959299";
        $kunde->passord = "123456";*/
        $kunde->postnr = "8104";

        //act
        $result = $adminLogikk->registrerKunde($kunde);

        //assert
        $this->assertEquals("Feil", $result);

    }
    public function testIngenPostNr()
    {
        //arrange
        $adminLogikk = new Admin(new AdminDBStub());
        $kunde = new kunde();
       /* $kunde->personnummer = "03048537488";
        $kunde->fornavn = "Ola";
        $kunde->etternavn = "Grønndal";
        $kunde->adresse = "Rappergata 42";
        $kunde->postnr = "";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "38959299";
        $kunde->passord = "123456";*/
        $kunde->postnr = "";

        //act
        $result = $adminLogikk->registrerKunde($kunde);

        //assert
        $this->assertEquals("Feil", $result);



    }

}