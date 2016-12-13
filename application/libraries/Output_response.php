<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Output_response {

    function Prepare_Response($data, $status="Success", $message="")
	{
		
		$res = array();
		$res['data'] = $data;
		$res['status'] = $status;
		$res['message'] = $message;

		$res_out = json_encode($res);
		return $res_out;
	}
}
