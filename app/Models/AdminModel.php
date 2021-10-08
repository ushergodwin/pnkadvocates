<?php
namespace App\Models;

use CodeIgniter\Model;

include APPPATH . 'ThirdParty/bluefaces/DbModel.php';

use DbModel;
use Exception;

class AdminModel extends Model
{
    protected $_db;

    public function addStaff(array $data)
    {
        $this->_db = new DbModel();
        return $this->_db->insert('staff', $data);
    }

    public function getStaffMembers()
    {
        $this->_db = new DbModel();
        $this->_db->where(['status' => 0]);
        return $this->_db->getValues('*', 'staff');
    }

    public function getUserData(string $email)
    {
        $this->_db = new DbModel();
        $this->_db->where(['email' => $email]);
        $staff = $this->_db->getObject('fname, lname, password', 'admin');
        if (!property_exists($staff, 'password'))
        {
            return 0;
        }

        return $staff;
    }

}
