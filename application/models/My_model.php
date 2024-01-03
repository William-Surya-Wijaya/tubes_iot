<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_model extends CI_Model {

    public function getListData() {
    // Dapatkan id_percobaan terbesar
        $query_max_id = $this->db->query("SELECT MAX(id) AS max_id FROM dataPercobaan");
        $id_percobaan = $query_max_id->row()->max_id;

        // Ambil data dari tabel emgData dengan filter id_percobaan terbesar
        $this->db->where('id_percobaan', $id_percobaan);
        $query = $this->db->get('emgData');

        return $query->result_array();
}

public function getEmgDataWithExerciseAndMuscle() {

        $this->db->select('exercise, muscle, timestamp, AVG(emg_value) as rata_rata');
        $this->db->from('dataPercobaan');
        $this->db->join('emgData', 'dataPercobaan.id = emgData.id_percobaan');
        $this->db->join('exercise', 'exercise.id_exercise = emgData.id_exercise');
        $this->db->join('muscle', 'muscle.id_muscle = emgData.id_muscle');
        $this->db->group_by(['emgData.id_percobaan', 'exercise', 'muscle']);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertSensorData($value, $session) {
        $data = array(
            'id_exercise' => $session['id_exercise'],
            'id_percobaan' => $session['id_percobaan'],
            'id_muscle' => $session['id_muscle'],
            'emg_value' => $value['emgValue'],
            'emg_time' => $value['emgTime']
        );

        $this->db->insert('emgData', $data);

        return ($this->db->affected_rows() > 0);
    }

    /* Manual
    public function fetchMuscleData() {
        $query = $this->db->get('exercise');
        return $query->result_array();
    }

    public function fetchExerciseData() {
        
        $query = $this->db->get('muscle');
        return $query->result_array();
    }
    */
    public function insertDataPercobaan(){
        	$data = array(
        		'timestamp' => date('Y-m-d H:i:s')
        	);
        $this->db->insert('dataPercobaan', $data);
    }
    public function insertDataSementara($session){
            	$data = array(
            		'id_exercise' => $session['exercise'],
            		'id_muscle' => $session['muscle'],
            	);
            $this->db->insert('sementara', $data);
    }
    public function deletePercobaan(){
        $this->db->empty_table('dataPercobaan');

    }
    public function deleteSementara(){
        $this->db->empty_table('sementara');

    }
    public function deleteEmgData(){
    $this->db->empty_table('emgData');

    }
  

}
