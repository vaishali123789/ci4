<?php 
namespace App\Controllers;
use App\Models\CrudModel;
class Crud extends BaseController
{
    public function index ()
    {
        $CrudModel = new CrudModel();
        $data['user_data'] = $CrudModel->orderBy('id','DESC')->paginate(10);
        $data['pagination_link'] = $CrudModel->pager;
        return view('crud_view',$data);
    }
}



?>