<?php
namespace App\Models;

use CodeIgniter\Model;

include APPPATH . 'ThirdParty/bluefaces/DbModel.php';
use DbModel;

class MessageModel extends Model
{
    protected $_db;
    public function __construct()
    {
        $this->_db = new DbModel();
    }
}