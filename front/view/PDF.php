<?php
require('./fpdf.php');
$db=new PDO('mysql:host=localhost;dbname=armac', 'root', '');
class myPDF extends FPDF{
    function header()
    {
        $this->SetFont('Arial','B',14);
        $this->SetDrawColor(0,80,180);
        $this->SetFillColor(230,230,0);
        $this->SetTextColor(220,50,50);
        $this->Cell(200,5,'Ticket',0,0,'C');
        $this->Ln(10);
    }
    function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/1',0,0,'C');
}
    function headerTable()
    {
        $this->SetFont('Times','B',12);
        $this->Cell(30,10,'Date',1,0,'C');
        $this->Cell(30,10,'Service',1,0,'C');
        $this->Cell(40,10,'Prix/dt',1,0,'C');

        $this->Ln();
    }
    function viewTable($db)
    {
        $this->SetFont('Times','',12);
        $stmt= $db->query('SELECT * FROM reservation,service WHERE reservation.id=service.id');
        while($data =$stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(30,15,$data->date,1,0,'C');
            $this->Cell(30,15,$data->nom,1,0,'C');
            $this->Cell(40,15,$data->prix,1,0,'C');
            $this->Ln();
        }
    }
}
$pdf=new myPDF();
$pdf->AddPage('P','Letter');
$pdf->SetFont('Arial','B',16);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
?>