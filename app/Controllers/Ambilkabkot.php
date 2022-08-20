<?php

namespace App\Controllers;

//load model database yang akan digunakan yaitu akun
use App\Models\Registrasimodel;


class Ambilkabkot extends BaseController
{
	 public function index(){
        $propinsi = $_GET['propinsi'];
        $kota = $this->registrasimodel->getkabkot($propinsi);
        echo "<option>-- Pilih Kabupaten/Kota --</option>";
        foreach ($variable as $value) {
            echo "<option value=".$value->city_id.'|'.$value->city_name.">".$value->city_name."<option>";
        }
        
    }
}