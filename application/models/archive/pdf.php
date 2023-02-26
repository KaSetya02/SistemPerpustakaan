/*pdf*/
	function cetakpdf()
    {
        $judul = 'Laporan Data Siswa';
        $kolom = array('id_buku'=>'id_buku',
            'ISBN' => 'ISBN',
            'judul'=>'judul',
            'id_kategori' => 'id_kategori',
            'id_Pengarang' => 'id_engarang',
            'id_Penerbit' => 'id_penerbit',
            'no_Rak' => 'no_rak',
            'thn_terbit'=> 'thn_terbit',
            'stok'=>'stok',
            'ket'=>'ket');
        $query = $this->db->query("select id_buku,isbn,judul,id_kategori,id_pengarang,id_penerbit,no_rak,thn_terbit,stok,ket from tb_buku");
        $data = $query->result_array();
        $this->generatePdf($kolom,$data,"Laporan Data Buku");
    }


    private function generatepdf($header,$data,$judul){
    //load library tcpdf
    $this->load->library('tcpdf/CustomHeader');
    // create new PDF document
    $pdf = new CustomHe0ader(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Febrian Reza');
    $pdf->SetTitle('LATIHAN PDF');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', 
       PDF_HEADER_STRING);
        
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
     
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
      
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
         require_once(dirname(__FILE__).'/lang/eng.php');
         $pdf->setLanguageArray($l);
    }
    // set font
    $pdf->SetFont('helvetica', '', 12);
    // add a page
    $pdf->AddPage();
    //judul
    $pdf->Cell(0,20, $judul, 0, 1, 'C', 0, '',0,FALSE);
    // print colored table
    $pdf->ColoredTable($header, $data);        
    // close and output PDF document
    $pdf->Output('Lap.pdf', 'I');
  }