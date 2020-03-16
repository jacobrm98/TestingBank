<?php
include_once '../../Model/domeneModell.php';
include_once '../../DAL/adminDatabaseStub.php';
include_once '../../BLL/adminLogikk.php';

use PHPUnit\Framework\TestCase;

class endreKontoTestPHPtest extends TestCase
{

    public function test_endreKonto_RIKTIG(){

        //arrangee
        $adminLogikk = new Admin(new AdminDBStub());

        $konti1 = new konto();
        $konti1->personnummer = "01010122344";
        $konti1->kontonummer = "98765432123";
        $konti1->saldo = 2000;
        $konti1->type = "Brukskonto";
        $konti1->valuta = "NOK";

        //act
        $OK = $adminLogikk->endreKonto($konti1);

        //assert
        $this->assertEquals($OK,'OK');
    }

    public function test_endreKonto_FEIL(){

        //arrange
        $adminLogikk = new Admin(new AdminDBStub());

        $konti1 = new konto();
        $konti1->personnummer = "01010122355";
        $konti1->kontonummer = "987654321233";
        $konti1->saldo = 2001;
        $konti1->type = "Brukskonto";
        $konti1->valuta = "NOK";

        //act
        $Feil = $adminLogikk->endreKonto($konti1);

        //assert
        $this->assertEquals($Feil,'Feil i personnummer eller kontonummer');
    }
}