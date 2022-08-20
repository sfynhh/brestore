<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';

    public function cekUsernamePwd(){
        //bind variabel untuk mencegah sql injection
        $uname = $_POST['emailuser'];
        $pwd = $_POST['pass'];
        $dbResult = $this->db->query("SELECT COUNT(*) as jml FROM user JOIN pembeli on user.id_pembeli=pembeli.id_pembeli  
        WHERE username = ? AND pwd = ?", array($uname, md5($pwd)));
        return $dbResult->getResult();
    }
    public function cekUsernamePwdbyEmail(){
        //bind variabel untuk mencegah sql injection
        $uname = $_POST['emailuser'];
        $pwd = $_POST['pass'];
        $dbResult = $this->db->query("SELECT COUNT(*) as jml FROM user JOIN pembeli on user.id_pembeli=pembeli.id_pembeli  
        WHERE email = ? AND pwd = ?", array($uname, md5($pwd)));
        return $dbResult->getResult();
    }

    //untuk update last login ketika berhasil login
    public function updatelastlogin(){
        $uname = $_POST['emailuser'];
        $hasil = $this->db->query("UPDATE user SET last_login = now() WHERE username = ?", array($uname));
        return $hasil;
    }

    //untuk mendapatkan last login
    public function getlastlogin($uname){
        $dbResult = $this->db->query("SELECT last_login FROM user WHERE username = ? ", array($uname));
        return $dbResult->getResult();
        
    }

    public function cekemail()
    {
        $sql="SELECT COUNT(email) as jml, username from pembeli join user on (pembeli.id_pembeli=user.id_pembeli) WHERE email=?";
        return $result=$this->db->query($sql, array($_POST['email']))->getResult();
    }
    public function updatepassword()
    {
        $sql="UPDATE user set pwd =? where username = ? ";
        $query= $this->db->query($sql, array(md5($_POST['re_pass']), $_POST['username']));
        return $query;
    }
}