<?php

function setFlashData($key, $pesan, $url) {
  $CI = get_instance();
  $CI->load->library('session');
  $CI->session->set_flashdata('key',$key);
  $CI->session->set_flashdata('pesan',$pesan);
  redirect($url);
}

function adminLoggedIn() {
  $CI = get_instance();
  $CI->load->library('session');

  if ($CI->session->userdata('adm_id')) {
    return TRUE;
  } else {
    return FALSE;
  }
}

function customerLoggedIn() {
	$CI = get_instance();
	$CI->load->library('session');
	
	if ($CI->session->userdata('customer_id')) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function getAdminId() {
  $CI = get_instance();
  $CI->load->library('session');

  if ($CI->session->userdata('adm_id')) {
    return $CI->session->userdata('adm_id');
  } else {
    return FALSE;
  }
}
