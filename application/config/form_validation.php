<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$config = array(
    array(
          'field'   => 'productName',
          'label'   => 'productName',
          'rules'   => 'trim|required'
       ),
    array(
          'field'   => 'productCategory',
          'label'   => 'productCategory',
          'rules'   => 'trim|required'
       ),
    array(
          'field'   => 'productPrice',
          'label'   => 'productPrice',
          'rules'   => 'trim|required|numeric|max_length[11]'
       )
);