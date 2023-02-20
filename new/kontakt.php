<?php
require_once 'kontaktController.php';

if (isset($_POST['submit-btn'])) {
    $kontakt = new Kontakti($_POST);
    $kontakt->insertData();
    return header("Location:../index.php");
}

class Kontakti
{
    private $emri="";
    private $mbiemri = "";
    private $mesazhi = "";

    public function __construct($formData)
    {
        $this->emri = $formData['emri'];
        $this->mbiemri = $formData['mbiemri'];
        $this->mesazhi = $formData['subject'];
    }

    
    public function getEmri()
    {
        return $this->emri;
    }
    public function getMbiemri()
    {
        return $this->mbiemri;
    }
    public function getMesazhi()
    {
        return $this->mesazhi;
    }
    
    public function insertData()
    {
        $kontakt = new Kontakti($this->emri, $this->mbiemri, $this->mesazhi);

        $controller = new kontaktController();
        $controller->insertUser($kontakt);
        header("Location:../index.php");
    }
}
    ?>