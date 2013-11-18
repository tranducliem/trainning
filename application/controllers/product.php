<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class product extends CI_Controller {
    private $_data = array();
    
    public function __construct()
    {
        parent::__construct();
         $this->load->Model("Product_m");
    }
    
    // List all products
    public function index() {
        $data["products"] = $this->Product_m->listall();
        $this->load->view("product/view", $data);
    }
    
    // Add new product
    public function add() {
        $this->load->helper(array('product', 'url'));

        $this->load->library('form_validation');

        // Check if success or fail
        if (($this->form_validation->run() != FALSE)&&($this->input->post('btnSubmit') != "")) 
        {
            $arr = array(
                'name' => $this->input->post('productName'),
                'category_id' => $this->input->post('productCategory'),
                'price' => $this->input->post('productPrice')
            );
            if($this->Product_m->insert($arr)) {
                redirect(base_url().'/product');
            }     
        }
        else {     
            $this->load->view('product/form');
        }
    }
    
    // Get all categories from database
    public function getCategories() {
        if($this->input->post('ajax') == '1'){
            $categories = $this->Product_m->getAllCategories();
            echo json_encode($categories);
        }
    }
    
    // Update product
    public function edit($id) {
        $this->load->helper(array('product', 'url'));

        $this->load->library('form_validation');

        // Check if success or fail
        if (($this->form_validation->run() != FALSE)&&($this->input->post('btnSubmit') != ""))         {
            $arr = array(
                'name' => $this->input->post('productName'),
                'category_id' => $this->input->post('productCategory'),
                'price' => $this->input->post('productPrice')
            );
            if($this->Product_m->update($id, $arr)) {
                redirect(base_url().'/product');
            }      
        }
        
        $this->_data['product'] = $this->Product_m->getById($id);
        $this->load->view('product/form', $this->_data);
    }
    
    // Delete product
    public function delete($id){
        if($this->Product_m->delete($id)){
            redirect(base_url().'/product');
        }else{
            redirect("error");
        }
    }
}