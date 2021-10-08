<?php
namespace App\Controllers;

use App\Models\AdminModel;
use BlController;
class AdminController extends BaseController
{
    protected $ctrl;

    public function index()
    {
        $this->ctrl = new BlController();
        $content = [
            "base_url" => $this->ctrl->server->base_url(),
            "title" => "PNK ADVOCATES | ADMIN",
            'name' => $_SESSION['fname'] . " " . $_SESSION['lname']
        ];
		return $this->render(view('admin/index', $content));
    }

    public function login()
    {
        $this->ctrl = new BlController();
        $content = [
            "base_url" => $this->ctrl->server->base_url(),
            "title" => "PNK ADVOCATES | LOGIN"
        ];
		return $this->render(view('admin/login', $content));
    }

    public function auth()
    {
        $this->ctrl = new BlController();
        $admin = new AdminModel();

        $email = $this->ctrl->input->post('email');
        $password = $this->ctrl->input->post('password');

        $staff = $admin->getUserData($email);

        if ($staff === 0)
        {
            echo json_encode([
                'status' => 'error',
                'message' => $this->ctrl->notification
                ->failure('Oops, account does not exist!')
            ]);
            return;
        }

        if (! password_verify($password, $staff->password))
        {
            echo json_encode([
                'status' => 'error',
                'message' => $this->ctrl->notification
                ->failure('Invalid email or password!')
            ]);
            return; 
        }

        $this->ctrl->session->create_session('email', $email);
        $this->ctrl->session->create_session('fname', $staff->fname);
        $this->ctrl->session->create_session('lname', $staff->lname);
        echo json_encode([
            'status' => 200,
            'message' => $this->ctrl->notification
            ->success('Authenticated'),
            'url' => $this->ctrl->server->base_url() . 'admin/dashboard'
        ]);

    }

    public function saveStaff()
    {
        $this->ctrl = new BlController();

        $fname = $this->ctrl->input->post('fname');
        $lname = $this->ctrl->input->post('lname');
        $position = $this->ctrl->input->post('position');
        $qualification = $this->ctrl->input->post('qualification');

        if (empty(trim($fname)) and empty(trim($lname)) and empty(trim($position))
        and empty(trim($qualification))) {
            echo $this->ctrl->notification->info('All fields are required! Fill all of them 
            and try again.');
            return;
        }


        if (!$this->ctrl->file->upload_image_in_bg('img/staff/', 'photo'))
        {
            echo $this->ctrl->notification->info($fname . " " . $lname . "\'s 
            Profile photo could not be uploaded. Please try again later.");
            return; 
        }

        $path = $this->ctrl->server->base_url() . 'img/staff/'
        . $this->ctrl->file->get_image_name('photo');

        $admin = new AdminModel();
        $data = [
            'id' => substr(uniqid('PNK', true), 15, 23),
            'fname' => $fname,
            'lname' => $lname,
            'position' => $position,
            'qualification' => $qualification,
            'img_url' => $path
        ];

        if(!$admin->addStaff($data))
        {
            echo $this->ctrl->notification->
            failure('Staff member not added. Please try again');
            return;
        }

        echo $this->ctrl->notification->
        success('Staff member added successfully');
        return;

    }


    public function deleteStaff()
    {

    }

    public function logout()
    {
        $this->ctrl = new BlController();
        $this->ctrl->session->end($this->ctrl->server->base_url());
    }
    
}