<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bankdarah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mbankdarah');
        $this->load->model('menu/mmenu');
    }

    

    public function datapasien()
    {
        if ($this->session->userdata('login') == true) {
            $data['pasien'] = $this->mbankdarah->tampilkan_pasienBD();
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('bankdarah/vdata_pasien', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function tambahpemeriksaan()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['kodejadi'] = $this->mbankdarah->no_hasil_bd();
            $data['dpjp'] = $this->mbankdarah->dokter_pjp();
            $isi =  $this->template->display('bankdarah/vadd_hasil_pemeriksaan', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function editpasienbd()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['hasilbd'] = $this->mbankdarah->get_by_id($this->uri->segment(3));
            $data['dpjp'] = $this->mbankdarah->dokter_pjp();
            // var_dump($data['hasilbd']);
            $isi =  $this->template->display('bankdarah/vedit_hasil_pemeriksaan', $data);

            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('clogin');
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


    function addHasilB(){
        $post=$this->input->post();
        $khasildarah = $post['khsaildarah'];
        if ($khasildarah != '') {
            $cekKode = $post['khsaildarah'];
            # code...
        }else{
            $cekKode = $this->session->userdata('khasildarah');
            if ( $cekKode == '') {
                $kode = $this->randomString();
                $kodeRahasia = $this->session->set_userdata('khasildarah',$kode);
        }
    }
            $data['identitas']= $post['identitas'];
            $data['minA1']=$post['minA1'];
            $data['plusA1']=$post['plusA1'];
            $data['A1']=$post['A1'];
            $data['B1']=$post['B1'];
            $data['O1']=$post['O1'];
            $data['AntiD1']=$post['AD1'];
            $data['RH1']=$post['RH1'];
            $data['mayor1']=$post['mayor1'];
            $data['minor1']=$post['minor1'];
            $data['ac1']=$post['AC1'];
            $data['ap1']=$post['AP1'];
            $data['keterangan']=$post['ket'];
            $data['khasildarah']=$cekKode;
            $data['id_pasien']=$post['id_pasien'];;

            $this->mbankdarah->insertHasilBD($data);
            $info="berhasil ";
            echo json_encode($info);

    }


     function AddPasien(){
        $post=$this->input->post();
        // konfigurasi upload
        $kode = $this->session->userdata('khasildarah');
            $data['id_pasien']= $post['id_pasien'];
            $data['no_rm']= $post['no_rm'];
            $data['nama_pasien']=$post['nama_pasien'];
            $data['tgl_lahir']= $post['tgl_lahir'];
            $data['alamat']=$post['alamat'];
            $data['jdarah']= $post['janisdarah'];
            $data['no_pemeriksaan']=$post['no_pemeriksaan'];
            $data['tgl_pemeriksaan']= $post['tgl_pemeriksaan'];
            $data['tgl_selesai']=$post['tgl_selesai'];
            $data['ruangan']=$post['ruangan'];
            $data['dokter']=$post['kode_dokter'];
            $data['pemeriksa_bd']=$post['pemeriksa'];
            $data['khasildarah']=$kode;
            $data['kelamin']=$post['kelamin'];
            

            $this->mbankdarah->insertPasienBD($data);
            $this->session->unset_userdata('khasildarah');
            
            $info="berhasil ";

        echo json_encode($data);

          }



        function EditPasien(){
            $post=$this->input->post();
        // konfigurasi upload
            $id_pasien= $post['id_pasien'];
            $data['no_rm']= $post['no_rm'];
            $data['nama_pasien']=$post['nama_pasien'];
            $data['tgl_lahir']= $post['tgl_lahir'];
            $data['alamat']=$post['alamat'];
            $data['jdarah']= $post['janisdarah'];
            $data['no_pemeriksaan']=$post['no_pemeriksaan'];
            $data['tgl_pemeriksaan']= $post['tgl_pemeriksaan'];
            $data['tgl_selesai']=$post['tgl_selesai'];
            $data['ruangan']=$post['ruangan'];
            $data['dokter']=$post['kode_dokter'];
            $data['pemeriksa_bd']=$post['pemeriksa'];
            $data['kelamin']=$post['kelamin'];
            

            $this->mbankdarah->upPasien($id_pasien,$data);
            // $this->session->unset_userdata('khasildarah');
            
            $info="berhasil ";

            echo json_encode($data);

          }


          function update_hasil(){
            $post=$this->input->post();
            $id_hasil =$post['id'];
            $column =$post['column'];
            $value =$post['value'];
            $data[$column]= $value;
            $this->mbankdarah->upHasil($id_hasil,$data);
            $info="berhasil ";
            echo json_encode($info);
    }




      //load data table..
    public function ajaxListHasil(){
            $cekKode = $this->session->userdata('khasildarah');
            if ( $cekKode == '') {
                $kode = $this->randomString();
                $kodeRahasia = $this->session->set_userdata('khasildarah',$kode);
            }
            // var_dump($cekKode);
            $data=array();
            $list = $this->mbankdarah->getdata($cekKode);

            $no=1;


        //cacah data
        foreach ( $list as $item ) {

            $ket = $item['keterangan'];

            if ($ket == '1') {
                $keter = 'Compatible';
            }
            else if($ket == '2'){
                $keter = 'Incompatible';
            }
            else{
                $keter = '';
                
            }

            $row = array();
            $row[] ='<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="Identitas">' . $item ['identitas'] . '</div>';
            $row[] ='<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="minA1">' . $item ['minA1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="plusA1">' . $item ['plusA1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="A1">' . $item ['A1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="B1">' . $item ['B1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="O1">' . $item ['O1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="AntiD1">' . $item ['AntiD1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="RH1">' . $item ['RH1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="mayor1">' . $item ['mayor1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="minor1">' . $item ['minor1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="ac1">' . $item ['ac1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="ap1">' . $item ['ap1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="keterangan">' . $keter . '</div>';
            $row[] = '
            <a class="btn btn-sm btn-primary"  title="delete" onclick="deleteH('."'".$item['id_hasil']."'".')">Delete</a>
            ';

            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }


          //load data table..
    public function ListHasil($khsaildarah){
           
            $data=array();
            $list = $this->mbankdarah->getdata($khsaildarah);

            $no=1;


        //cacah data
        foreach ( $list as $item ) {

            $ket = $item['keterangan'];

            if ($ket == '1') {
                $keter = 'Compatible';
            }
             else if($ket == '2'){
                $keter = 'Incompatible';
            }
            else{
                $keter = '';
            }

            $row = array();
            $row[] ='<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="Identitas">' . $item ['identitas'] . '</div>';
            $row[] ='<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="minA1">' . $item ['minA1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="plusA1">' . $item ['plusA1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="A1">' . $item ['A1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="B1">' . $item ['B1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="O1">' . $item ['O1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="AntiD1">' . $item ['AntiD1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="RH1">' . $item ['RH1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="mayor1">' . $item ['mayor1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="minor1">' . $item ['minor1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="ac1">' . $item ['ac1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="ap1">' . $item ['ap1'] . '</div>';
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_hasil"].'" data-column="keterangan">' . $keter . '</div>';
            $row[] = '
            <a class="btn btn-sm btn-primary"  title="delete" onclick="deleteH('."'".$item['id_hasil']."'".')">Delete</a>
            ';

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

            $data['pasien'] = $this->mbankdarah->get_pasien($this->uri->segment(3));
            $gethasil = $this->mbankdarah->get_hasil($this->uri->segment(3))->khasildarah;

            $data['datahasil'] = $this->mbankdarah->getdata_hasil($gethasil);

            $isi =  $this->template->display('print/vprint_hasilpem', $data);
            $this->load->view('print/vprint_hasilpem', $isi);
        } else {
            redirect('login');
        }
    }

    function delete(){
            $post= $this->input->post();
            $id= $post['id'];
            echo json_encode($id);
            $this->mbankdarah->drop($id);

    }

    function delete_data($id){
            $this->mbankdarah->drop_date($id);
            redirect('bankdarah/datapasien');

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

