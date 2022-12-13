<?php

require_once(dirname(__DIR__).'/assets/img/fpdf185/fpdf.php');
include_once(dirname(__DIR__).'/model/reservation.php');// Path to the model
// include_once(dirname(__DIR__).'/pages/matches.php');


class reserveController extends reserve
{
    // id-m-teamone id-m-teamtwo id-m-stade
  function getformationMatchcontrol($id_m_stade,$id_m_teamone,$id_m_teamtwo,$id_m_match){
    $data = $this->getinformationMatch($id_m_stade ,$id_m_teamone,$id_m_teamtwo,$id_m_match);
        // print_r($data);  
        return $data;
  }

  public function addtickets($id_match, $id_user, $price){
   
        $this->addreservationDB($id_match, $id_user, $price);

        }
    
}

class Pdf extends FPDF {
    public $date;
    public $idMatch;
    public $TeamONE;
    public $TeamTwo;
    public $TimeofMatch;
    public $nameofStade;
    public $idStade;
    public $CapacityofStade;
    public $CapacityofMatch;
    public $PriceofMatch;
    public $nameUser;

    public function __construct($date,$idMatch,$TeamONE,$TeamTwo,$TimeofMatch,$nameofStade,$idStade,$CapacityofStade,$CapacityofMatch,$PriceofMatch,$nameUser) {
        // parent::__construct();
        $this->date = $date;//
        $this->idMatch = $idMatch;//
        $this->TeamONE = $TeamONE;//
        $this->TeamTwo = $TeamTwo;//
        $this->TimeofMatch = $TimeofMatch;//
        $this->nameofStade = $nameofStade;//
        $this->idStade = $idStade;
        $this->CapacityofStade = $CapacityofStade;
        $this->CapacityofMatch = $CapacityofMatch;
        $this->PriceofMatch = $PriceofMatch;//
        $this->nameUser = $nameUser;
    }

    function pdf(){
        $pdf = new FPDF();
        ob_clean();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        $pdf->Image('../assets/img/fpdf185/img/image.jpg', 10, 60, 190,60);
        $pdf->Image('../assets/img/fpdf185/img/image2.png', 90,5, 20,30);
    
        $pdf ->SetTextColor(255,255,255);
        $pdf->Cell(60,55,'',60,1,'c');
        // $pdf->SetTextColor(1,1,1);
        $pdf ->SetTextColor(255,255,255);
        $pdf->Cell(0,10,'ID-Tecket : '.$this->idMatch,80,1);
        $pdf->Cell(75,10,'Equipe : '.$this->TeamONE.' VS Equipe : '.$this->TeamTwo);
        $pdf->ln();
        $pdf->Cell(40,10,'ID-Match : '.$this->idMatch,1,0);
        $pdf->Cell(75,10,'Stade : '.$this->nameofStade,1,0);
        $pdf->Cell(75,10,'Price : '.$this->PriceofMatch,1,0);
        $pdf->ln();
        $pdf->Cell(95,10,'Match Time : '.$this->TimeofMatch,1,0);
       
        $pdf->Cell(0,10,'Name : '.$this->nameUser,1,1,'c');
        $pdf->Cell(40,10,$this->date,1,0);
    
        $pdf->Output();
        ob_end_flush(); 
        ini_set("session.auto_start", 0);

    
    
    }

}


$reseveController = new reserveController();

// Read methods  $id_m_stade,$id_m_teamone,$id_m_teamtwo ,$id_m_match

$Alldata = $reseveController ->getformationMatchcontrol(5,1,2,4);
$count =0;

$idUser = 1;
$nameUser = 'Youssef'; /// we should to change that is just for testing  
  // instanciate the class
if (isset($_POST['reserve'])){
    $date = date('Y/m/d');
     $idMatch = $Alldata['idMatch'] ; 
     $TeamONE = $Alldata['TeamONE'] ;
     $TeamTwo = $Alldata['TeamTwo'] ;
     $TimeofMatch = $Alldata['TimeofMatch'] ;
     $nameofStade = $Alldata['nameofStade'] ;
     $idStade = $Alldata['idStade'] ;
     $CapacityofStade = $Alldata['CapacityofStade'] ;
     $CapacityofMatch = $Alldata['CapacityofMatch'] ; 
     $PriceofMatch = $Alldata['PriceofMatch'] ;
    //  $nameUser = $Alldata['idMatch'] ;
    $reseveController->addtickets($idMatch, $idUser, $PriceofMatch);
     $fpdf = new Pdf($date, $idMatch, $TeamONE, $TeamTwo, $TimeofMatch, $nameofStade, $idStade, $CapacityofStade, $CapacityofMatch, $PriceofMatch, $nameUser);
    // print_r($Alldata);
    // print_r($date); 
    $fpdf->pdf();
}

    