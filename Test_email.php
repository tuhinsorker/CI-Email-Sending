<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
| __________________________________________________________________
|               CODEIGNITER SIMPLE EMAIL SENDER
| __________________________________________________________________
|				developed by MD. TUHIN SARKER
| 			    email <sourav.tuhinsorker92@gmail.com>
| __________________________________________________________________
*/

class Test_email extends CI_Controller 
{


	public function __construct()
	{
		parent::__construct();

	}

	public function index(){
	    
		$this->load->library('email_lib');
 		$respons = $this->email_lib->send(array(
		     'to'       => 'tuhinsorker92@gmail.com', 
		     'subject'  => 'Test Subject', 
		     'template' => 'Hello %x%', 
		     'template_config' => array('x'=>'Hello Md Tuhin Sarker')
		));
	
	}


	//Send email via SMTP server in CodeIgniter
	public function send(){

		//Load email library
		$this->load->library('email');
		//SMTP & mail configuration
		$config = array(
		    'protocol'  => 'smtp',
		    'smtp_host' => 'smtp.1and1.com',
		    'smtp_port' => 25,
		    'smtp_user' => 'test@liyeplimal.net',
		    'smtp_pass' => 'Abc123!@',
		    'mailtype'  => 'html',
		    'charset'   => 'utf-8'
		);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

		//Email content
		$htmlContent = '<h1>Sending email via SMTP server</h1>';
		$htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';

		$this->email->to('tuhinsorker@gmail.com');
		$this->email->from('test@liyeplimal.net','MyWebsite');
		$this->email->subject('Test Email');
		$this->email->message($htmlContent);
		//Send email
		$this->email->send();
	}


	//Send email via Gmail SMTP server in CodeIgniter
	public function send_email(){
		
		//Load email library
		$this->load->library('email');
		//SMTP & mail configuration
		$config = array(
		    'protocol'  => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'workbd60@gmail.com',
		    'smtp_pass' => 'Work#Bd123',
		    'mailtype'  => 'html',
		    'charset'   => 'utf-8'
		);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		//Email content
		$htmlContent = '<h1>Sending email via SMTP server</h1>';
		$htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';

		$this->email->to('tuhinsorker@gmail.com');
		$this->email->from('workbd60@gmail.com','TestMail');
		$this->email->subject('CodeIgniter');
		$this->email->message($htmlContent);

		//Send email
		if($this->email->send()){
			echo "succssfull";

		}else{
			echo 'Email Not send';
		}

	}	

}