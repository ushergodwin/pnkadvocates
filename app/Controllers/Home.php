<?php

namespace App\Controllers;
use App\Models\AuthModel;
use BlController;
class Home extends BaseController
{
    protected $CTRL;

	public function index()
	{
        $this->CTRL = new BlController();
        $content = [
            "base_url" => $this->CTRL->server->base_url(),
            "title" => "PNK ADVOCATES"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('includes/slider'));
		$this->render(view('welcome', $content));
		$this->render(view('includes/footer', $content));
	}

	public function practiceAreas()
	{
        $this->CTRL = new BlController();
        $content = [
            "base_url" => $this->CTRL->server->base_url(),
            "title" => "PNK ADVOCATES | PRACTICE AREAS"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('practice-areas', $content));
		$this->render(view('includes/footer', $content));
	}

	public function intellectualPropertyLaw() {
		$this->CTRL = new BlController();
        $content = [
            "base_url" => $this->CTRL->server->base_url(),
            "title" => "PNK ADVOCATES | Intellectual Property Law"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('intellectual-property-law', $content));
		$this->render(view('includes/footer', $content));
	}

	public function energyLaw() {
		$this->CTRL = new BlController();
        $content = [
            "base_url" => $this->CTRL->server->base_url(),
            "title" => "PNK ADVOCATES | ENERGY LAW"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('energy-law', $content));
		$this->render(view('includes/footer', $content));
	}

	public function commercialLaw() {
		$this->CTRL = new BlController();
        $content = [
            "base_url" => $this->CTRL->server->base_url(),
            "title" => "PNK ADVOCATES | GUN CRIMES"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('commercial-law', $content));
		$this->render(view('includes/footer', $content));
	}

	public function litigationAndArbitration() {
		$this->CTRL = new BlController();
        $content = [
            "base_url" => $this->CTRL->server->base_url(),
            "title" => "PNK ADVOCATES | LITIGATION AND ARBITRATION"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('litigation-and-arbitration', $content));
		$this->render(view('includes/footer', $content));
	}

	public function oilAndGasLaw() {
		$this->CTRL = new BlController();
        $content = [
            "base_url" => $this->CTRL->server->base_url(),
            "title" => "PNK ADVOCATES | OIL AND GAS"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('oil-and-gas-law', $content));
		$this->render(view('includes/footer', $content));
	}

	public function realEstateAndConveyancing() {
		$this->CTRL = new BlController();
        $content = [
            "base_url" => $this->CTRL->server->base_url(),
            "title" => "PNK ADVOCATES | REAL ESTATE AND CONVEYANCING"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('real-estate-and-conveyancing', $content));
		$this->render(view('includes/footer', $content));
	}

	public function taxAdvisory() {
		$this->CTRL = new BlController();
        $content = [
            "base_url" => $this->CTRL->server->base_url(),
            "title" => "PNK ADVOCATES | TAX ADVISORY"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('tax-advisory', $content));
		$this->render(view('includes/footer', $content));
	}

	public function contactUs() {
		$this->CTRL = new BlController();
        $content = [
            "base_url" => $this->CTRL->server->base_url(),
            "title" => "PNK ADVOCATES | CONTACT US"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('contacts', $content));
		$this->render(view('includes/footer', $content));
	}

	public function legalTeam() {
		$this->CTRL = new BlController();
        $content = [
            "base_url" => $this->CTRL->server->base_url(),
            "title" => "PNK ADVOCATES | LEGAL TEAM"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('legal-team', $content));
		$this->render(view('includes/footer', $content));
	}

	
	public function about() {
		$this->CTRL = new BlController();
        $content = [
            "base_url" => $this->CTRL->server->base_url(),
            "title" => "PNK ADVOCATES | ABOUT PNK ADVOCATES"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('about-firm', $content));
		$this->render(view('includes/footer', $content));
	}

	public function sendMessage() {
		$this->CTRL = new BlController();
		if ($this->CTRL->server->isPost()) {
			$name = $this->CTRL->input->post('name');
			$email = $this->CTRL->input->post('email');
			$message = $this->CTRL->input->post('message');
			$to = "info@pnkadvocates.ug";
			$subject = "MESSAGE FROM WEBSITE";
			$from = strtoupper($name). "<$email>";
		
			if (!empty(trim($name)) && !empty(trim($email)) && !empty(trim($message)) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$this->CTRL->mail->send($to, $subject, $message, "PNK PA", $from);
			}else {
				echo $this->CTRL->notification->info("All fields are quired");
			}
		}
	}

	public function privacyPolicy()
	{
        $this->CTRL = new BlController();
        $content = [
            "base_url" => $this->CTRL->server->base_url(),
            "title" => "PNK ADVOCATES | PRACTICE AREAS"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('privacy-policy', $content));
		$this->render(view('includes/footer', $content));
	}

	public function auth() {
        $this->CTRL = new BlController();
        $auth = new AuthModel();
	    $user_id = $this->CTRL->input->post('student_no');
	    $password = $this->CTRL->input->post('password');
	    $reg_prefix1 = $this->generate_reg_no($user_id);
	    $reg_prefix2 = $this->generate_reg_no($user_id)."/PS";
	    $reg_prefix3 = $this->generate_reg_no($user_id)."/EVE";
	    $reg_no = (object) array(
	        "prefix1" => $reg_prefix1,
            "prefix2" => $reg_prefix2,
            "prefix3" => $reg_prefix3
        );
	    $response = $auth->auth_user($user_id, $password, $reg_no);
	    if ($response['status'] == "Authenticated") {
	        $student_data = (object) $response;
	        $session_data = array(
	            'user' => $user_id,
	            "studentNumber" => $user_id,
                "registrationNumber" => $student_data->reg,
                "logged_in" => true
            );
	        $this->session->set($session_data);
            echo  json_encode($response);
        }else {
	        echo json_encode($response);
        }
    }

}
