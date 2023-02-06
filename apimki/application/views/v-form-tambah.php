

<!DOCTYPE html>
<html ng-app="listpp">
<head>
	<title>Tambah Data</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" />

<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/weather-icons.min.css" rel="stylesheet" />
  <script src="<?php echo base_url();?>assets/angularjs/angular.js"></script>


    <link href="<?php echo base_url(); ?>assets/css/beyond.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/demo.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/typicons.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="<?php echo base_url(); ?>assets/js/skins.min.js"></script>



</head>
<body ng-controller="maincontroller" >

	<form method="post" name="add_data">
  <div class="form-group" >
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" name="nama" ng-model="nama"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="text" class="form-control" name="alamat" ng-model="alamat" id="exampleInputPassword1" placeholder="Alamat">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tempat Lahir</label>
    <input type="text" class="form-control" name="tempatlahir" ng-model="tempatlahir" id="exampleInputPassword1" placeholder="Tempat Lahir">
  </div>
 <!--  <div class="form-group">
    <label for="exampleInputPassword1">Tanggal Lahir</label>
    <input type="text" class="form-control" name="tanggallahir" id="daterange" value="01/01/2015 - 01/31/2015" />
  </div> -->

  <div id="container" class="ui-widget">
        <label for="demoDate">Tanggal Lahir: </label>
        <input class="form-control" id="demoDate" name="tanggallahir" ng-model="tanggallahir"  value="01/01/2017"/><span id="inlineDate"></span>
      </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Umur</label>
    <input type="text" class="form-control" name="umur" ng-model="umur" id="exampleInputPassword1" >
  </div>

  <div class="form-check">
  </div>
  <button type="submit" ng-click="mhs_submit()" ng-show='add_prod'  class="btn btn-primary">Submit</button>
</form>



</body>
</html>

<script type="text/javascript">

// $('#daterange').daterangepicker({
//     "startDate": "01/12/2018",
//     "endDate": "01/05/2018",
//     minDate: new Date()
// }, function(start, end, label) {
//   console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
// });
  
    $(document).ready(function() {
            $('#demoDate').daterangepicker({
              // startDate: new Date(),
              locale: {
              format: 'YYYY-MM-DD'
              },
              singleDatePicker: true,              
             duration: "fast",
             showAnim: "drop",
             
              minDate: new Date()
            });
        });

var listApp = angular.module('listpp', ['ui.bootstrap']);    

    listApp.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
    });



    listApp.controller('maincontroller', function ($scope,$http) {
    $scope.filteredItems =  [];
    $scope.groupedItems  =  [];
    $scope.itemsPerPage  =  3;
    $scope.pagedItems    =  [];
    $scope.currentPage   =  0;

  
    /** toggleMenu Function to show menu by toggle effect , by default the stage of the menu is false as we click on toggle button, we make it to true or show and reverse on anothe click event. **/

    $scope.menuState = false;
    $scope.add_prod = true;

    $scope.toggleMenu = function() {                
        if($scope.menuState) {                    
            $scope.menuState= false;
        }
        else {
            $scope.menuState= !$scope.menuState.show;
        }
    };

  
  $scope.mhs_submit = function(){
    url = '<?=base_url()?>test/tambahdata';
      // console.log(datas);
    $http.post(url,{
      'nama' : $scope.nama,
                'alamat' : $scope.alamat,
                'tempatlahir' : $scope.tempatlahir,
                'tanggallahir' : $scope.tanggallahir,
                'umur' : $scope.umur
    }).success(function(data,status,headers,config){
      // alert("Product has been add Successfully");
      // window.location = "<?=base_url()?>test";
      console.log(data);

    }).error(function(data,status,headers,config){
      alert(data);

    });
  }



});

</script>
<script src="<?php echo base_url();?>assets/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<!-- <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script> -->
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
<script src="<?php echo base_url();?>assets/js/beyond.js"></script>
   
    



