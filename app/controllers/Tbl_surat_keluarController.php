<?php 
/**
 * Tbl_surat_keluar Page Controller
 * @category  Controller
 */
class Tbl_surat_keluarController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "tbl_surat_keluar";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("no_surat", 
			"tgl_surat", 
			"perihal", 
			"sifat", 
			"lampiran", 
			"kode_instansi", 
			"no_surat_masuk", 
			"file", 
			"date_created", 
			"date_updated");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				tbl_surat_keluar.no_surat LIKE ? OR 
				tbl_surat_keluar.tgl_surat LIKE ? OR 
				tbl_surat_keluar.perihal LIKE ? OR 
				tbl_surat_keluar.sifat LIKE ? OR 
				tbl_surat_keluar.lampiran LIKE ? OR 
				tbl_surat_keluar.kode_instansi LIKE ? OR 
				tbl_surat_keluar.no_surat_masuk LIKE ? OR 
				tbl_surat_keluar.file LIKE ? OR 
				tbl_surat_keluar.date_created LIKE ? OR 
				tbl_surat_keluar.date_updated LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "tbl_surat_keluar/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("tbl_surat_keluar.no_surat", ORDER_TYPE);
		}
		$db->where("tbl_surat_keluar.no_surat", get_active_user('id_pengguna') );
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Tbl Surat Keluar";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("tbl_surat_keluar/list.php", $data); //render the full page
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("no_surat", 
			"tgl_surat", 
			"perihal", 
			"sifat", 
			"lampiran", 
			"kode_instansi", 
			"no_surat_masuk", 
			"file", 
			"date_created", 
			"date_updated");
		$db->where("tbl_surat_keluar.no_surat", get_active_user('id_pengguna') );
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("tbl_surat_keluar.no_surat", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$this->write_to_log("view", "true");
			$page_title = $this->view->page_title = "View  Tbl Surat Keluar";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("tbl_surat_keluar/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("tgl_surat","perihal","sifat","lampiran","kode_instansi","no_surat_masuk","file");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'tgl_surat' => 'required',
				'perihal' => 'required',
				'sifat' => 'required',
				'lampiran' => 'required|numeric',
				'kode_instansi' => 'required',
				'no_surat_masuk' => 'required',
				'file' => 'required',
			);
			$this->sanitize_array = array(
				'tgl_surat' => 'sanitize_string',
				'perihal' => 'sanitize_string',
				'sifat' => 'sanitize_string',
				'lampiran' => 'sanitize_string',
				'kode_instansi' => 'sanitize_string',
				'no_surat_masuk' => 'sanitize_string',
				'file' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['date_created'] = datetime_now();
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->write_to_log("add", "true");
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("tbl_surat_keluar");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Tbl Surat Keluar";
		$this->render_view("tbl_surat_keluar/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("no_surat","tgl_surat","perihal","sifat","lampiran","kode_instansi","no_surat_masuk","file");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'tgl_surat' => 'required',
				'perihal' => 'required',
				'sifat' => 'required',
				'lampiran' => 'required|numeric',
				'kode_instansi' => 'required',
				'no_surat_masuk' => 'required',
				'file' => 'required',
			);
			$this->sanitize_array = array(
				'tgl_surat' => 'sanitize_string',
				'perihal' => 'sanitize_string',
				'sifat' => 'sanitize_string',
				'lampiran' => 'sanitize_string',
				'kode_instansi' => 'sanitize_string',
				'no_surat_masuk' => 'sanitize_string',
				'file' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['date_updated'] = datetime_now();
			if($this->validated()){
		$db->where("tbl_surat_keluar.no_surat", get_active_user('id_pengguna') );
				$db->where("tbl_surat_keluar.no_surat", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->write_to_log("edit", "true");
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("tbl_surat_keluar");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("tbl_surat_keluar");
					}
				}
			}
		}
		$db->where("tbl_surat_keluar.no_surat", get_active_user('id_pengguna') );$db->where("tbl_surat_keluar.no_surat", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Surat Keluar";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("tbl_surat_keluar/edit.php", $data);
	}
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		//editable fields
		$fields = $this->fields = array("no_surat","tgl_surat","perihal","sifat","lampiran","kode_instansi","no_surat_masuk","file");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'tgl_surat' => 'required',
				'perihal' => 'required',
				'sifat' => 'required',
				'lampiran' => 'required|numeric',
				'kode_instansi' => 'required',
				'no_surat_masuk' => 'required',
				'file' => 'required',
			);
			$this->sanitize_array = array(
				'tgl_surat' => 'sanitize_string',
				'perihal' => 'sanitize_string',
				'sifat' => 'sanitize_string',
				'lampiran' => 'sanitize_string',
				'kode_instansi' => 'sanitize_string',
				'no_surat_masuk' => 'sanitize_string',
				'file' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['date_updated'] = datetime_now();
			if($this->validated()){
		$db->where("tbl_surat_keluar.no_surat", get_active_user('id_pengguna') );
				$db->where("tbl_surat_keluar.no_surat", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					$this->write_to_log("edit", "true");
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("tbl_surat_keluar.no_surat", $arr_rec_id, "in");
		$db->where("tbl_surat_keluar.no_surat", get_active_user('id_pengguna') );
		$bool = $db->delete($tablename);
		if($bool){
			$this->write_to_log("delete", "true");
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("tbl_surat_keluar");
	}
}
