        <?php 
        $id   = '';
        $titel   = 'Tambah';
        $aksi   = 'tambah_suket';
        $button   = 'Simpan';
        $no_rm = '';
        $nama = '';
        $alamat = '';
        $kelamin = '';       
        $dokter = ''; 
        $tgl_lahir = '';
        $tgl_input = date("Y-m-d H:i:s");
        $tgl_penggunaan = '';    
        $status = '1';
        $diag_primer = '';
        $diag_sekunder = '';     
        $alasan = '';
        $rencana = '';   
        $jam=date("H:i:s");
       
       
        if (!empty($pasien)) { 
        foreach ($pasien as $row):
        $kodejadi = $row->no_surat;  
        $no_surat = $row->no_surat;    
        $no_rm = $row->no_rm;
        $nama = $row->nama;
        $alamat = $row->alamat;
        $kelamin = $row->kelamin;      
        $dokter =  $row->dokter;      
        $status =  $row->status;      
        $tgl_lahir =  $row->tgl_lahir;     
        $tgl_penggunaan = $row->tgl_penggunaan; 
        $diag_primer = $row->diag_primer;
        $diag_sekunder = $row->diag_sekunder;  
        $alasan = $row->alasan;
        $rencana = $row->rencana;  
        $titel   = 'Perbarui';
        $aksi   = 'perbarui_suket';
        $button   = 'Perbarui';
        endforeach;
        }
        ?> 

<head>

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datepicker.min.css" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>

<link rel="stylesheet" href="minified/themes/default.min.css" />
<script src="minified/sceditor.min.js"></script>

</head>

<body>

<div class="span10">
       <h3 class="page-title"><?php echo $titel; ?> Surat Keterangan Dokter </h3>               
<div class="well">

<form id="user" method="post" action="<?php echo base_url();?>rujukan/<?php echo $aksi; ?>" >    
        
       
        <td><input type="hidden" id="user" name='user' class="form-control" value="<?php echo  $this->session->user_name; ?>"   readonly></td>
        <td><input type="hidden" id="tgl_input" name='tgl_input' class="form-control" value="<?php echo  $tgl_input ; ?>"   readonly></td>
        <td><input type="hidden" id="status" name='status' class="form-control" value="<?php echo  $status ; ?>"   readonly></td>


<table>
    <td>
        <table>
            <tr>
            <td>
                <label><b>No Surat</b></label>
            </td>
            <td></td>
            <td>
             <input type="text" name='no_surat'  id="no_surat" class="form-control" value="<?= $kodejadi; ?>" readonly>
            </td>
            </tr>
            <tr>
                <td>
                    <label><b>No_RM </b></label>
                </td>
                <td></td>
                <td>                    
                    <input type="text"  id="no_rm" name="no_rm" value="<?php echo $no_rm; ?>" onKeyDown="chText()" onKeyUp="chText()" required>   
                </td>               
            </tr>
            <tr>
                <td>
                    <label><b>Nama Pasien</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                </td>    
            </tr>    
            <tr>
                <td>
                    <label><b>Alamat</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="alamat" name="alamat" value="<?php echo $alamat; ?>" required> 
                </td>    
            </tr> 
            <tr>
                <td>
                    <label><b>Jenis Kelamin</b></label>
                </td>
                <td></td>
                <td>
                    <input type="radio" id="kelamin" name="kelamin" value="L" <?php if ($kelamin=='L') {echo 'checked';} else  {echo '';}  ?> required> Laki -Laki &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="kelamin" name="kelamin" value="P" <?php if ($kelamin=='P') {echo 'checked';} else  {echo '';}  ?> required> Perempuan </br></br> 
                </td>    
            </tr>
             <tr>
                <td>
                    <label><b>Tanggal Lahir</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>" placeholder="DD/MM/YYYY" onKeyup="chtgl()"  onKeyDown="chtgl()" required>
                </td>    
            </tr>  
          
            
            <tr>
                <td>
                    <label><b>Dokter</b></label>
                </td>
                <td> </td>
                <td valign="bottom">
                    <select name='dokter' id='dokter' onchange='cek_no_rm()' required>
                    <option value='' disabled selected>Pilih Dokter</option> 

                    <?php
                     foreach ($cbdokter as $cbdokter) 
                     {
                      if ($cbdokter->id == $dokter) 
                        {echo '<option value="'.$cbdokter->id.'" selected >'.$cbdokter->nama_dokter.'</option>';}
                    else 
                         {echo '<option value="'.$cbdokter->id.'" >'.$cbdokter->nama_dokter.'</option>';}        
                    
                     }
                    ?>
                    </select>
                </td>    
            </tr>                    
            <tr>
                <td>
                    <label><b>Diagnosa Primer</b></label>
                </td>
                <td></td>
                <td>                     
                     <input type="text" id="diag_primer" name="diag_primer" value="<?php echo $diag_primer; ?>" placeholder="YY.XXX / Diagnosa " required>                      
                </td>    
            </tr>
            <tr>
                <td>

                    <label><b>Diagnosa Sekunder</b></label>
                </td>
                <td></td>
                <td>
                    <textarea id="diag_sekunder" name="diag_sekunder"  rows="4" ><?php echo $diag_sekunder; ?></textarea> 
                    
                </td>    
            </tr>
            
        </table>
    </td>
    <td> &nbsp &nbsp &nbsp &nbsp</td>
    <td valign="top">
        <table>
         
             <tr>
                <td>
                    <label><b>Alasan Tidak Balik ke Faskes</b></label>
                </td>
                <td></td>
                <td>
                     <textarea id="alasan" name="alasan"  rows="4" ><?php echo $alasan; ?></textarea> 
                </td>    
            </tr>
            <tr>
                <td>
                    <label><b>Rencana Tindakan Lanjut</b></label>
                </td>
                <td></td>
                <td>
                      <textarea id="rencana" name="rencana"  rows="4" ><?php echo $rencana; ?></textarea> 
                </td>    
            </tr>
            <tr>
                <td>
                    <label><b>Tanggal Penggunaan</b></label>
                </td>
                <td> </td>
                <td>
                    <div class="input-group date" data-provide="datepicker"  data-date-format="yyyy/mm/dd">            
                    <input type="text" class="form-control" id="tgl_penggunaan" name="tgl_penggunaan" readonly="readonly" value="<?php echo $tgl_penggunaan ?>" required>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </td>    
            </tr>
            
        </table>
    </td>
 </table>      
              
        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?> Surat</button>           
        </div>
	</form>
      </div>
  </div>
  
</body>
<script type="text/javascript">

</script>
