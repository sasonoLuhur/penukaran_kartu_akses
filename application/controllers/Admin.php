<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		// cek login
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'welcome?pesan=belumlogin');
		}
	}

	function index(){
		$data['pengunjung'] = $this->db->query("SELECT* FROM pengunjung WHERE tanggal = CURDATE();")->result();
		$user_role = $this->session->userdata('role');
		if ($user_role==2) {
			$this->load->view('admin/index_manager',$data);
		}else{
			$this->load->view('admin/index',$data);

		}

	}	

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'welcome?pesan=logout');
	}

	function ganti_password(){
		$this->load->view('admin/header');
		$this->load->view('admin/ganti_password');
		$this->load->view('admin/footer');
	}	

	function ganti_password_act(){
		$pass_baru = $this->input->post('pass_baru');
		$ulang_pass = $this->input->post('ulang_pass');				
		$this->form_validation->set_rules('pass_baru','Password Baru','required|matches[ulang_pass]');
		$this->form_validation->set_rules('ulang_pass','Ulangi Password Baru','required');

		if($this->form_validation->run() != false){
			$data = array(
				'admin_password' => md5($pass_baru)
			);
			$w = array(
				'admin_id' => $this->session->userdata('id')
			);			
			$this->m_kartu->update_data($w,$data,'admin');			
			redirect(base_url().'admin/ganti_password?pesan=berhasil');						
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/ganti_password');
			$this->load->view('admin/footer');
		}
	}	
	

	function list_aktivasi_kartu(){
		$data['pengunjung'] = $this->db->query("SELECT* FROM pengunjung WHERE status = 1;")->result();
		// $this->load->view('admin/header');
		$this->load->view('admin/aktivasi_kartu',$data);
		// $this->load->view('admin/footer');
	}

	function pengunjung_hapus($id){				
		$where = array(
			'pengunjung_id' => $id		
		);
		$this->m_kartu->delete_data($where,'pengunjung');		
		redirect(base_url().'admin/list_aktivasi_kartu');
	}

	function mobil_add(){		
		$this->load->view('admin/header');
		$this->load->view('admin/mobil_add');
		$this->load->view('admin/footer');
	}
	function pengunjung_registrasi(){	
		//$this->load->view('admin/header');
		$data['tujuan'] = $this->m_kartu->get_data('tujuan')->result();
		$this->load->view('admin/pengunjung_registrasi',$data);
		//$this->load->view('admin/footer');
	}
	function pengunjung_edit($id){				
		$where = array(
			'pengunjung_id' => $id		
		);
		$data['pengunjung'] = $this->m_kartu->edit_data($where,'pengunjung')->result();		
		// $this->load->view('admin/header');
		//$this->load->view('admin/pengunjung_edit');	
		// $this->load->view('admin/footer');
		$data['tujuan'] = $this->m_kartu->get_data('tujuan')->result();
		$this->load->view('admin/pengunjung_edit',$data);

	}

	function pengunjung_registrasi_add_act(){		
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$nomor_hp = $this->input->post('nomor_hp');
		$nomor_ktp = $this->input->post('nomor_ktp');
		$tanggal = $this->input->post('tanggal');
		$keterangan = $this->input->post('keterangan');
		$tujuan_id = $this->input->post('tujuan_id');


			$data = array(
				'nama' => $nama,
				'alamat' => $alamat,			
				'jenis_kelamin' => $jenis_kelamin,			
				'nomor_hp' => $nomor_hp,			
				'nomor_ktp' => $nomor_ktp,
				'keterangan' => $keterangan,
				'tanggal' => $tanggal,
				'status' => '1',
				'tujuan_id'=>$tujuan_id,
			);
			$this->m_kartu->insert_data($data,'pengunjung');
			redirect(base_url().'admin');

	}

	function pengunjung_aktivasi($id){		
			$where = array(
				'pengunjung_id' => $id		
			);
			$data = array(
				'status' => '2'
			);
			$this->m_kartu->update_data($where,$data,'pengunjung');
			redirect(base_url().'admin/list_aktivasi_kartu');
		
	}
	function pengunjung_deaktivasi($id){		
		$where = array(
			'pengunjung_id' => $id		
		);
		$data = array(
			'status' => '3'
		);
		$this->m_kartu->update_data($where,$data,'pengunjung');
		redirect(base_url().'admin/list_deaktivasi_kartu');
	
}
	//pengunjung_update
	function pengunjung_update(){		
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$nomor_ktp = $this->input->post('nomor_ktp');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$alamat = $this->input->post('alamat');
		$nomor_hp = $this->input->post('nomor_hp');
		$keterangan = $this->input->post('keterangan');
		$status = $this->input->post('status');
		$tanggal = $this->input->post('tanggal');

			$where = array(
				'pengunjung_id' => $id		
			);
			$data = array(
				'pengunjung_id' => $id,
				'nama' => $nama,			
				'jenis_kelamin' => $jenis_kelamin,			
				'alamat' => $alamat,			
				'nomor_hp' => $nomor_hp,
				'keterangan' => $keterangan,
				'status' => $status,
				'tanggal' => $tanggal
			);
			$this->m_kartu->update_data($where,$data,'pengunjung');
			redirect(base_url().'admin');	
	
	}

	function data_laporan_tamu(){
		$data['laporan'] = $this->db->query("select * from pengunjung,tujuan where pengunjung.tujuan_id=tujuan.tujuan_id")->result();		
		$this->load->view('admin/laporan_tamu',$data);
	}
	//deaktivasi 

	function list_deaktivasi_kartu(){
		$data['pengunjung'] = $this->db->query("SELECT* FROM pengunjung WHERE status = 2;")->result();
		$this->load->view('admin/deaktivasi_kartu',$data);
	}

	
	function mobil_add_act(){		
		$merk = $this->input->post('merk');
		$plat = $this->input->post('plat');
		$warna = $this->input->post('warna');
		$tahun = $this->input->post('tahun');
		$status = $this->input->post('status');
		$this->form_validation->set_rules('merk','Merk Mobil','required');
		$this->form_validation->set_rules('status','Status Mobil','required');

		if($this->form_validation->run() != false){
			$data = array(
				'mobil_merk' => $merk,
				'mobil_plat' => $plat,			
				'mobil_warna' => $warna,			
				'mobil_tahun' => $tahun,			
				'mobil_status' => $status
			);
			$this->m_kartu->insert_data($data,'mobil');
			redirect(base_url().'admin/mobil');
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/mobil_add');
			$this->load->view('admin/footer');
		}
	}





	// LAPORAN
	function laporan(){					
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');		
		$this->form_validation->set_rules('dari','Dari Tanggal','required');		
		$this->form_validation->set_rules('sampai','Sampai Tanggal','required');		

		if($this->form_validation->run() != false){					
			$data['laporan'] = $this->db->query("select * from transaksi,mobil,kostumer where transaksi_mobil=mobil_id and transaksi_kostumer=kostumer_id and date(transaksi_tgl) >= '$dari'")->result();								
			$this->load->view('admin/header');
			$this->load->view('admin/laporan_filter',$data);
			$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/laporan');
			$this->load->view('admin/footer');		
		}		
	}

	function laporan_print(){					
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');		
		
		if($dari != "" && $sampai != ""){					
			$data['laporan'] = $this->db->query("select * from transaksi,mobil,kostumer where transaksi_mobil=mobil_id and transaksi_kostumer=kostumer_id and date(transaksi_tgl) >= '$dari'")->result();											
			$this->load->view('admin/laporan_print',$data);			
		}else{
			redirect("admin/laporan");	
		}		
	}

	function laporan_pdf(){
		$this->load->library('dompdf_gen');	
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');		
			
		$data['laporan'] = $this->db->query("select * from transaksi,mobil,kostumer where transaksi_mobil=mobil_id and transaksi_kostumer=kostumer_id and date(transaksi_tgl) >= '$dari'")->result();											
		$this->load->view('admin/laporan_pdf', $data);

        	$paper_size  = 'A4'; // ukuran kertas
		$orientation = 'landscape'; //tipe format kertas potrait atau landscape
		$html = $this->output->get_output();

		$this->dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan.pdf", array('Attachment'=>0)); // nama file pdf yang di hasilkan

	}

}