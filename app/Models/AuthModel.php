<?php
namespace App\Models;

use CodeIgniter\Model;

include APPPATH . 'ThirdParty/bluefaces/DbModel.php';
use DbModel;

class AuthModel extends Model
{
    protected $_db;
    public function auth_user(string $user_id, string $password, object $reg_no){
        $this->_db = new DbModel();
        if (!strpos($user_id, '@')) {
            $reg1 = $reg_no->prefix1;
            $reg2 = $reg_no->prefix2;
            $reg3 = $reg_no->prefix3;
            try {
                $data = $this->_db->customQuery('SELECT registration_no, password FROM student WHERE ' .
                    'registration_no = ? OR registration_no = ? OR registration_no = ? LIMIT 1',
                    array($reg1, $reg2, $reg3));
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            $pass = "";
            $reg = "";
            if (!empty($data)) {
                foreach ($data as $key => $value) {
                    $pass = $value['password'];
                    $reg = $value['registration_no'];
                }
                if ($pass === $password) {
                    return ["status" => "Authenticated", "reg" => $reg, "redirect" => 'vote/dashboard'];
                }else {
                    return ["status" => "Oops, Invalid login details", "reg" => $reg, "redirect" => 'vote/dashboard'];
                }
            }else {
                return ["status" => "Oops, there is no account that matches your login details", "reg" => $reg];
            }
        }else {
            $this->_db->where(["email" => $user_id]);
            try {
                $user = $this->_db->getObject('firstname, lastname, password', 'admin');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            if (!empty($user)) {
                $auth = password_verify($password, $user->password);
                if ($auth) {
                    return ["status" => "Authenticated", "reg" => $user->firstname, "redirect" => 'admin/dashboard'];
                }else {
                    return ["status" => "Oops, Invalid login details", "reg" => $user_id, "redirect" => 'admin/dashboard'];
                }
            }else{
                return ["status" => "Oops, there is no account that matches your login details", "reg" => $user_id];
            }

        }
    }
}
