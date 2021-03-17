<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
    
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
    }
    
    function index(){
        $data = array(); 
        if($this->isUserLoggedIn){ 
        // Fetch products from the database
        $data['products'] = $this->product->getRows();
        $con = array( 
            'id' => $this->session->userdata('userId') 
        ); 
        $data['user'] = $this->user->getRows($con);
        
        // Load the product list view
        $this->load->view('products/navbar',$data);
        $this->load->view('products/index', $data);

           
        }else{ 
            $data['products'] = $this->product->getRows();
            $this->load->view('home/homenav');
            $this->load->view('products/index', $data);
             
        }
        
    }
    
    function addToCart($proID){
        if($this->isUserLoggedIn){ 
        // Fetch specific product by ID
        $product = $this->product->getRows($proID);
        
        // Add product to the cart
        $data = array(
            'id'    => $product['id'],
            'qty'    => 1,
            'price'    => $product['price'],
            'name'    => $product['name'],
            'image' => $product['image']
        );
        $this->cart->insert($data);
        
        // Redirect to the cart page
        redirect('cart/');
    }
        else{ 
        redirect('users/login'); 
        }    
    }
    function contact()
    {    $data = array();
        if($this->isUserLoggedIn){
         $con = array( 
             'id' => $this->session->userdata('userId') 
         ); 
         $data['user'] = $this->user->getRows($con);
 
            $this->load->view('products/navbar',$data);
            $this->load->view('home/contact');
        }
 
        else{
        $this->load->view('home/homenav');
        $this->load->view('home/contact');
        }
    }

    function about()
    {   
        $data = array();
    if($this->isUserLoggedIn){
     $con = array( 
         'id' => $this->session->userdata('userId') 
     ); 
     $data['user'] = $this->user->getRows($con);

        $this->load->view('products/navbar',$data);
        $this->load->view('home/about');
    }
    
    else{
        $this->load->view('home/homenav');
        $this->load->view('home/about');
        }
    }
   
}