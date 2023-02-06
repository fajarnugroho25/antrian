<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sekretariat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('msekretariat');
        $this->load->model('menu/mmenu');
        $this->load->helper('date');
    }

    //fungsi untuk input pengajuan nomor surat baru
    public function surat()
    {
       if ($this->session->userdata('login') == true) {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $data['sekretariat'] = $this->msekretariat->tampilkan();
        $isi =  $this->template->display('sekretariat/vgeneratesurat', $data);
        $this->load->view('admin/vutama', $isi);


    } else {
        redirect('login');
    }
}

//fungsi mengubah bulan ke romawi
public function romawi($tanggal)
{ 
    $bulan= date('n',strtotime($tanggal));
    switch ($bulan){
        case 1: 
        return "I";
        break;
        case 2:
        return "II";
        break;
        case 3:
        return "III";
        break;
        case 4:
        return "IV";
        break;
        case 5:
        return "V";
        break;
        case 6:
        return "VI";
        break;
        case 7:
        return "VII";
        break;
        case 8:
        return "VIII";
        break;
        case 9:
        return "IX";
        break;
        case 10:
        return "X";
        break;
        case 11:
        return "XI";
        break;
        case 12:
        return "XII";
        break;
    }
}

    //fungsi untuk menginput pengajuan nomor baru ke database (case 1 & 3)
public function generate()
{

    if ($this->session->userdata('login') == true) {
        //menangkap inputan data dari form
        $kode_bagian =  $this->input->post('bagian');
        $kode_surat = $this->input->post('jenis_surat');
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->romawi($tanggal);
        $tahun = date('Y',strtotime($tanggal));
        $status = $this->input->post('status');
        $tanggal_input = date("Y-m-d H:i:s");
        $where = [
            'kode_bagian' => $kode_bagian,
            // 'kode_surat' => $kode_surat,
            // 'bulan' => $bulan,
            'tahun' => $tahun,
            'status' => 'Sudah Disetujui',
        ];

        $where2 = [
            'kode_bagian' => $kode_bagian,
            // 'kode_surat' => $kode_surat,
            'tanggal' => $tanggal,
            // 'bulan' => $bulan,
            'tahun' => $tahun,
            'status' => 'Sudah Disetujui',
        ];
        //dilarang input
        $where3 = [
            'kode_bagian' => $kode_bagian,
            // 'kode_surat' => $kode_surat,
            // 'bulan' => $bulan,
            'tahun' => $tahun,

        ];
        $where4 = [
            'kode_bagian' => $kode_bagian,
            // 'kode_surat' => $kode_surat,
            // 'bulan' => $bulan,
            'tanggal' => $tanggal,
            'tahun' => $tahun,
        ];
        $this->db->select_max('tanggal');
        $this->db->where($where3);
        $this->db->from('surat');
        $max_tanggal = $this->db->get()->row_array();
        $max_tanggal = $max_tanggal['tanggal'];
        if($tanggal<$max_tanggal)
        {
            $cekgagal = $this->msekretariat->surat($where4)->result_array();
            if($cekgagal==false){ 
                $this->session->set_flashdata('message', '
                      <div class="alert alert-danger" role="alert">
                         Ups, Sepertinya ada Kesalahan :(
                      </div>');
                // echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
                         redirect('sekretariat/persetujuan');
                        
            } 


        } 
        //cek tanggal nomor surat den
        //cek nomor surat sudah disetujui atau belum
        if ($status == 'Belum Disetujui') {
            //nomor surat belum disetujui memiliki nilai default
            $nomor = 0;
            $no_surat = "Nomor Surat Belum Disetujui";
            $ekstensi = 0;
        } else {
            //nomor surat yang sudah disetujui (baru)

            //mangambil data tanggal maksismal pada database
            $this->db->select_max('tanggal');
            $this->db->where($where);
            $this->db->from('surat');
            $max_tanggal = $this->db->get()->row_array();
            $max_tanggal = $max_tanggal['tanggal'];
            //cek tanggal nomor surat dengan tanggal maksimal pada database (case 3)
            if($tanggal<$max_tanggal){
            //tanggal lebih kecil daripada tanggal maksimal maka masuk case 3

            //mengambil ekstensi dan nomor maksimal
                $this->db->select_max('ekstensi');
                $this->db->where($where2);
                $this->db->from('surat');
                $cekesktensi = $this->db->get()->row_array();
                $ekstensi_max = $cekesktensi["ekstensi"];
                $this->db->select_max('nomor');
                $this->db->where($where2);
                $this->db->from('surat');
                $samatanggal = $this->db->get()->row_array();
                $nomor_max = $samatanggal["nomor"];
                $nomor = $nomor_max;
                //cek sudah ada ekstensi atau tidak 
                if($ekstensi_max==0){
                    //jika tidak ada ekstensi maka dimulai dari satu
                    $ekstensi = 1;
                    if($nomor_max<10){
                        $no_surat = "00$nomor_max.$ekstensi/$kode_bagian/$kode_surat/$bulan/$tahun";
                    } else if($nomor_max>10 && $nomor_max < 100){
                        $no_surat = "0$nomor_max.$ekstensi/$kode_bagian/$kode_surat/$bulan/$tahun";
                    } else {
                        $no_surat = "$nomor_max.$ekstensi/$kode_bagian/$kode_surat/$bulan/$tahun";
                    }
                } else {
                    //jika suda ada ekstensi maka diteruskan
                    $ekstensi = $ekstensi_max+1;
                    if($nomor_max<10){
                        $no_surat = "00$nomor_max.$ekstensi/$kode_bagian/$kode_surat/$bulan/$tahun";
                    } else if($nomor_max>10 && $nomor_max < 100){
                        $no_surat = "0$nomor_max.$ekstensi/$kode_bagian/$kode_surat/$bulan/$tahun";
                    } else {
                        $no_surat = "$nomor_max.$ekstensi/$kode_bagian/$kode_surat/$bulan/$tahun";
                    }  
                }
            } else {
            //tanggal nomor baru masih ditanggal maksimal, atau tanggal nomor baru lebih tinggi dari tanggal maksimal (case 1)
                $surat = $this->msekretariat->surat($where)->result_array();
            //cek isi tabel surat sudah ada atau belum
                if($surat){
                //jika isi tabel sudah ada dan menambahkan nomor surat terbaru 
                    $this->db->select_max('nomor');
                    $this->db->where($where);
                    $this->db->from('surat');
                    $query = $this->db->get()->row_array();
                    $nomor = $query['nomor']+1;
                    if($nomor<10){
                        $no_surat = "00$nomor/$kode_bagian/$kode_surat/$bulan/$tahun";
                    } else if($nomor>10 && $nomor < 100){
                        $no_surat = "0$nomor/$kode_bagian/$kode_surat/$bulan/$tahun";
                    } else {
                        $no_surat = "$nomor/$kode_bagian/$kode_surat/$bulan/$tahun";
                    }

                } else {
                //jika isi tabel belum ada dan membuat nomor baru
                    $nomor = 1;
                    if($nomor<10){
                        $no_surat = "00$nomor/$kode_bagian/$kode_surat/$bulan/$tahun";
                    } else if($nomor>10 && $nomor < 100){
                        $no_surat = "0$nomor/$kode_bagian/$kode_surat/$bulan/$tahun";
                    } else {
                        $no_surat = "$nomor/$kode_bagian/$kode_surat/$bulan/$tahun";
                    }  
                }
                $ekstensi = 0;
            }
            
            
        }
        //data yang diinput ke database
        $data = [
            "kode_bagian" =>  $this->input->post('bagian'),
            "kode_surat" => $this->input->post('jenis_surat'),
            "perihal" => $this->input->post('perihal'),
            "tujuan" => $this->input->post('tujuan'),
            "tanggal"=> $this->input->post('tanggal'),
            "bulan"=> $this->romawi($tanggal),
            "tahun" => date('Y',strtotime($tanggal)),
            "status" =>  $this->input->post('status'),
            "nomor" => $nomor,
            "no_surat" =>$no_surat,
            "ekstensi" => $ekstensi,
            "data_date" => $tanggal_input,

        ];
        $input = $this->msekretariat->input($data,'surat');
        redirect('sekretariat/persetujuan');

    } else {
        redirect('login');
    }
}

    //fungsi menampilkan data nomor surat dalam tabel
public function persetujuan()
{   
   if ($this->session->userdata('login') == true) {
    $data['menu_list'] = $this->mmenu->tampilkan();
    $data['submenu_list'] = $this->mmenu->tampilkansub();
    $data['pengajuan'] = $this->msekretariat->pengajuan();
    $isi =  $this->template->display('sekretariat/vpersetujuan', $data);
    $this->load->view('admin/vutama', $isi);
} else {
    redirect('login');
}
}

    //fungsi verifikasi surat yang belum disetujui (case 2)
public function editpengajuan($id)
{ 
   if ($this->session->userdata('login') == true) {
    $data['menu_list'] = $this->mmenu->tampilkan();
    $data['submenu_list'] = $this->mmenu->tampilkansub();
            //mengambil data surat berdasar id yg dipilih
    $where = [
        'id_surat' => $id,
    ];
    $detailsurat = $this->msekretariat->detailsurat($where,'surat')->row_array();
            //mengambil data di tabel surat yg hampir mirip dengan data yg dipilih
    $where2 = [
        'kode_bagian' => $detailsurat['kode_bagian'],
        // 'kode_surat' => $detailsurat['kode_surat'],
        // 'bulan' => $detailsurat['bulan'],
        'tahun' => $detailsurat['tahun'],
        'status' => 'Sudah Disetujui',
    ];
    $where3 = [
        'kode_bagian' => $detailsurat['kode_bagian'],
        // 'kode_surat' => $detailsurat['kode_surat'],
        'tanggal' => $detailsurat['tanggal'],
        // 'bulan' => $detailsurat['bulan'],
        'tahun' => $detailsurat['tahun'],
        'status' => 'Sudah Disetujui',
    ];
    $kode_bagian = $detailsurat['kode_bagian'];
    $kode_surat = $detailsurat['kode_surat'];
    $tanggal = $detailsurat['tanggal'];
    $bulan = $detailsurat['bulan'];
    $tahun = $detailsurat['tahun'];
    $sudahada = $this->msekretariat->surat($where2)->result_array();
            //cek jika ada data di tabel surat yg mirip
    if($sudahada){   
                //cek tanggal jika ada yg tgl baru
        $this->db->select_max('tanggal');
        $this->db->where($where2);
        $this->db->from('surat');
        $max_tanggal = $this->db->get()->row_array();
        $max_tanggal = $max_tanggal['tanggal'];
        if($tanggal<$max_tanggal){
                //jika ada tgl yg lebih baru dari tgl data yg diverif
                //ambil ekstensi dan nomor maksimal yg sudah ada pd tgl yg sama
            $this->db->select_max('ekstensi');
            $this->db->where($where3);
            $this->db->from('surat');
            $cekesktensi = $this->db->get()->row_array();
            $ekstensi_max = $cekesktensi["ekstensi"];
            $this->db->select_max('nomor');
            $this->db->where($where3);
            $this->db->from('surat');
            $samatanggal = $this->db->get()->row_array();
            $nomor_max = $samatanggal["nomor"];
            $nomor = $nomor_max;

            //cek sudah ada ekstensi apa blm

            
            if($ekstensi_max!=0){
                //ekstensi sudah ada tinggal nambah
                $ekstensi = $ekstensi_max+1;

                if($nomor_max<10){
                    $no_surat = "00$nomor_max.$ekstensi/$kode_bagian/$kode_surat/$bulan/$tahun";
                } else if($nomor_max>10 && $nomor_max < 100){
                    $no_surat = "0$nomor_max.$ekstensi/$kode_bagian/$kode_surat/$bulan/$tahun";
                } else {
                    $no_surat = "$nomor_max.$ekstensi/$kode_bagian/$kode_surat/$bulan/$tahun";
                }  
            } else {   
                //jika belum ada ekstensi dimulai dari 1
                $ekstensi = 1;

                if($nomor_max<10){
                    $no_surat = "00$nomor_max.$ekstensi/$kode_bagian/$kode_surat/$bulan/$tahun";
                } else if($nomor_max>10 && $nomor_max < 100){
                    $no_surat = "0$nomor_max.$ekstensi/$kode_bagian/$kode_surat/$bulan/$tahun";
                } else {
                    $no_surat = "$nomor_max.$ekstensi/$kode_bagian/$kode_surat/$bulan/$tahun";
                }   
            }
        } else {
                // jika tidak ada yg lebih baru maka tinggal ditambah
            $this->db->select_max('nomor');
            $this->db->where($where2);
            $this->db->from('surat');
            $no_max = $this->db->get()->row_array();
            $no_max = $no_max['nomor']; 
                //jika belum ada yg sama maka dimulai dari 1
            $nomor = $no_max+1;
            if($nomor<10){
                $no_surat = "00$nomor/$kode_bagian/$kode_surat/$bulan/$tahun";
            } else if($nomor>10 && $nomor < 100){
                $no_surat = "0$nomor/$kode_bagian/$kode_surat/$bulan/$tahun";
            } else {
                $no_surat = "$nomor/$kode_bagian/$kode_surat/$bulan/$tahun";
            }
            $ekstensi = 0;
        }


        


    } else {

                //jika belum ada yg sama maka dimulai dari 1
        $nomor = 1;
        if($nomor<10){
            $no_surat = "00$nomor/$kode_bagian/$kode_surat/$bulan/$tahun";
        } else if($nomor>10 && $nomor < 100){
            $no_surat = "0$nomor/$kode_bagian/$kode_surat/$bulan/$tahun";
        } else {
            $no_surat = "$nomor/$kode_bagian/$kode_surat/$bulan/$tahun";
        }
        $ekstensi = 0;
    }
            //fungsi update perubahan no surat pada id yg dipilih
    $where_update = [
        'id_surat' => $id,
    ];

            //data yg diupdate
    $tanggal_input = date("Y-m-d H:i:s");
    $data_update = [
        'no_surat' => $no_surat,
        'nomor' => $nomor,
        'ekstensi' => $ekstensi,
        'status' => 'Sudah Disetujui',
        'data_date' => $tanggal_input,
    ];
    $update = $this->msekretariat->update_data($where_update,$data_update,'surat');
    redirect('sekretariat/persetujuan');

} else {
    redirect('login');
}
}

//fungsi untuk input pengajuan nomor surat baru
    public function suratinternal()
    {
       if ($this->session->userdata('login') == true) {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $data['sekretariat'] = $this->msekretariat->tampilkan();
        $isi =  $this->template->display('sekretariat/vaddinternal', $data);
        $this->load->view('admin/vutama', $isi);


    } else {
        redirect('login');
    }
}

public function generateinternal()
{

    if ($this->session->userdata('login') == true) {
        //menangkap inputan data dari form
        $kode_bagian =  $this->input->post('bagian');
        $kode_surat = $this->input->post('jenis_surat');
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->romawi($tanggal);
        $tahun = date('Y',strtotime($tanggal));
        $status = $this->input->post('status');
        $tanggal_input = date("Y-m-d H:i:s");
        $where = [
            // 'kode_bagian' => $kode_bagian,
            // 'kode_surat' => $kode_surat,
            // 'bulan' => $bulan,
            'tahun' => $tahun,
            'status' => 'Sudah Disetujui',
        ];

        $where2 = [
            // 'kode_bagian' => $kode_bagian,
            // 'kode_surat' => $kode_surat,
            'tanggal' => $tanggal,
            // 'bulan' => $bulan,
            'tahun' => $tahun,
            'status' => 'Sudah Disetujui',
        ];
        //dilarang input
        $where3 = [
            // 'kode_bagian' => $kode_bagian,
            // 'kode_surat' => $kode_surat,
            // 'bulan' => $bulan,
            'tahun' => $tahun,

        ];
        $where4 = [
            // 'kode_bagian' => $kode_bagian,
            // 'kode_surat' => $kode_surat,
            // 'bulan' => $bulan,
            'tanggal' => $tanggal,
            'tahun' => $tahun,
        ];
        $this->db->select_max('tanggal');
        $this->db->where($where3);
        $this->db->from('suratinternal');
        $max_tanggal = $this->db->get()->row_array();
        $max_tanggal = $max_tanggal['tanggal'];
        if($tanggal<$max_tanggal)
        {
            $cekgagal = $this->msekretariat->suratinternal($where4)->result_array();
            if($cekgagal==false){ 
                $this->session->set_flashdata('message', '
                      <div class="alert alert-danger" role="alert">
                         Ups, Sepertinya ada Kesalahan :(
                      </div>');
                // echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
                         redirect('sekretariat/datainternal');
                        
            } 


        } 
        //cek tanggal nomor surat den
        //cek nomor surat sudah disetujui atau belum
        if ($status == 'Belum Disetujui') {
            //nomor surat belum disetujui memiliki nilai default
            $nomor = 0;
            $no_surat = "Nomor Surat Belum Disetujui";
            $ekstensi = 0;
        } else {
            //nomor surat yang sudah disetujui (baru)

            //mengambil data tanggal maksimal pada database
            $this->db->select_max('tanggal');
            $this->db->where($where);
            $this->db->from('suratinternal');
            $max_tanggal = $this->db->get()->row_array();
            $max_tanggal = $max_tanggal['tanggal'];
            //cek tanggal nomor surat dengan tanggal maksimal pada database (case 3)
            if($tanggal<$max_tanggal){
            //tanggal lebih kecil daripada tanggal maksimal maka masuk case 3

            //mengambil ekstensi dan nomor maksimal
                $this->db->select_max('ekstensi');
                $this->db->where($where2);
                $this->db->from('suratinternal');
                $cekesktensi = $this->db->get()->row_array();
                $ekstensi_max = $cekesktensi["ekstensi"];
                $this->db->select_max('nomor');
                $this->db->where($where2);
                $this->db->from('suratinternal');
                $samatanggal = $this->db->get()->row_array();
                $nomor_max = $samatanggal["nomor"];
                $nomor = $nomor_max;
                //cek sudah ada ekstensi atau tidak 
                if($ekstensi_max==0){
                    //jika tidak ada ekstensi maka dimulai dari satu
                    $ekstensi = 1;
                    if($nomor_max<10){
                        $no_surat = "00$nomor_max.$ekstensi/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                    } else if($nomor_max>10 && $nomor_max < 100){
                        $no_surat = "0$nomor_max.$ekstensi/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                    } else {
                        $no_surat = "$nomor_max.$ekstensi/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                    }
                } else {
                    //jika suda ada ekstensi maka diteruskan
                    $ekstensi = $ekstensi_max+1;
                    if($nomor_max<10){
                        $no_surat = "00$nomor_max.$ekstensi/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                    } else if($nomor_max>10 && $nomor_max < 100){
                        $no_surat = "0$nomor_max.$ekstensi/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                    } else {
                        $no_surat = "$nomor_max.$ekstensi/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                    }  
                }
            } else {
            //tanggal nomor baru masih ditanggal maksimal, atau tanggal nomor baru lebih tinggi dari tanggal maksimal (case 1)
                $suratinternal = $this->msekretariat->suratinternal($where)->result_array();
            //cek isi tabel surat sudah ada atau belum
                if($suratinternal){
                //jika isi tabel sudah ada dan menambahkan nomor surat terbaru 
                    $this->db->select_max('nomor');
                    $this->db->where($where);
                    $this->db->from('suratinternal');
                    $query = $this->db->get()->row_array();
                    $nomor = $query['nomor']+1;
                    if($nomor<10){
                        $no_surat = "00$nomor/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                    } else if($nomor>10 && $nomor < 100){
                        $no_surat = "0$nomor/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                    } else {
                        $no_surat = "$nomor/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                    }

                } else {
                //jika isi tabel belum ada dan membuat nomor baru
                    $nomor = 1;
                    if($nomor<10){
                        $no_surat = "00$nomor/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                    } else if($nomor>10 && $nomor < 100){
                        $no_surat = "0$nomor/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                    } else {
                        $no_surat = "$nomor/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                    }  
                }
                $ekstensi = 0;
            }
            
            
        }
        //data yang diinput ke database
        $data = [
            "kode_bagian" =>  $this->input->post('bagian'),
            "kode_surat" => $this->input->post('jenis_surat'),
            "perihal" => $this->input->post('perihal'),
            "tujuan" => $this->input->post('tujuan'),
            "tanggal"=> $this->input->post('tanggal'),
            "bulan"=> $this->romawi($tanggal),
            "tahun" => date('Y',strtotime($tanggal)),
            "status" =>  $this->input->post('status'),
            "nomor" => $nomor,
            "no_surat" =>$no_surat,
            "ekstensi" => $ekstensi,
            "data_date" => $tanggal_input,

        ];
        $input = $this->msekretariat->input($data,'suratinternal');
        redirect('sekretariat/datainternal');

    } else {
        redirect('login');
    }
}

 //fungsi menampilkan data nomor surat dalam tabel
public function datainternal()
{   
   if ($this->session->userdata('login') == true) {
    $data['menu_list'] = $this->mmenu->tampilkan();
    $data['submenu_list'] = $this->mmenu->tampilkansub();
    $data['pengajuaninternal'] = $this->msekretariat->pengajuaninternal();
    $isi =  $this->template->display('sekretariat/vdatainternal', $data);
    $this->load->view('admin/vutama', $isi);
} else {
    redirect('login');
}
}


  //fungsi verifikasi surat yang belum disetujui (case 2)
public function editinternal($id)
{ 
   if ($this->session->userdata('login') == true) {
    $data['menu_list'] = $this->mmenu->tampilkan();
    $data['submenu_list'] = $this->mmenu->tampilkansub();
            //mengambil data surat berdasar id yg dipilih
    $where = [
        'id_surat' => $id,
    ];
    $detailsurat = $this->msekretariat->detailsurat($where,'suratinternal')->row_array();
            //mengambil data di tabel surat yg hampir mirip dengan data yg dipilih
    $where2 = [
        // 'kode_bagian' => $detailsurat['kode_bagian'],
        // 'kode_surat' => $detailsurat['kode_surat'],
        // 'bulan' => $detailsurat['bulan'],
        'tahun' => $detailsurat['tahun'],
        'status' => 'Sudah Disetujui',
    ];
    $where3 = [
        // 'kode_bagian' => $detailsurat['kode_bagian'],
        // 'kode_surat' => $detailsurat['kode_surat'],
        'tanggal' => $detailsurat['tanggal'],
        // 'bulan' => $detailsurat['bulan'],
        'tahun' => $detailsurat['tahun'],
        'status' => 'Sudah Disetujui',
    ];
    $kode_bagian = $detailsurat['kode_bagian'];
    $kode_surat = $detailsurat['kode_surat'];
    $tanggal = $detailsurat['tanggal'];
    $bulan = $detailsurat['bulan'];
    $tahun = $detailsurat['tahun'];
    $sudahada = $this->msekretariat->surat($where2)->result_array();
            //cek jika ada data di tabel surat yg mirip
    if($sudahada){   
                //cek tanggal jika ada yg tgl baru
        $this->db->select_max('tanggal');
        $this->db->where($where2);
        $this->db->from('suratinternal');
        $max_tanggal = $this->db->get()->row_array();
        $max_tanggal = $max_tanggal['tanggal'];
        if($tanggal<$max_tanggal){
                //jika ada tgl yg lebih baru dari tgl data yg diverif
                //ambil ekstensi dan nomor maksimal yg sudah ada pd tgl yg sama
            $this->db->select_max('ekstensi');
            $this->db->where($where3);
            $this->db->from('suratinternal');
            $cekesktensi = $this->db->get()->row_array();
            $ekstensi_max = $cekesktensi["ekstensi"];
            $this->db->select_max('nomor');
            $this->db->where($where3);
            $this->db->from('suratinternal');
            $samatanggal = $this->db->get()->row_array();
            $nomor_max = $samatanggal["nomor"];
            $nomor = $nomor_max;

            //cek sudah ada ekstensi apa blm

            
            if($ekstensi_max!=0){
                //ekstensi sudah ada tinggal nambah
                $ekstensi = $ekstensi_max+1;

                if($nomor_max<10){
                    $no_surat = "00$nomor_max.$ekstensi/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                } else if($nomor_max>10 && $nomor_max < 100){
                    $no_surat = "0$nomor_max.$ekstensi/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                } else {
                    $no_surat = "$nomor_max.$ekstensi/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                }  
            } else {   
                //jika belum ada ekstensi dimulai dari 1
                $ekstensi = 1;

                if($nomor_max<10){
                    $no_surat = "00$nomor_max.$ekstensi/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                } else if($nomor_max>10 && $nomor_max < 100){
                    $no_surat = "0$nomor_max.$ekstensi/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                } else {
                    $no_surat = "$nomor_max.$ekstensi/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
                }   
            }
        } else {
                // jika tidak ada yg lebih baru maka tinggal ditambah
            $this->db->select_max('nomor');
            $this->db->where($where2);
            $this->db->from('suratinternal');
            $no_max = $this->db->get()->row_array();
            $no_max = $no_max['nomor']; 
                //jika belum ada yg sama maka dimulai dari 1
            $nomor = $no_max+1;
            if($nomor<10){
                $no_surat = "00$nomor/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
            } else if($nomor>10 && $nomor < 100){
                $no_surat = "0$nomor/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
            } else {
                $no_surat = "$nomor/$kode_bagian/INTERN/$kode_surat/$bulan/$tahun";
            }
            $ekstensi = 0;
        }


        


    } else {

                //jika belum ada yg sama maka dimulai dari 1
        $nomor = 1;
        if($nomor<10){
            $no_surat = "00$nomor/$kode_bagian/$kode_surat/$bulan/$tahun";
        } else if($nomor>10 && $nomor < 100){
            $no_surat = "0$nomor/$kode_bagian/$kode_surat/$bulan/$tahun";
        } else {
            $no_surat = "$nomor/$kode_bagian/$kode_surat/$bulan/$tahun";
        }
        $ekstensi = 0;
    }
            //fungsi update perubahan no surat pada id yg dipilih
    $where_update = [
        'id_surat' => $id,
    ];

            //data yg diupdate
    $tanggal_input = date("Y-m-d H:i:s");
    $data_update = [
        'no_surat' => $no_surat,
        'nomor' => $nomor,
        'ekstensi' => $ekstensi,
        'status' => 'Sudah Disetujui',
        'data_date' => $tanggal_input,
    ];
    $update = $this->msekretariat->update_data($where_update,$data_update,'suratinternal');
    redirect('sekretariat/datainternal');

} else {
    redirect('login');
}
}
    public function suratmasuk()
    {
       if ($this->session->userdata('login') == true) {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $data['sekretariat'] = $this->msekretariat->tampilkan();
        $isi =  $this->template->display('sekretariat/vaddmasuk', $data);
        $this->load->view('admin/vutama', $isi);


    } else {
        redirect('login');
    }
}

public function generatemasuk()
{

    if ($this->session->userdata('login') == true) {
        
        $tanggal = $this->input->post('tgl_terima');
        $bulan = $this->romawi($tanggal);
        $tahun = date('Y',strtotime($tanggal));
        $status = $this->input->post('status');
        $where = [
            'tahun' => $tahun,  ];


        //menangkap inputan data dari form
        $suratmasuk = $this->msekretariat->suratmasuk($where)->result_array();
            //cek isi tabel surat sudah ada atau belum
        if($suratmasuk){
                //jika isi tabel sudah ada dan menambahkan nomor surat terbaru 
            $this->db->select_max('nomor');
            $this->db->where($where);
            $this->db->from('suratmasuk');
            $query = $this->db->get()->row_array();
            $nomor = $query['nomor']+1;
            if($nomor<10){
                $no_arsip = "0$nomor/RSKI/$bulan/$tahun";
            } else if($nomor>10 && $nomor < 100){
                 $no_arsip = "$nomor/RSKI/$bulan/$tahun";
            } else {
                 $no_arsip = "$nomor/RSKI/$bulan/$tahun";
            }

        } else {
                //jika isi tabel belum ada dan membuat nomor baru
            $nomor = 1;
            if($nomor<10){
               $no_arsip = "0$nomor/RSKI/$bulan/$tahun";
            } else if($nomor>10 && $nomor < 100){
                $no_arsip = "$nomor/RSKI/$bulan/$tahun";
            } else {
                $no_arsip = "$nomor/RSKI/$bulan/$tahun";
            }  
        }
   
        //data yang diinput ke database
    $disposisi = implode(', ', $this->input->post('disposisi')); 
    $data = [
        "tgl_surat" =>  $this->input->post('tgl_surat'),
        "no_surat" => $this->input->post('no_surat'),
        "asal_surat" => $this->input->post('asal_surat'),
        "perihal" => $this->input->post('perihal'),
        "no_arsip" => $this->input->post('no_arsip'),
        "tgl_terima"=> $this->input->post('tgl_terima'),
        "bulan"=> $this->romawi($tanggal),
        "tahun" => date('Y',strtotime($tanggal)),
        "status" =>  $this->input->post('status'),
        "keterangan" =>  $this->input->post('keterangan'),
        "disposisi" =>  $disposisi,
        "nomor" => $nomor,
        "no_arsip" =>$no_arsip,
    ];
    $input = $this->msekretariat->input($data,'suratmasuk');
    redirect('sekretariat/datamasuk');

} else {
    redirect('login');
}
}

public function datamasuk()
{   
 if ($this->session->userdata('login') == true) {
    $data['menu_list'] = $this->mmenu->tampilkan();
    $data['submenu_list'] = $this->mmenu->tampilkansub();
    $data['pengajuanmasuk'] = $this->msekretariat->pengajuanmasuk();
    $isi =  $this->template->display('sekretariat/vdatamasuk', $data);
    $this->load->view('admin/vutama', $isi);
} else {
    redirect('login');
}
}
public function editmasuk($id)
{ 
   if ($this->session->userdata('login') == true) {
    $data['menu_list'] = $this->mmenu->tampilkan();
    $data['submenu_list'] = $this->mmenu->tampilkansub();
    $data_update = [
        'status' => 'Selesai',
       
    ];

     $update = $this->msekretariat->update_data(['id_surat'=>$id],$data_update,'suratmasuk');
    redirect('sekretariat/datamasuk');
    } else {
        redirect('login');
    }
}
}
