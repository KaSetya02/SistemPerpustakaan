<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
  if( !function_exists('tcpdf') ) {
    
    function tcpdf()
    {
    	require_once('tcpdf/config/tcpdf_config.php');
    	require_once('tcpdf/tcpdf.php');
    }
    
  }

?> 