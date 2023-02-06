<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mutasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mmutasi');
        $this->load->model('menu/mmenu');
    }

    

    public function dataKirimMutasi(){
        if ($this->session->userdata('login') == true) {

            $unit = $this->session->userdata('unit_id');
            $statper = $this->session->userdata('status_perizinan');
            
            $data['BarangMutasi'] = $this->mmutasi->tamp_BarangMutasi($unit);
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('mutasi/vdata_kirimbarangmutasi', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function dataTerimaMutasi(){
        if ($this->session->userdata('login') == true) {

            $gudang = $this->session->userdata('gudang');
            $statper = $this->session->userdata('status_perizinan');
            
            $data['BarangMutasi'] = $this->mmutasi->tamp_TerimaBarangMutasi($gudang);
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('mutasi/vdata_terimabarangmutasi', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }


    public function laporanMutasi(){
        if ($this->session->userdata('login') == true) {

            // $unit = $this->session->userdata('unit_id');
            $statper = $this->session->userdata('status_perizinan');
            $data['unit'] = $this->mmutasi->unitmutasi();
            $data['kelompok'] = $this->mmutasi->kelompok();
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('mutasi/vlaporanmutasi', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function alldatamutasi(){
        if ($this->session->userdata('login') == true) {
            
            $data['BarangMutasi'] = $this->mmutasi->alldatamutasi();
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('mutasi/vdataallmutasi', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }



    public function dataInventaris(){
        if ($this->session->userdata('login') == true) {
            $data['unit'] = $this->mmutasi->unit();
            $data['kelompok'] = $this->mmutasi->kelompok();
            $data['subkelompok'] = $this->mmutasi->subkelompok();
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('mutasi/vdata_baranginventaris', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }


    public function dataJualBarang(){
        if ($this->session->userdata('login') == true) {

            $unit = $this->session->userdata('unit_id');
            $statper = $this->session->userdata('status_perizinan');
            
            $data['BarangJual'] = $this->mmutasi->tamp_BarangJual();
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('mutasi/vdaftarpenjualanbar', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function tambahinventaris(){
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            // $data['cbpoli'] = $this->mdokter->combo_poli();

            $data['kodejadi'] = $this->mmutasi->no_hasil_Inventaris();
            $data['gudang'] = $this->mmutasi->GudangPenerima();
            $data['kelompok'] = $this->mmutasi->kelompok();
            $data['subkelompok'] = $this->mmutasi->subkelompok();
            $data['subkelompok2'] = $this->mmutasi->subkelompok2();
            $data['unit'] = $this->mmutasi->unit();
            $isi =  $this->template->display('mutasi/vadd_inventaris', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }

    }


    public function tambahvarinven(){
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            // $data['cbpoli'] = $this->mdokter->combo_poli();

            $data['kodejadikel'] = $this->nokelompok();
            $data['kodejadiDunit'] = $this->noDunit();
            $data['gudang'] = $this->mmutasi->GudangPenerima();
            $data['kelompok'] = $this->mmutasi->kelompok();
            $data['subkelompok'] = $this->mmutasi->subkelompok();
            $data['subkelompok2'] = $this->mmutasi->subkelompok2();
            $data['unit'] = $this->mmutasi->unit();
            $isi =  $this->template->display('mutasi/vadd_variableinventaris', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }

    }


    public function tambahmutasi()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $unit = $this->session->userdata('unit_id');
            $data['unit'] = $this->mmutasi->getunit($unit);
            $data['dunit'] = $this->mmutasi->unit();
            // var_dump($data['unit']);

            $data['kodejadi'] = $this->mmutasi->no_hasil_mutasi();
            $data['gudang'] = $this->mmutasi->GudangPenerima();
            $isi =  $this->template->display('mutasi/vadd_pengajuan_mutasi', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }



    public function jualbarang()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $unit = $this->session->userdata('unit_id');
            $data['unit'] = $this->mmutasi->getunit($unit);
            $data['dunit'] = $this->mmutasi->unit();
            // var_dump($data['unit']);

            $data['kodejadi'] = $this->mmutasi->no_jualbarang();
            $data['gudang'] = $this->mmutasi->GudangPenerima();
            $isi =  $this->template->display('mutasi/vpenjualanbarang', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function editAsset($nomorasset)
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['asset'] = $this->mmutasi->getEditInventaris($nomorasset);
            $data['gudang'] = $this->mmutasi->GudangPenerima();
            $data['kelompok'] = $this->mmutasi->kelompok();
            $data['subkelompok'] = $this->mmutasi->subkelompok();
            $data['subkelompok2'] = $this->mmutasi->subkelompok2();
            $data['unit'] = $this->mmutasi->unit();
            $isi =  $this->template->display('mutasi/vedit_inventaris', $data);
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

    public function nourut()
    {
        $no = $this->mmutasi->getmaxnomor();
        // // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($no,0);
        $kodeSekarang = $nourut + 1;
        return $kodeSekarang;
        // $data = array('kode_barang' => $kodeBarangSekarang);
        // $this->load->view("barang", $data);
    }

    public function nokelompok()
    {
        $no = $this->mmutasi->getmaxnokelompok();
        // // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($no,0);
        $kodeSekarang = $nourut + 1;
        return $kodeSekarang;
        // $data = array('kode_barang' => $kodeBarangSekarang);
        // $this->load->view("barang", $data);
    }

    public function noDunit()
    {
        $no = $this->mmutasi->getmaxnoDunit();
        // // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($no,0);
        $kodeSekarang = $nourut + 1;
        return $kodeSekarang;
        // $data = array('kode_barang' => $kodeBarangSekarang);
        // $this->load->view("barang", $data);
    }


    function addbarangMutasi(){
        $post=$this->input->post();
        $kdetmutasi = $post['kdetmutasi'];
        if ($kdetmutasi != '') {
            $cekKode = $post['kdetmutasi'];
            # code...
        }else{
            $cekKode = $this->session->userdata('kdetmutasi');
            if ( $cekKode == '') {
                $kode = $this->randomString();
                $kodeRahasia = $this->session->set_userdata('kdetmutasi',$kode);
        }
    }
            $post=$this->input->post();
            $data['nokodebarang']= $post['nokodebar'];
            $data['nama_barang']=$post['namabarang'];
            $data['kuantitas']=$post['kuantitas'];
            $data['satuan']=$post['satuan'];
            $data['keterangan']=$post['keterangan'];
            $data['kdetmutasi']=$cekKode;
            $data['status']='1';

            $this->mmutasi->insertBarangMutasi($data);
            $info="berhasil ";
            echo json_encode($info);
    }



    function addbarangjual(){
        $post=$this->input->post();
       
            $cekKode = $this->session->userdata('kunik');
            if ( $cekKode == '' ||  $cekKode == null) {
                $kode = $this->randomString();
                $kodeRahasia = $this->session->set_userdata('kunik',$kode);
                $kunikjadi = $this->session->userdata('kunik');
        
            }
            else{
                $kunikjadi = $this->session->userdata('kunik');
            }


            
            $post=$this->input->post();
            $data['noinventaris']= $post['nokodebar'];
            $data['namabarang']=$post['namabarang'];
            $data['kuantitas']=$post['kuantitas'];
            $data['satuan']=$post['satuan'];
            $data['dijual']=$post['ket'];
            $data['keterangan']=$post['keterangan'];
            $data['kunik']=$kunikjadi;

            $noinven =$post['nokodebar'];
            $data1['statusinventaris']='0';


            $this->mmutasi->upstatusinven($noinven,$data1);
            $this->mmutasi->insertbarangjual($data);
            $info="berhasil ";
            echo json_encode($info);
    }


    function AddDataMutasi(){
        $post=$this->input->post();
        // konfigurasi upload
        $kode = $this->session->userdata('kdetmutasi');
            $data['mutasi_id']= $post['id_mutasi'];
            $data['bagian']= $post['bagian'];
            $data['id_gudang']=$post['gd_penerima'];
            $data['alasan_mutasi']=$post['alasan'];
            $data['status_doc']= '1';
            $data['kdetmutasi']=$kode;
            $data['nomor']=$this->nourut();
            $data['tanggal_input'] =date("Y-m-d h:i:s");

            
             $ttd = $this->session->userdata('ttd');
            if ($ttd == '') {
                $data['ttdpenerima']='';
            }else{
                $data['ttdpenerima']=$this->session->userdata('ttd');

            }
            
            $this->mmutasi->insertDataMutasi($data);
            $this->session->unset_userdata('kdetmutasi');
            
            $info="berhasil ";

        echo json_encode($data);

          }



    function Addjualbarang(){
        $post=$this->input->post();
        // konfigurasi upload
        $kode = $this->session->userdata('kunik');
            $data['kodebarang']= $post['kodebarang'];
            $data['gudang']= 750;
            $data['status_doc']= '1';
            $data['kunik']=$kode;
            $data['tanggal'] =date("Y-m-d h:i:s");
            $data['ket']=$post['ket'];

            $this->mmutasi->insertjualbarang($data);
            $this->session->unset_userdata('kunik');
            
            $info="berhasil ";

        echo json_encode($info);

          }



     function AddDataInventaris(){
        $post=$this->input->post();
        // konfigurasi upload
        $kode = $this->session->userdata('kdetmutasi');
            $hargabel = $post['hargabel'];

            $result = preg_replace("/[^0-9]/", "", $hargabel);

            $data['assetnomor']= $post['kodeasset'];
            $data['assetnoreff']= $post['noasset'];
            $data['assettanggal']=$post['tglbeli'];
            $data['assetkelompok']=$post['kelompok'];
            $data['assetsubkelompok']= $post['subkelompok'];
            $data['assetsubkelompok2']=$post['subkelompok2'];
            $data['assetunit']=$post['unit'];
            $data['assetnama']= $post['nmasset'];
            $data['assetmerk']= $post['merk'];
            $data['assettype']= $post['type'];
            $data['assetnoseri']= $post['noseri'];
            $data['assetlokasi']= $post['lsekarang'];
            $data['assetsatuan']=$post['satuan'];
            $data['assetbanyak']=$post['jmlhqty'];
            $data['assetbelinama']= $post['belidr'];
            $data['assetbelialamat']=$post['alamatsup'];
            $data['assetbelijumlah']=$result;
            $data['assetstatus']=$post['stattbrng'];
            $data['assetketerangan']= $post['catatan'];
            $data['userdate']= date("Y-m-d h:i:sa");
            $data['userID']=$this->session->userdata('nama');
            
            $this->mmutasi->insertDataInventaris($data);
            
            $info="berhasil ";

        echo json_encode($data['assetbelijumlah']);

          }


        function addkelompok(){
            $post=$this->input->post();
        // konfigurasi upload

            $kode = $post['kode'];
            if($kode== 1){
                $data['nama']= $post['nama'];
                $this->mmutasi->insertkelompok($data);
            }
            elseif ($kode== 2) {
                $data['id_subkel']= $post['kodesubkel'];
                $data['namasubkel']= $post['nama'];
                $data['khusus']= $post['kodekel'];
                $this->mmutasi->insertsubkelompok($data);
            }
            elseif ($kode== 3) {
                $data['idsubkel2']= $post['kodesubkel2'];
                $data['namasubkel2']= $post['nama'];
                $data['khusus']= $post['subkelompok'];
                $this->mmutasi->insertsubkelompok2($data);
            }
            elseif ($kode== 4) {
                $data['id_unit2']= $post['kodeunit'];
                $data['namaunit2']= $post['nama'];
                $this->mmutasi->insertdunit($data);
            }
         $info="berhasil tersimpan";

        }

        function noAsset(){
            $post=$this->input->post();
            $tanggalbeli = $post['tglbeli'];
            $subkel= $post['subkelompok'];
            $dsubkel2=$post['subkelompok2'];
            $kel=$post['kelompok'];

            if ($kel == 2) {
                $jenisasset = 'D';
            }
            elseif ($kel == 3) {
                $jenisasset = 'K';
            }
            elseif ($kel == 4 || $kel == 9 || $kel == 10) {
                $jenisasset = 'M';
            }
            elseif ($kel == 5) {
                $jenisasset = 'N';
            }
            elseif ($kel == 8) {
                $jenisasset = 'KSO';
            }
            elseif ($kel == 11) {
                $jenisasset = 'MS';
            }


            $get =explode('-', $tanggalbeli);
            $tahun = $get[0];
            $ambilkode = $this->mmutasi->getmaxasset($subkel,$kel);
            $kar1 = strlen($ambilkode->idmax);
            if ($kar1 == 1) {
                $tambah = $ambilkode->idmax +1;
                $hasil = '00'.$tambah;
            }
            elseif ($kar1 == 2) {
                $tambah = $ambilkode->idmax +1;
                $hasil = '0'.$tambah;
            }
            else{
                $tambah = $ambilkode->idmax +1;
                $hasil = $tambah;
            }

            if ($dsubkel2 == null) {
                $kode = $jenisasset."/".$subkel."/".$tahun."/".$hasil;
            }
            else{
                $kode = $jenisasset."/".$dsubkel2."/".$tahun."/".$hasil;
            }
            
            echo json_encode($kode);


        }



    function SimpanEdit(){
            $post=$this->input->post();
            $hargabel = $post['hargabel'];
            $result = preg_replace("/[^0-9]/", "", $hargabel);

            $assetNo= $post['kodeasset'];
            $data['assetnoreff']= $post['noasset'];
            $data['assettanggal']=$post['tglbeli'];
            $data['assetkelompok']=$post['kelompok'];
            $data['assetsubkelompok']= $post['subkelompok'];
            $data['assetsubkelompok2']=$post['subkelompok2'];
            $data['assetunit']=$post['unit'];
            $data['assetnama']= $post['nmasset'];
            $data['assetmerk']= $post['merk'];
            $data['assettype']= $post['type'];
            $data['assetnoseri']= $post['noseri'];
            $data['assetlokasi']= $post['lsekarang'];
            $data['assetsatuan']=$post['satuan'];
            $data['assetbanyak']=$post['jmlhqty'];
            $data['assetbelinama']= $post['belidr'];
            $data['assetbelialamat']=$post['alamatsup'];
            $data['assetbelijumlah']=$result;
            $data['assetstatus']=$post['stattbrng'];
            $data['assetketerangan']= $post['catatan'];
            

            $this->mmutasi->editasset($data,$assetNo);
            
            $info="berhasil ";

        echo json_encode($data);

    }


     function edittd(){
        $post=$this->input->post();
        // konfigurasi upload
        $id = $post['getnomor'];
        $data['ttdrt']=$this->session->userdata('ttd');
        $data['status_doc']='2';
        $this->mmutasi->Upnomer($id,$data);
        $info="berhasil ";

        echo json_encode($info);

        }


        function editlaporan(){
        $post=$this->input->post();
        // konfigurasi upload
        $id = $post['getnomor'];
        if ($post['status'] == '3') {
        $data['ttddibukakan']=$this->session->userdata('ttd');
        $data['status_doc']='4';
        }else{
        $data['ttdgudangpen']=$this->session->userdata('ttd');
        $data['status_doc']='3';

        }
        $this->mmutasi->Upnomer($id,$data);
        $info="berhasil ";

        echo json_encode($info);

        }


         function editlaporanJual(){
        $post=$this->input->post();
        // konfigurasi upload
        $id = $post['getnomor'];
        if ($post['nik'] == '20091042') {
        $data['ttddibuat']=$this->session->userdata('ttd');
        $data['status_doc']='2'; 
        }
        elseif ($post['nik'] == '20151645') {
        $data['ttdditerima']=$this->session->userdata('ttd');
        $data['status_doc']='3';
        }
        elseif ($post['nik'] == '20030947' || $post['nik'] == '19930583') {
        $data['ttddibukakan']=$this->session->userdata('ttd');
        $data['status_doc']='4';
        }
        elseif ($post['nik'] == '20000866') {
        $data['ttddiket']=$this->session->userdata('ttd');
        $data['status_doc']='5';
        }


        $this->mmutasi->Upjual($id,$data);
        $info="berhasil ";

        echo json_encode($info);

        }


    function getkodekel(){
        $post=$this->input->post();
        $kel = $post['kelompok'];
        $ambilkode = $this->mmutasi->getsubkode($kel);
        if ($ambilkode->idmax == null) {
            $no = $kel;
            $kode = $no.'0001';
            $jumlah = (int)$kode;
        }
        else{
            $jumlah = $ambilkode->idmax + 1 ;

        }

        
        echo json_encode($jumlah);
    }

    function getkodesub(){
        $post=$this->input->post();
        $subkelompok = $post['subkelompok'];
        $ambilkode = $this->mmutasi->getsubkel2kode($subkelompok);
        if ($ambilkode->idmax == null) {
            $kode =  $subkelompok.'0001';
            $jumlah = (int)$kode;
        }
        else{
             $jumlah = $ambilkode->idmax + 1;
        }
       
        echo json_encode($jumlah);
    }


      //load data table..
    public function ajaxListBarangMutasi(){
            $cekKode = $this->session->userdata('kdetmutasi');
            if ( $cekKode == '') {
                $kode = $this->randomString();
                $kodeRahasia = $this->session->set_userdata('kdetmutasi',$kode);
            }
            // var_dump($cekKode);
            $data=array();
            $list = $this->mmutasi->getbarangmutasi($cekKode);

            $no=1;
        //cacah data
        foreach ( $list as $item ) {

            

            $row = array();
            $row[] = $no;
            $row[] = $item ['nokodebarang'];
            $row[] = $item ['nama_barang'];
            $row[] = $item ['kuantitas'];
            $row[] = $item ['satuan'];
            $row[] = $item ['keterangan'];
            $row[] = '
            <a class="btn btn-sm btn-primary"  title="delete" onclick="deleteH('."'".$item['barangmutasi_id']."'".')">
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



        public function ajaxListBarangjual(){
            $cekKode = $this->session->userdata('kunik');
            // if ( $cekKode == '') {
            //     $kode = $this->randomString();
            //     $kodeRahasia = $this->session->set_userdata('kunik',$kode);
            // }
            // var_dump($cekKode);
            $data=array();
            $list = $this->mmutasi->getbarangjual($cekKode);

            $no=1;
        //cacah data
        foreach ( $list as $item ) {

            

            $row = array();
            $row[] = $no;
            $row[] = $item ['noinventaris'];
            $row[] = $item ['namabarang'];
            $row[] = $item ['kuantitas'];
            $row[] = $item ['satuan'];
            // $row[] = $item ['keterangan'];

            if ($item ['dijual'] ==1) {
                $row[] = "Dijual ->".$item ['keterangan'];
            }elseif ($item ['dijual'] ==2) {
                 $row[] = "Dimusnahkan ->". $item ['keterangan'];
            }
            
            $row[] = '
            <a class="btn btn-sm btn-primary"  title="delete" onclick="deleteH('."'".$item['idbarang']."'".','."'".$item['noinventaris']."'".')">
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


          //load data table..
    public function ajaxListBarang(){
            $data=array();
            $list = $this->mmutasi->getdata();

            $no=1;


        //cacah data
        foreach ( $list as $item ) {

            $row = array();
            $row[] = $no;
            $row[] = $item ['assetnomor'];
            $row[] = $item ['assetnoreff'];
            $row[] = $item ['assetnama'];
            $row[] = $item ['nama'];
            $row[] = $item ['namaunit2'];

            $row[] = '
            <a class="btn btn-sm detail-'.$item['assetnomor'].'"  title="lihat detail" data-id='."'".json_encode($item)."'".' onclick="pilih('."'".$item['assetnomor']."'".')">
            Pilih</a>
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
    public function ajaxListBarangwithkode($kodeunit){
            $data=array();
            $list = $this->mmutasi->getdatawithkode($kodeunit);

            $no=1;


        //cacah data
        foreach ( $list as $item ) {

            $row = array();
            $row[] = $no;
            $row[] = $item ['assetnomor'];
            $row[] = $item ['assetnoreff'];
            $row[] = $item ['assetnama'];
            $row[] = $item ['nama'];
            $row[] = $item ['namaunit2'];

            $row[] = '
            <a class="btn btn-sm detail-'.$item['assetnomor'].'"  title="lihat detail" data-id='."'".json_encode($item)."'".' onclick="pilih('."'".$item['assetnomor']."'".')">
            Pilih</a>
            ';



            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }


        public function ajaxListInventaris(){
            
           
            $data=array();
            $list = $this->mmutasi->tamp_BarangInventaris();

            $no=1;


        //cacah data
        foreach ( $list as $item ) {


            $status = $item ['assetstatus'];
            if ($status == 1) {
                  $hasil= 'Baik';
              }
              elseif($status == 2){
                  $hasil= 'Di Service';
              }
               elseif($status == 3){
                  $hasil= 'Rusak';
              }
              elseif($status == 4){
                  $hasil= 'Dijual';
              }
              elseif($status == 5){
                  $hasil= 'Dihibahkan ke Pihak Lain';
              }
              elseif($status == 6){
                  $hasil= 'Dihapuskan';
              }

            $row = array();
            $row[] = $no;
            $row[] = $item ['assetnomor'];
            $row[] = $item ['assetnoreff'];
            $row[] = $item ['assettanggal'];
            $row[] = $item ['assetnama'];
            $row[] = $item ['assetmerk'];
            $row[] = $item ['assettype'];
            $row[] = $item ['assetnoseri'];
            $row[] = $hasil;
            $row[] = '
            <a class="btn btn-sm detail-'.$item['assetnomor'].'"  title="Edit" data-id='."'".json_encode($item)."'".' onclick="Edit('."'".$item['assetnomor']."'".')">
            Edit</a>
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


        public function ajaxListSupplier(){
            
           
            $data=array();
            $list = $this->mmutasi->getsupplier();

            $no=1;


        //cacah data
        foreach ( $list as $item ) {

            $row = array();
            $row[] = $item ['suppKode'];
            $row[] = $item ['supnama'];
            $row[] = $item ['supalamat'];
            $row[] = $item ['supkota'];

            $row[] = '
            <a class="btn btn-sm detail-'.$item['supp_id'].'"  title="lihat detail" data-id='."'".json_encode($item)."'".'onclick="pilih('."'".$item['supp_id']."'".')">
            Pilih</a>
            ';



            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }


        public function getmutasi(){
        $post=$this->input->post();
        // konfigurasi upload
        $this->session->set_userdata('tglawal',$post['tglawal']);
        $this->session->set_userdata('tglakhir',$post['tglakhir']);
        $this->session->set_userdata('kelompok',$post['kelompok']);
        $this->session->set_userdata('unt',$post['unt']);
        $this->session->set_userdata('unitm',$post['unitm']);
        $this->session->set_userdata('subkel',$post['subkelompok']);
        $this->session->set_userdata('merk',$post['assetmerk']);
        $this->session->set_userdata('type',$post['assettype']);
        $this->session->set_userdata('noseri',$post['assetnoseri']);
           

            $info="berhasil ";

            echo json_encode($data);

          }



    public function getmutasiimport(){
        $post=$this->input->post();
        // konfigurasi upload
        $this->session->set_userdata('tglawal',$post['tglawal']);
        $this->session->set_userdata('tglakhir',$post['tglakhir']);
        $this->session->set_userdata('kelompok',$post['kelompok']);
        $this->session->set_userdata('unitm',$post['unitm']);
           

            $info="berhasil ";

            echo json_encode($data);

          }




        public function ajaxListLaporanMutasi(){

          $list = $this->mmutasi->tamp_LaporanMutasi();
          
            
           
            $data=array();
           

            $no=1;


        //cacah data
        foreach ( $list as $item ) {

            $row = array();
            $row[] = $no;
            $row[] = $item ['mutasi_id'];
            $row[] = $item ['nokodebarang'];
            $row[] = $item ['nama_barang'];
            $row[] = $item ['unit_nama'];
            $row[] = $item ['nama_gudang'];
            $row[] = $item ['kuantitas'];
            $row[] = $item ['satuan'];
            $row[] = $item ['tanggal_input'];
            $row[] = $item ['alasan_mutasi'];
            $row[] = $item ['assetbelijumlah'];
            $row[] = '
            <a class="btn btn-sm detail-'.$item['mutasi_id'].'"  title="lihat detail" data-id='."'".json_encode($item)."'".'onclick="pilih('."'".$item['mutasi_id']."'".')">
            Pilih</a>
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


     



    public function ajaxListKelompok(){
            
            $data=array();
            $list = $this->mmutasi->getkel();

            $no=1;
        //cacah data
        foreach ( $list as $item ) {

            

            $row = array();
            $row[] = $no;
            $row[] = $item ['nama'];
           

            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }


    public function ajaxListSubkelompok(){
            
            $data=array();
            $list = $this->mmutasi->getsubkel();

            $no=1;
        //cacah data
        foreach ( $list as $item ) {
            $row = array();
            $row[] = $no;
            $row[] = $item ['id_subkel'];
            $row[] = '<div contenteditable class="update" data-id="'.$item["id_subkel"].'" data-column="namasubkel">' . $item ['namasubkel'] . '</div>';
           

            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }


    public function ajaxListSubkelompok2(){
            
            $data=array();
            $list = $this->mmutasi->getsubkel2();

            $no=1;
        //cacah data
        foreach ( $list as $item ) {
            $row = array();
            $row[] = $no;
            $row[] = $item ['idsubkel2'];
            $row[] = '<div contenteditable class="update1" data-id="'.$item["idsubkel2"].'" data-column="namasubkel2">' . $item ['namasubkel2'] . '</div>';
           

            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }


    public function ajaxListUnit(){
            
            $data=array();
            $list = $this->mmutasi->unitget();

            $no=1;
        //cacah data
        foreach ( $list as $item ) {
            $row = array();
            $row[] = $item ['id_unit2'];
            $row[] = '<div contenteditable class="unit" data-id="'.$item["id_unit2"].'" data-column="namaunit2">' . $item ['namaunit2'] . '</div>';
           

            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }



    function printPerintahMutasi(){
        if ($this->session->userdata('login') == true) {
            // var_dump($this->uri->segment(3));


            $data['mutasi'] = $this->mmutasi->Det_BarangMutasi($this->uri->segment(3));
            $data['get'] = $this->mmutasi->Get_data($this->uri->segment(3));


            $isi =  $this->template->display('print/vprint_printahmutasi', $data);
            $this->load->view('print/vprint_printahmutasi', $isi);
        } else {
            redirect('login');
        }
        
    }

    function printLaporanMutasi(){
        if ($this->session->userdata('login') == true) {

            $data['mutasi'] = $this->mmutasi->Det_BarangMutasi($this->uri->segment(3));
            $data['get'] = $this->mmutasi->Get_data($this->uri->segment(3));
            $GUDANG =$this->session->userdata('gudang');

            $isi =  $this->template->display('print/vprint_laporanmutasi', $data);
            $this->load->view('print/vprint_laporanmutasi', $isi);
        } else {
            redirect('login');
        }
        
    }


    function printJualBarang(){
        if ($this->session->userdata('login') == true) {

            $data['jual'] = $this->mmutasi->Det_JualBarang($this->uri->segment(3));
            $data['get'] = $this->mmutasi->Get_dataJual($this->uri->segment(3));
            $GUDANG =$this->session->userdata('gudang');

            $isi =  $this->template->display('print/vprint_laporanjual', $data);
            $this->load->view('print/vprint_laporanjual', $isi);
        } else {
            redirect('login');
        }
        
    }


    function printLaporanInventaris(){
        if ($this->session->userdata('login') == true) {
           
            $data['inven'] = $this->mmutasi->Laporaninven();
            $kelompok=$this->session->userdata('kelompok');
            if ($kelompok == '') {
                $data['kel'] = 'All' ;
            }
            else{
                $data['kel'] = $this->mmutasi->getkelompok($kelompok);

            }
            
            
            $isi =  $this->template->display('print/vprint_laporaninventaris', $data);
            $this->load->view('print/vprint_laporaninventaris', $isi);
        } else {
            redirect('login');
        }
        
    }

    public function export()
     {


        // load excel library
        $list = $this->mmutasi->Exportexcelinventaris();
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("No", "Kode", "No Asset", "Unit", "Tanggal Beli", "Nama Asset","Merk","Type","No Seri","Status");

            $column = 0;

            foreach($table_columns as $field)
            {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
                $column++;
            }         

          $kolom = 2;
          $nomor = 1;
          foreach($list as $inven) {
             $status = $inven->assetstatus;
            if ($status == 1) {
                  $hasil= 'Baik';
              }
              elseif($status == 2){
                  $hasil= 'Di Service';
              }
               elseif($status == 3){
                  $hasil= 'Rusak';
              }
              elseif($status == 4){
                  $hasil= 'Dijual';
              }
              elseif($status == 5){
                  $hasil= 'Dihibahkan ke Pihak Lain';
              }
              elseif($status == 6){
                  $hasil= 'Dihapuskan';
              }

               $object->getActiveSheet()->setCellValueByColumnAndRow(0, $kolom, $nomor);
               $object->getActiveSheet()->setCellValueByColumnAndRow(1, $kolom, $inven->assetnomor);
               $object->getActiveSheet()->setCellValueByColumnAndRow(2, $kolom, $inven->assetnoreff);
               $object->getActiveSheet()->setCellValueByColumnAndRow(3, $kolom, $inven->namaunit2);
               $object->getActiveSheet()->setCellValueByColumnAndRow(4, $kolom, $inven->assettanggal);
               $object->getActiveSheet()->setCellValueByColumnAndRow(5, $kolom, $inven->assetnama);
               $object->getActiveSheet()->setCellValueByColumnAndRow(6, $kolom, $inven->assetmerk);
               $object->getActiveSheet()->setCellValueByColumnAndRow(7, $kolom, $inven->assettype);
               $object->getActiveSheet()->setCellValueByColumnAndRow(8, $kolom, $inven->assetnoseri);
               $object->getActiveSheet()->setCellValueByColumnAndRow(9, $kolom, $hasil);
               // $object->getActiveSheet()->setCellValueByColumnAndRow(9, $kolom, $hasil);

               $kolom++;
               $nomor++;

          }

        $array_items = array('tglawal','tglakhir','kelompok','unt','unitm','subkel');
        $this->session->unset_userdata($array_items);

          $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Data Inventaris.xls"');
            $object_writer->save('php://output');
     }

public function exportMutasi()
     {
        // load excel library
        $list = $this->mmutasi->tamp_LaporanMutasiExport();
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);


        $table_columns = array("NO", "ID MUTASI","NAMA BARANG", "NAMA BARANG", "PENGIRIM", "GUDANG PENERIMA","KUANTITAS","SATUAN","TANGGAL MUTASI","ALASAN MUTASI","HARGA BARANG");

            $column = 0;

            foreach($table_columns as $field)
            {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
                $column++;
            }         

          $kolom = 2;
          $nomor = 1;
          foreach($list as $mutasi) {
          

               $object->getActiveSheet()->setCellValueByColumnAndRow(0, $kolom, $nomor);
               $object->getActiveSheet()->setCellValueByColumnAndRow(1, $kolom, $mutasi->mutasi_id);
               $object->getActiveSheet()->setCellValueByColumnAndRow(2, $kolom, $mutasi->nokodebarang);
               $object->getActiveSheet()->setCellValueByColumnAndRow(3, $kolom, $mutasi->nama_barang);
               $object->getActiveSheet()->setCellValueByColumnAndRow(4, $kolom, $mutasi->unit_nama);
               $object->getActiveSheet()->setCellValueByColumnAndRow(5, $kolom, $mutasi->nama_gudang);
               $object->getActiveSheet()->setCellValueByColumnAndRow(6, $kolom, $mutasi->kuantitas);
               $object->getActiveSheet()->setCellValueByColumnAndRow(7, $kolom, $mutasi->satuan);
               $object->getActiveSheet()->setCellValueByColumnAndRow(8, $kolom, $mutasi->tanggal_input);
               $object->getActiveSheet()->setCellValueByColumnAndRow(9, $kolom, $mutasi->alasan_mutasi);
               $object->getActiveSheet()->setCellValueByColumnAndRow(10, $kolom, $mutasi->assetbelijumlah);

               $kolom++;
               $nomor++;

          }
          $array_items = array('tglawal','tglakhir','kelompok','unt','unitm');

        $this->session->unset_userdata($array_items);


        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Data Mutasi.xls"');
            $object_writer->save('php://output');
        
        
     }



     function deletemutasi($id){
        $this->mmutasi->dropmutasi($id);

        redirect('mutasi/dataKirimMutasi');

    }

    function deletejual(){
        $post= $this->input->post();
        $id= $post['id'];
        $noinven= $post['noinven'];
        $data['statusinventaris'] = '1';
        $this->mmutasi->dropmutasi($id);
        $this->mmutasi->upinventaris($noinven,$data);
        // echo json_encode($noinven);
        // redirect('mutasi/dataKirimMutasi');

    }
     

     function delete(){
            $post= $this->input->post();
            $id= $post['id'];
            echo json_encode($id);
            $this->mmutasi->drop($id);

    }


    function edsub1(){
            $post=$this->input->post();
            $id_hasil =$post['id'];
            $column =$post['column'];
            $value =$post['value'];
            $data[$column]= $value;
            $this->mmutasi->edsub1($id_hasil,$data);
            $info="berhasil ";
            echo json_encode($info);
    }


    function edsub2(){
            $post=$this->input->post();
            $id_hasil =$post['id'];
            $column =$post['column'];
            $value =$post['value'];
            $data[$column]= $value;
            $this->mmutasi->edsub2($id_hasil,$data);
            $info="berhasil ";
            echo json_encode($info);
    }

    function eunit(){
            $post=$this->input->post();
            $id_hasil =$post['id'];
            $column =$post['column'];
            $value =$post['value'];
            $data[$column]= $value;
            $this->mmutasi->eunit($id_hasil,$data);
            $info="berhasil ";
            echo json_encode($info);
    }



    function update_hasil(){
            $post=$this->input->post();
            $id_hasil =$post['id'];
            $column =$post['column'];
            $value =$post['value'];
            $data[$column]= $value;
            $this->mmutasi->upNoinven($id_hasil,$data);
            $info="berhasil ";
            echo json_encode($info);
    }
   

}

