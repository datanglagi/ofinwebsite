<!-- create pdf -->

<?php

use setasign\Fpdi\Fpdi;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

function convert($data) {
    $data = explode(" ", $data);
    $data = explode(".", $data[1]);
    $data = join("", $data);
    $data = floatval($data);
    return $data;
    }

// if (isset($_POST["name"]) && $_POST["email"] && $_POST["telepon"] && $_POST["kota"] && $_POST["gaji"] && $_POST["bonus"] && $_POST["bisnis"] && $_POST["pajak"] && $_POST["donasi"] && $_POST["tabungan"] && $_POST["premi"] && $_POST["pinjaman"] && $_POST["kpr"] && $_POST["belanja"] && $_POST["gaya"] && $_POST["rumah"] && $_POST["kendaraan"] && $_POST["asetlain"] && $_POST["deposito"] && $_POST["logam"] && $_POST["saham"] && $_POST["investasi"] && $_POST["kprkpa"] && $_POST["kreditmotor"] && $_POST["kewajibanlain"]) {

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["telepon"]);
    $city = test_input($_POST["kota"]);

    $pendapatan_gaji = convert(test_input($_POST["gaji"]));
    $pendapatan_insentif = convert(test_input($_POST["bonus"]));  
    $pendapatan_aktif = convert(test_input($_POST["bisnis"]));
    $pendapatan_pasif = convert(test_input($_POST["pasif"]));

    $pengeluaran_pajak = convert(test_input($_POST["pajak"]));
    $pengeluaran_donasi = convert(test_input($_POST["donasi"]));
    $pengeluaran_tabungan = convert(test_input($_POST["tabungan"]));
    $pengeluaran_premi = convert(test_input($_POST["premi"]));
    $pengeluaran_pinjaman = convert(test_input($_POST["pinjaman"]));
    $pengeluaran_kredit = convert(test_input($_POST["kpr"]));
    $pengeluaran_rumahtangga = convert(test_input($_POST["belanja"]));
    $pengeluaran_gayahidup = convert(test_input($_POST["gaya"]));

    $aset_rumah = convert(test_input($_POST["rumah"]));
    $aset_kendaraan = convert(test_input($_POST["kendaraan"]));
    $aset_lain = convert(test_input($_POST["asetlain"]));

    $aset_deposito = convert(test_input($_POST["deposito"])); 
    $aset_logam = convert(test_input($_POST["logam"]));
    $aset_saham = convert(test_input($_POST["saham"]));
    $aset_investasi = convert(test_input($_POST["investasi"]));

    $aset_kewajiban_kpr = convert(test_input($_POST["kprkpa"]));
    $aset_kewajiban_kredit_motor = convert(test_input($_POST["kreditmotor"]));
    $aset_kewajiban_lain = convert(test_input($_POST["kewajibanlain"]));

    ob_start();
    require('fpdf182/fpdf.php');
    // require('mc_table.php');    


    class PDF extends FPDF {
    function table2col($index, $data){
        $this->SetFillColor(229,229,247);
        $this->SetTextColor(0);
        $this->SetFont('');      
        $fill= true;
        for ($x=0; $x < count($data); $x++)
        {
            // Cell(width, height, text, border, position, fill color, link)
            // position 0: on the right, 1:on the begining of the next line, 2: below
            // for border you change choose 1, 0, 'T', 'B', 'L','R', 'LR'
            $this->Cell(100,6,$index[$x],0,0,'L', $fill);
            $this->Cell(60,6,$data[$x],0,0, 'R', $fill);
            $this->Ln();
            // $fill = !$fill;
        }
    }

    function titlebloc($title){
        $this->SetFillColor(229,229,247);
        $this->SetTextColor(0);
        $this->SetFont( 'Arial', 'B', 12);
        $this->Cell(160, 6, $title, 0,0,'C',true);
        $this->Ln();
    }

    function total($label,$totalvalue){
        $this->SetFillColor(229,229,247);
        $this->SetTextColor(0);
        $this->SetFont( 'Arial', 'B', 12);
        $this->Cell(100, 6, $label, 0,0,'L',true);
        $this->Cell(60, 6, $totalvalue, 0,0,'R',true);
        $this->Ln();
    }

        // Page header
    function Header()
    {
        // $this->SetLeftMargin(25);
        // // Logo
        // $this->Image('logoofinbaru.png',10,6,30);
        // // Arial bold 15
        // $this->SetFont('Arial','B',15);
        // // Move to the right
        // $this->Cell(80);
        // // Title
        // $this->Cell(30,10,'OFIN INDONESIA',0,0,'C');
        // // Line break
        // $this->Ln(20);
        $this->SetY(70);   
    }

    // Page footer
    function Footer()
    {
        $this->SetFillColor(41, 42, 104);
        $this->SetTextColor(255,255,255);
        // $this->SetLeftMargin(25);
        // Position at 1.5 cm from bottom
        $this->SetY(-10);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C', true);
    }

    var $widths;
    var $aligns;
    
    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }
    
    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }
    
    function Row($data, $color)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            // fill color
            $this->SetFillColor($color[0],$color[1],$color[2]);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a, true);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }
    
    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }
    
    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
    }
    
    $rowLabels = array("Dana Darurat", "Rasio Likuiditas", "Rasio Tabungan", "Rasio Kemampuan Membayar Hutang","Rasio Kemampuan Membayar Hutang Konsumtif","Rasio Investasi", "Rasio Solvabilitas", "Rasio Pendapatan Aktif", "Rasio Financial Freedom");
    $columnLabels = array("Rasio","Nilai Anda", "Nilai Ideal", "Keterangan");

    $textColour = array( 0, 0, 0 );
    $logoXPos = 50;
    $logoYPos = 108;
    $logoWidth = 110;

    $totalpendapatan = $pendapatan_gaji+$pendapatan_insentif+$pendapatan_aktif+ $pendapatan_pasif; //A
    $totalpendapatanaktif = $pendapatan_gaji+$pendapatan_insentif+$pendapatan_aktif;//G
    $totalpendapatanpasif = $pendapatan_pasif;//H

    $totalpengeluaran = $pengeluaran_pajak+$pengeluaran_donasi+$pengeluaran_tabungan+$pengeluaran_premi+$pengeluaran_kredit+$pengeluaran_pinjaman+$pengeluaran_rumahtangga+$pengeluaran_gayahidup;//B

    $totalaset = $aset_rumah+$aset_kendaraan+$aset_lain;//C

    $totaltabunganinvestasi = $aset_deposito+$aset_logam+$aset_saham+$aset_investasi;//D

    $totalasetdaninvestasi=$totalaset+$totaltabunganinvestasi;//F

    $totalhutang = $aset_kewajiban_kpr+$aset_kewajiban_kredit_motor+$aset_kewajiban_lain;//E

    $cashflow = $totalpendapatan + $totalpengeluaran;
    $kekayaanbersih = $totaltabunganinvestasi-$totalhutang;

    $danadarurat = round($aset_deposito/$totalpengeluaran, 0);
    $rasiolikuiditas = round($aset_deposito/$kekayaanbersih*100,2); //bentuk persentase
    $rasiotabungan = round($pengeluaran_tabungan/$totalpendapatan*100,2);//bentuk persentase
    $rasiohutangterhadapaset = round($totalhutang/$totalasetdaninvestasi*100,2);
    $rasiokemampuanbayarhutang = round(($pengeluaran_kredit + $pengeluaran_pinjaman)/$totalpendapatan*100,2);
    $rasiokemampuanbayarhutangkonsumtif = round($pengeluaran_pinjaman/$totalpendapatan*100,2); 
    $rasioinvestasiterhadapkekayaan = round($aset_saham/$kekayaanbersih*100, 2);
    $rasiosolvabilitas = round($kekayaanbersih/$totalasetdaninvestasi*100,2);
    $rasiopendapataaktif = round($totalpendapatanaktif/$totalpengeluaran*100,2);
    $rasiofinancialfreedom = round($totalpendapatanpasif/$totalpengeluaran*100,2);

    $labelpendapatan = array('Gaji', 'Insentif', 'Pendapatan Bisnis', 'Pendapatan Pasif');
    $labelpengeluaran= array('Pajak', 'Amal', 'Tabungan & Investasi', 'Bayar Asuransi', 'Cicilan KPR, KPA dan kredit bisnis', 'Cicilan kartu kredit, KTA, dan Pinjaman Online', 'Belanja Rumah Tangga', 'Gaya Hidup');
    $labelaset = array('Rumah Tinggal','Kendaraan', 'Aset Lainnya');
    $labeltabungan = array('Tabungan & Deposito', 'Logam Mulia', 'Obligasi, Reksadana, Saham, atau Unit Link', 'Investasi Sektor Real');
    $labelkewajiban = array('KPR, KPA, dan Kredit Bisnis', 'Kredit motor, mobil atau pinjaman online','Kewajiban Lainnya');

    setlocale(LC_MONETARY, 'id_ID');

    $labelreportkeuangan = array("Cash Flow Bulanan Anda", "Kekayaan Bersih Anda");
    $reportkeuangan = array(money_format('%.2n',$cashflow), money_format('%.2n',$kekayaanbersih));

    $pendapatan = array(money_format('%.2n',$pendapatan_gaji), money_format('%.2n',$pendapatan_insentif), money_format('%.2n',$pendapatan_aktif), money_format('%.2n',$pendapatan_pasif));
    $pengeluaran = array(money_format('%.2n',$pengeluaran_pajak), money_format('%.2n',$pengeluaran_donasi), money_format('%.2n', $pengeluaran_tabungan), money_format('%.2n', $pengeluaran_premi), money_format('%.2n',$pengeluaran_kredit), money_format('%.2n',$pengeluaran_pinjaman), money_format('%.2n',$pengeluaran_rumahtangga), money_format('%.2n',$pengeluaran_gayahidup));
    $aset = array(money_format('%.2n',$aset_rumah),money_format('%.2n',$aset_kendaraan), money_format('%.2n',$aset_lain));
    $tabungan = array(money_format('%.2n',$aset_deposito), money_format('%.2n',$aset_logam), money_format('%.2n',$aset_saham), money_format('%.2n',$aset_investasi));
    $kewajiban = array(money_format('%.2n',$aset_kewajiban_kpr), money_format('%.2n',$aset_kewajiban_kredit_motor), money_format('%.2n',$aset_kewajiban_lain));

    if ($danadarurat<6) {
        $keterangandanadarurat = "Nilai darurat anda tidak ideal";
    } else {
        $keterangandanadarurat = "Nilai darurat anda ideal";
    }

    if ($rasiolikuiditas < 15) {
        $keteranganlikuiditas = "Nilai rasio aset likuid terhadap kekayaan bersih tidak ideal";
    } else {
        $keteranganlikuiditas = "Nilai rasio aset likuid terhadap kekayaan bersih ideal";
    }

    if ($rasiotabungan < 10 ) {
        $keterangantabungan = "Nilai rasio tabungan Anda tidak ideal";
    } else {
        $keterangantabungan = "Nilai rasio tabungan Anda ideal";
    }

    if ($rasiokemampuanbayarhutang <= 35 ) {
        $keteranganbayarhutang = "Rasio kemampuan bayar hutang Anda ideal";
    } else {
        $keteranganbayarhutang = "Rasio kemampuan bayar hutang Anda tidak ideal";
    }

    if ($rasiokemampuanbayarhutangkonsumtif <= 15) {
        $keteranganbayarhutangkonsumtif = "Rasio kemampuan bayar hutang konsumtif Anda ideal";
    } else {
        $keteranganbayarhutangkonsumtif = "Rasio kemampuan bayar hutang konsumtif Anda tidak ideal";
    }

    if ($rasioinvestasiterhadapkekayaan > 50) {
        $keteranganinvestasi = "Rasio investasi Anda terhadap kekayaan bersih ideal";
    } else {
        $keteranganinvestasi = "Rasio investasi Anda terhadap kekayaan bersih tidak ideal";
    }

    if ($rasiosolvabilitas > 50 ){
        $keterangansolvabilitas = "Rasio solvabilitas Anda ideal";
    } else {
        $keterangansolvabilitas = "Rasio solvabilitas Anda tidak ideal";
    }

    if ($rasiopendapataaktif > 50){
        $keteranganpendapatan = "Rasio pendapatan aktif Anda ideal";
    } else {
        $keteranganpendapatan = "Rasio pendapatan aktif Anda tidak ideal";
    }

    if ($rasiofinancialfreedom >= 100) {
        $keteranganfinancial = "Anda sudah sudah financial freedom";
    } else {
        $keteranganfinancial = "Anda belum financial freedom";
    }
    $data = array(
            array('Dana Darurat', $danadarurat, "6-12x", $keterangandanadarurat),
            array('Rasio Likuiditas', strval($rasiolikuiditas)." %", ">=15%", $keteranganlikuiditas),
            array('Rasio Tabungan',strval($rasiotabungan)." %", "10%", $keterangantabungan),
            array('Rasio Kemampuan Membayar Hutang', strval($rasiokemampuanbayarhutang)." %", "35%", $keteranganbayarhutang),
            array('Rasio Kemampuan Membayar Hutang Konsumtif',strval($rasiokemampuanbayarhutangkonsumtif)." %", "15%",$keteranganbayarhutangkonsumtif),
            array('Rasio Investasi Terhadap Kekayaan', strval($rasioinvestasiterhadapkekayaan)." %", ">=50%",$keteranganinvestasi),
            array('Rasio Solvabilitas', strval($rasiosolvabilitas)." %", ">=50%",$keterangansolvabilitas),
            array('Rasio Pendapatan Aktif', strval($rasiopendapataaktif)." %", ">=50%",$keteranganpendapatan),
            array('Rasio Financial Freedom', strval($rasiofinancialfreedom)." %", ">=100%",$keteranganfinancial)
    );

    

    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetLeftMargin(25);

    $pdf->Image('assets/img/templatepng/1.png',0,0, -200);
    // $pdf-> Ln();

    $pdf-> Ln(50);
    $pdf->Image('Fincheck1.png', 100,$pdf->getY(), 70);

    $pdf->SetFont( 'Arial', 'B', 24 );
    // $pdf->Ln( $reportNameYPos );
    
    $pdf-> Ln(50);
    $pdf->Cell( 0, 0, 'Hi '.$name.',', 0, 0, 'L' );
    $pdf-> Ln(10);
    $pdf->Cell( 0, 0, 'Ini Hasil Financial Check-Up', 0, 0, 'L' );
    $pdf-> Ln(10);
    $pdf->SetFont('');
    $pdf->Cell( 0, 0, 'Kondisi Kesehatan Keuanganmu', 0, 0, 'L' );
    $pdf->Cell( 0, 0, '', 0, 0, 'L' );
    $pdf-> Ln(20);

    $pdf -> AddPage();
    $pdf->Image('assets/img/templatepng/2.png',0,0, -200);


    // $pdf->SetFont('Arial','B',16);
    // $pdf->Cell(190,7,'PT. Okefinansial (OFIN) Indonesia',0,1,'C');
    // $pdf->SetFont('Arial','B',9);
    // $pdf->Cell(190,7,'Jl.Bukit Sakura II, No c 23, Bukit wahid Regency, Semarang, Jawa Tengah-Indonesia 50147, ',0,1,'C');
    // $pdf->Cell(190,7,'Email: info@okefinansial.com, Phone: 08112922168',0,1,'C');
    // $pdf->Cell(10,7,'',0,1);
    // $pdf->SetAutoPageBreak(on, 4);
    
    // $pdf->SetFont('Arial','B',12);
    // $pdf->Write(9, "Pendapatan Bulanan");
    $pdf->titlebloc("Pendapatan Bulanan");
    $pdf-> Ln(5);
    $pdf->table2col($labelpendapatan,$pendapatan);
    $pdf->total("Total Pendapatan",money_format('%.2n',$totalpendapatan));
    $pdf-> Ln();

    // $pdf->SetFont('Arial','B',12);
    $pdf->titlebloc("Pengeluaran Bulanan");
    $pdf-> Ln();
    $pdf->table2col($labelpengeluaran,$pengeluaran);
    $pdf->total("Total Pengeluaran",money_format('%.2n',$totalpengeluaran));
    $pdf-> Ln();

    $pdf->AddPage();
    $pdf->Image('assets/img/templatepng/2.png',0,0, -200);
    // $pdf->SetFont('Arial','B',12);
    $pdf->titlebloc("Aset");
    $pdf-> Ln();
    $pdf->table2col($labelaset,$aset);
    $pdf->total("Total Aset",money_format('%.2n',$totalaset));
    $pdf-> Ln();

    // $pdf->SetFont('Arial','B',12);
    $pdf->titlebloc("Investasi");
    $pdf-> Ln();
    $pdf->table2col($labeltabungan,$tabungan);
    $pdf->total("Total Tabungan & Investasi",money_format('%.2n',$totaltabunganinvestasi));
    $pdf->total("Total Aset, Tabungan & Investasi",money_format('%.2n',$totalasetdaninvestasi));
    $pdf-> Ln();

    // $pdf->SetFont('Arial','B',12);
    $pdf->titlebloc("Kewajiban");
    $pdf-> Ln();
    $pdf->table2col($labelkewajiban,$kewajiban);
    $pdf->total("Total Hutang",money_format('%.2n',$totalhutang));
    $pdf-> Ln();

    $pdf->AddPage();
    $pdf->Image('assets/img/templatepng/2.png',0,0, -200);
    // $pdf->SetFont('Arial','B',10);
    // $pdf->Cell(190,7, "Financial Health Checkup to: ".$name ,0,1,'L');

    $pdf->titlebloc("Laporan Keuangan");
    $pdf-> Ln();
    $pdf->table2col($labelreportkeuangan,$reportkeuangan);
    $pdf-> Ln();

    $pdf->titlebloc("Rasio Keuangan");
    $pdf-> Ln();
    $pdf->SetFillColor(229,229,247);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(229,229,247);
    $pdf->SetLineWidth(.3);
    $pdf->SetFont('');

    $pdf->SetWidths(array(40,30,30,60));    
    $pdf -> Row($columnLabels, array(229,229,247));
    foreach ($data as $row) {
        $pdf -> Row($row,array(255,255,255));
    }

    // $pdf->SetFont('Arial','B',9);
    // $pdf->SetLeftMargin(25);
    // $pdf -> Write(9,"Ingin tahu informasi selengkapnya? Silakan hubungi kami atau isi form konsultasi pada tautan berikut.");
    // $pdf->Write(9,'okefinansial.com','https://www.okefinansial.com/ofins-services/');


    $pdf->AddPage();
    $pdf->Image('assets/img/templatepng/1.png',0,0, -200);
    $pdf->SetFont( 'Arial', 'B', 18 );
    $pdf->Cell(0, 0, 'Diskusikan Hasil Finansial Check Up Kamu', 0, 0, 'C' );
    $pdf->Ln(10);
    $pdf->SetFont( 'Arial', '', 9 );
    // $pdf->Write( 6, "Despite the economic downturn, WidgetCo had a strong year. Sales of the HyperWidget in particular exceeded expectations. The fourth quarter was generally the best performing; this was most likely due to our increased ad spend in Q3." );   
    $pdf -> Write(6,"Untuk pertanyaan lebih lanjut mengenai hasil financial check up silakan Anda menghubungi Perencana Keuangan Independen OFIN Indonesia melalui WhatsApp 08112922168 atau website www.okefinansial.com:");
    $pdf->Ln(10);
    $pdf->Image('ofinfaq.png',$pdf->GetX(),$pdf->GetY(), 150);
    // $width=$pdf -> w; // Width of Current Page
    // $height=$pdf -> h; // Height of Current Page

    // $pdf->Line(0, $pdf->GetY(),160,$pdf->GetY()); // Line one Cross
    // $pdf->Line($width, 0,0,$height); // Line two Cross


    $pdf->Output( "report.pdf", "F" );
    //   ob_end_flush(); 
    // }
        
    require("PHPMailer/src/PHPMailer.php");
    require("PHPMailer/src/Exception.php");
    require("PHPMailer/src/SMTP.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer;
  
  
    $mail->IsSMTP();
    $mail->SMTPSecure = 'tls';
    $mail->Host = "okefinansial.com"; //hostname masing-masing provider email
    $mail->SMTPDebug = 0;
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = "info@okefinansial.com"; //user email
    $mail->Password = "Merciku10"; //password email
    
    $mail->SetFrom("info@okefinansial.com","OFIN");
    $mail->AddAddress($email);
    
    $mail->Subject  = "Financial Health Check UP";      
    $body =  "Kepada ".$name.",

 

    Selamat Pagi, perkenalkan saya Eno Casmi, Head of Marketing dari okefinansial.com. Sebelumnya, kami mengucapkan selamat karena Anda sudah mulai mengetahui kondisi keuangan Anda.
    
    Apakah saat ini anda ingin meningkatkan kinerja keuangan Anda, ingin memiliki asset diusia muda atau ingin mulai  investasi namun masih bingung membeli instrument investasi apa?
    
    Jika ya, hal tersebut adalah hal yang wajar.
    
    Sebenarnya Anda dapat meningkatkan kinerja keuangan Anda, karena dengan financial planning yang tepat semua mimpi anda bisa terwujud, kami dengan senang hati akan membimbing Anda dengan cara yang mudah dan menyenangkan.
    
    Bagaimana jika saya bantu untuk setting appointment dengan perencana keungan Oke Finansial Indonesia? Kami akan menghubungi Bapak dalam waktu 1x24 jam untuk settinsg appointment.
    
     
    
    Terima kasih dan sukses selalu
    
    ---
    
    P.S:
    
    Biaya konsultasi adalah 1.000.000 untuk waktu selama 2 jam lebih atau kurang. Konsultasi dapat dilakukan via online (Whatsapp, Telpon, Video Call, etc)* atau offline (lokasi di Yogyakarta dan Semarang).
    
     
    
    Konsultasi sudah termasuk:
    
    -          Financial Health Check Up
    
    -          Minutes of Meeting (report dari hasil konsultasi)
    
    Informasi lebih lenjut dapat menghubungi Whatsapp Eno: 0811-310-3313
    
    Waktu:
    
    Weekday 08.00 – 17.00
    
    Weekend menyesuaikan
    
    *waktu konsultasi via online disesuaikan
    
    Lokasi:
    
    Semarang
    
    Jl.Bukit Sakura II Bukit Wahid Regency No.C 23, Manyaran, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50147
    
    Yogyakarta:
    
    …………………………….
    
    
    
    Best regards:
    

    
    Eno Casmi, MBA., AWP., QWP.
    
    Head of Digital Marketing
    
    Phone: +62811 – 310 – 3310
    
    www.okefinansial.com
    
    PT. Oke Finansial Indonesia
    
     
    
    p:  +62 24 7619 1771  
    m:  +62 877 3161 5282  
    a:  Jl.Bukit Sakura II Bukit Wahid Regency No.C 23, Manyaran, Kec. Semarang
    w:  https://www.okefinansial.com   
    e:  @info@okefinansial.com      
    
    
    "
    ;
    $mail->Body     = $body;
  
  
    $mail->AddAttachment('report.pdf');
   
    if($mail->Send()) { $result= 1;}
    else { $result= 0;
    }


    require_once('fpdf182/fpdf.php');
    require_once('FPDI-2.3.2/src/autoload.php');

    // initiate FPDI
    $pdf = new Fpdi();
    // add a page
    $pdf->AddPage();
    // set the source file
    $pdf->setSourceFile('report.pdf');
    // import page 1
    $tplIdx = $pdf->importPage(1);
    // use the imported page and place it at position 10,10 with a width of 100 mm
    $pdf->useTemplate($tplIdx, 0, 0, 210);

    $pdf->AddPage();
    $pdf->setSourceFile('report.pdf');
    $tplIdx = $pdf->importPage(2);
    $pdf->useTemplate($tplIdx, 0, 0, 210);

    $pdf->AddPage();
    $pdf->setSourceFile('report.pdf');
    $tplIdx = $pdf->importPage(3);
    $pdf->useTemplate($tplIdx, 0, 0, 210);

    $pdf->AddPage();
    $pdf->setSourceFile('report.pdf');
    $tplIdx = $pdf->importPage(4);
    $pdf->useTemplate($tplIdx, 0, 0, 210);

    $pdf->AddPage();
    $pdf->setSourceFile('report.pdf');
    $tplIdx = $pdf->importPage(5);
    $pdf->useTemplate($tplIdx, 0, 0, 210);

    $pdf->Output();
}
?>