<?php
	/**
	 * Role Based Access Control
	 * @category  RBAC Helper
	 */
	defined('ROOT') OR exit('No direct script access allowed');
	class PageAccessManager{
		/**
	     * Array of user roles and page access 
	     * Use "*" to grant all access right to particular user role
	     * @return Html View
	     */
		public static $usersRolePermissions=array(
			'administrator' =>
						array(
							'data_pribadi' => array('list','view','add','edit','delete'),
							'final_doc' => array('list','view','add','edit','delete'),
							'keluarga' => array('list','view','add','edit','delete'),
							'kepegawaian' => array('list','view','add','edit','delete'),
							'kinerja_prestasi' => array('list','view','add','edit','delete'),
							'pendidikan' => array('list','view','add','edit','delete'),
							'user' => array('list','view','add','edit','delete')
						),
		
			'user' =>
						array(
							'data_pribadi' => array('list','view','add','edit'),
							'pendidikan' => array('list','view','add','edit')
						)
		);
		
		/**
	     * pages to exclude from access validation check
	     * @var $excludePageCheck array()
	     */
		public static $excludePageCheck=array("","index","home","account","info","report");
		
		/**
	     * Display About us page
	     * @return string
	     */
		public static function GetPageAccess($path){
			$rp=self::$usersRolePermissions;
			if($rp=="*"){
				return "AUTHORIZED"; // grant access to any user
			}
			else{
				$path = strtolower(trim($path,'/')); 

				$arrPath=explode("/", $path);
				$page=strtolower($arrPath[0]);
				
				//if user is accessing exclude access check page
				if(in_array($page , self:: $excludePageCheck)){
					return "AUTHORIZED";
				}
					
				$userRole=strtolower(USER_ROLE); // get user defined role from session value
				if(array_key_exists($userRole,$rp)){
					$action=(!empty($arrPath[1]) ? $arrPath[1] : null);
					if($action=="index" || $action==""){
						$action="list";
					}

					//check if user have access to all pages or user have access to all page actions
					if($rp[$userRole]=="*" || (!empty($rp[$userRole][$page]) && $rp[$userRole][$page]=="*")){
						return "AUTHORIZED";
					}
					else{
						if(!empty($rp[$userRole][$page]) && in_array($action,$rp[$userRole][$page])){
							return "AUTHORIZED";
						}
					}
					return "NOT_AUTHORIZED";
				}
				else{
					//user does not have any role.
					return "NO_ROLE_PERMISSION";
				}
			}
		}
		public static function is_allowed($path){
			$access = self::GetPageAccess($path);
			return ($access == 'AUTHORIZED');
		}
	}
?>