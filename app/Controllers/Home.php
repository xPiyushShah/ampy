<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;

class Home extends BaseController
{
    protected $db;
    protected $datatable;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->datatable = $this->db->table('datatable');

        // Load CORS service
        $this->cors = Services::response()
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
            ->setHeader('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept, Authorization');
    }

    public function index()
    {
        return view('template/header') . view('index') . view('template/footer');
    }

    public function add()
    {
        return view('template/header') . view('addpage') . view('template/footer');
    }

    public function addData()
    {
        $data = $this->request->getVar();
        $dt = $this->datatable->insert($data);

        return $this->response->setJSON(['succeed' => $dt]);
    }

    public function getData()
    {
        $data = $this->datatable->get()->getResult(); 
    
        $tr = "";
        $id = 1;
        foreach($data as $row){
            $tr .= '<tr>
            <td>'.$id.'</td>
            <td>
                '.$row->name.'
                <p class="header-effect ">
                    <!-- <a href="sales_invoice_view_accept.html" onclick="toggleViews(1)" -->
                    <a onclick="toggleViews(1)" data-bs-toggle="tooltip"
                        data-placement="bottom" data-bs-title="view"
                        data-bs-auto-close="outside">
                        <img src="./assets/img/view.svg" height="15px" width="15px" alt="">
                    </a>
                    <!-- <span class="black"> |</span> -->
                    <a onclick="showModal(`'.base_url().'edit/'.$row->id.'`,`EDIT`)"
                        data-bs-toggle="tooltip" data-bs-title="edit"
                        data-bs-auto-close="outside">
                        <img src="./assets/img/edit.svg" height="15px" width="15px" alt="">
                    </a>

                    <!-- <span class="black"> |</span> -->
                    <a onclick="datadelete('.$row->id.')" data-bs-toggle="tooltip" data-bs-title="delete"
                        data-bs-auto-close="outside">
                        <img src="./assets/img/delete.svg" height="15px" width="15px" alt="">
                    </a>
                </p>
            </td>
            <td>'.$row->mobile_number.'</td>
            <td>'.$row->email.'</td>
        </tr>';
        $id++;
        }
        echo json_encode($tr);
    }
    public function edit($id)
    {
        $data['edit'] = $this->datatable->getWhere(['id' => $id])->getRow();
        return view('edit', $data);
    }

    public function update($id)
    {
        $datainput = $this->request->getVar();
        $result = $this->datatable->update($id, $datainput);
        return $this->response->setJSON($result);
    }
}

