 
      var dataTable1 = $('#user_data').DataTable({             
              "responsive":true,              
              "serverSide":true,
           "order":[],  
           "ajax":{  
                url:"datauser",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 1, 2],  
                     "orderable":true,  
                },  
           ],  
      });   



  
      var dataTable = $('#datanote').DataTable({             
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"datanote",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 1],  
                     "orderable":true,  
                },  
           ],  
      });  
	  
  $(document).on("click", ".delete", function(e) {
           var nim = $(this).attr("id"); 
           e.preventDefault();
           bootbox.confirm("Are you sure delete ?", function(result) {
               if (result) {

                     $.ajax({  
                     url:"delete_nim",  
                     method:"POST",  
                     data:{nim:nim},  
                     success:function(data)  
                     {                            
                          dataTable1.ajax.reload();  
                          
                     }  
                });

               }   
           });
       });

       $(document).on('click', '.update', function(){  
           var nim = $(this).attr("id");  
           $.ajax({  
                url:"danim",  
                method:"POST",  
                data:{nim:nim},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#userModal').modal('show');  
                     $('#nim').val(data.nim);  
                     $('#nama').val(data.nama);
                     $('#email').val(data.email);  
                }  
           })  
      }); 
     



$('#editordata').summernote({
  height: 200,
  toolbar: [    
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],       
    ['insert',['picture']]
  ],

        callbacks: {
                onImageUpload: function(files) {
                    uploadFile(files[0]);
                }
            }

});


function uploadFile(file) {
        data = new FormData();
        data.append("file", file);

        $.ajax({
            data: data,
            type: "POST",
            url: "saveGambar", //replace with your url
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {                                 
             console.log(url);                                        
             $('#editordata').summernote("insertImage", url);
            }
        });
    }




$('#mydata').submit(function(e){

e.preventDefault();
 var fa = $(this);

  $.ajax({
    url: fa.attr('action'),
    type: 'post' ,
    data: fa.serialize(),
    dataType: 'json',
    success: function(response) {
      if(response.success == true) {

        $('.form-group').removeClass('is-invalid')
                        .removeClass('is-valid');
        $('.text-danger').remove();
        fa[0].reset();         
        location.reload();

      } else {
        $.each(response.messages,function(key, value){
          var element = $('#' + key);
          element.closest('div.form-group')
          .removeClass('is-invalid')
          .addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
          .find('.text-danger')
          .remove();
          element.after(value);
        });
      }
    }
 });

});
