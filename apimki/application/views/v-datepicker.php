

<!DOCTYPE html>
<html>
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
<link href="<?=base_url('assets/datedropper.css')?>" rel="stylesheet" type="text/css" />
<!-- jQuery lib -->
<!-- dateDropper lib -->
<script src="<?=base_url('assets/datedropper.js')?>"></script>



</head>
<body>

	<form method="post" action="<?=base_url()?>test/tambahdata">
 
  <div class="form-group">
    <label for="exampleInputPassword1">date range</label>
    <input type="text" class="form-control" name="tanggallahir" id="daterange" value="01/01/2015 - 01/31/2015" />
  </div>

  <div id="container" class="ui-widget">
        <label for="demoDate">Date </label>
        <input class="form-control" id="demoDate"  value="01/01/2017"/><span id="inlineDate"></span>
      </div>
</form>



</body>
</html>

<script type="text/javascript">

// $(document).ready(function() {
//     $('input[name="tanggallahir"]').daterangepicker({
//     constrainInput: true,   // prevent letters in the input field
//     minDate: new Date(),
//     // maxDate: '+2M +1D',    // prevent selection of date older than today
//     showOn: 'button',       // Show a button next to the text-field
//     autoSize: true,         // automatically resize the input field 
//     altFormat: 'yy-mm-dd',  // Date Format used
//     firstDay: 1,
//     showanim: "drop",


//     });

// });

$('#daterange').daterangepicker({
    "startDate": "01/12/2018",
    "endDate": "01/05/2018",
    minDate: new Date()
}, function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});
  
    $(document).ready(function() {
            $('#demoDate').daterangepicker({
               locale: {
              format: 'YYYY-MM-DD'
              },
             duration: "fast",
             singleDatePicker: true,
             showAnim: "drop", 
             minDate: new Date(),
             maxDate: "+2M"

            });
        });

</script>

   
    



