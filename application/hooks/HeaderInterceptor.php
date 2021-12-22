<?php
class HeaderInterceptor {
	function __construct() {
		$this->CI =& get_instance();
	}
	
	function main() {
		// allow cors access
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept, Authorization');
	}
}
?>
