<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminProducts extends CI_Controller {
   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {
    //load database in autoload libraries 
      parent::__construct(); 
      $this->load->model('ProductsModel');         
   }
   public function index()
   {
       $products=new ProductsModel;
       $data['data']=$products->get_products();
       $this->load->view('admin/admin_navbar'); 
       $this->load->view('admin/mainpage',$data);     
       //$this->load->view('products/list',$data);
       //$this->load->view('includes/footer');
   }
   //Product Inventory
   public function list()
   {
    $products=new ProductsModel;
    $data['data']=$products->get_products();   
    //$this->load->view('admin/admin_navbar');
    $this->load->view('includes/header'); 
    $this->load->view('products/list',$data); 
    $this->load->view('includes/footer');
   }
   // Create New Product from Inventory/List
   public function create()
   {
      $this->load->view('includes/header');
      $this->load->view('products/create');
      $this->load->view('includes/footer'); 
             
   }

   function savingdata()  
   {  
       //this array is used to get fetch data from the view page.  
       $data = array(  
                       'name'     => $this->input->post('name'),  
                       'description'  => $this->input->post('description'),  
                       'price'   => $this->input->post('price')  
                         
                       );  
       //insert data into database table.  
       $this->db->insert('products',$data);  
 
       redirect(base_url('products'));  
   } 
   /**
    * Store Data from this method.
    *
    * @return Response
   */

//    public function validate()
//    {
//     $this->load->helper(array('form', 'url'));
//     $this->load->library('form_validation');
//     $this->form_validation->set_rules('name', 'Name', 'required');
//        if ($this->form_validation->run() == TRUE)
//        {
        
//        }
//        else{
//            echo"error";
//        }
//    }
    // Add New Product in Database
   public function store()
   {
    // $this->form_validation->set_rules('name', 'Product Name', 'trim|required');
    // $this->form_validation->set_rules('description', 'Description', 'trim|required');
    // $this->form_validation->set_rules('price', 'Price', 'trim|required');
    // $this->form_validation->set_rules('status', 'Status', 'trim|required');
    // $this->form_validation->set_rules('image', 'Product Image', 'trim|required');

    // if($this->form_validation->run()==false)
    //     {
    //        $data_error= ['error'=> validation_errors()]; 

    //        $this->session->set_flashdata($data_error);
    //        redirect(base_url('AdminProducts/create'));
    //     }
        
    // else
    //     {
             $products=new ProductsModel;
             $products->insert_product();
             redirect(base_url('AdminProducts/list/'));
        // }
    }
   /**
    * Edit Data from this method.
    *
    * @return Response
   */
  //Edit the Existing Products
   public function edit($id)
   {
       $product = $this->db->get_where('products', array('id' => $id))->row();
       $this->load->view('includes/header');
       $this->load->view('products/edit',array('product'=>$product));
       $this->load->view('includes/footer');   
   }
   /**
    * Update Data from this method.
    *
    * @return Response
   */

  //Update The products in Inventory
   public function update($id)
   {
    // $this->form_validation->set_rules('name', 'Product Name', 'trim|required');
    // $this->form_validation->set_rules('description', 'Description', 'trim|required');
    // $this->form_validation->set_rules('price', 'Price', 'trim|required');
    // $this->form_validation->set_rules('status', 'Status', 'trim|required');
    // $this->form_validation->set_rules('image', 'Product Image', 'trim|required');

    // if($this->form_validation->run()==false)
    //     {
    //        $data_error= ['error'=> validation_errors()]; 

    //        $this->session->set_flashdata($data_error);
    //        redirect(base_url('AdminProducts'));
    //     }

    //     else
    //     {
             $products=new ProductsModel;
             $products->update_product($id);
             redirect(base_url('AdminProducts/list/'));
        // }
   }
   /**
    * Delete Data from this method.
    *
    * @return Response
   */

   //Delete the products from Inventory
   public function delete($id)
   {
       $this->db->where('id', $id);
       $this->db->delete('products');
       redirect(base_url('AdminProducts/list/'));
   }

   //Search the product from Inventory List
   function search_keyword()
    {
        $keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->ProductsModel->search($keyword);
        $this->load->view('result_view',$data);
    }


}
