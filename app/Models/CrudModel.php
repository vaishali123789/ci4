<?php 
namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'user';  // Ensure your table name is correct
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'gender'];
}


?>