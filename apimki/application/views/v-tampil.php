<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data</title>

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
<body ng-app="listapp" ng-controller="maincontroller">
	<a class="btn btn-primary" href="<?=base_url()?>test/formtambah">Tambah Data</a>

	<table class="table">
  <thead class="thead-light">
    <tr>
    	<th scope="col">Id</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Tempat Lahir</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Umur</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody ng-init="get_product()">
    <tr ng-repeat="mhs in filtered  = (pagedItems | filter:search | orderBy : predicate :reverse) ">
      <td scope="row">{{ mhs.id }}</td>
      <td scope="row">{{ mhs.namamhs }}</td>
      <td scope="row">{{ mhs.alamat }}</td>
      <td scope="row">{{ mhs.tempatlahir }}</td>
      <td scope="row">{{ mhs.tanggallhr }}</td>
      <td scope="row">{{ mhs.umur }}</td>
      <td scope="row"><a class="btn btn-primary" href="" ng-click="mhs_update(mhs.id)">update</a></td>


    </tr>
  </tbody>
</table>

</body>
</html>
 
<script type="text/javascript">

  
      var listApp = angular.module('listapp', ['ui.bootstrap']);    

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

    /** function to get detail of product added in DB**/

    $scope.get_product = function(){
    $http.get("<?php echo base_url();?>test/tampildata").success(function(data)
    {
        //$scope.product_detail = data;   
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;

    });
    }
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };

    /** function to add details for products in mysql referecing php **/

    
   
});
</script>
<script src="<?php echo base_url();?>assets/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
<script src="<?php echo base_url();?>assets/js/beyond.js"></script>
