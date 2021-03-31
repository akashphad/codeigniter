<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        $this->load->model('product');
        //Load User model
        $this->load->model('user');

        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 

        //$this->load->library('Pdf');
    }
    //Customer table Report
    function show_cust_table()
    {
        $product=new Product;
        $data['data']=$product->get_customerinfo();   
        //$this->load->view('admin/admin_navbar');
        $this->load->view('includes/header');
        $this->load->view('reports/cust_report', $data);
        $this->load->view('includes/footer');
        
    }
    //User table Report
    function show_user_table()
    {
        $product=new User;
        $data['data']=$product->get_userinfo(); 
        //$this->load->view('admin/admin_navbar');  
        $this->load->view('includes/header');
        $this->load->view('reports/user_report', $data);
        $this->load->view('includes/footer');
    }

    //Sales table Report
    function show_sales_table()
    {
        $product=new Product;
        $data['data']=$product->get_salesinfo();   
        //$this->load->view('admin/admin_navbar');
        $this->load->view('includes/header');
        $this->load->view('reports/sales_report', $data);
        $this->load->view('includes/footer');
    }

    //Products table Report
    function show_products_table()
    {
        $product=new Product;
        $data['data']=$product->get_productsinfo();   
        //$this->load->view('admin/admin_navbar');
        $this->load->view('includes/header');
        $this->load->view('reports/product_report', $data);
        $this->load->view('includes/footer');
    }
    function total_sales()
    {
        $product=new Product;
        $data['data']=$product->get_totalsales();   
        //$this->load->view('admin/admin_navbar');
        $this->load->view('includes/header');
        $this->load->view('reports/cust_report', $data);
        $this->load->view('includes/footer');
    }
    /////////////////////////////////////
    /*
    Function to generate Customer Table report
    */
    public function generate_pdf() {
        //load pdf library
        $this->load->library('Pdf');
        
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Online Shopping');
        $pdf->SetTitle('Customer Information');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');
    
        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
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
    
        // set font
        $pdf->SetFont('times', 'BI', 12);
        
        // ---------------------------------------------------------
        
        
        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );
    
        $this->table->set_template($template);
    
        $this->table->set_heading('Id', 'Name', 'Email','Phone','Address','Created');
        
        $customerinfo = $this->product->get_customerinfo();
            
        foreach ($customerinfo as $cf):
            $this->table->add_row($cf->id, $cf->name, $cf->email, $cf->phone, $cf->address, $cf->created);
        endforeach;
        
        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end
        
        // add a page
        $pdf->AddPage();
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // reset pointer to the last page
        $pdf->lastPage();
    
        //Close and output PDF document
        $pdf->Output(md5(time()).'.pdf', 'I');
    }

    ///////////////////////////////////////////////////////////////////
    /*
    Function to generate OrderItems/Sales Table report
    */
    public function generate_sales_pdf() {
        //load pdf library
        $this->load->library('Pdfs');
        
        $pdf = new Pdfs(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Online Shopping');
        $pdf->SetTitle('Sales Information');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');
    
        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
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
    
        // set font
        $pdf->SetFont('times', 'BI', 12);
        
        // ---------------------------------------------------------
        
        
        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );
    
        $this->table->set_template($template);
    
        $this->table->set_heading('Id', 'OrderID', 'ProductId','Quantity','Total');
        
        $salesinfo = $this->product->get_salesinfo();
            
        foreach ($salesinfo as $sf):
            $this->table->add_row($sf->id, $sf->order_id, $sf->product_id, $sf->quantity, $sf->sub_total);
        endforeach;
        
        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end
        
        // add a page
        $pdf->AddPage();
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // reset pointer to the last page
        $pdf->lastPage();
    
        //Close and output PDF document
        $pdf->Output(md5(time()).'.pdf', 'I');
    }

///////////////////////////////////////////////////////////////////////////
/*
    Function to generate Proucts Table report
    */
    public function generate_products_pdf() {
        //load pdf library
        $this->load->library('Pdfp');
        
        $pdf = new Pdfp(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Online Shopping');
        $pdf->SetTitle('Customer Information');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');
    
        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
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
    
        // set font
        $pdf->SetFont('times', 'BI', 12);
        
        // ---------------------------------------------------------
        
        
        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );
    
        $this->table->set_template($template);
    
        $this->table->set_heading('Id', 'Name', 'Price','Created Date','Status');
        
        $productsinfo = $this->product->get_productsinfo();
            
        foreach ($productsinfo as $pf):
            $this->table->add_row($pf->id, $pf->name, $pf->price, $pf->created,$pf->status);
        endforeach;
        
        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end
        
        // add a page
        $pdf->AddPage();
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // reset pointer to the last page
        $pdf->lastPage();
    
        //Close and output PDF document
        $pdf->Output(md5(time()).'.pdf', 'I');
    }

////////////////////////////////////////////////////////////////////////////
/*
    Function to generate Users Table report
    */
public function generate_user_pdf() {
    //load pdf library
    $this->load->library('Pdfu');
    
    $pdf = new Pdfu(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Online Shopping');
    $pdf->SetTitle('Sales Information');
    $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
    $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

    // set default header data
    //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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

    // set font
    $pdf->SetFont('times', 'BI', 12);
    
    // ---------------------------------------------------------
    
    
    //Generate HTML table data from MySQL - start
    $template = array(
        'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
    );

    $this->table->set_template($template);

    $this->table->set_heading('Id', 'First Name', 'Last NAme','Email ID','Gender','Phone No','Created');
    
    $userinfo = $this->user->get_userinfo();
        
    foreach ($userinfo as $uf):
        $this->table->add_row($uf->id, $uf->first_name, $uf->last_name, $uf->email, $uf->gender,$uf->phone,$uf->created);
    endforeach;
    
    $html = $this->table->generate();
    //Generate HTML table data from MySQL - end
    
    // add a page
    $pdf->AddPage();
    
    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');
    
    // reset pointer to the last page
    $pdf->lastPage();

    //Close and output PDF document
    $pdf->Output(md5(time()).'.pdf', 'I');
}    
}    