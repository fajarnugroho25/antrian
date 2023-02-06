        <?php 


        $id   = '';
       
        $titel   = 'Tambah';
        $aksi   = 'tambah';
        $button   = 'Simpan';
        $perusahaan = '';
		$mulai = '';
		$akhir = '';
		$jenis = '';
		$ket = '';
			 
      if (!empty($pks)) { 
        foreach ($pks as $row):
        $id_pks = $row->id_pks;    
        $perusahaan = $row->perusahaan;
        $mulai = $row->mulai;
        $akhir = $row->akhir;
        $jenis = $row->jenis;
        $ket = $row->ket;
        $kodejadi = $row->id_pks;  
       
        $titel   = 'Perbarui';
        $aksi   = 'perbarui';
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
       <h3 class="page-title"><?php echo $titel; ?> pks</h3>
       
<div class="well">
    <form id="user" method="post" action="<?php echo base_url();?>pks/<?php echo $aksi; ?>">

        <table >
          <tr>
            <td>
                <label><b>Kode PKS</b></label>
            </td>
            <td> &nbsp  &nbsp</td>
            <td>
              <input type="text" name='id_pks' id='id_pks' class="form-control" value="<?= $kodejadi; ?>" readonly>
            </td>
          </tr>
          <tr> 
            <td>
                <label><b>Perusahaan</b></label>
            </td>
            <td> &nbsp &nbsp</td>
            <td>
                <input type="text" id="perusahaan" name="perusahaan" value="<?php echo $perusahaan; ?>" required>
            </td>
          </tr>
		  <tr>
                <td>
                    <label><b>Mulai</b></label>
                </td>
                <td> </td>
                <td>
                    <div class="input-group date" data-provide="datepicker"  data-date-format="yyyy/mm/dd">            
                    <input type="text" class="form-control" id="mulai" name="mulai" readonly="readonly" value="<?php echo $mulai ?>" required>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </td>    
            </tr>
		  <tr>
                <td>
                    <label><b>Akhir</b></label>
                </td>
                <td> </td>
                <td>
                    <div class="input-group date" data-provide="datepicker"  data-date-format="yyyy/mm/dd">            
                    <input type="text" class="form-control" id="akhir" name="akhir" readonly="readonly" value="<?php echo $akhir ?>" required>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </td>    
            </tr>
          		  <tr>
                    <td>
                        <label><b>Jenis</b></label>
                    </td>
                    <td></td>
                    <td>
                        <select name='jenis' id='jenis' required>
                            <option value='' disabled selected>Pilih Jenis</option>

                            <?php
                            foreach ($cbjenis as $cbjenis) {
                                    if ($cbjenis->id_jenis == $jenis) {
                                            echo '<option value="' . $cbjenis->jenis . '" selected >' . $cbjenis->jenis  . '</option>';
                                        } else {
                                            echo '<option value="' . $cbjenis->jenis . '" >' . $cbjenis->jenis . '</option>';
                                        }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
		                <tr>
                <td>
                    <label><b>Keterangan</b></label>
                </td>
                <td></td>
                <td>   
                     <textarea id="ket" name="ket"  rows="4" ><?php echo $ket; ?></textarea>                     
                </td>    
            </tr>
       </table>

        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?> PKS</button>
            
        </div>
	</form>
      </div>
  </div>
  
  </body>
<script type="text/javascript">
    
</script>


   