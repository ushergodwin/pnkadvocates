<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\AuthModel;
use BlController;
class Home extends BaseController
{
    protected $ctrl;

	public function index()
	{
        $this->ctrl = new BlController();
        $content = [
            "base_url" => $this->ctrl->server->base_url(),
            "title" => "PNK ADVOCATES"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('includes/slider'));
		$this->render(view('welcome', $content));
		$this->render(view('includes/footer', $content));
	}

	public function practiceAreas()
	{
        $this->ctrl = new BlController();
        $content = [
            "base_url" => $this->ctrl->server->base_url(),
            "title" => "PNK ADVOCATES | PRACTICE AREAS"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('practice-areas', $content));
		$this->render(view('includes/footer', $content));
	}

	public function intellectualPropertyLaw() {
		$this->ctrl = new BlController();
        $content = [
            "base_url" => $this->ctrl->server->base_url(),
            "title" => "PNK ADVOCATES | Intellectual Property Law"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('intellectual-property-law', $content));
		$this->render(view('includes/footer', $content));
	}

	public function employmentAndLabour() {
		$this->ctrl = new BlController();
        $content = [
            "base_url" => $this->ctrl->server->base_url(),
            "title" => "PNK ADVOCATES | EMPLOYMENT AND LABOUR"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('employment-and-labour', $content));
		$this->render(view('includes/footer', $content));
	}

	public function commercialLaw() {
		$this->ctrl = new BlController();
        $content = [
            "base_url" => $this->ctrl->server->base_url(),
            "title" => "PNK ADVOCATES | GUN CRIMES"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('commercial-law', $content));
		$this->render(view('includes/footer', $content));
	}

	public function litigationAndArbitration() {
		$this->ctrl = new BlController();
        $content = [
            "base_url" => $this->ctrl->server->base_url(),
            "title" => "PNK ADVOCATES | LITIGATION AND ARBITRATION"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('litigation-and-arbitration', $content));
		$this->render(view('includes/footer', $content));
	}

	public function oilAndGasLaw() {
		$this->ctrl = new BlController();
        $content = [
            "base_url" => $this->ctrl->server->base_url(),
            "title" => "PNK ADVOCATES | OIL AND GAS"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('oil-and-gas-law', $content));
		$this->render(view('includes/footer', $content));
	}

	public function realEstateAndConveyancing() {
		$this->ctrl = new BlController();
        $content = [
            "base_url" => $this->ctrl->server->base_url(),
            "title" => "PNK ADVOCATES | REAL ESTATE AND CONVEYANCING"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('real-estate-and-conveyancing', $content));
		$this->render(view('includes/footer', $content));
	}

	public function taxAdvisory() {
		$this->ctrl = new BlController();
        $content = [
            "base_url" => $this->ctrl->server->base_url(),
            "title" => "PNK ADVOCATES | TAX ADVISORY"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('tax-advisory', $content));
		$this->render(view('includes/footer', $content));
	}

	public function contactUs() {
		$this->ctrl = new BlController();
        $content = [
            "base_url" => $this->ctrl->server->base_url(),
            "title" => "PNK ADVOCATES | CONTACT US"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('contacts', $content));
		$this->render(view('includes/footer', $content));
	}

	public function legalTeam() {
		$this->ctrl = new BlController();
		$admin = new AdminModel();

        $content = [
            "base_url" => $this->ctrl->server->base_url(),
            "title" => "PNK ADVOCATES | LEGAL TEAM",
			"staff"  => $admin->getStaffMembers()
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('legal-team', $content));
		$this->render(view('includes/footer', $content));
	}

	
	public function about() {
		$this->ctrl = new BlController();
        $content = [
            "base_url" => $this->ctrl->server->base_url(),
            "title" => "PNK ADVOCATES | ABOUT PNK ADVOCATES"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('about-firm', $content));
		$this->render(view('includes/footer', $content));
	}

	public function sendMessage() {
		$this->ctrl = new BlController();
		if ($this->ctrl->server->isPost()) {
			$name = $this->ctrl->input->post('name');
			$email = $this->ctrl->input->post('email');
			$message = $this->ctrl->input->post('message');
			$to = "info@pnkadvocates.co.ug";
			$subject = "MESSAGE FROM WEBSITE";
			$from = strtoupper($name). "<$email>";
		
			if (!empty(trim($name)) && !empty(trim($email)) && !empty(trim($message)) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$this->ctrl->mail->send($to, $subject, $message, "PNK ADVOCATES", $from);
			}else {
				echo $this->ctrl->notification->info("All fields are quired");
			}
		}
	}

	public function privacyPolicy()
	{
        $this->ctrl = new BlController();
        $content = [
            "base_url" => $this->ctrl->server->base_url(),
            "title" => "PNK ADVOCATES | PRACTICE AREAS"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('privacy-policy', $content));
		$this->render(view('includes/footer', $content));
	}

}
