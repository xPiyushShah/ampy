<?php

namespace App\Controllers;

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
        // Assuming $this->request->getVar() retrieves data from the request payload
        $data = $this->request->getVar(); 
    
        // Check if $data is not empty before attempting to insert
        if (!empty($data)) {
            // Assuming $this->table('datatable') correctly references the 'datatable' table
            $dt = $this->db->table('datatable')->insert($data);
    
            // Check if insertion was successful
            if ($dt) {
                // If insertion succeeded, prepare a success response
                $response = ['succeed' => true];
            } else {
                // If insertion failed, prepare an error response
                $response = ['succeed' => false, 'error' => 'Insertion failed'];
            }
        } else {
            // If $data is empty, prepare an error response
            $response = ['succeed' => false, 'error' => 'No data received'];
        }
    
        // Return the response as JSON
        echo json_encode($response);
    }
    // public function getData()
    // {
    //     $data = $this->datatable->get()->getResult();

    //     $tr = "";
    //     $id = 1;
    //     foreach ($data as $row) {
    //         $tr .= '<tr>
    //         <td>' . $id . '</td>
    //         <td>' . $row->name . ' </td>
    //         <td>' . $row->mobile_number . '</td>
    //         <td>' . $row->email . '</td>
    //         <td>
    //         <button class="editpenbtn" type="button" onclick="showModal(\'' . base_url() . 'edit/' . $row->id . '\', \'Edit Table\')">
    //             <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    //         </button>
    //         <button class="editpenbtn" type="button" onclick="deletedata(' . $row->id . ')"> 
    //             <i class="fa fa-trash" aria-hidden="true"></i>
    //         </button>
    //         </td>
    //     </tr>';
    //         $id++;
    //     }
    //     echo json_encode($tr);
    // }
    public function edit($id)
    {
        $data['edit'] = $this->datatable->getwhere(['id' => $id])->getRow();
        echo view("editpage", $data);
    }

    public function update($id)
    {
        $editinput = $this->request->getVar();
        $result = $this->datatable->where('id', $id)->update($editinput);
        echo json_encode($result);
    }

    public function delete($id)
    {
        $isDeleted = $this->datatable->where(['id' => $id])->delete();
        echo $isDeleted;
    }


}

