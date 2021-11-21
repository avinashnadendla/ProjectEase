$(document).ready(function (e) {
 $(".loginForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "php/login.php",
         type: "POST",
         data:  new FormData(this),
         contentType: false,
         cache: false,
         processData:false,
         beforeSend : function()
         {

         },
         success: function(data)
         {
            if(data==1)
            {
                window.location.href = "index.php";
            }
            else if (data==2) {
                window.location.href = "admin/admin_home.php";
            }
            else if (data==3) {
                window.location.href = "faculty/faculty_home.php";
            }
            else if (-1) {
              alert("Email or Password is invalid !!");
            }
         },
         error: function(e)
         {
           alert("error occoured");
         }
    });
 }));
});

$(".home").click(function(){
  window.location.href="index_home.html";
})
