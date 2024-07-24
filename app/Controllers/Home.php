<?php

namespace App\Controllers;

use CodeIgniter\CLI\Console;
use CodeIgniter\Controller;

class Home extends Controller
{
    protected $db;
    protected $datatable;

    public function __construct()
    {
        $this->db = \Config\Database::connect(); 
        $this->datatable = $this->db->table('tabledata');
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
        $this->db->table('table')->insert($data);
        $result = 10;
        echo json_encode($result);


        
        echo "Data inserted successfully.";
    }
}