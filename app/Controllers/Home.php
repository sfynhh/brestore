<?php

namespace App\Controllers;

//load model database yang akan digunakan yaitu akun
use App\Models\UserModel;


class Home extends BaseController
{
	public function __construct()
    {
		session_start();
        //load kelas UserModel
        $this->usermodel = new UserModel();
        $this->email = \Config\Services::email();

    }

	public function index()
	{   $_SESSION['user']='boot';
		//return view('welcome_message');
		echo view('dashboard');
	}
	public function login(){
		echo view('login');
	}

	public function ceklogin()
	{

		 if (! $this->validate(
                        [
                            'emailuser' => 'required',
                            'pass' => 'required',
                        ],
                                [   // Errors
                                    'emailuser' => [
                                        'required' => 'E-mail tidak boleh kosong',
                                    ],
                                    'pass'=>[
                                        'required' => 'Password tidak boleh kosong'
                                    ]
                                ]
                    )
            ){
                //kirim data error ke views, karena ada isian yang tidak sesuai rules
                $data['validation']=$this->validator;
                echo view('login', $data);

            }else{
               		$hasil1 = $this->usermodel->cekUsernamePwd();
               		$hasil2 = $this->usermodel->cekUsernamePwdbyEmail();

					//iterasi hasil query
					foreach ($hasil1 as $row)
					{
						$jml1 = $row->jml;
					}
					foreach ($hasil2 as $row)
					{
						$jml2 = $row->jml;
					}
					
					
					//nilai jml adalah 1 menunjukkan bahwa pasangan username dan password cocok
					if($jml1>0 || $jml2>0)
					{	
						//update last login
						$hasil = $this->usermodel->updatelastlogin();

						//dapatkan waktu last login
						//ciptakan sesi untuk user
						$_SESSION['user'] = $_POST['emailuser'];
						echo view('dashboard');
					}else
					{
						//jika tidak sama maka dikembalikan ke ceklogin
						$data['pesan1'] = 'Username dan password tidak sesuai';
						return view('login', $data);
					}
		 
            }
			
	}

	public function sendemail(){
		$this->email->setFrom('sofyanhady81@gmail.com','sofyanhady');	
		$this->email->setTo('sofyanhady1803@gmail.com');
		$this->email->setSubject('permintaan maaf');
		$this->email->setMessage('<h1>ayang akuuuuu</h1><p>jangan marah marah mulu cantikk, i love you</p>');
		if (!$this->email->send()) {
			echo "gagal";
			return false;
			}else{
			echo "berhasil";
			return true;
		}
	}

	//destroy session ketika logout
	public function logout()
	{
        //$this->session->destroy();
		session_destroy();
		return redirect()->to(base_url('home')); 
	}

	public function lupapassword()
	{
		echo view("lupapasword");
	}

	public function lupapaswordproses()
	{
		$validation =  \Config\Services::validation();
		if (!$this->validate(
				[
					'email' => 'required|valid_email'
				],
					[
						'email' => [
                                        'required' => 'E-mail tidak boleh kosong',
                                        'valid_email'=> 'E-mail tidak tepat'
                                    ]
					]
			)) {
			$data['validation']=$this->validator;
                // echo "gagal";
            echo view('lupapasword', $data);
		}else{
			$hasil=$this->usermodel->cekemail();
			foreach ($hasil as $value) {
				$jml = $value->jml;
				$username =$value->username;
			}
			if ($jml>0) {
				$data['username']= $username;
				echo view("gantipassword", $data);
			}else{
				$data['pesan']="E-mail Tidak Terdaftar";
				echo view("lupapasword", $data);
			}
		}
	}

	public function gantipaswordproses()
	{	$validation =  \Config\Services::validation();
		if (!$this->validate(
				[
					'pass' => 'required',
                    're_pass' => 'required|matches[pass]'

				],
					[
						'pass'=>[
                                 'required' => 'Password tidak boleh kosong'
                                 ],
                     	're_pass'=>[
                     	    'required' => 'Harap Konfirmasi Password',
                     	    'matches' => 'Konfirmasi Pasword Salah'
                     	]
					]
			)){
				$data['validation']=$this->validator;
                // echo "gagal";
            	echo view('gantipassword', $data);
			 }else{
			 	$update = $this->usermodel->updatepassword();
			 	echo view("login");
			 }
	}

}
