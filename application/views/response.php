<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode($data));
?>
