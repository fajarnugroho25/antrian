<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/moment.css?ts=<?=time()?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css?ts=<?=time()?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css?ts=<?=time()?>">    



<div class="span10">
            <h3 class="page-title">Data Riwayat Pesanan</h3>
            
<div class="well" >

    <table class="table table-striped table-bordered data" id="myTable2">
      <thead>
        <tr>      
          <th onclick="sortTable(0)">RM</th>
          <th onclick="sortTable(1)">Last Chat Time</th>
          <th>Option</th>
        
        
        </tr>
      </thead>
      <tbody id="loop">
             

<script src="https://www.gstatic.com/firebasejs/5.5.4/firebase.js"></script>


<script>



  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDeN_b46aR6gbq-taZdT9rLlY6ei8tpNnU",
    authDomain: "rskisolo.firebaseapp.com",
    databaseURL: "https://rskisolo.firebaseio.com",
    projectId: "rskisolo",
    storageBucket: "rskisolo.appspot.com",
    messagingSenderId: "24979868269"
  };
  firebase.initializeApp(config);


    var database = firebase.database().ref('messages');
    var userId = "<?=$this->session->userdata('user_id')?>";
    var i = 0;

    receiveMessages();
    var kosong = "";
    var a = "";

    function receiveMessages() {

    var base_url = "<?= base_url('index.php/chat/chat_detail/') ?>";

      var abcd = firebase.database().ref('messages');

         abcd.once('value', function(snapshot) {
            snapshot.forEach(function(childSnapshot) {
            var childKey = childSnapshot.key;
            var childData = childSnapshot.val();

            firebase.database().ref('messages/'+ childKey)
              .orderByChild('timestamp')
              .once('value', function(snapshot) {
              this.data = [];

              snapshot.forEach(function(child) {
                this.data.push(child.val());
              }.bind(this));

              tanggal =new Date(data[0].timestamp);
               
             months = ['01','02','03','04','05','06','07','08','09','10','11','12'];
             year = tanggal.getFullYear();
             month = months[tanggal.getMonth()];
             date = tanggal.getDate();
             hour = tanggal.getHours();
             min = tanggal.getMinutes();
             sec = tanggal.getSeconds();
             time = date + '-' + month + '-' + year + ' ' + hour + ':' + min + ':' + sec ;

              rm = data[0].senderid;
            

              a += "<tr><td>"+rm+"</td><td><span class='hide'>"+data[0].timestamp+"</span>"+time+"</td><td><a href="+base_url+rm+"> <button type='button' class='btn btn-info'><span class='icon-edit'></span> </button>  </a></td></tr>";
              // console.log(data[0].senderid);
              $('#loop').html(a);


            });


   
  });
});


}

    
  function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable2");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "desc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "desc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "asc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "desc") {
        dir = "asc";
        switching = true;
      }
    }
  }
}



    function getUserName(abcde) {
   
      var datas = {
            user_id: abcde,
        }

        $.ajax({

        url: base_url + 'index.php/chat/getUserName',

        type: "POST",

        data: datas,

        dataType: "text",

        success: function(data)

        {
          

            kosong += data;
           


            $('.inbox_chat').html(kosong);

            return kosong;

        },

        error: function(err)

        {

        }

      });

    }




    function kirimFile(tanggal,nomorrm) {
     
      var datas = {
            tanggal: tanggal,
            nomorrm:nomorrm
        }

        $.ajax({

        url: base_url + 'index.php/chat/ajaxListchat',

        type: "POST",

        data: datas,

        dataType: "text",

        success: function(data)

        {
           

        },

        error: function(err)

        {

        }

      });

    }

   
   $(document).ready(function(){
    $('.data').DataTable();
  });

</script>
       
      </tbody>
    </table>
  
</div>

    
</div>




        