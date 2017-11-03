<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function Index(){
        $this->load->view('Pages/blog/blog_main');
    }
    public function Second(){
    	$this->load->view('Pages/blog/blog');
    }
}