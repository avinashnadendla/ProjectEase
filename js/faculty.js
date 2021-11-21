$(document).ready(function (e) {
 $(".jump-to-team").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "../faculty/recieved_team.php",
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
            window.location.href="../About.php";
         },
         error: function(e)
         {
           alert(e);
         }
    });
 }));
});
