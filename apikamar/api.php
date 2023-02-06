<?php
 	header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
//include "database.php";
//$sql = "SELECT * FROM vtempattidur order by urut1";
$conn=odbc_connect('spgdt','SYSMEX','SYSMEX');
$sql="SELECT * FROM vinfotempattidur order by urut1";
$query=odbc_exec($conn,$sql);  

 //$query = mssql_query($sql);
 while($dt=odbc_fetch_array($query)){
  $item[] = array(
   "ruang"=>$dt["ruang_kamar"],
   "jumlah"=>$dt["Jumlah"],
   "isi"=>$dt["Isi"],
   "kosong"=>$dt["Ksng"]
   
  );
 }
 

 $json = array(
    'result' => 'Success',
    'item' => $item
   );
 

 echo json_encode($json);
?>