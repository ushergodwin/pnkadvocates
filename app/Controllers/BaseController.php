<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];
    protected $session;
    protected $render;

    /**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
        $this->session = \Config\Services::session();
	}

	public function render($view) {
	    echo $view;
    }

    /**
     * @param string $student_no The student number to convert to registration number
     * @return string
     */
    public function generate_reg_no(string $student_no) {
        $first_notch = substr($student_no, 0, 2);
        $second_notch = substr($student_no, 5, 5);
        if (strpos($student_no, '700') !== false) {
            $second_notch = substr($student_no, 7, 3);
        }
        return $first_notch . "/U/".$second_notch;
    }
}
