<?php 

/**
 * Component Model
 * @category  Model
 */
class ComponentsController extends BaseController{
	
	/**
     * getcount_jumlahpegawai Model Action
     * @return Value
     */
	function getcount_jumlahpegawai(){
		$db = $this->GetModel();
		$sqltext="SELECT COUNT(*) AS num FROM data_pribadi";
		$arr=$db->rawQueryValue($sqltext);
		
		render_json($arr[0]) ;
	}

	/**
     * getcount_jumlahguru Model Action
     * @return Value
     */
	function getcount_jumlahguru(){
		$db = $this->GetModel();
		$sqltext="SELECT COUNT(*) AS num FROM user";
		$arr=$db->rawQueryValue($sqltext);
		
		render_json($arr[0]) ;
	}

	/**
     * getcount_jumlahtu Model Action
     * @return Value
     */
	function getcount_jumlahtu(){
		$db = $this->GetModel();
		$sqltext="SELECT COUNT(*) AS num FROM user";
		$arr=$db->rawQueryValue($sqltext);
		
		render_json($arr[0]) ;
	}

}
