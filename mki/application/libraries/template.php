<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Alowed');

class template{
    
    protected $_ci;
    function __construct() {
        
        $this->_ci=&get_instance();
    }
    
    function display($template, $data=NULL){
        $data['_content'] = $this->_ci->load->view($template, $data, TRUE);
        $data['_header'] = $this->_ci->load->view('/utama/header', $data, TRUE);
        
        $data['_menu'] = $this->_ci->load->view('/utama/menu', $data, TRUE);
        $data['_footer'] = $this->_ci->load->view('/utama/footer', $data, TRUE);
        $this->_ci->load->view('/utama/vutama.php',$data, TRUE);
    }

    function user($template, $data=NULL){
        $data['_content'] = $this->_ci->load->view($template, $data, TRUE);
        $data['_header'] = $this->_ci->load->view('/utamauser/headeruser', $data, TRUE);
        
        $data['_menu'] = $this->_ci->load->view('/utamauser/menuuser', $data, TRUE);
        $data['_footer'] = $this->_ci->load->view('/utamauser/footeruser', $data, TRUE);
        $this->_ci->load->view('/utamauser/vutamauser.php',$data, TRUE);
    }

    function alllist($template, $data=NULL){
        $data['_content'] = $this->_ci->load->view($template, $data, TRUE);
        $data['_header'] = $this->_ci->load->view('/utama/headerlist', $data, TRUE);
        
        $data['_menu'] = $this->_ci->load->view('/utama/menu', $data, TRUE);
        $data['_footer'] = $this->_ci->load->view('/utama/footer', $data, TRUE);
        $this->_ci->load->view('/utama/vutama.php',$data, TRUE);
    }

    function detail($template, $data=NULL){
        $data['_content'] = $this->_ci->load->view($template, $data, TRUE);
        $data['_header'] = $this->_ci->load->view('/utamauser/headeruser', $data, TRUE);
        
        $data['_menu'] = $this->_ci->load->view('/utamauser/detailmenu', $data, TRUE);
        $data['_footer'] = $this->_ci->load->view('/utamauser/footeruser', $data, TRUE);
        $this->_ci->load->view('/utamauser/vutamauser.php',$data, TRUE);
    }

    function loginuser($template, $data=NULL){
        $data['_content'] = $this->_ci->load->view($template, $data, TRUE);
        $data['_header'] = $this->_ci->load->view('/utamauser/headeruser', $data, TRUE);
        
        $data['_menu'] = $this->_ci->load->view('/utamauser/detailmenu', $data, TRUE);
        $data['_footer'] = $this->_ci->load->view('/utamauser/footeruser', $data, TRUE);
        $this->_ci->load->view('/utamauser/vutamalogin.php',$data, TRUE);
    }


    
}
