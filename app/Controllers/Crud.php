<?php

namespace App\Controllers;

use App\Models\CrudModel;

class Crud extends BaseController
{
	function index()
	{

		$crudModel = new CrudModel();

        $data['user_data'] = $crudModel->orderBy('id', 'DESC')->paginate(10);

        $data['pagination_link'] = $crudModel->pager;

        return view('crud_view', $data);
	}

	function add()
	{
		return view('add_data');
	}

	function add_validation()
	{
		helper(['form', 'url']);
        
        $error = $this->validate([
            'name' 	=> 'required|min_length[3]',
            'email' => 'required|valid_email',
            'gender'=> 'required'
        ]);

        

        if(!$error)
        {
        	echo view('add_data', [
                'error' => $this->validator
            ]);
        } 
        else 
        {
            $crudModel = new CrudModel();
            
            $crudModel->save([
                'name'   => $this->request->getVar('name'),
                'email'  => $this->request->getVar('email'),
                'gender'  => $this->request->getVar('gender'),
            ]);          
            
            $session = \Config\Services::session();

            $session->setFlashdata('success', 'User Data Added');

            return $this->response->redirect(site_url('/crud'));
        }

	}

	// show single user
    function fetch_single_data($id = null)
    {
        $crudModel = new CrudModel();

        $data['user_data'] = $crudModel->where('id', $id)->first();

        return view('edit_data', $data);
    }

    function edit_validation()
    {
    	helper(['form', 'url']);
        
        $error = $this->validate([
            'name' 	=> 'required|min_length[3]',
            'email' => 'required|valid_email',
            'gender'=> 'required'
        ]);

        $crudModel = new CrudModel();

        $id = $this->request->getVar('id');

        if(!$error)
        {
        	$data['user_data'] = $crudModel->where('id', $id)->first();
        	$data['error'] = $this->validator;
        	echo view('edit_data', $data);
        } 
        else 
        {
	        $data = [
	            'name' => $this->request->getVar('name'),
	            'email'  => $this->request->getVar('email'),
	            'gender'  => $this->request->getVar('gender'),
	        ];

        	$crudModel->update($id, $data);

        	$session = \Config\Services::session();

            $session->setFlashdata('success', 'User Data Updated');

        	return $this->response->redirect(site_url('/crud'));
        }
    }
}

?>