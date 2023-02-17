<?php
defined('BASEPATH') or exit('No direct script access allowed');

class erm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('merm');
        $this->load->model('bankdarah/mbankdarah');
        $this->load->model('menu/mmenu');
        
        setlocale(LC_ALL, 'id-ID', 'id_ID');
    }

    

    public function inputreviewerm(){
        if ($this->session->userdata('login') == true) {

            // $nik = $this->session->userdata('nik');
            $data['dpjp'] = $this->mbankdarah->dokter_pjp();
            $data['kodejadi'] =$this->merm->getkode_cuti();
            $data['userinput']= $this->session->userdata('nama');
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('erm/vadd_reviewerm', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }


    public function daftarlisterm(){
        if ($this->session->userdata('login') == true) {

            // $nik = $this->session->userdata('nik');
            
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('erm/vdaftarlisterm', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }


    

    public function printview($bulan,$iddokter){
        if ($this->session->userdata('login') == true) {

            // $nik = $this->session->userdata('nik');
            $data['dataerm'] = $this->merm->dataerm($iddokter);
            $data['isidataerm'] = $this->merm->isierm($bulan,$iddokter);
            $data['total'] = $this->merm->total($bulan,$iddokter);
           
            $isi =  $this->template->display('print/daftarermview', $data);
            $this->load->view('print/daftarermview', $isi);
            
        } else {
            redirect('login');
        }
    }


    function randomString($length = 6) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str  .= $characters[$rand];
        }
        return $str;
    }

    function adddatasesmen(){
        
            $post=$this->input->post();
            $data['norm']= $post['norm'];
            $data['amlengkap']=$post['hslmedlkp'];
            $data['amtlengkap']=$post['hslmedtl'];
            $data['amket']=$post['ketmed'];
            $data['aklengkap']=$post['hslkeplkp'];
            $data['aktlengkap']=$post['hslkeptl'];
            $data['akket']=$post['ketkep'];
            $data['idrerm']=$post['iderm'];
            $data['tglinput']=date("Y-m-d");
            $data['idrerm']=$post['iderm'];

            $this->session->set_userdata('iderm',$post['iderm']);

            $this->merm->insertisierm($data);
            $info="berhasil ";
            echo json_encode($info);
    }



    function AddDataMutasi(){
        $post=$this->input->post();
        // konfigurasi upload
            $data['idrerm']= $post['iderm'];
            $data['namadpjp ']= $post['kode_dokter'];
            $data['namareviewer']=$post['nreviewer'];
            $data['bulan']=strftime("%B");
            $data['tglinput'] =date("Y-m-d h:i:s");
            
            $this->merm->insertdatareviewrm($data);
            $this->session->unset_userdata('iderm');
            
            $info="berhasil ";

        echo json_encode($data);

          }




    public function ajaxListisierm(){
            $cekid = $this->session->userdata('iderm');
            
            // var_dump($cekKode);
            $data=array();
            $list = $this->merm->getisierm($cekid);

            $no=1;
        //cacah data
        foreach ( $list as $item ) {

            

            $row = array();
            $row[] = $no;
            $row[] = $item ['norm'];
             if ($item ['amlengkap']=='1') {
                $row[] = '<input type="checkbox" class="switchery"  checked>';
            } else {
                $row[] = '<input type="checkbox" class="switchery"  unchecked>';
            } 

            if ($item ['amtlengkap']=='1') {
                $row[] = '<input type="checkbox" class="switchery"  checked>';
            } else {
                $row[] = '<input type="checkbox" class="switchery"  unchecked>';
            } 
            $row[] = $item ['amket'];
            if ($item ['aklengkap']=='1') {
                $row[] = '<input type="checkbox" class="switchery"  checked>';
            } else {
                $row[] = '<input type="checkbox" class="switchery"  unchecked>';
            } 

            if ($item ['aktlengkap']=='1') {
                $row[] = '<input type="checkbox" class="switchery"  checked>';
            } else {
                $row[] = '<input type="checkbox" class="switchery"  unchecked>';
            } 

            $row[] = $item ['akket'];
            $row[] = '
            <a class="btn btn-sm btn-primary"  title="delete" onclick="deleteH('."'".$item['idermisi']."'".')">
            <i class="fa fa-trash-o">Delete</i></a>
            ';

            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }



        public function ajaxdaftarlisterm(){
            
            // var_dump($cekKode);
            $data=array();
            $list = $this->merm->getdatareview();

            $no=1;
        //cacah data
        foreach ( $list as $item ) {

            

            $row = array();
            $row[] = $no;
            $row[] = $item ['idrerm'];
            $row[] = $item ['bulan'];
            $row[] = $item ['nama_dokter'];
            $row[] = '
            <a class="btn btn-sm btn-primary"  title="View" onclick="view('."'".$item['bulan']."'".','."'".$item['namadpjp']."'".')">
            <i class="fa fa-trash-o">View</i></a>
            ';

            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }



    function delete(){
            $post= $this->input->post();
            $id= $post['id'];
            echo json_encode($id);
            $this->merm->drop($id);

    }



   

}

