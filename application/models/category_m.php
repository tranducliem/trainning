<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of catelogy_m
 *
 * @author pxthanh
 */
class Category_m extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    private $_table='tbl_category';
    public function getAll(){
        $data =  $this->db->get($this->_table);
        return $data->result();
    }
    public function getById($id){
        return $this->db->where('id',$id)
                ->get($this->_table)
                ->row();
        
    }
    public function insert($data){
        return $this->db
                    ->insert($this->_table,$data);
    }
    public function update($arr,$id){
        return $this->db->where('id',$id)
                       ->update($this->_table,$arr);
    }
     public function delete($id){
        return $this->db
                    ->where('id', $id)
                    ->delete($this->_table);
    }
     public function searchName($name){
        return $this->db
                    ->like('name', $name)
                    ->get($this->_table)
                    ->result();
    }
    public function getByName($name){
        return $this->db
                    ->where('name', $name)
                    ->get($this->_table)
                    ->row();
    }
}
