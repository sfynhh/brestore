<?php

namespace App\Controllers;

//load model database yang akan digunakan yaitu akun
use App\Models\Registrasimodel;
use CodeIgniter\HTTP\IncomingRequest;
/**
 * @property IncomingRequest $request;
 */


class Registrasi extends BaseController
{
	public function __construct()
    {
		session_start();
        //load kelas UserModel
        $this->registrasimodel = new Registrasimodel();
         $this->email = \Config\Services::email();
    }

	public function index()
	{  
        $data['provinsi']=$this->registrasimodel->getprovinsi();
       
          echo view('register', $data);
        
		
	}
	public function process(){
		$validation =  \Config\Services::validation();
            //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
            if (! $this->validate(
                        [
                            'email' => 'required|valid_email|is_unique[pembeli.email]',
                            'notlp' => 'required|is_unique[pembeli.no_telp, user.no_tlp]',
                            'tgllahir' => 'required',
                            'pass' => 'required',
                            're_pass' => 'required|matches[pass]',
                            'jenis_kel'=> 'alpha_space',
                            'prov'=> 'min_length[2]',
                            'kabkot'=> 'min_length[2]',
                            'kec'=> 'min_length[2]',
                            'kelurahan'=> 'min_length[2]',
                            'kodepos'=>'required',
                            'detailalamat'=> 'required|min_length[13]'
                
                        ],
                                [   // Errors
                                    'email' => [
                                        'required' => 'E-mail tidak boleh kosong',
                                        'valid_email'=> 'E-mail tidak tepat',
                                        'is_unique'=>'E-mail Sudah terdaftar'
                                    ],
                                    'notlp' => [
                                        'required' => 'No Telepon tidak boleh kosong',
                                        'is_unique'=>'no telepon Sudah terdaftar'
                                    ],
                                    'tgllahir'=>[
                                        'required' => 'Tanggal Lahir tidak boleh kosong'
                                    ],
                                    'pass'=>[
                                        'required' => 'Password tidak boleh kosong'
                                    ],
                                    're_pass'=>[
                                        'required' => 'Harap Konfirmasi Password',
                                        'matches' => 'Konfirmasi Pasword Salah'
                                    ],
                                    'jenis_kel' =>[
                                        'alpha_space'=>'Pilih Jenis Kelamin'
                                    ],
                                    'prov' =>[
                                        'min_length'=>'Pilih Provinsi'
                                    ],
                                    'kabkot' =>[
                                        'min_length'=>'Pilih Kabupaten atau Kota'
                                    ],
                                    'kec' =>[
                                        'min_length'=>'Pilih Kecamatan'
                                    ],
                                    'kelurahan' =>[
                                        'min_length'=>'Pilih Desa'
                                    ],
                                    'kodepos' =>[
                                        'required'=> 'Kode Pos Tidak Boleh Kosong'
                                    ],
                                    'detailalamat'=>[
                                        'required'=>'alamat tidak boleh kosong',
                                        'min_length'=> 'Detail Alamat Kurang Lengkap'
                                    ]
                                ]
                    )){
                //kirim data error ke views, karena ada isian yang tidak sesuai rules
                $data['provinsi']=$this->registrasimodel->getprovinsi();                
                $data['validation']=$this->validator;
                // echo "gagal";
                echo view('register', $data);

            }else{
                //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                //panggil metod dari kosan model untuk diinputkan datanya
                 $idpem = $this->registrasimodel->getidpem();
                 $idkode= $this->registrasimodel->getidkode();
                 foreach ($idpem as $value) {
                     $idpembeli= $value->idpembeli;
                 }
                 foreach ($idkode as $value) {
                     $idkode=$value->idkode+1;
                 }
                 $username=explode("@", $_POST['email']);
                 $prov=explode("|", $_POST['prov']);
                 $kabkot=explode("|", $_POST['kabkot']);
                 $kec=explode("|", $_POST['kec']);
                 $desa=explode("|", $_POST['kelurahan']);
                 $idpembeli=$idpembeli+1;
                 $kodeaktivasi=$idkode.date("is");
                 $_SESSION['idkode']=$idkode;
                 $_SESSION['idpem']=$idpembeli;
                 $_SESSION['email']=$_POST['email'];
                 $_SESSION['notlp']=$_POST['notlp'];
                 $_SESSION['tgllahir']=$_POST['tgllahir'];
                 $_SESSION['pass']=$_POST['pass'];
                 $_SESSION['username']=$username[0];
                 
                 $_SESSION['jenis_kel']=$_POST['jenis_kel'];
                 $_SESSION['kodepos']=$_POST['kodepos'];
                 $_SESSION['detail']=$_POST['detailalamat'];
                 $_SESSION['prov']=$prov[1];
                 $_SESSION['kabkot']=$kabkot[1];
                 $_SESSION['kec']=$kec[1];
                 $_SESSION['desa']=$desa[1];


                 // echo $desa[1];
                 // $inputpem = $this->registrasimodel->inputpembeli($idpembeli);
                 //  $inputuser = $this->registrasimodel->inputuser($idpembeli,$username[0]);
                // return redirect()->to(base_url('Registrasi/aktivasiakun')); 
                //echo $_SESSION['kodeaktivasi']."//".$idpembeli."//".$kodeaktivasi;
                  return redirect()->to(base_url('Registrasi/sendemailregistrasi/')); 
            }
	}

    public function sendemailregistrasi(){
        $_SESSION['kodeaktivasi']=$_SESSION['idkode'].date("is");
        $this->email->setFrom('sofyanhady81@gmail.com','sofyanhady');   
        $this->email->setTo($_SESSION['email']);
        $this->email->setSubject('Kode Aktivasi akun Bre Store');
        $this->email->setMessage('<div style="width : 60%; color:black;"><h2 style="text-align:center; color:black; ">Bre Store</h2>
                                    <p style="position: relative;top:-20px;font-size:14px;text-align:center; color:black;">Gaya Tidak Harus Mahal</p>
                                    <hr>
                                    <p style="color:black;">Hallo '.$_SESSION['username'].',</p>
                                    <p style="color:black;">Terimkasih sudah bergabung dan menjadi costumer bre store</p>
                                    <p style="color:black;">Proses Registrasi sebentar lagi selesai! Silahkan Verifikasi Akun anda dengan memasukan kode aktifasi dibawah ini </p><br>
                                    <p style="color:black;"><strong style="text-align:center;">Kode Verifikasi : '.$_SESSION['kodeaktivasi'].'</strong></p><br>
                                    <p style="color:black;">Salam Hangat,</p>
                                    <p style="color:black;">Bre Store</p>
                                    <hr>');
        if (!$this->email->send()) {
            // echo "gagal";
             ?>
                <script type="text/javascript">
                   alert("email tidak terkirim");
                </script>
             <?php
             return redirect()->to(base_url('Registrasi')); 
            }else{
                 ?>
                 <script type="text/javascript">
                   alert("kode sudah dikirim melalui email anda");
                 </script>
               
             <?php
            // echo "berhasil";
             $cekkode=$this->registrasimodel->cekkodeaktivasi($_SESSION['idpem']);
             foreach ($cekkode as $value) {
                 $hasil = $value->jml;
             }

             if ($hasil==0) {
                 $inputkode=$this->registrasimodel->inputkodeaktivasi($_SESSION['idkode'], $_SESSION['kodeaktivasi'], $_SESSION['idpem']);
             }else if ($hasil>=0){
                $updatekode=$this->registrasimodel->updatekodeaktiv($_SESSION['kodeaktivasi'], $_SESSION['idpem']);
             }
                
                $data['email']=$_SESSION['email'];
                $data['username']=$_SESSION['username'];
                $data['kodeaktivasi']=$_SESSION['kodeaktivasi'];
                echo view('aktivasikode', $data);
            }
    }
    public function sendemailsucces(){
        $this->email->setFrom('sofyanhady81@gmail.com','sofyanhady');   
        $this->email->setTo($_SESSION['email']);
        $this->email->setSubject('Kode Aktivasi akun Bre Store');
        $this->email->setMessage('<div style="width : 60%; color:black;"><h2 style="text-align:center; color:black; ">Bre Store</h2>
                                    <p style="position: relative;top:-20px;font-size:14px;text-align:center; color:black;">Gaya Tidak Harus Mahal</p>
                                    <hr>
                                    <p style="color:black;">Hallo '.$_SESSION['username'].',</p>
                                    <p style="color:black;">Terimkasih sudah bergabung dan menjadi costumer bre store</p>
                                    <p style="color:black;">Proses Registrasi Telah Berhasil, Login dengan username dan pasword dibawah ini </p><br>
                                    <p style="color:black;"><strong style="text-align:center;">Username : '.$_SESSION['username'].'</strong></p>
                                    <p style="color:black;"><strong style="text-align:center;">Pasword  : '.$_SESSION['pass'].'</strong></p>
                                    <br>
                                    <p style="color:black;">Salam Hangat,</p>
                                    <p style="color:black;">Bre Store</p>
                                    <hr>');
        if (!$this->email->send()) {
            // echo "gagal";
             ?>
                <script type="text/javascript">
                   alert("akun gagal dibuat");
                </script>
             <?php
             return redirect()->to(base_url('Registrasi')); 
            }else{
                 ?>
                 <script type="text/javascript">
                   alert("akun berhasil dibuat");
                 </script>
               
             <?php
            // echo "berhasil";
                $data['pesan2']='Akun Berhasil Dibuat, Silahkan Cek email untuk melihat Username dan pasword';
                        // return redirect()->to(base_url('Home/login'));
                echo view('login', $data);
            }
        }

    public function aktivasiakun(){
        //di cek dulu, agar validasi tidak terpicu pada saat awal method ini diakses
        if( !isset($_POST['kode'])){
            //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
            $data['email']=$_SESSION['email'];
            $data['username']=$_SESSION['username'];
            $data['kodeaktivasi']=$_SESSION['kodeaktivasi'];
           echo view('aktivasikode', $data);
        }
        else{
            $validation =  \Config\Services::validation();
            //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
            if (! $this->validate(
                        [
                            'kode' => 'required|numeric',
                        ],
                                [   // Errors
                                    'kode' => [
                                        'required' => 'Kode tidak boleh kosong',
                                        'numeric' => 'Kode harus angka',
                                    ]
                                ]
                    )
            ){
                $data['email']=$_SESSION['email'];
                $data['username']=$_SESSION['username'];
                $data['kodeaktivasi']=$_SESSION['kodeaktivasi'];                
                $data['validation']=$this->validator;
                //kirim data error ke views, karena ada isian yang tidak sesuai rules
                echo view('aktivasikode', $data);

            }else{
                //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                //panggil metod dari kosan model untuk diinputkan datanya
                    $aktivasi = $this->registrasimodel->getkodeaktivasi($_SESSION['idkode']);
                    // print_r($aktivasi);
                    // echo $_SESSION['idpem'];
                    foreach ($aktivasi as $value) {
                        $kodeaktiv=$value->kode;
                        $status   =$value->status;
                    }
                    if ($_POST['kode']==$kodeaktiv && $status==0) {
                        $inputpem = $this->registrasimodel->inputpembeli($_SESSION['idpem'], $_SESSION['email'], $_SESSION['notlp'], $_SESSION['tgllahir'], $_SESSION['jenis_kel']);
                        $inputuser = $this->registrasimodel->inputuser($_SESSION['idpem'],$_SESSION['username'], $_SESSION['pass'], $_SESSION['notlp']);
                        $inputalamat=$this->registrasimodel->inputalamat($_SESSION['prov'], $_SESSION['kabkot'], $_SESSION['kec'], $_SESSION['desa'], $_SESSION['kodepos'], $_SESSION['detail'], $_SESSION['idpem']);
                        $updatekode=$this->registrasimodel->updatekodeaktivasi($_SESSION['idpem']);
                        return redirect()->to(base_url('Registrasi/sendemailsucces/'));
                        // $data['pesan']='Akun Berhasil Dibuat, Silahkan Cek email untuk melihat Username dan pasword';
                        // return redirect()->to(base_url('Home/login'));

                    }else{
                    $data['email']=$_SESSION['email'];
                    $data['username']=$_SESSION['username'];
                    $data['kodeaktivasi']=$_SESSION['kodeaktivasi'];
                    $data['pesan']='Maaf, Kode Aktifasi Salah!';
                    echo view('aktivasikode', $data); }
            }
        }

            
    }
   
   public function ambilkota(){
    $idprov=$this->request->getVar('id_prov');
    $data=$this->registrasimodel->getkabkot($idprov);
    echo json_encode($data);
   }

   public function ambilkecamatan(){
    $idkabkot=$this->request->getVar('id_kabkot');
    $data=$this->registrasimodel->getkecamatan($idkabkot);
    echo json_encode($data);
   }

   public function ambildesa(){
    $idkec=$this->request->getVar('id_kec');
    $data=$this->registrasimodel->getdesa($idkec);
    echo json_encode($data);
   }
    
 
}
?>