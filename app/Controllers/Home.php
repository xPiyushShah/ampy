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
        $this->setCorsHeaders();
    }

    protected function setCorsHeaders()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
    }
    public function index()
    {
      
        return view('template/header') . view('index') . view('template/footer');
    }

    public function add()
    {
        return view('addpage');
        // return view('template/header') . view('addpage') . view('template/footer');
    }

    public function addData()
    {
        $data = $this->request->getVar();
        $dt = $this->datatable->insert($data);

        echo json_encode(['succeed'=>$dt]);
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
    //     <td><button class="editpenbtn" type="button" onclick="showModal('` base_url() . ' edit/' .$row->id . '`,`Edit Table`)"></button><td>
    //     <td><button class="editpenbtn" type="button" onclick="showModal('`base_url() . ' edit/' .$row->id . '`,`Edit Table`)"></button><td>
    //     <tr>`;

    //    }

       }
    }
