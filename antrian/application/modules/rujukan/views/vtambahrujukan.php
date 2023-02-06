        <?php 
        $id   = '';
        $titel   = 'Tambah';
        $aksi   = 'tambah_rujukan';
        $button   = 'Simpan';
        $no_rm = '';
        $nama = '';
        $alamat = '';
        $kelamin = '';       
        $dokter = ''; 
        $tgl_lahir = '';
        $tgl_input = date("Y-m-d H:i:s");
        $tgl_balik = '';    
        $status = '1';
        $diagnosa = '';
        $kepada = '';
        $obat = '';     
        $keterangan = '';       
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
        $tgl_balik = $row->tgl_balik; 
        $diagnosa = $row->diagnosa;
        $obat = $row->obat;  
        $kepada = $row->kepada; 
        $keterangan = $row->keterangan;
         
        $titel   = 'Perbarui';
        $aksi   = 'perbarui_rujukan';
        $button   = 'Perbarui';
        endforeach;
        }
        ?> 

<head>

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datepicker.min.css" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>
   
</head>

<body>

<div class="span10">
       <h3 class="page-title"><?php echo $titel; ?> Surat Rujuk Balik </h3>               
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
                    <label><b>Diagnosa</b></label>
                </td>
                <td></td>
                <td>   
                     <textarea id="diagnosa" name="diagnosa"  rows="4" ><?php echo $diagnosa; ?></textarea>                     
                </td>    
            </tr>
            <!--
            <tr>
                <td>
                    <label><b>Obat Yang Di Pakai</b></label>
                </td>
                <td></td>
                <td>
                     <textarea id="obat" name="obat"  rows="4" ><?php echo $obat; ?></textarea> 
                </td>    
            </tr>
            -->
            <tr>
                <td>
                    <label><b>Obat Yang Di Pakai </b></label>
                </td>
                <td></td>
                <td>
                       <textarea id="obat" name="obat"  rows="4" ><?php echo $obat; ?></textarea> 
                </td>    
            </tr>
            <tr>
                <td>
                    <label><b>Keterangan</b></label>
                </td>
                <td></td>
                <td>
                    <textarea id="keterangan" name="keterangan"  rows="4" ><?php echo $keterangan; ?></textarea>                     
                </td>    
            </tr>
             <tr>
                <td>
                    <label><b>PPK Tujuan </b></label>
                </td>
                <td></td>
                <td>                    
                    <input type="text"  id="kepada" name="kepada" value="<?php echo $kepada; ?>"  required>   
                </td>               
            </tr>
            <tr>
                <td>
                    <label><b>Tanggal Balik</b></label>
                </td>
                <td> </td>
                <td>
                    <div class="input-group date" data-provide="datepicker"  data-date-format="yyyy/mm/dd">            
                    <input type="text" class="form-control" id="tgl_balik" name="tgl_balik" readonly="readonly" value="<?php echo $tgl_balik ?>" required>
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
