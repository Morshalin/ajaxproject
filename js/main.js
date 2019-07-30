  function autoload(){
  $.ajax({ 
    url:"check/adduser.php",
    method:"get",
    dataType:"html", 
    success:function(data){    
     $('#showalldata').load("check/adduser.php");

    }  
   });
}

$(document).ready(function(){

//01. Check Admin Email
  $("#email").keyup(function(){
    var email = $(this).val();
    $.ajax({
      url:"check/email.php",
      method:"POST",
      data:{email:email},
      dataType:'html',
      success:function(data){
        $("#show").html(data);
      }
    });
  });




//02.Insert  Add User Data in Database
 $('#form_data').on("submit", function(e){  
  e.preventDefault();  
  var name = $("#name").val();
  var email = $("#email").val();
  var number = $("#number").val();
  if(name == "")  {  
   alert("Name is required");
  }else if(email == '')  {  
   alert("email is required");  
  }else if(number == ''){  
   alert("number is required");  
  }else{ 
   $.ajax({ 
    url:"check/adduser.php",
    method:"POST",  
    data:{name:name,email:email,number:number},   
    success:function(data){
      console.log(data);
    autoload();    
     $('#newuser').modal("hide"); 
    $('#success_message').fadeIn().html(data);
     setTimeout(function(){$('#success_message').fadeOut("slow") }, 5000);
       $(".clear").val("");
    }  
   });  
  }  
});




//04.Select  View User from database
$(document).on("click", ".view_model", function(){
  var userid = $(this).attr('id');

  $.ajax({
    url:"check/showuser.php",
    method:'GET',
    data:{userid:userid},
    success:function(data){
      $("#userinfo").html(data);
      $("#userview").modal('show');
    }
  })
  
  $("#userview").modal('show');
});


//01.Update, Edit  User from database
$(document).on("click",".edit_user", function(){
  var userid = $(this).attr('id');
    $.ajax({
      url:"check/edit.php",
      method:"POST",
      data:{userid:userid},
      dataType:'json',
      success:function(data){
        $("#email_update").val(data.email);
        $("#name_update").val(data.name);
        $("#number_update").val(data.number);
        $("#update_id").val(data.id);
        $("#dataupdate_update").val('Update');
        $("#edituser").modal('show');
      }
    })
  
});


//01.Update, Edit  User from database
 $('#update_data').on("submit", function(event){  
  event.preventDefault();  
  var name = $("#name_update").val();
  var email = $("#email_update").val();
  var number = $("#number_update").val();
  var update_id = $("#update_id").val();
  console.log
  if(name == "")  {  
   alert("Name is required");
  }else if(email == '')  {  
   alert("email is required");  
  }else if(number == ''){  
   alert("number is required");  
  }else{ 
   $.ajax({ 
    url:"check/update.php",
    method:"POST",  
    data:{name:name,email:email,number:number,update_id:update_id},   
    success:function(data){    
     $('#edituser').modal('hide');  
     $('#success_message').fadeIn('slow').html(data);
     setTimeout(function(){$('#success_message').fadeOut('slow') }, 2000);
     $('#showalldata').load("check/adduser.php");
    }
   });  
  }  
});


//01.Delete user from database
  $(document).on('click','.deleteUser',function(e){
    e.preventDefault();
     var th = $(this);
    var delid = $(this).attr('id');
    
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    $.ajax({
        url:"check/deleteuser.php",
        method:"POST",
        data:{delid:delid},
        success:function(data){
         th.parents('tr').hide();
        }
      }) 

    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})






 

  });





});


