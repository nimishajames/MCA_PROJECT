<?Php
include('connection.php');
require('../fpdf184/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);



class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo

    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Payment Bill',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    $this->Rect(6, 6, 200, 287, 'D');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$hid=$_GET['hid'];
$outpass = mysqli_query($con, "select * from tbl_booked b ,tbl_hosteller h where h.host_id=$hid and b.host_id=$hid" );

$r=mysqli_fetch_assoc($outpass);

    $pdf->Cell(0,10,'Name :  '.  $r['host_name'],0,1);
    $pdf->Cell(0,10,'Address :  '.$r['host_address'],0,1);
    $pdf->Cell(0,10,'Phone :  '. $r['host_phone'],0,1);
    $pdf->Cell(0,10,'Date :  '. $r['book_date'],0,1);
    $pdf->Cell(0,10,'Hostel Amount :  '. $r['book_amount'],0,1);
$pdf->Output('my_file.pdf','I');
?>

