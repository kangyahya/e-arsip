<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * tbl_users_user_role_id_option_list Model Action
     * @return array
     */
	function tbl_users_user_role_id_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT role_id AS value, role_name AS label FROM roles";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * tbl_users_username_value_exist Model Action
     * @return array
     */
	function tbl_users_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("tbl_users");
		return $exist;
	}

	/**
     * tbl_users_email_value_exist Model Action
     * @return array
     */
	function tbl_users_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("tbl_users");
		return $exist;
	}

	/**
     * tbl_surat_keluar_kode_instansi_option_list Model Action
     * @return array
     */
	function tbl_surat_keluar_kode_instansi_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT kode_instansi AS value,nama_instansi AS label FROM tbl_instansi ORDER BY kode_instansi ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * tbl_surat_keluar_no_surat_masuk_option_list Model Action
     * @return array
     */
	function tbl_surat_keluar_no_surat_masuk_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT no_surat AS value,no_surat AS label FROM tbl_surat_masuk ORDER BY tgl_diterima ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * tbl_surat_masuk_kode_instansi_option_list Model Action
     * @return array
     */
	function tbl_surat_masuk_kode_instansi_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT kode_instansi AS value,nama_instansi AS label FROM tbl_instansi ORDER BY kode_instansi ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * getcount_users Model Action
     * @return Value
     */
	function getcount_users(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM tbl_users";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_instansi Model Action
     * @return Value
     */
	function getcount_instansi(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM tbl_instansi";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_suratmasuk Model Action
     * @return Value
     */
	function getcount_suratmasuk(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM tbl_surat_masuk";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_suratkeluar Model Action
     * @return Value
     */
	function getcount_suratkeluar(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM tbl_surat_keluar";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
	* piechart_suratmasuk Model Action
	* @return array
	*/
	function piechart_suratmasuk(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "Select * FROM tbl_surat_masuk";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'perihal');
		$dataset_labels =  array_column($dataset1, 'perihal');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
	* doughnutchart_suratkeluar Model Action
	* @return array
	*/
	function doughnutchart_suratkeluar(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT * FROM tbl_surat_keluar";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'perihal');
		$dataset_labels =  array_column($dataset1, 'perihal');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

}
