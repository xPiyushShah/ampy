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
    
        $tr = ''; 
        $i = 1;
    
        foreach ($data as $row) {
            $tr .= '<tr>
                        <td>' . $i . '</td>
                        <td>' . $row->name . '</td>
                        <td>' . $row->mobile_number . '</td>
                        <td>' . $row->email . '</td>
                        <td>
                            <button class="editpenbtn" type="button" onclick="showModal(\'' . base_url() . 'edit/' . $row->id . '\', \'Edit Table\')">
                                <i class="fa-regular fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button class="editpenbtn" type="button" onclick="deletedata(' . $row->id . ')">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>';
            $i++;
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

