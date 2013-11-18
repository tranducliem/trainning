<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Product_m extends CI_Model {
    // Name of table
    protected $_table = "tbl_product";
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // get all products from database
    public function listAll() {
        return $this->db->select('tbl_product.*, tbl_category.name as category_name')
                        ->from($this->_table)
                        ->join('tbl_category', 'tbl_category.id = tbl_product.category_id')
                        ->get()
                        ->result_array();
    }
    
    // get all category
    public function getAllCategories() {
        return $this->db->from('tbl_category')
                        ->get()
                        ->result_array();
    }
    
    // Insert data
    public function insert($data) {
        return $this->db
                    ->insert($this->_table, $data);
    }
    
    // get product by id
    public function getById($id) {
        return $this->db
            ->where('id', $id)
            ->get($this->_table)
            ->row();
    }
    
   // update product
   public function update($id, $data) {
        return $this->db
                    ->where('id', $id)
                    ->update($this->_table, $data);
   }
   
   // Delete product
   public function delete($id) {
        return $this->db
                    ->where('id', $id)
                    ->delete($this->_table);
   }
}