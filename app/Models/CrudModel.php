<?php
namespace App\Models;
use CodeIgniter\Model;
class CrudModel extends Model{

    protected $table = "";
    protected $primarykey = "id";
    protected $allowedFields = ['name','email','gender'];
}


?>