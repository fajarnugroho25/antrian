<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengajuancuti extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mpengajuancuti');
        $this->load->model('menu/mmenu');
    }

    

    public function daftarcutipribadi(){
        if ($this->session->userdata('login') == true) {

            $nik = $this->session->userdata('nik');
            $data['cutipribadi'] = $this->mpengajuancuti->tamp_cutipribadi($nik);
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('pengajuancuti/vdaftarcutipribadi', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }


    public function daftarcutikaryawan(){
        if ($this->session->userdata('login') == true) {

            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('pengajuancuti/vdaftarcutikaryawan', $data);
            $this->load->view('admin/vutama', $isi);
            // $this->load->view('pengajuancuti/underconstruction');
        } else {
            redirect('login');
        }
    }


    public function daftarAllcutikaryawan(){
        if ($this->session->userdata('login') == true) {

            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('pengajuancuti/vdaftarcutiAllkaryawan', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }



    public function daftarrekaplaporan(){
        if ($this->session->userdata('login') == true) {

            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['unit'] = $this->mpengajuancuti->unitpengajuan();
            $isi =  $this->template->display('pengajuancuti/vrekaplaporan', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }


    public function daftarrekapCuti(){
        if ($this->session->userdata('login') == true) {


            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['unit'] = $this->mpengajuancuti->unitpengajuan();
            $isi =  $this->template->display('pengajuancuti/vrekapcuti', $data);
            $this->load->view('admin/vutama', $isi);

        } else {
            redirect('login');
        }
    }

    public function daftarrekapCutiBesar(){
        if ($this->session->userdata('login') == true) {

            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['unit'] = $this->mpengajuancuti->unitpengajuan();
            //$data['s'] = $this->mpengajuancuti->updatecuti();
            $isi =  $this->template->display('pengajuancuti/vrekapcutibesar', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }


    public function daftarkarki(){
        if ($this->session->userdata('login') == true) {

            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['unit'] = $this->mpengajuancuti->unitpengajuan();
            $isi =  $this->template->display('pengajuancuti/vhakcutibesar', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    function printrekaplaporan(){
        if ($this->session->userdata('login') == true) {
            
            $data['tglawal']= date('d M',strtotime($this->session->userdata('tglawal')));
            $data['tglakhir']=date('d M',strtotime($this->session->userdata('tglakhir')));

            $data['rekcuti'] = $this->mpengajuancuti->tamp_rekaplaporan1();


            $isi =  $this->template->display('print/vprintcutikaryawan', $data);
            $this->load->view('print/vprintcutikaryawan', $isi);
        } else {
            redirect('login');
        }
        
    }

    function printrekapcuti(){
        if ($this->session->userdata('login') == true) {
            $unit=$this->session->userdata('unit');
            if ($unit != '' ) {
                $bag= $this->mpengajuancuti->getunit($unit);  
                $data['bagian'] = 'BAGIAN '.$bag->unit_nama.'';
                $data['rekcuti'] = $this->mpengajuancuti->tamp_rekapcuti();
            }
            else{
                $data['bagian'] = 'SEMUA BAGIAN';
                $data['rekcuti'] = $this->mpengajuancuti->tamp_rekapcuti();

            }
            


            $isi =  $this->template->display('print/vprintrekapcuti', $data);
            $this->load->view('print/vprintrekapcuti', $isi);
        } else {
            redirect('login');
        }
        
    }



    function printrekapcutibesar(){
        if ($this->session->userdata('login') == true) {
            $unit=$this->session->userdata('unit');
            if ($unit != '' ) {
                $bag= $this->mpengajuancuti->getunit($unit);  
                $data['bagian'] = 'BAGIAN '.$bag->unit_nama.'';
                $data['rekcuti'] = $this->mpengajuancuti->tamp_rekapcutibesar();
            }
            else{
                $data['bagian'] = 'SEMUA BAGIAN';
                $data['rekcuti'] = $this->mpengajuancuti->tamp_rekapcutibesar();

            }
            


            $isi =  $this->template->display('print/vprintrekapcutibesar', $data);
            $this->load->view('print/vprintrekapcutibesar', $isi);
        } else {
            redirect('login');
        }
        
    }


    function printAllrekapcuti(){
        if ($this->session->userdata('login') == true) {
           $data['rekcuti'] = $this->mpengajuancuti->tamp_rekapall();
            $isi =  $this->template->display('print/vprintallrekapbag', $data);
            $this->load->view('print/vprintallrekapbag', $isi);
        } else {
            redirect('login');
        }
        
    }



    function printAllrekapcutiBesar(){
        if ($this->session->userdata('login') == true) {
           $data['rekcuti'] = $this->mpengajuancuti->tamp_rekapallctbesar();
            $isi =  $this->template->display('print/vprintallrekapbagctbesar', $data);
            $this->load->view('print/vprintallrekapbagctbesar', $isi);
        } else {
            redirect('login');
        }
        
    }


    public function tambahpengajuancuti(){
        if ($this->session->userdata('login') == true) {
                        // $this->load->view('pengajuancuti/underconstruction');

            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            // $data['cbpoli'] = $this->mdokter->combo_poli();

           
            $nik = $this->session->userdata('nik');
            $data['kodejadi'] = $this->mpengajuancuti->getkode_cuti();

            $data['data'] = $this->mpengajuancuti->getdatakary($nik);
            $data['cek'] = $this->mpengajuancuti->getdatacb($nik);

            $year=date('Y');       
            $yearold =   $year-1;
            $yearnew =   $year+1;
            $getsisacuti =$this->mpengajuancuti->getdatacuti($nik,$yearold);
            $getsisacuti2 =$this->mpengajuancuti->getdatacuti($nik,$year);
            $getsisacuti3 =$this->mpengajuancuti->getdatacuti($nik,$yearnew);
            $gethakcuti = $this->mpengajuancuti->gethakcuti($nik);
            if ($gethakcuti->hakcutibesar == 0) {
                $data['tahunexp']=0;
                # code...
            }

            else{
                $data['tahunexp']=date('Y', strtotime($gethakcuti->tglawalcb)) + 6;
            }
            

            if ($getsisacuti2->jml == $gethakcuti->hakcuti) {
                $data['sisacutitahun'] = $year+1;
                $data['sisacuti'] = $gethakcuti->hakcuti-$getsisacuti3->jml;
                $data['thismonth'] = date('m');
                $data['thisyear'] =  date('Y');
               
            }

            elseif ($getsisacuti->jml == $gethakcuti->hakcuti) {
                    $data['sisacutitahun'] = $year;
                    $data['sisacuti'] = $gethakcuti->hakcuti-$getsisacuti2->jml;
                    $data['thismonth'] = date('m');
                    $data['thisyear'] =  date('Y');

            }
            //sisa cuti "tahun" jika masih sisa
            elseif ($getsisacuti->jml != 12 || $getsisacuti->jml != NULL) {
                    $data['sisacutitahun'] = $year-1;
                    $data['sisacuti'] = $gethakcuti->hakcuti-$getsisacuti->jml;
                    $now = date('Y-m-d');
                    if ($now > date('Y-01-31') && $getsisacuti->jml != 12 ) {
                        $data['sisacutitahun'] = $year;
                        $data['sisacuti'] = $gethakcuti->hakcuti-$getsisacuti2->jml;
                        $data['thismonth'] = date('m');
                        $data['thisyear'] =  date('Y');
                    }
            }


            else{
                // $data['sisacutitahun'] = $year+1;
                $data['sisacutitahun'] = $year;
                $data['sisacuti'] = $gethakcuti->hakcuti-$getsisacuti2->jml;
                // $data['sisacuti'] = $gethakcuti->hakcuti-$getsisacuti3->jml;
                $data['thismonth'] = date('m');
                $data['thisyear'] =  date('Y');

            }

            if ($gethakcuti->hakcutibesar != NULL) {
                $getsisacutiB =$this->mpengajuancuti->getdatacutiBesar($nik);
                $cutibesar = $gethakcuti->hakcutibesar;
                $data['sisacutiBesar'] = $cutibesar - $getsisacutiB->jml;
            }else{
                $data['sisacutiBesar'] = '0';

            }
            
            //$this->load->view('pengajuancuti/underconstruction');
             $isi =  $this->template->display('pengajuancuti/vadd_pengajuancuti', $data);            
             $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
        
    }




    function printsuratPengajuan(){
        if ($this->session->userdata('login') == true) {
            $nik= $this->session->userdata('nik');

            $data['pengajuan'] = $this->mpengajuancuti->getsuratmutasi($this->uri->segment(3));
            $data['get'] = $this->mpengajuancuti->Get_data($nik);

            $isi =  $this->template->display('print/vsuratpengajuan', $data);
            $this->load->view('print/vsuratpengajuan', $isi);
        } else {
            redirect('login');
        }
        
    }


    function printcutitahun($nik){
        if ($this->session->userdata('login') == true) {
            $jeniscuti=$this->session->userdata('jeniscuti');
            $tahun=$this->session->userdata('tahun');

            $data['datacuti'] = $this->mpengajuancuti->getcutitahun($nik);
            $data['nama'] = $this->mpengajuancuti->getnama($nik);
            if($jeniscuti != NULL || $tahun != NULL){
                $data['jeniscuti'] = $this->session->userdata('jeniscuti');
            }
            else{
                $data['jeniscuti'] ='Cuti Tahunan';
            }
            

            
            $isi =  $this->template->display('print/vtransaksicutibesar', $data);
            $this->load->view('print/vtransaksicutibesar', $isi);
        } else {
            redirect('login');
        }
        
    }



    function printcutibesar($nik){
        if ($this->session->userdata('login') == true) {
            $jeniscuti=$this->session->userdata('jeniscuti');
            $tahun=$this->session->userdata('tahun');
            $data['datacuti'] = $this->mpengajuancuti->getcutibesar($nik);
            $data['nama'] = $this->mpengajuancuti->getnama($nik);
            if($jeniscuti != NULL || $tahun != NULL){
                $data['jeniscuti'] = $this->session->userdata('jeniscuti');
            }
            else{
                $data['jeniscuti'] ='Cuti Tahunan';
            }
            

            
            $isi =  $this->template->display('print/vtransaksicutibesar', $data);
            $this->load->view('print/vtransaksicutibesar', $isi);
        } else {
            redirect('login');
        }
        
    }



    function getdatakar(){
        $post=$this->input->post();
        // konfigurasi upload
            $idcuti= $post['id'];
            $data = $this->mpengajuancuti->getdetdatkar($idcuti);
        echo json_encode($data);

          }

    function datakar(){
        $post=$this->input->post();
        // konfigurasi upload
            $nik= $post['nik'];
            $data = $this->mpengajuancuti->datakar($nik);
        echo json_encode($data);

          }


    function getinfokar(){
        $post=$this->input->post();
        // konfigurasi upload
            $id= $post['id'];
            $data = $this->mpengajuancuti->getinfokar($id);
        echo json_encode($data);

          }



    function AddDataCuti(){
        // $post=$this->input->post();
        // // konfigurasi upload
        // $nik = $this->session->userdata('nik');
        // $tglsama = $post['mtglawal'
            
        //     $jeniscuti = $post['jeniscuti'];
        //     $data['idcuti']= $post['idcuti'];
        //     $data['nik']= $this->session->userdata('nik');
        //     $data['mohonizinhari']= $post['mhari'];
        //     $data['mohonizintglawal']=$post['mtglawal'];
        //     $data['mohonizintglakhir']=$post['mtglakhir'];
        //     $data['keperluan']= $post['keperluan'];
        //     $data['sisacutitahun']=$post['sisacutitahun'];
        //     $data['jenis_cuti']=$post['jeniscuti'];
        //     $data['yangmemohon']=$this->session->userdata('nama');
        //     $data['tanggalinput']=date("Y-m-d H:i:s");
        //     $data1['cutitahun']=$post['sisacutitahun'];

        //     if ($jeniscuti == 'Cuti Besar') {
        //         $data1['sudahambilcb']='1';
        //     }
        //     else{
        //         $data1['sudahambilcb']='0';
        //     }
            
        //     $cek = $this->mpengajuancuti->gettglsama($nik,$tglsama);

        //     if ($cek == 0) {
        //     $this->mpengajuancuti->insertpengajuancuti($data);}
        //     else {
        //         echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        //     }


        //     $this->mpengajuancuti->editdatauser($nik , $data1);
            
        //     $info="berhasil ";

        // echo json_encode($data);


        $post=$this->input->post();
        // konfigurasi upload
        $nik = $this->session->userdata('nik');
        $tglsama = $post['mtglawal'];

            
            
            $jeniscuti = $post['jeniscuti'];
            $data['idcuti']= $post['idcuti'];
            $data['nik']= $this->session->userdata('nik');
            $data['mohonizinhari']= $post['mhari'];
            $data['mohonizintglawal']=$post['mtglawal'];
            $data['mohonizintglakhir']=$post['mtglakhir'];
            $data['keperluan']= $post['keperluan'];
            $data['sisacutitahun']=$post['sisacutitahun'];
            $data['jenis_cuti']=$post['jeniscuti'];
            $data['yangmemohon']=$this->session->userdata('nama');
            $data['tanggalinput']=date("Y-m-d H:i:s");
            $data1['cutitahun']=$post['sisacutitahun'];
            
            if ($jeniscuti == 'Cuti Besar') {
                $data1['sudahambilcb']='1';
            }
            
            
            $cek = $this->mpengajuancuti->gettglsama($nik,$tglsama);

            if ($cek == 0) {
                $insert_data = $this->mpengajuancuti->insertpengajuancuti($data);
                $data['status'] = 'success';    
            }else {
                // echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
                $data['status'] = 'fail';
            }


            $this->mpengajuancuti->editdatauser($nik , $data1);
            
            $info="berhasil ";

        echo json_encode($data);

          }




          function editpengajuan(){
        $post=$this->input->post();
        // konfigurasi upload
            $idcuti= $post['idcuti'];
          
            $data['mohonizinhari']= $post['mhari'];
            $data['mohonizintglawal']=$post['mtglawal'];
            $data['mohonizintglakhir']=$post['mtglakhir'];
            $data['keperluan']= $post['keperluan'];
            $data['jenis_cuti']=$post['jeniscuti'];

            
            $this->mpengajuancuti->editpengajuan($data,$idcuti);
            
            $info="berhasil ";

        echo json_encode($data);

          }




    public function editPengajuanCuti($idcuti)
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['cuti'] = $this->mpengajuancuti->getdatforupdate($idcuti);
            
            $isi =  $this->template->display('pengajuancuti/vedit_pengajuancuti', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('clogin');
        }
    }

    function editDataCuti(){
        $post=$this->input->post();
        // konfigurasi upload
            $mhari = $post['mhari'];
            $idcuti= $post['idcuti'];
            $data['diizinkanhari']= $post['dhari'];
            $tanggalawal = $post['dtglawal'];
            $tanggalakhir = $post['dtglakhir'];
            
            if ($data['diizinkanhari'] == $mhari && $tanggalawal == '' && $tanggalakhir == '') {
            $data['diizinkantglawal']=date('Y-m-d', strtotime($post['mawal']));
            $data['diizinkantglakhir']=date('Y-m-d', strtotime($post['mtglakhir']));

            }elseif ($data['diizinkanhari'] == $mhari && $tanggalawal != '' && $tanggalakhir != '') {
            $data['diizinkantglawal']=date('Y-m-d', strtotime($post['dtglawal']));
            $data['diizinkantglakhir']=date('Y-m-d', strtotime($post['dtglakhir']));
            }   
            elseif ($data['diizinkanhari'] != $mhari && $tanggalawal != '' && $tanggalakhir != '') {
            $data['diizinkantglawal']=date('Y-m-d', strtotime($post['dtglawal']));
            $data['diizinkantglakhir']=date('Y-m-d', strtotime($post['dtglakhir']));
            }
            elseif ($data['diizinkanhari'] == $mhari && $tanggalawal != '' && $tanggalakhir == '') {
            $data['diizinkantglawal']=date('Y-m-d', strtotime($post['dtglawal']));
            $data['diizinkantglakhir']=date('Y-m-d', strtotime($post['dtglawal']));
            } 
             
            $data['statusizin']='1';
            $data['menyetujui']=$this->session->userdata('ttd');
            $this->mpengajuancuti->editpengajuan($data,$idcuti);
            
            $info="berhasil ";

        echo json_encode($data);

          }


          function editcutibesar(){
        $post=$this->input->post();
        // konfigurasi upload
            $id = $post['id'];
            $data['hakcutibesar']=$post['jcb'];
            $data['tglawalcb']=date("Y-m-d");

            $this->mpengajuancuti->editcutibesar($data,$id);
            
            $info="berhasil ";

        echo json_encode($data);

          }



    function editunitkar(){
        $post=$this->input->post();
        // konfigurasi upload
            $nik = $post['nik'];
            $data['unituser']=$post['unitkary'];
            

            $this->mpengajuancuti->editunit($data,$nik);
            
            $info="berhasil ";

        echo json_encode($data);

          }

    function KonfirmasiCuti(){
        $post=$this->input->post();
        // konfigurasi upload
            $idcuti= $post['idcuti'];
            $data['statusizin']='2';
            $data['mengetahui']=$this->session->userdata('ttd');
            $this->mpengajuancuti->editpengajuan($data,$idcuti);
            
            $info="berhasil ";

        echo json_encode($data);

          }
    public function getfilter(){
        $post=$this->input->post();
        // konfigurasi upload
        $this->session->set_userdata('tglawal',$post['tglawal']);
        $this->session->set_userdata('tglakhir',$post['tglakhir']);
        $this->session->set_userdata('kelompok',$post['kelompok']);
        $this->session->set_userdata('unit',$post['unit']);
        $this->session->set_userdata('tahun',$post['tahun']);
        $this->session->set_userdata('jeniscuti',$post['jeniscuti']);
           

            $info="berhasil ";

            echo json_encode($data);

          }


    public function ajaxListCutiPribadi(){
            
           
            $data=array();
            $nik= $this->session->userdata('nik');
            $list= $this->mpengajuancuti->tamp_cutipribadi($nik);
            $no=1;


        //cacah data
        foreach ( $list as $item ) {


            $status = $item ['statusizin'];
            if ($status == '0') {
                  $hasil= 'Belum Di konfirmasi';
              }
            elseif ($status == '1') {
                  $hasil= 'Terkirim Ke Personalia';
              }

              elseif($status == '2'){
                  $hasil= 'Sudah di Terima Personalia';
              }
               
            if ($item ['statusizin'] == 0) {
                    $hsl=   '<a href="printsuratPengajuan/'.$item['idcuti'].'" class="btn btn-success">Surat</a>
            <a class="btn btn-success update-'.$item['idcuti'].'"  title="Update" data-id='."'".json_encode($item)."'".' onclick="Edit('."'".$item['idcuti']."'".')">
            Edit</a>  
            ';
                  
                }
                else{
                    $hsl=  '<a href="printsuratPengajuan/'.$item['idcuti'].'" class="btn btn-success">Surat</a>';
                    
                 
                }

            $row = array();
            $row[] = $no;
            $row[] = $item ['idcuti'];
            $row[] = $item ['mohonizinhari'];
            $row[] = $item ['mohonizintglawal'];
            $row[] = $item ['mohonizintglakhir'];
            $row[] = $item ['diizinkanhari'];
            $row[] = $hasil;
            $row[] = $hsl;
            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }

    public function ajaxListCutiKar(){
            $data=array();
            $userall = $this->session->userdata('unit_id');
            $nik= $this->session->userdata('nik');
            $getunituser= $this->mpengajuancuti->Get_data($nik);
            $list= $this->mpengajuancuti->tamp_cutikaryawan($userall,$getunituser->unituser);

            $no=1;

        //cacah data
        foreach ( $list as $item ) {


            $status = $item ['statusizin'];
            if ($status == '0') {
                  $hasil= 'Menunggu konfirmasi';
              }
            elseif ($status == '1') {
                  $hasil= 'Terkirim Ke Personalia';
              }

              elseif($status == '2'){
                  $hasil= 'Sudah di Terima Personalia';
              }
               
              $nik= $this->session->userdata('nik');
                $getunituser= $this->mpengajuancuti->Get_data($nik);

             

            if ($getunituser->unituser == '510' ) {
                if ($item ['statusizin'] == 1) {
                        $hsl=   '<a href="printsuratPengajuan/'.$item['idcuti'].'" class="btn btn-success">Surat</a>
                    <a class="btn btn-success delete-'.$item['idcuti'].'"  title="delete" data-id='."'".json_encode($item)."'".' onclick="deleteCuti('."'".$item['idcuti']."'".')">
            Delete</a>' ;
                }
            
                elseif ($item ['statusizin'] == 0) {
                        $hsl=   '<a class="btn btn-sm detail-'.$item['idcuti'].'"  title="konfirmasi" data-id='."'".json_encode($item)."'".' onclick="konfirmasiCuti('."'".$item['idcuti']."'".')">
            konfirmasi</a><a href="printsuratPengajuan/'.$item['idcuti'].'" class="btn btn-success">Surat</a>
                    <a class="btn btn-success delete-'.$item['idcuti'].'"  title="delete" data-id='."'".json_encode($item)."'".' onclick="deleteCuti('."'".$item['idcuti']."'".')">
            Delete</a>' ;
                }

                else{
                $hsl=   '<a href="printsuratPengajuan/'.$item['idcuti'].'" class="btn btn-success">Surat</a>
                    <a class="btn btn-success delete-'.$item['idcuti'].'"  title="delete" data-id='."'".json_encode($item)."'".' onclick="deleteCuti('."'".$item['idcuti']."'".')">
            Delete</a>' ;
                }
                    
               }  
            else{

                if ($item ['statusizin'] == 0) {
                   $hsl=  '<a class="btn btn-sm detail-'.$item['idcuti'].'"  title="konfirmasi" data-id='."'".json_encode($item)."'".' onclick="konfirmasiCuti('."'".$item['idcuti']."'".')">
            konfirmasi</a>
            <a href="printsuratPengajuan/'.$item['idcuti'].'" class="btn btn-success">Surat</a> 
            ';
                }
                else{
                    $hsl=  '<a href="printsuratPengajuan/'.$item['idcuti'].'" class="btn btn-success">Surat</a>';
                } }
            $row = array();
            $row[] = $no;
            $row[] = $item ['idcuti'];
            $row[] = $item ['nama'];
            $row[] = $item ['unit_nama'];
            $row[] = $item ['mohonizinhari'];
            $row[] = date('d-m-Y', strtotime($item ['mohonizintglawal']));
            $row[] = date('d-m-Y', strtotime($item ['mohonizintglakhir']));
            $row[] = $item ['keperluan'];
            $row[] = $item ['jenis_cuti'];
            $row[] = $item ['diizinkanhari'];
            $row[] = $hasil;
            $row[] = $hsl;

            ;

            
            
            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        $array_items = array('tglawal','tglakhir','unit','jeniscuti','tahun');
        $this->session->unset_userdata($array_items);

        }


        public function ajaxListCutiAllKar(){
            
           
            $data=array();
            
            $list= $this->mpengajuancuti->tamp_cutiAllkaryawan();

            $no=1;

        //cacah data
        foreach ( $list as $item ) {


            $status = $item ['statusizin'];
            if ($status == '0') {
                  $hasil= 'Menunggu konfirmasi';
              }
            elseif ($status == '1') {
                  $hasil= 'Terkirim Ke Personalia';
              }

              elseif($status == '2'){
                  $hasil= 'Sudah di Terima Personalia';
              }
               
              $nik= $this->session->userdata('nik');
                $getunituser= $this->mpengajuancuti->Get_data($nik);

             

           
            $row = array();
            $row[] = $no;
            $row[] = $item ['idcuti'];
            $row[] = $item ['nama'];
            $row[] = $item ['unit_nama'];
            $row[] = $item ['mohonizinhari'];
            $row[] = date('d-m-Y', strtotime($item ['mohonizintglawal']));
            $row[] = date('d-m-Y', strtotime($item ['mohonizintglakhir']));
            $row[] = $item ['keperluan'];
            $row[] = $item ['diizinkanhari'];
            $row[] = $hasil;
            $row[] = '<a href="printsuratPengajuan/'.$item['idcuti'].'" class="btn btn-success">Surat</a>
                    <a class="btn btn-success delete-'.$item['idcuti'].'"  title="delete" data-id='."'".json_encode($item)."'".' onclick="deleteCuti('."'".$item['idcuti']."'".')">
            Delete</a>' ;

            ;

            
            
            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }





    public function ajaxrekaplaporan(){
            
           
            $data=array();
            $list = $this->mpengajuancuti->tamp_rekaplaporan1();

            $no=1;


        //cacah data
        foreach ( $list as $item ) {


            $row = array();
            $row[] = $no;
            $row[] = $item ['nama'];
            $row[] = $item ['unit_nama'];
            $row[] = $item ['jumlah'];
            $row[] = $item ['1'];
            $row[] = $item ['2'];
            $row[] = $item ['3'];
            $row[] = $item ['4'];
            $row[] = $item ['5'];
            $row[] = $item ['6'];
            $row[] = $item ['7'];
            $row[] = $item ['8'];
            $row[] = $item ['9'];
            $row[] = $item ['10'];
            $row[] = $item ['11'];
            $row[] = $item ['12'];
            $row[] = $item ['13'];
            $row[] = $item ['14'];
            $row[] = $item ['15'];
            $row[] = $item ['16'];
            $row[] = $item ['17'];
            $row[] = $item ['18'];
            $row[] = $item ['19'];
            $row[] = $item ['20'];
            $row[] = $item ['21'];
            $row[] = $item ['22'];
            $row[] = $item ['23'];
            $row[] = $item ['24'];
            $row[] = $item ['25'];
            $row[] = $item ['26'];
            $row[] = $item ['27'];
            $row[] = $item ['28'];
            $row[] = $item ['29'];
            $row[] = $item ['30'];
            $row[] = $item ['31'];
            
            



            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        $array_items = array('tglawal','tglakhir','unit','jeniscuti','tahun');
        $this->session->unset_userdata($array_items);
        }


    public function ajaxrekapcuti(){
            

           
            $data=array();
            $list = $this->mpengajuancuti->tamp_rekapcuti();

            $no=1;


        //cacah data
        foreach ( $list as $item ) {


            $row = array();
            $row[] = $no;
            $row[] = $item ['nama'];
            $row[] = $item ['nik'];
            $row[] = $item ['hakcuti'];
            $row[] = $item ['digunakan'];
            $row[] = $item ['sisa'];
            // $row[] = '<a href="printcutitahun/'.$item['nik'].' " target="_blank" class="btn btn-success">Surat</a>' ;

            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        $array_items = array('tglawal','tglakhir','unit','jeniscuti','tahun');
        $this->session->unset_userdata($array_items);
        }






        public function ajaxrekapcutiBesar(){
            

           
            $data=array();
            $list = $this->mpengajuancuti->tamp_rekapcutibesar();
            
            $no=1;


        //cacah data
        foreach ( $list as $item ) {


            $row = array();
            $row[] = $no;
            $row[] = $item ['nama'];
            $row[] = $item ['nik'];
            $row[] = $item ['hakcutibesar'];
            $row[] = $item ['digunakan'];
            $row[] = $item ['sisa'];
            $row[] = '<a href="printcutibesar/'.$item['nik'].'" target="_blank" class="btn btn-success">Surat</a>' ;

            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        $array_items = array('tglawal','tglakhir','unit');
        $this->session->unset_userdata($array_items);
        }



        public function hakcutibesar(){
            
           
            $data=array();
            $list = $this->mpengajuancuti->tamp_hakcutbesar();

            $no=1;


        //cacah data
        foreach ( $list as $item ) {


            $row = array();
            $row[] = $no;
            $row[] = $item ['nama'];
            $row[] = $item ['nik'];
            $row[] = '<div contenteditable class="hakcuti" data-id="'.$item ['nik'].'" data-column="hakcuti">' . $item ['hakcuti'] . '</div>';
            $row[] = '<div contenteditable class="hakcutibesar" data-id="'.$item ['nik'].'" data-column="hakcutibesar">' . $item ['hakcutibesar'] . '</div>';
            $row[] = '<a class="btn btn-sm detail-'.$item['nik'].'"  title="konfirmasi" data-id='."'".json_encode($item)."'".' onclick="ubahunit('."'".$item['nik']."'".')">
            Unit</a>';
            // $row[] = '<a class="btn btn-sm detail-'.$item['id'].'"  title="konfirmasi" data-id='."'".json_encode($item)."'".' onclick="cutibesar('."'".$item['id']."'".')">
            // tambah</a>
            // ';
            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        $array_items = array('tglawal','tglakhir','unit','jeniscuti','tahun');
        $this->session->unset_userdata($array_items);
        }


    public function export()
     {


        // load excel library
        $list = $this->mpengajuancuti->tamp_rekaplaporan1();
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("No", "Nama Karyawan", "Unit","Total", "1", "2","3","4","5","6","7","8","9","10","11", "12","13","14","15","16","17","18","19","20","21", "22","23","24","25","26","27","28","29","30","31");

            $column = 0;

            foreach($table_columns as $field)
            {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
                $column++;
            }         

          $kolom = 2;
          $nomor = 1;
          foreach($list as $rekap) {
    

               $object->getActiveSheet()->setCellValueByColumnAndRow(0, $kolom, $nomor);
               $object->getActiveSheet()->setCellValueByColumnAndRow(1, $kolom, $rekap['nama']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(2,$kolom, $rekap['unit_nama']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(3,$kolom, $rekap['jumlah']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(4, $kolom, $rekap['1']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(5, $kolom, $rekap['2']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(6, $kolom, $rekap['3']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(7, $kolom, $rekap['4']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(8, $kolom, $rekap['5']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(9, $kolom, $rekap['6']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(10, $kolom, $rekap['7']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(11, $kolom, $rekap['8']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(12,$kolom, $rekap['9']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(13, $kolom, $rekap['10']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(14, $kolom, $rekap['11']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(15, $kolom, $rekap['12']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(16, $kolom, $rekap['13']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(17, $kolom, $rekap['14']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(18, $kolom, $rekap['15']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(19, $kolom, $rekap['16']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(20, $kolom, $rekap['17']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(21, $kolom, $rekap['18']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(22,$kolom, $rekap['19']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(23, $kolom, $rekap['20']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(24, $kolom, $rekap['21']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(25, $kolom, $rekap['22']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(26, $kolom, $rekap['23']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(27, $kolom, $rekap['24']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(28, $kolom, $rekap['25']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(29, $kolom, $rekap['26']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(30, $kolom, $rekap['27']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(31, $kolom, $rekap['28']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(32, $kolom, $rekap['29']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(33, $kolom, $rekap['30']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(34, $kolom, $rekap['31']);

               $kolom++;
               $nomor++;

          }

        $array_items = array('tglawal','tglakhir','unit','jeniscuti','tahun');
        $this->session->unset_userdata($array_items);

          $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Rekap Cuti Karyawan.xls"');
            $object_writer->save('php://output');
     }


     public function exportcuti()
     {


        // load excel library
        $list = $this->mpengajuancuti->tamp_rekapcuti();
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("No", "Nama Karyawan","Bagian", "NIK", "Hak Cuti", "Cuti Digunakan", "Sisa");

            $column = 0;

            foreach($table_columns as $field)
            {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
                $column++;
            }         

          $kolom = 2;
          $nomor = 1;
          foreach($list as $rekap) {
    

               $object->getActiveSheet()->setCellValueByColumnAndRow(0, $kolom, $nomor);
               $object->getActiveSheet()->setCellValueByColumnAndRow(1, $kolom, $rekap['nama']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(2, $kolom, $rekap['unit_nama']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(3, $kolom, $rekap['nik']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(4,$kolom, $rekap['hakcuti']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(5, $kolom, $rekap['digunakan']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(6, $kolom, $rekap['sisa']);
              

               $kolom++;
               $nomor++;

          }

        $array_items = array('tglawal','tglakhir','unit', 'tahun');
        $this->session->unset_userdata($array_items);

          $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Rekap Cuti Karyawan.xls"');
            $object_writer->save('php://output');
     }


     function delete(){
            $post= $this->input->post();
            $id= $post['id'];
            echo json_encode($id);
            $this->mpengajuancuti->drop($id);

    }



    function hakcutiedit(){
            $post=$this->input->post();
            $nik =$post['id'];
            $column =$post['column'];
            $value =$post['value'];
            $data[$column]= $value;
            $data['tglawalcb']= date('Y-m-d');
            $this->mpengajuancuti->hakcutied($nik,$data);
            $info="berhasil ";
            echo json_encode($info);
    }

   
   

    
   

}

