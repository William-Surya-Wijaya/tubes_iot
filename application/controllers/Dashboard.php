<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct() {
        parent::__construct();
		

        // Load the model in the constructor
        $this->load->model('My_model');
		//jika session tidak ada arahkan ke Auth
		if(!$this->session->userdata('username')){
			redirect('auth');
		}
    }
	

	public function index()
	{
		$dataList = $this->My_model->getListData();
		//Buat dapet data excercise lengkap
		$dataListLengkap = $this->My_model->getEmgDataWithExerciseAndMuscle();
		$data['dataList'] = $dataList;
		$data['dataListLengkap'] = $dataListLengkap;
		$this->load->view('dashboard',$data);
	}
	//Saat proses
	public function proses(){
		$dataList = $this->My_model->getListData();
		//Buat dapet data excercise lengkap
		$dataListLengkap = $this->My_model->getEmgDataWithExerciseAndMuscle();
		$data['dataList'] = $dataList;
		$data['dataListLengkap'] = $dataListLengkap;
		$this->load->view('dashboard2',$data);
	}
	//ambil data update Emg dengan sangat update

	
	public function getEmgData() {
        try {
            $this->load->model('My_model');

            $arraydata = $this->My_model->getListData();

            header('Content-Type: application/json');

            $json = json_encode($arraydata);
            if ($json === false) {
                throw new Exception(json_last_error_msg());
            }

            echo $json;
        } catch (Exception $e) {
            // Handle the exception, log it, or return an error response
            echo json_encode(['error' => $e->getMessage()]);
        }
    }


	public function editFetchFlag($value) {
        $this->load->helper('file');

        // Specify the path to the file
        $file_path =  FCPATH . 'fetch_flag.txt';

        // Write the value to the file
        write_file($file_path, $value);
    }
	public function inputDataLatihan(){
		//Start and input
		
		$session['exercise'] = $this->input->post('exercise');
		$session['muscle'] = $this->input->post('muscle');
		//input ke insertdatasementara
		$this->My_model->insertDataSementara($session);
		$this->editFetchFlag("start");
		//input data ke tabel dataPercobaan timestamp
		$this->My_model->insertDataPercobaan();
		redirect('Dashboard/proses');
		
	}
	public function selesai(){
		$this->editFetchFlag("stop");
		redirect('dashboard');
	}
	public function getDataFromArduino(){
		$value['emgValue'] = $this->input->post('emgValue');
        $value['emgTime'] = $this->input->post('emgTime');
		//ambil id_user dari session
		$session['id_user'] = $this->session->userdata('id_user');
		$query = $this->db->query("SELECT MAX(id) AS max_id FROM dataPercobaan");
		$session['id_percobaan'] = $query->row()->max_id;
		$query = $this->db->query("SELECT id_exercise, id_muscle FROM sementara ORDER BY id DESC LIMIT 1");
		$session['id_exercise'] = $query->row()->id_exercise;
		$session['id_muscle'] = $query->row()->id_muscle;
		$this->My_model->insertSensorData($value,$session);
	}

	public function hapus(){
        $this->My_model->deletePercobaan();
        $this->My_model->deleteSementara();
        $this->My_model->deleteEmgData();
        redirect('dashboard');
    }
	
}
