<?php
defined('BASEPATH') or exit('No direct script access allowed');

class daftarpasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdatapasien');
        $this->load->model('menu/mmenu');
    }

    

    public function datapasien()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['kamarload'] = $this->mdatapasien->loadkamar();
            $isi =  $this->template->display('daftarpasien/vdatapasien', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function tambahpasien()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['kodejadi'] = $this->mdatapasien->getkode_pasien();
            $data['kamarload'] = $this->mdatapasien->loadkamar();
            $data['dokterdpjp'] = $this->mdatapasien->loaddokter();
            $isi =  $this->template->display('daftarpasien/vaddpasien.php', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function tambahdiagnosa()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('daftarpasien/vadddiagnosa.php', $data);
            $this->load->view('admin/vutama', $isi);
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



    function AddDatapasien(){
        $post=$this->input->post();
        // konfigurasi upload
            $data['idpasien']= $post['kodepasien'];
            $data['rmpasien']= $post['norm'];
            $data['namapasien']=$post['namapasien'];
            $data['alamatpasien']=$post['alamat'];
            $data['ttlpasien']= $post['ttl'];
            $data['umurpasien']=$post['umur'];
            $data['idkamar']=$post['kamar'];
            $data['dokterdpjp']=$post['dokter'];
            $data['kelamin']= $post['kelamin'];
            $data['statushuni']='1';
            $data['tglmasuk']=date("Y-m-d h:i:sa");
            $data['userinput']= $this->session->userdata('nama');
             

            $data2['pasienhuni']=$post['kodepasien'];
            $nokamar = $post['kamar'];
            
            $this->mdatapasien->insertdatapasien($data);
            $this->mdatapasien->kamarpasien($nokamar,$data2);
            
            $info="berhasil ";

        echo json_encode($data);

          }





       public function TambahPemeriksaan($idpasien)
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['pasien'] = $this->mdatapasien->getdataPasien($idpasien);
            $data['kamarload'] = $this->mdatapasien->loadkamar2();
            $data['dokterdpjp'] = $this->mdatapasien->loaddokter();
            $isi =  $this->template->display('daftarpasien/vaddpemeriksaan', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('clogin');
        }
    }




    function addhasilpemeriksaan(){
        $post=$this->input->post();
        // konfigurasi upload
            $idpasien = $post['idpasien'];
            $getpasien = $this->mdatapasien->getpasien($idpasien);
            // $harimasuk= date('d', strtotime($getpasien->tglmasuk));
            $idkamarlama =$getpasien->idkamar;

            $this->session->set_userdata('rmpasien',$post['rmpasien']);
            $data['rmpasien']= $post['rmpasien'];
            $data['idpasien']= $post['idpasien'];
            $data['isidiagnosa']= $post['hasilpem'];
            $data['perawatpengisi']= $this->session->userdata('nama');
            
            $tglmasuk =date_create($getpasien->tglmasuk);
            $today = date_create();

            $day = date_diff($tglmasuk,$today)->days;

            $data['harike']= $day;

            $data['tanggalinput']=  date("Y-m-d h:i:sa");

            
            $data1['idkamar']= $post['kamar'];
            $data1['keterangan']= $post['keterangan'];
            $data1['dokterdpjp']=$post['dokter'];

            $data2['pasienhuni']= '0';

            $idkamarnew = $post['kamar'];
            $data3['pasienhuni']= $idpasien;
            

            $this->mdatapasien->ubahpasienhuni($idkamarlama,$data2);
            $this->mdatapasien->editkamar($idpasien,$data1);
            $this->mdatapasien->inserthasil($data);
            $this->mdatapasien->pasienhuni($idkamarnew,$data3);

            
            $info="berhasil ";

        echo json_encode($data['dokterdpjp']);

          }


          function update_hasil(){
            $post=$this->input->post();
            $id_hasil =$post['id'];
            $column =$post['column'];
            $value =$post['value'];
            $data[$column]= $value;
            $this->mdatapasien->upHasil($id_hasil,$data);
            $info="berhasil ";
            echo json_encode($info);
    }


    function getdatapasien(){
        $post=$this->input->post();
        // konfigurasi upload
            $idpasien= $post['id'];
            $data = $this->mdatapasien->getdataPasien($idpasien);
        echo json_encode($data);

          }






    public function ajaxListdatapasien(){
            
           
            $data=array();
            $list = $this->mdatapasien->getdata();

            $no=1;


        //cacah data
        foreach ( $list as $item ) {


            // $status = $item ['statushuni'];
            // if ($status == 1) {
            //       $hasil= 'Inap';
            //   }
            //   elseif($status == 2){
            //       $hasil= 'Pulang';
            //   }
           

            $row = array();
            $row[] = $item ['nk'];
            $row[] = $item ['rp'];
            $row[] = $item ['np'];
            $row[] =substr($item ['ap'],0,25);$item ['ap'];
            $row[] = $item ['ket'];
           
            $row[] = '
            <a class="btn btn-sm detail-'.$item['idpasien'].'"  title="Edit" data-id='."'".json_encode($item)."'".' onclick="Edit('."'".$item['idpasien']."'".')">
            Isi Pemeriksaan</a>
            <a class="btn btn-sm detail-'.$item['idpasien'].'"  title="Keluar" data-id='."'".json_encode($item)."'".' onclick="keluar('."'".$item['idpasien']."'".')">
            Pasien Keluar</a>
           
            ';
            



            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        $array_items = array('tglawal','tglakhir','kelompok','unt','unitm','subkel');
        $this->session->unset_userdata($array_items);
        }


 public function ajaxListpemeriksaan($rmpasien){
            // var_dump($cekKode);
            // $rmpasien = $this->session->userdata('rmpasien');

            $data=array();
            $list = $this->mdatapasien->gethasilpemeriksaan($rmpasien);

            $no=1;
            $hariini = date("d");
        //cacah data
        foreach ( $list as $item ) {
            $harimasuk= date('d', strtotime($item ['tglmasuk']));

            

            $row = array();
            $row[] = $no;
            $row[] = $item ['rmpasien'];
            $row[] = $item ['namapasien'];
            $row[] = $item ['isidiagnosa'];
            $row[] = $item ['tanggalinput'];
            $row[] = $item ['harike'];


            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }

    

    public function perbarui()
    {
        $id_fisio = $this->input->post('id_fisio');
        $no_rm = $this->input->post('no_rm');
        $nama_pasien = $this->input->post('nama_pasien');
        $tgl_periksa = $this->input->post('tgl_periksa');
        $penanggung = $this->input->post('penanggung');
        $poliklinik = $this->input->post('poliklinik');
        $dokter = $this->input->post('dokter');
        $shift = $this->input->post('shift');
        $status = $this->input->post('status');
        $user = $this->input->post('user');

        // Simpan Data
        $result = $this->mfisio->perbarui($no_rm, $nama_pasien, $tgl_periksa, $penanggung, $poliklinik, $dokter, $shift, $status, $user, $id_fisio);
        if ($result) {
            echo "<script>alert('Data Antrian Berhasil disimpan !'); history.go(-1)</script>";
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        }
    }

    public function laporan()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['cbpoli'] = $this->mfisio->combo_poli();
            $data['cbpenanggung'] = $this->mfisio->combo_penanggung();
            $isi =  $this->template->display('fisio/ctk_laporan', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function print_hasil_pem()
    {

        if ($this->session->userdata('login') == true) {

            $data['pasien'] = $this->mdatapasien->get_pasien($this->uri->segment(3));
            $gethasil = $this->mdatapasien->get_hasil($this->uri->segment(3))->khasildarah;

            $data['datahasil'] = $this->mdatapasien->getdata_hasil($gethasil);

            $isi =  $this->template->display('print/vprint_hasilpem', $data);
            $this->load->view('print/vprint_hasilpem', $isi);
        } else {
            redirect('login');
        }
    }

    function keluar(){
            $post= $this->input->post();
            $id= $post['id'];
            $getidkamar = $this->mdatapasien->getidkamar($id);
            $data['statushuni']= '0';
            $data['tjuserkeluar']=$this->session->userdata('nama');
            $data['tglkeluar']=date("Y-m-d h:i:sa");

            $idkamar = $getidkamar->idkamar;
            $data1['pasienhuni']= '0';
            
            $this->mdatapasien->pasienkeluar($id,$data);
            $this->mdatapasien->pasienhuni($idkamar,$data1);
            echo json_encode($idkamar);

    }

    function delete_data($id){
            $this->mdatapasien->drop_date($id);
            redirect('daftarpasien/datapasien');

    }

    function cek_hisys()
    {

        $no_rm = $_POST['no_rm'];

        function http_request($url)
        {
            // persiapkan curl
            $ch = curl_init();

            // set url 
            curl_setopt($ch, CURLOPT_URL, $url);

            // set user agent    
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

            // return the transfer as a string 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // otorisasi 
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: Basic YWRtZWRpa2E6YWRtZWRpa2E0cmVhbA==",
                    "Cache-Control: no-cache",
                    "Postman-Token: 9ccd433e-68fc-431b-b143-0082c27a494d"
                )
            );



            // $output contains the output string 
            $output = curl_exec($ch);

            // tutup curl 
            curl_close($ch);

            // mengembalikan hasil curl
            return $output;
        }

        $profile = http_request("http://192.168.0.236/api.php?mod=api&cmd=get_patient&no_rm=" . $no_rm . "&return_type=json");

        // ubah string JSON menjadi array
        $profile = json_decode($profile, true);

        //$nama=$profile['data']['nama_pasien'];
        //$alamat=$profile['data']['alamat'];
        //$tgl_lahir=$profile['data']['tgl_lahir'];
        //$jenis_kelamin=$profile['data']['jenis_kelamin'];
        //if($jenis_kelamin =='m'){$kelamin='L';} else {$kelamin='P';}

        $data = array(
            'nama_pasien'      =>  $profile['data']['nama_pasien'],
            // 'alamat'      =>  $profile['data']['alamat'],
            // 'tgl_lahir'      =>  $profile['data']['tgl_lahir'],
            // 'telp'      =>  $profile['data']['telepon'],
            // 'jenis_kelamin'      =>  $kelamin,
        );
        echo json_encode($data);
    }
}

