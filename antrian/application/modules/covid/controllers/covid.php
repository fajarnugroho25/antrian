<?php
defined('BASEPATH') or exit('No direct script access allowed');

class covid extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mcovid');
        $this->load->model('menu/mmenu');
    }



    public function daftarpasien(){
        if ($this->session->userdata('login') == true) {

            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('covid/vdata_pascovid', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }





    function printLaporanCovid($nomorpasien){
        if ($this->session->userdata('login') == true) {
            
            $data['pasien'] = $this->mcovid->tamp_datapasien($nomorpasien);
            $data['kontak'] = $this->mcovid->tamp_kontakorang($nomorpasien);
            $data['perjalanan'] = $this->mcovid->tamp_perjlnan($nomorpasien);

            $isi =  $this->template->display('print/vdatapascovid', $data);
            $this->load->view('print/vdatapascovid', $isi);
        } else {
            redirect('login');
        }
        
    }

    function printrekapcuti(){
        if ($this->session->userdata('login') == true) {
            $unit=$this->session->userdata('unit');
            if ($unit != '') {
                $bag= $this->mcovid->getunit($unit);  
                $data['bagian'] = 'BAGIAN '.$bag->unit_nama.'';
                $data['rekcuti'] = $this->mcovid->tamp_rekapcuti();
            }
            else{
                $data['bagian'] = 'SEMUA BAGIAN';
                $data['rekcuti'] = $this->mcovid->tamp_rekapcuti();

            }
            


            $isi =  $this->template->display('print/vprintrekapcuti', $data);
            $this->load->view('print/vprintrekapcuti', $isi);
        } else {
            redirect('login');
        }
        
    }


    public function tambahcovid(){
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('covid/vadd_terdugacovid', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }

    }

    function printsuratPengajuan(){
        if ($this->session->userdata('login') == true) {
            $nik= $this->session->userdata('nik');

            $data['pengajuan'] = $this->mcovid->getsuratmutasi($this->uri->segment(3));
            $data['get'] = $this->mcovid->Get_data($nik);

            $isi =  $this->template->display('print/vsuratpengajuan', $data);
            $this->load->view('print/vsuratpengajuan', $isi);
        } else {
            redirect('login');
        }
        
    }


    function getdatakar(){
        $post=$this->input->post();
        // konfigurasi upload
            $idcuti= $post['id'];
            $data = $this->mcovid->getdetdatkar($idcuti);
        echo json_encode($data);

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

    function addperjalananpas(){
        $post=$this->input->post();
        $cekKode = $this->session->userdata('kodeunik');
        if ($cekKode != '') {
            $cekKode = $this->session->userdata('kodeunik');
            # code...
        }else{
                $cekKode = $this->randomString();
                $kodeRahasia = $this->session->set_userdata('kodeunik',$cekKode);
        }
            $data['negara']= $post['negara'];
            $data['kota']=$post['kota'];
            $data['tglkunjungan']=$post['tglkun'];
            $data['kodeunik']=$cekKode;

            $this->mcovid->insertperjalanan($data);
            $info="berhasil ";
            echo json_encode($info);
    }

    function addkontakor(){
        $post=$this->input->post();
        $cekKode = $this->session->userdata('kodeunik');
        if ($cekKode != '') {
            $cekKode = $this->session->userdata('kodeunik');
            # code...
        }else{
                $cekKode = $this->randomString();
                $kodeRahasia = $this->session->set_userdata('kodeunik',$cekKode);
        }
            
            $post=$this->input->post();
            
            $data['namakon']= $post['namakon'];
            $data['alamatkon']=$post['alamatkon'];
            $data['hubungan']=$post['Hubungan'];
            $data['tglper']=$post['tglkper'];
            $data['tglter']=$post['tglkter'];
            $data['kodeunik']=$cekKode;
            $this->mcovid->insertkontak($data);
            $info="berhasil ";
            echo json_encode($info);
    }



    function AddDatacovid(){
        $post=$this->input->post();
        // konfigurasi upload
        $kode = $this->session->userdata('kodeunik');
        if ($kode != '') {
            $kode = $this->session->userdata('kodeunik');
            # code...
        }else{
                $kode = $this->randomString();
                $kodeRahasia = $this->session->set_userdata('kodeunik',$kode);
        }
            
            $data['kodeunik']= $kode;
            $data['pengirimspesimin']= $post['pengirims'];
            $data['dinaskeskota']= $post['kotadk'];
            $data['dinaskesprop']=$post['profdk'];
            $data['namars']=$post['namars'];
            $data['rskota']= $post['kotars'];            
            $data['namadokter']=$post['namadok'];
            $data['notlp']=$post['notlpspes'];
            $this->mcovid->insertpemngirimspesimen($data);

            $data1['kodeunik']= $kode;
            $data1['rmpasien']= $post['norm'];
            $data1['namapasien']= $post['namapasien'];
            $data1['ttl']= $post['tgl_lahir'];
            $data1['jeniskelamin']=$post['kelamin'];
            $data1['statushamil']= $post['statush'];
            $data1['alamat']=$post['alamat'];
            $data1['kepalakel']=$post['kepalakel'];
            $data1['telpon']=$post['notlppasien'];
            $this->mcovid->insertidentitaspasien($data1);

            $data2['kodeunik']= $kode;
            $data2['tglpertama']= $post['kunper'];
            $data2['rspertama']= $post['rspertama'];
            $data2['tglkedua']= $post['kunked'];
            $data2['rskedua']=$post['rskedua'];
            $data2['tglketiga']=$post['kunket'];
            $data2['rsketiga']= $post['rsketiga'];
            
            $this->mcovid->insertriwayatperawatansus($data2);

            $data3['kodeunik']= $kode;
            $data3['tglonset']= $post['onset'];
            $data3['panas']= $post['panas'];
            $data3['batuk']= $post['Batuk'];
            $data3['sakittenggorokan']=$post['Sakitteng'];
            $data3['sesak']=$post['sesak'];
            $data3['pilek']= $post['pilek'];
            $data3['lesu']=$post['lesu'];
            $data3['sakitkepala']=$post['sakitkep'];
            $data3['diare']=$post['diare'];
            $data3['mual']= $post['mualmuntah'];
            
            $this->mcovid->inserttandagejala($data3);


            $data4['kodeunik']= $kode;
            $data4['xrayparu']= $post['xray'];
            $data4['hasil']= $post['hasil'];
            $data4['lekosit']=$post['lekousit'];
            $data4['limposit']=$post['limposit'];
            $data4['trombosit']= $post['trombosit'];
            $data4['ventilator']=$post['Ventilator'];
            $data4['stausksehatan']=$post['statuskes'];            
            $this->mcovid->insertpemeriksaanpenunjang($data4);

            $data5['kodeunik']= $kode;
            $data5['serum']= $post['serum'];
            $data5['tglserum']= $post['tglambil1'];
            $data5['usapnesofar']= $post['usapnaso'];
            $data5['tglnesofar']=$post['tglambil2'];
            $data5['usaporofaring']=$post['usaporo'];
            $data5['tglorofar']= $post['tglambil3'];
            $data5['sputum']=$post['sputum'];
            $data5['tglsputum']=$post['tglambil4'];   
            $data5['lainnyasample']=$post['lainnya'];
            $data5['lainnya']=$post['lain'];
            $data5['tgllainnya']=$post['tglambil5'];           
            $this->mcovid->insertpengsample($data5);

            $data6['kodeunik']= $kode;
            $data6['hypertensi']= $post['kardiov'];
            $data6['diabetesm']= $post['diabetesm'];
            $data6['liver']=$post['liver'];
            $data6['neuromuskular']=$post['neurologi'];
            $data6['hiv']= $post['hiv'];
            $data6['paru']=$post['paru'];
            $data6['ginjal']=$post['ginjal'];   
            $data6['swabke']=$post['keterangan'];
            $this->mcovid->insertpenyakitkomorbid($data6);

            $data7['kodeunik']= $kode;
            $data7['perjalanan']= $post['perjl'];
            $data7['kontakorang']= $post['konor'];
            $data7['terinfeksi']=$post['terinfeksi'];
            $data7['anggotakel']=$post['anggotakel'];
            $this->mcovid->insertkontakpaparan($data7);

            $this->session->unset_userdata('kodeunik');
            $info="berhasil ";

        echo json_encode($info);

          }

    function editDataCuti(){
        $post=$this->input->post();
        // konfigurasi upload
            $idcuti= $post['idcuti'];
            $data['diizinkanhari']= $post['dhari'];
            $data['diizinkantglawal']=$post['dtglawal'];
            $data['diizinkantglakhir']=$post['dtglakhir'];
            $data['statusizin']='1';
            $data['menyetujui']=$this->session->userdata('ttd');
            $this->mcovid->editpengajuan($data,$idcuti);
            
            $info="berhasil ";

        echo json_encode($data);

          }

    function KonfirmasiCuti(){
        $post=$this->input->post();
        // konfigurasi upload
            $idcuti= $post['idcuti'];
            $data['statusizin']='2';
            $data['mengetahui']=$this->session->userdata('ttd');
            $this->mcovid->editpengajuan($data,$idcuti);
            
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
           

            $info="berhasil ";

            echo json_encode($data);

          }


   


    public function ajaxdaftar(){
            
           
            $data=array();
            $list = $this->mcovid->tamp_pasien();

            $no=1;


        //cacah data
        foreach ( $list as $item ) {


            $row = array();
            $row[] = $no;
            $row[] = $item ['rmpasien'];
            $row[] = $item ['namapasien'];
            $row[] = '
            <a class="btn btn-sm detail-'.$item['idpasein'].'"  title="Print" data-id='."'".json_encode($item)."'".'onclick="pilih('."'".$item['idpasein']."'".')">
            Pilih</a>
            ';
            
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


        public function ajaxperjalanan(){
            
           
            $data=array();
            $list = $this->mcovid->tamp_perjalanan();

            $no=1;
        //cacah data
        foreach ( $list as $item ) {


            $row = array();
            $row[] = $no;
            $row[] = $item ['negara'];
            $row[] = $item ['kota'];
            $row[] = $item ['tglkunjungan'];
            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }

        public function ajaxkontak(){
            
           
            $data=array();
            $list = $this->mcovid->tamp_kontak();

            $no=1;
        //cacah data
        foreach ( $list as $item ) {


            $row = array();
            $row[] = $no;
            $row[] = $item ['namakon'];
            $row[] = $item ['alamatkon'];
            $row[] = $item ['hubungan'];
            $row[] = $item ['tglper'];
            $row[] = $item ['tglter'];
            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }


    

     public function exportcuti()
     {


        // load excel library
        $list = $this->mcovid->tamp_rekapcuti();
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("No", "Nama Karyawan", "Hak Cuti", "Cuti Digunakan", "Sisa");

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
               $object->getActiveSheet()->setCellValueByColumnAndRow(2,$kolom, $rekap['hakcuti']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(3, $kolom, $rekap['digunakan']);
               $object->getActiveSheet()->setCellValueByColumnAndRow(4, $kolom, $rekap['sisa']);
              

               $kolom++;
               $nomor++;

          }

        $array_items = array('tglawal','tglakhir','unit');
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
            $this->mcovid->drop($id);

    }
   

    
   

}

