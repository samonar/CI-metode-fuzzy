<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Fuzy extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('Fuzy_model'));
		$this->load->library(array('form_validation','image_lib','template','session'));
		$this->load->helper(array('form', 'url', 'html'));	
		$this->load->library('upload');

    }

    function index()
	{	$result=$this->Fuzy_model->read();
		
		foreach ($result as $key ) {
			$id=$key->id;
			$IPK=$key->IPK;
			$hadir=$key->hadir;
			$masalah=$key->masalah;
			


			$hitung=$this->Fuzy_model->count();
		
	$ipk_rendah=$this->ipk_rendah($IPK);
	$ipk_sedang=$this->ipk_sedang($IPK);
	$ipk_tinggi=$this->ipk_tinggi($IPK);
	$hadir_kurang=$this->hadir_kurang($hadir);
	$hadir_cukup=$this->hadir_cukup($hadir);
	$hadir_tertib=$this->hadir_tertib($hadir);
	$ipk=0;
	$hadir;

		// cek tabel
	if ( !empty($ipk_rendah) && !empty($hadir_kurang)) {
		$telat1=min($ipk_rendah,$hadir_kurang);
	}else{
		$telat1=0;
	}	
	if( !empty($ipk_rendah) && !empty($hadir_cukup)) {
		$telat2=min($ipk_rendah,$hadir_cukup);
	}else{
		$telat2=0;
	}
	if( !empty($ipk_rendah) && !empty($hadir_tertib)) {
		$telat3=min($ipk_rendah,$hadir_tertib);
	}else{
		$telat3=0;
	}
	if( !empty($ipk_sedang) && !empty($hadir_kurang)) {
		$telat4=min($ipk_sedang,$hadir_kurang);
	}else{
		$telat4=0;
	}
	if( !empty($ipk_sedang) && !empty($hadir_cukup)) {
		$normal1=min($ipk_sedang,$hadir_cukup);
	}else{
		$normal1=0;
	}
	if( !empty($ipk_sedang) && !empty($hadir_tertib)) {
		$tepat1=min($ipk_sedang,$hadir_tertib);
	}else{
		$tepat1=0;
	}
	if( !empty($ipk_tinggi) && !empty($hadir_kurang)) {
		$normal2=min($ipk_tinggi,$hadir_kurang);
	}else{
		$normal2=0;
	}
	if( !empty($ipk_tinggi) && !empty($hadir_cukup)) {
		$normal3=min($ipk_tinggi,$hadir_cukup);
	}else{
		$normal3=0;
	}
	if( !empty($ipk_tinggi) && !empty($hadir_tertib)) {
		$tepat2=min($ipk_tinggi,$hadir_tertib);
	}else{
		$tepat2=0;
	}


	// cari maks (or telat)
	$finalTelat=max($telat1,$telat2,$telat3,$telat4);
	$finalNormal=max($normal1,$normal2,$normal3);
	$finalTepat=max($tepat1,$tepat2);

	// defuzifikasi dengan metode
	$finalZ[]=(((5.35+5.55+5.75+5.95+6.15+6.35+6.55+6.75+6.95) * $finalTelat)
	+($finalNormal*(3.85+4.05+4.25+4.45+4.65+4.85+5.05+5.25+4.55)
	+($finalTepat * (3.65+3.55+3.45+3.35+3.25+3.15+3.05+2.95))))
	/(($finalTelat*9)+($finalNormal*8)+($finalTepat*8));


	
	}
	
		
		$data=array(
            'action'            =>'data_camaba/create_action',
			'title'	        	=> 'Tambah Camaba',
			'list_mahasiswa'	=> $result,
			'hasil'				=>$finalZ,
		);
		
		$this->template->display('admin/list_camaba',$data);
	}

	
	function ipk_rendah($IPK){
		if ($IPK<=2) 	{
			$ipk_rendah=1;
		} elseif(2<= $IPK && $IPK<=2.5) {
			$ipk_rendah=(2.5-$IPK)/(2.5-2);
		}elseif($IPK>=2.5) {
			$ipk_rendah=0;
		}
		return $ipk_rendah;
	}
	function ipk_sedang($IPK){
		if ($IPK<=2 or $IPK>=3.5 ) {
			$ipk_sedang=0;
		} elseif(2<= $IPK && $IPK<=3) {
			$ipk_sedang=($IPK-2)/(3-2);
		}elseif(3<= $IPK && $IPK<=3) {
			$ipk_sedang=(3-$IPK)/(3-2);
		}
		return $ipk_sedang;
	}
	function ipk_tinggi($IPK){
		if ($IPK<=3 or $IPK>=4) {
			$ipk_tinggi=0;
		} elseif(3<= $IPK && $IPK<=3.5) {
			$ipk_tinggi=($IPK-3)/(3.5-3);
		}else {
			$ipk_tinggi=1;
		}
		return $ipk_tinggi;
	}
	function hadir_kurang($hadir){
		if ($hadir>=75) {
			$hadir_kurang=0;
		} elseif(70< $hadir && $hadir <=75) {
			$hadir_kurang=-($hadir-75)/(75-70);
		}elseif(0<= $hadir && $hadir<=70) {
			$hadir_kurang=1;
		}
		return $hadir_kurang;
	}
	function hadir_cukup($hadir){
		if ($hadir<=70 or $hadir>=85) {
			$hadir_cukup=0;
		} elseif(70< $hadir && $hadir <75) {
			$hadir_cukup=($hadir-70)/(75-70);
		}elseif(75<= $hadir && $hadir<=80) {
			$hadir_cukup=1;
		}elseif(80<$hadir && $hadir<=85){
			$hadir_cukup=-($hadir-85)/(85-80);
		}
		return $hadir_cukup;
	}
	function hadir_tertib($hadir){
		if ($hadir<=80) {
			$hadir_tertib=0;
		} elseif(80< $hadir && $hadir <90) {
			$hadir_tertib=($hadir-80)/(90-80);
		}elseif(90<= $hadir && $hadir<=100) {
			$hadir_tertib=1;
		}
		return $hadir_tertib;
	}

	function masalah_dikit($masalah){
		if ($masalah>=4) {
			$masalah_dikit=0;
		} elseif(3< $masalah && $masalah <=4) {
			$masalah_dikit=-($masalah-4)/(4-3);
		}elseif(0<= $masalah && $masalah<=3) {
			$masalah_dikit=1;
		}
		return $masalah_dikit;
	}
	function masalah_cukup($masalah){
		if (3>=$masalah or $masalah>=7) {
			$masalah_cukup=0;
		} elseif(3< $masalah && $masalah <4) {
			$masalah_cukup=($masalah-3)/(4-3);
		}elseif(4<= $masalah && $masalah<=6) {
			$masalah_cukup=1;
		}elseif(6<$masalah && $masalah<=7){
			$masalah_cukup=-($masalah-7)/(7-6);
		}
		return $masalah_cukup;
	}

	function masalah_banyak($masalah){
		if($masalah<=6){
			$masalah_banyak=0;
		}elseif (6<$masalah && $masalah<7) {
			$masalah_banyak=($masalah-6)/(7-6);
		}elseif (7<=$masalah && $masalah<=10) {
			$masalah_banyak=1;
		}
		return $masalah_banyak;
	}

	
	//function fuzy habis
	function create(){
		$data=array(
            'action'            =>'data_camaba/create_action',
            'title'	        => 'Tambah Camaba',
		);
		$this->template->display('admin/form_mahasiswa',$data);
	}
	
	function create_action()
	{
		$data=array(
			'nama' 		=> $this->input->post('nama'),
			'NIM'      			=> $this->input->post('nim'),
            'IPK'		    	=> $this->input->post('ipk'),
			'hadir'		    => $this->input->post('hadir'),
		);
        $this->Fuzy_model->insert($data);	

		$this->session->set_flashdata('message', 'Tambah DAta Sukses');
        redirect(site_url('fuzy'));
    }
    public function detail_penilaianKelengkapan($id){
		$datamaba=$this->Camaba_model->searchById($id);
		$listKelengkapan=$this->Atribut_model->search_ByIdCamaba($id);
		// print_r($listpresensi);
		$data=array(
            'action'            =>'data_camaba/update',
			'title'		   		=>'Kelengkapan Camaba',
			'id_camaba'			=>$datamaba->id_camaba,
			'nama'				=> $datamaba->nama_camaba,
            'nim'		 		=> $datamaba->nim,
			'prodi'		    	=> $datamaba->prodi,
			'pleton'		    => $datamaba->nama_pleton,
			'foto'				=> $datamaba->foto,
			'list_kelengkapan'		=> $listKelengkapan,
		);
		$this->template->display('admin/penilaian_kelengkapan/form_camaba',$data);
	}
	
	function update($idAtribut,$idCamaba){
		$datamaba=$this->Camaba_model->searchById($idCamaba);
		$dataKelengkapan=$this->Atribut_model->search_ByIdKelengkapan($idAtribut);
		($listKelengkapan=$this->Atribut_model->readAtribut());
		$data=array(
            'action'            =>'penilaian_kelengkapan/update_action',
			'title'		    	=>'Kelengkapan Maba',
			'id_camaba'			=>$datamaba->id_camaba,
			'nama'				=> $datamaba->nama_camaba,
            'nim'		 		=> $datamaba->nim,
			'prodi'		    	=> $datamaba->prodi,
			'pleton'		    => $datamaba->nama_pleton,
			'foto'				=> $datamaba->foto,
			'data_kelengkapan'	=> $dataKelengkapan,
			'listKelengkapan' => $listKelengkapan,
			
		);
		$this->template->display('admin/penilaian_kelengkapan/form_update',$data);
	}

    function update_action($id_kelengkapan,$id_camaba)
	{
        $data=array(
            'waktu' 					=> date("Y-m-d H:i", strtotime($this->input->post('datetime'))),
			'id_atribut_kelengkapan'	=> $this->input->post('id_atribut_kelengkapan'),
			
           
		);
		$this->Kelengkapan_model->update($data,$id_kelengkapan);	
		$this->session->set_flashdata('message', 'Update Kelengkapan Sukses');
        redirect(site_url('penilaian_kelengkapan/detail_penilaianKelengkapan/'.$id_camaba));
    }

    function delete($id){	
		if (!null==$id) {
			$row=$this->Fuzy_model->delete($id);
            $this->session->set_flashdata('message', 'Delete data Sukses');
            redirect(site_url('fuzy'));
        } else {
            $this->session->set_flashdata('message', 'Record Data Camaba Found');
            redirect(site_url('fuzy'));
        }
	}
}
?>