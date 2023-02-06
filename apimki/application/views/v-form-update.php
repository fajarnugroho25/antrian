<?php 

foreach ($mahasiswa as $key) {
  $id = $key['id'];
	$nama = $key['namamhs'];
	$alamat = $key['alamat'];
	$tempatlahir = $key['tempatlahir'];
	$tanggallahir = $key['tanggallhr'];
	$umur = $key['umur'];

}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body>

	<form method="post" action="<?=base_url()?>test/updatedata/<?=$id?>">
  <div class="form-group" >
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" name="nama" id="exampleInputEmail1" value="<?=$nama?>" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" value="<?=$alamat?>" placeholder="Alamat">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tempat Lahir</label>
    <input type="text" class="form-control" name="tempatlahir" id="exampleInputPassword1" value="<?=$tempatlahir?>" placeholder="Tempat Lahir">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tanggal Lahir</label>
    <input type="date" class="form-control" name="tanggallahir" value="<?=$tanggallahir?>" id="exampleInputPassword1" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Umur</label>
    <input type="text" class="form-control" name="umur" value="<?=$umur?>" id="exampleInputPassword1" >
  </div>
  <div class="form-check">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>