<?php
require_once '../include/koneksi.php';
require '../vendor/autoload.php';

class PDF extends FPDF {
    var $widths;

    function SetWidths($w) {
        $this->widths = $w;
    }

    function Row($data) {
        $nb = 0;
        for ($i=0; $i<count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 5 * $nb;
        $this->CheckPageBreak($h);
        for ($i=0; $i<count($data); $i++) {
            $w = $this->widths[$i];
            $a = 'L';
            $x = $this->GetX();
            $y = $this->GetY();
            $this->Rect($x, $y, $w, $h);
            $this->MultiCell($w, 5, $data[$i], 0, $a);
            $this->SetXY($x + $w, $y);
        }
        $this->Ln($h);
    }

    function CheckPageBreak($h) {
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt) {
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 && $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c] ?? 0;
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }
}

// Ambil parameter filter
$tanggal = $_GET['tanggal'] ?? '';
$bulan = $_GET['bulan'] ?? '';
$tahun = $_GET['tahun'] ?? '';

// Format keterangan laporan
$keterangan = "Laporan Booking ";
if (!empty($tanggal)) {
    $keterangan .= "Tanggal " . date('d F Y', strtotime($tanggal));
} elseif (!empty($bulan)) {
    $bulanNama = date('F', mktime(0, 0, 0, $bulan, 1));
    $keterangan .= "Bulan " . $bulanNama;
    if (!empty($tahun)) {
        $keterangan .= " " . $tahun;
    }
} elseif (!empty($tahun)) {
    $keterangan .= "Tahun " . $tahun;
} else {
    $keterangan .= "Semua Data";
}

// Query data
$sql = "SELECT * FROM book WHERE 1=1";
if (!empty($tanggal)) $sql .= " AND arrivals = '$tanggal'";
if (!empty($bulan)) $sql .= " AND MONTH(arrivals) = '$bulan'";
if (!empty($tahun)) $sql .= " AND YEAR(arrivals) = '$tahun'";

$result = mysqli_query($conn, $sql);

// Generate PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Booking List', 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, $keterangan, 0, 1, 'C');
$pdf->Ln(2);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetWidths(array(10, 30, 40, 25, 40, 15, 20, 20));
$pdf->Row(array('ID', 'Name', 'Email', 'Phone', 'Location', 'Guest', 'Arrivals', 'Leaving'));

$pdf->SetFont('Arial', '', 10);
while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Row(array(
        $row['id_book'],
        $row['name'],
        $row['email'],
        $row['phone'],
        $row['location'],
        $row['guest'],
        $row['arrivals'],
        $row['leaving']
    ));
}

$pdf->Output();
?>
