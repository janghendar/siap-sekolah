<?php 
/**
 * Data_Pribadi Page Controller
 * @category  Controller
 */
class Data_PribadiController extends SecureController{
	/**
     * Load Record Action 
     * $arg1 Field Name
     * $arg2 Field Value 
     * $param $arg1 string
     * $param $arg1 string
     * @return View
     */
	function index($fieldname = null , $fieldvalue = null){
		$db = $this->GetModel();
		$fields = array('id', 	'nama', 	'nip', 	'nuptk', 	'jenis_kelamin');
		$limit = $this->get_page_limit(MAX_RECORD_COUNT); // return pagination from BaseModel Class e.g array(5,20)
		if(!empty($this->search)){
			$text=$this->search;
			$db->orWhere('id',"%$text%",'LIKE');
			$db->orWhere('nama',"%$text%",'LIKE');
			$db->orWhere('nik',"%$text%",'LIKE');
			$db->orWhere('nip',"%$text%",'LIKE');
			$db->orWhere('nuptk',"%$text%",'LIKE');
			$db->orWhere('nrg',"%$text%",'LIKE');
			$db->orWhere('tempat_lahir',"%$text%",'LIKE');
			$db->orWhere('tgl_lahir',"%$text%",'LIKE');
			$db->orWhere('jenis_kelamin',"%$text%",'LIKE');
			$db->orWhere('status_kawin',"%$text%",'LIKE');
			$db->orWhere('agama',"%$text%",'LIKE');
			$db->orWhere('status_pegawai',"%$text%",'LIKE');
			$db->orWhere('tmt',"%$text%",'LIKE');
			$db->orWhere('kedudukan_pegawai',"%$text%",'LIKE');
			$db->orWhere('pendidikan_akhir',"%$text%",'LIKE');
			$db->orWhere('tahun_pendidikan',"%$text%",'LIKE');
			$db->orWhere('masa_kerja',"%$text%",'LIKE');
			$db->orWhere('golongan',"%$text%",'LIKE');
			$db->orWhere('gaji_pokok',"%$text%",'LIKE');
			$db->orWhere('no_karpeg',"%$text%",'LIKE');
			$db->orWhere('no_askes',"%$text%",'LIKE');
			$db->orWhere('npwp',"%$text%",'LIKE');
			$db->orWhere('gol_darah',"%$text%",'LIKE');
			$db->orWhere('alamat_ktp',"%$text%",'LIKE');
			$db->orWhere('alamat_domisili',"%$text%",'LIKE');
			$db->orWhere('u_id',"%$text%",'LIKE');
			$db->orWhere('foto',"%$text%",'LIKE');
		}
		if(!empty($this->orderby)){
			$db->orderBy($this->orderby,$this->ordertype);
		}
		else{
			$db->orderBy('id', ORDER_TYPE);
		}
		$allowed_roles = array ('administrator');
		if(!in_array(strtolower(USER_ROLE) , $allowed_roles)){
			$db->where("u_id" , USER_ID );
			$db->orWhere("u_id" , USER_ID );
		}
		if( !empty($fieldname) ){
			$db->where($fieldname , urldecode($fieldvalue));
		}
		//page filter command
		$tc = $db->withTotalCount();
		$records = $db->get('data_pribadi', $limit, $fields);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = count($records);
		$data->total_records = intval($tc->totalCount);
		render_json($data);
	}
	/**
     * View Record Action 
     * @return View
     */
	function view( $rec_id = null , $value = null){
		$db = $this->GetModel();
		$fields = array( 'id', 	'foto', 	'nama', 	'nik', 	'nip', 	'nuptk', 	'nrg', 	'tempat_lahir', 	'tgl_lahir', 	'jenis_kelamin', 	'status_kawin', 	'agama', 	'status_pegawai', 	'tmt', 	'kedudukan_pegawai', 	'pendidikan_akhir', 	'tahun_pendidikan', 	'masa_kerja', 	'golongan', 	'gaji_pokok', 	'no_karpeg', 	'no_askes', 	'npwp', 	'gol_darah', 	'alamat_ktp', 	'alamat_domisili' );
		$allowed_roles = array ('administrator');
		if(!in_array(strtolower(USER_ROLE) , $allowed_roles)){
			$db->where("u_id" , USER_ID );
			$db->orWhere("u_id" , USER_ID );
		}
		if( !empty($value) ){
			$db->where($rec_id, urldecode($value));
		}
		else{
			$db->where('id' , $rec_id);
		}
		$record = $db->getOne( 'data_pribadi', $fields );
		if(!empty($record)){
			render_json($record);
		}
		else{
			if($db->getLastError()){
				render_error($db->getLastError());
			}
			else{
				render_error("Record not found",404);
			}
		}
	}
	/**
     * Add New Record Action 
     * If Not $_POST Request, Display Add Record Form View
     * @return View
     */
	function add(){
		if(is_post_request()){
			$modeldata=transform_request_data($_POST);
			$rules_array = array(
				'nama' => 'required',
				'nik' => 'numeric',
				'nip' => 'numeric',
				'nuptk' => 'numeric',
				'nrg' => 'numeric',
				'gaji_pokok' => 'numeric',
				'no_karpeg' => 'numeric',
				'no_askes' => 'numeric',
				'npwp' => 'numeric',
			);
			$is_valid = GUMP::is_valid($modeldata, $rules_array);
			if($is_valid != true) {
				render_error($is_valid);
			}
			$db = $this->GetModel();
			$rec_id = $db->insert('data_pribadi',$modeldata);
			if(!empty($rec_id)){
				render_json($rec_id);
			}
			else{
				if($db->getLastError()){
					render_error($db->getLastError());
				}
				else{
					render_error("Error inserting record");
				}
			}
		}
		else{
			render_error("Invalid request");
		}
	}
	/**
     * Edit Record Action 
     * If Not $_POST Request, Display Edit Record Form View
     * @return View
     */
	function edit($rec_id=null){
		$db = $this->GetModel();
		if(is_post_request()){
			$modeldata=transform_request_data($_POST);
		$allowed_roles = array ('administrator');
		if(!in_array(strtolower(USER_ROLE) , $allowed_roles)){
			$db->where("u_id" , USER_ID );
			$db->orWhere("u_id" , USER_ID );
		}
			$db->where('id' , $rec_id);
			$bool = $db->update('data_pribadi',$modeldata);
			if($bool){
				render_json($rec_id);
			}
			else{
				render_error($db->getLastError());
			}
			return null;
		}
		else{
			$fields=array('id','foto','nama','nik','nip','nuptk','nrg','tempat_lahir','tgl_lahir','jenis_kelamin','status_kawin','agama','status_pegawai','tmt','kedudukan_pegawai','pendidikan_akhir','tahun_pendidikan','masa_kerja','golongan','gaji_pokok','no_karpeg','no_askes','npwp','gol_darah','alamat_ktp','alamat_domisili');
		$allowed_roles = array ('administrator');
		if(!in_array(strtolower(USER_ROLE) , $allowed_roles)){
			$db->where("u_id" , USER_ID );
			$db->orWhere("u_id" , USER_ID );
		}
		$db->where('id' , $rec_id);
			$data = $db->getOne('data_pribadi',$fields);
			if(!empty($data)){
				render_json($data);
			}
			else{
				if($db->getLastError()){
					render_error($db->getLastError());
				}
				else{
					render_error("Record not found",404);
				}
			}
		}
	}
	/**
     * Delete Record Action 
     * @return View
     */
	function delete( $rec_ids = null ){
		$db = $this->GetModel();
		$arr_id = explode( ',', $rec_ids );
		foreach( $arr_id as $rec_id ){
			$db->where('id' , $rec_id,"=",'OR');
		}
		$allowed_roles = array ('administrator');
		if(!in_array(strtolower(USER_ROLE) , $allowed_roles)){
			$db->where("u_id" , USER_ID );
			$db->orWhere("u_id" , USER_ID );
		}
		$bool = $db->delete( 'data_pribadi' );
		if($bool){
			render_json( $bool );
		}
		else{
			if($db->getLastError()){
				render_error($db->getLastError());
			}
			else{
				render_error("Error deleting the record. please make sure that the record exit");
			}
		}
	}
}
