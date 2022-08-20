<?php

namespace App\Models;

use CodeIgniter\Model;

class Registrasimodel extends Model
{
	protected $table='pembeli';

	public function inputpembeli($idpembeli, $email, $notlp, $tgl, $jenis_kel){
		$tgllahir = substr($tgl,0,10);
		$sql="INSERT INTO pembeli SET  id_pembeli=?, email=?, no_telp=?, tgl_lahir=?,jenis_kelamin=?";
		return $query=$this->db->query($sql, array($idpembeli, $email, $notlp, $tgllahir,$jenis_kel));
	}
	public function inputalamat($prov, $kabkot, $kec, $desa, $kodepos,$detail, $idpembeli){
		$sql="INSERT INTO alamat set provinsi=?, kabupatenkota=?, kecamatan=?, desa=?, kodepos=?,detail=?, id_pembeli=?";
		return $query=$this->db->query($sql, array($prov, $kabkot, $kec, $desa, $kodepos,$detail, $idpembeli));
	}
	public function getidpem(){
		$sql="SELECT max(id_pembeli) as idpembeli FROM pembeli";
		return $query= $this->db->query($sql)->getResult();
	}
	public function inputuser($idpembeli, $username, $pwd, $notlp){
		$kategoriuser='pembeli';
		$pwd1=md5($pwd);
		$sql="INSERT INTO user SET no_tlp=?, username=?, pwd=?, katgori_user=?, last_login= now(), id_pembeli=?";
		return $query=$this->db->query($sql, array($notlp, $username, $pwd1, $kategoriuser, $idpembeli));
	}
	public function getidkode(){
		$sql="SELECT ifnull(max(id_kode),0) as idkode FROM kodeaktivasi";
		return $query=$this->db->query($sql)->getResult();
	}
	public function inputkodeaktivasi($idkode, $kode,$iduser){
		$sql="INSERT INTO kodeaktivasi set id_kode=?, kode=?, status=0, id_user=?";
		return $query=$this->db->query($sql, array($idkode,$kode,$iduser));
	}
	public function getkodeaktivasi($idpem){
		$sql="SELECT * from kodeaktivasi where id_user=?";
		return $query=$this->db->query($sql, array($idpem))->getResult();
	}

	public function cekkodeaktivasi($kode)
	{
		$sql="SELECT COUNT(*) as jml FROM kodeaktivasi where id_user=?";
		return $query=$this->db->query($sql,array($kode))->getResult();
	}

	public function updatekodeaktivasi($iduser){
		$sql="UPDATE kodeaktivasi set status=1 where id_user=?";
		return $query=$this->db->query($sql, array($iduser));
	}
	public function updatekodeaktiv($kodeaktiv, $iduser){
		$sql="UPDATE kodeaktivasi set kode=? where id_user=?";
		return $query=$this->db->query($sql, array($kodeaktiv, $iduser));
	}
	public function getprovinsi(){
		$sql="SELECT * from provinces order by prov_name asc";
		return $query=$this->db->query($sql)->getResult();
	}
	public function getkabkot($provid){
		$sql="SELECT * from cities where prov_id=? order by city_name asc";
		return $query=$this->db->query($sql, array($provid))->getResult();
	}
	public function getkecamatan($idkabkot){
		$sql="SELECT * from districts where city_id=? order by dis_name asc";
		return $query=$this->db->query($sql, array($idkabkot))->getResult();
	}
	public function getdesa($idkec){
		$sql="SELECT * from subdistricts where dis_id=? order by subdis_name asc";
		return $query=$this->db->query($sql, array($idkec))->getResult();
	}
}?>