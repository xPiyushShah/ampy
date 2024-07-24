<?php

namespace App\Controllers;

use CodeIgniter\CLI\Console;
use CodeIgniter\Controller;

class Home extends BaseController
{
    protected $db;
    protected $datatable;

    public function __construct()
    {
        $this->db = \Config\Database::connect(); 
        $this->datatable = $this->db->table('datatable');
    }

    public function index()
    {
      
        return view('template/header') . view('index') . view('template/footer');
    }

    public function add()
    {
        
        return view('addpage');
    }

    public function addData()
    {
       
        $data = $this->request->getPost();
        $this->db->table('datatable')->insert($data);
        $result = 10;
        echo json_encode($result);


        
        echo "Data inserted successfully.";
    }
    public function getData(){
       $data = $this->datatable->get()->getResult();
       $tr='';
       $i=1;
    //    foreach($data as $row){{
    //     $tr .= `<tr>
    //     <td>`.$i.`<td>
    //     <td>`.$row->name.`<td>
    //     <td>`.$row->mobile_number.`<td>
    //     <td>`.$row->email.`<td>
    //     <td><button class="editpenbtn" type="button" onclick="showModal('`? = base_url() . ' edit/' .$row->id . '`,`Edit Table`)"></button><td>
    //     <td><td>
    //     <tr>`;

    //    }

       }
    }
