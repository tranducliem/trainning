<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of category
 *
 * @author pxthanh
 */
class Category extends CI_Controller {

    //put your code here
    private $_data = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('category_m');
        $this->load->library('form_validation');
    }

    public function index() {
        if ($this->input->post("btnSearch") != "") {
            $name = $this->input->post("name");
            $this->_data['title'] = "Result search";
            $this->_data['category'] = $this->category_m->searchName($name);
        } else {
            $this->_data['title'] = "List Category";
            $this->_data['category'] = $this->category_m->getAll();
        }
        $this->load->view('category/Category', $this->_data);
    }

    public function create() {
        $config = array(
            array(
                'field' => 'name',
                'label' => 'name',
                'rules' => 'required|is_unique[tbl_category.name]'
            )
        );
        if ($this->input->post('btnCreate') != "") {
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() != FALSE) {
                $this->_data['status'] = "";
                $arr = array(
                    'name' => $this->input->post('name'),
                    'description' => $this->input->post('des'),
                );
                if ($this->category_m->insert($arr)) {
                    $this->_data['status'] = "create successs";
                    redirect(base_url(), $this->_data);
                }
            }
        }
        $this->load->view("category/Create", $this->_data);
    }

    public function edit($id) {
        $config = array(
            array(
                'field' => 'name',
                'label' => 'name',
                'rules' => 'required'
            )
        );
        if ($this->input->post('btnUpdate')) {
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() != FALSE) {
                $arr = array(
                    'name' => $this->input->post('name'),
                    'description' => $this->input->post('des'),
                );
                if ($this->category_m->update($arr, $id)) {
                    $this->_data['status'] = "Update successs";
                    redirect(base_url(), $this->_data);
                }
            }
        }
        $this->_data['item'] = $this->category_m->getById($id);
        $this->load->view('category/Update', $this->_data);
    }

    public function delete($id) {
        if ($this->category_m->delete($id)) {
            redirect(base_url());
        } else {
            redirect("error");
        }
    }

}
