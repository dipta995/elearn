
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Search{
	private $db;
	private $fm;
		// construct can access anywhere in class
	public function __construct(){
		$this->db = new Database_logic();
		$this->fm = new Format();
	}


	public function adminsearch($a){
		$query = "SELECT * FROM catagory_table left join course_table on catagory_table.catId = course_table.catid WHERE catagory_table.catName LIKE '%$a%' ";
		$result = $this->db->dataselect($query);
		return $result;
	}

	
	

}
 