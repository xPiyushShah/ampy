<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    protected $db;
    protected $datatable;

    public function __construct()
    {
        $this->db = \Config\Database::connect(); // Default connection, no need to specify "test" here
        $this->datatable = $this->db->table('tabledata');
    }

    public function index()
    {
        // Load views
        return view('template/header') . view('index') . view('template/footer');
    }

    public function add()
    {
        // Load add page view
        return view('addpage');
    }

    public function addData()
    {
        // Insert data into 'table'
        $data = $this->request->getPost();

        $this->db->table('table')->insert($data);

        // Console log confirmation
        echo "Data inserted successfully.";
    }
}