<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/moment.css?ts=<?=time()?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css?ts=<?=time()?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css?ts=<?=time()?>">
<script>var base_url = '<?php echo base_url() ?>'</script>





<div class="span10">
    <style type="text/css">
    .container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
</style>



    <div class="container">
<h3 class=" text-center">Messaging</h3>
<div class="messaging">
      <div class="inbox_msg">
        <input type="hidden" name="user" value="<?=$pasien?>">
        <input type="hidden" name="userme" value="<?=$me?>">
        <div class="mesgs">

          <div class="chat">




          </div>
          <div class="type_msg" >
            <div class="input_msg_write">

              <input type="text" class="write_msg" id="chat-message" placeholder="Type a message" />
              <button class="msg_send_btn" id="btn-send-message" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>


      <p class="text-center top_spac"> Design by <a target="_blank" href="#">Sunil Rajput</a></p>

    </div></div>


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
  //var database = firebase.database();
  var userId = "RS";
  var pasien = "<?=$this->uri->segment(3)?>";

  // sendMessages(userId, pasien);
  receiveMessages(userId, pasien);

  // console.log($('input[name=userme]').val());








  function receiveMessages(userId, pasien) {
    chatNode_1 = pasien + "-" + userId ;
    chatNode_2 = userId + "-" + pasien;

    var abcd = firebase.database().ref('messages');//+userId+'-' + pasien);
    abcd.on('value', function(snapshot){
      var chatNode;
      if (snapshot.hasChild(chatNode_1)) {
                    chatNode = chatNode_1;
            }

            var abc = firebase.database().ref('messages').child(chatNode);
            abc.on('value', function(snapshot){
              var data = snapshot.val();

        // console.log(chatNode);

      var list = [];
      for (var key in data) {
        if (data.hasOwnProperty(key)) {
          chat = data[key].text ? data[key].text : '';
          if (chat.trim().length > 0) {
            list.push({
              receiverid : data[key].receiverid,
              receivername : data[key].receivername,
              senderid: data[key].senderid,
              sendername: data[key].sendername,
              text: chat,
              timestamp: data[key].timestamp,
              token: data[key].token

            })


          }

        }

      }
      refreshUI(list);
      })
    })
  }



  function refreshUI(chatList) {


    var list = '';
    // chatList = chatList.reverse();
    list += '<div id="content-chat">';
    token = chatList[0].token;
    // console.log();

    for (var i = 0; i < chatList.length; i++) {
      var ts = new Date(chatList[i].timestamp);
      // tanggal = ;
      // list += '<div class="col-md-12"><div class="review_strip bubble me"><img src="'+image+'" alt="Image" class="img-circle"><h4>'+sendername+'</h4>' + chatList[i].text + '</div></div>';


      if(chatList[i].senderid == userId){
      //   // image = $('#imageuser').val();

          list += ' <div class="outgoing_msg"><div class="sent_msg" style="width: 60%"><p>' + chatList[i].text + '</p><span class="time_date"> '+ts.toDateString()+'</span> </div></div>';
        // console.log('pasien');
      // console.log('pasien');

      }else{
      //   // image = $('#imageexpert').val();
      list += ' <div class="incoming_msg"><div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil" width="37" > '+chatList[i].senderid+'</div><div class="received_msg"><div class="received_withd_msg"><p>' + chatList[i].text + '</p><span class="time_date"> '+ts.toDateString()+'</span><br></div></div>';


      }


    };

    list += '</div>';
    $('.chat').html(list);
    $(".chat").animate({ scrollTop: $("#content-chat").height() }, 1000);

  };

  $(function() {
    $("#chat-form").submit(function(e){
      e.preventDefault();
      sendMessages();
      $('#chat-message').val('');
    });
  })

    $("#btn-send-message").click(function(e) {
      e.preventDefault();
      // console.log('asdfa');
      sendMessages();
      $('#chat-message').val('');
    })

  function sendMessages() {
    var tm = new Date();
    var postData = {
      receiverid : pasien ,
      senderid: userId,
      text: $('#chat-message').val(),
      timestamp: firebase.database.ServerValue.TIMESTAMP,
      //timestamp: tm.getTime() + tm.getTimezoneOffset() * 60000,
      token:token
    };

    a=pasien+"-"+userId;
    // Get a key for a new Post.
    var newPostKey = firebase.database().ref('messages').child(a).push().key;
    // // Write the new post's data simultaneously in the posts list and the user's post list.
    // console.log(newPostKey);
    var updates = {};
    updates['/'+ pasien+"-"+userId +'/' + newPostKey] = postData;

    return firebase.database().ref('messages').update(updates);
  }




</script>




