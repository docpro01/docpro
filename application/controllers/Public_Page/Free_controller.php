<?php

class Free_controller extends MY_Controller{
	
	function __construct(){
		parent::__construct('fragments_public/master_layout');
	}
	
	public function index(){
		return $this->load->view($this->layout, ['header_css' => 'fragments_public/css/free', 'content' => 'fragments_public/pages/free', 'footer_js' => 'fragments_public/js/free']);
	}

	public function subscribe(){
		$username = $this->generatePassword(rand(8,10));
		$password = $this->generatePassword(rand(8,12));

		$registrant_name 	= $this->input->post('registrant_name');
		$p_lname 			= trim(explode(',', $registrant_name)[0], ' ');
		$chunk 				= explode(' ', explode(',', $registrant_name)[1]);
		$p_mname 			= trim($chunk[count($chunk)-1], ' ');
		$p_fname			= trim(explode(',', $registrant_name)[1], $p_mname);
		// $p_exp_name = explode('. ', $registrant_name);
		// $p_lname = (is_array($p_exp_name) && count($p_exp_name) > 0 ) ? explode('. ', $registrant_name)[0]: $p_exp_name;
		// $first_middle = explode(' ', str_replace($p_lname, '', $registrant_name));
		// $p_mname = (is_array($first_middle ) && count($first_middle) === 3) ? $first_middle[count($first_middle)-2] : '';
		// $p_fname = (is_array($first_middle ) && count($first_middle) > 2) ? $first_middle[count($first_middle)-3] : '';

		$profile = [
						'p_fname' => $p_fname,
						'p_mname' => $p_mname,
						'p_lname' => $p_lname,
						'p_cno'	  => $this->input->post('registrant_cp_no'),
						'p_email' => $this->input->post('registrant_email'),
					];

		$company = [
						'cb_name' 		=> $this->input->post('company'),
						'cb_ind_name' 	=> $this->input->post('owner_name'),
						'name' 			=> ($this->input->post('company') === '') ? $this->input->post('owner_name') : $this->input->post('company'),
						'cb_address'	=> $this->input->post('company_address'),
						'cb_class' 		=> 'company',
						'cb_bp_type'	=> ($this->input->post('company') === '') ? 'Individual' : 'Non-Individual',
						'cb_cno'		=> $this->input->post('company_cp_no'),
						'cb_email'		=> $this->input->post('company_email')
					];

		$user = [
					'u_name' => $username,
					'u_pass' => $password,
					'u_type' => 'Super Admin',
					'u_company' => 'company',
					'subs_type' => 'free',
					'subs_exp_date' => date('Y-m-d', strtotime(date('Y-m-d')."+30 day")),
					'setup' => '1'
				];

		$registrant = [
						'cor_name' => $this->input->post('registrant_name'),
						'cor_no'   => $this->input->post('registrant_cp_no'),
						'cor_email' => $this->input->post('registrant_email')
					];

		Subscribe_Model::save($company, $profile, $user, $registrant);

		$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
		    			<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
		    			<title>Your account is ready!</title>
					</head>
					<body>
						<div style="width: 70%; border: 1.5px solid rgb(221, 221, 221); padding: 15px 30px; margin: 0 auto; font-family: Arial, Verdana, Helvetica, sans-serif;">
							<div>
								<img class="logo" src="http://docpro.tk/assets/img/250x250.png" style="width: 180px; margin: 0 auto; display: table">
							</div>
							<p style="font-size: 15px;">Hello '.$registrant_name.',</p>
							<br></br>
							<p style="font-size: 15px;">Congratulations, you have successfully subscribed to DocPro Accounting and Bookkeeping System.</p>
							<br></br>
							<p style="font-weight: bold; font-size: 16px;">Your Account!</p>
							<p style="font-size: 15px;">Username: <span style="font-size: 12px;">'.$username.'</span></p>
							<p style="font-size: 15px;">Password: <span style="font-size: 12px;">'.$password.'</span></p>
							<br></br>
							<a href="http://testdocpro.tk/login" style="padding: 15px 20px; text-transform: uppercase; font-size: 18px; text-align: center; line-height: 22px; background-color: rgb(26, 173, 85); color: #FFF; text-decoration: none; width: 190px; display: block; margin: 0 auto;">Setup my Account</a>
							<br></br>
						</div>
					</body>
				</html>';

		$result = $this->email
		        ->from('docpro_admin@docpro.tk', 'DOCPro Business Solution')
		        ->to($this->input->post('registrant_email'))
		        ->subject('Your account is ready!')
		        ->message($body)
		        ->send();

       	if ($result) {
       		redirect('success');
       	}else{
       		var_dump($result);
			exit;
       	}
		
	}

	private function generatePassword($length = 8) {
	    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	    $count = mb_strlen($chars);

	    for ($i = 0, $result = ''; $i < $length; $i++) {
	        $index = rand(0, $count - 1);
	        $result .= mb_substr($chars, $index, 1);
	    }

	    return $result;
	}
}