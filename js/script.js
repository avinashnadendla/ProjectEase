// $(document).ready(function(){
//         $.get("php/no_of_teams_0.php", function(data){
//             if(data==0)
//             {
//               window.location.href = "teamDialouge.html";
//             }
//             else{
//               $.ajax({
//                 type: 'POST',
//                 url: 'php/No_of_Teams.php',
//                 data: {},
//                 success: function(result){
//                     if(result!='1'){
//                         window.location.href = "Team_Selector.php";
//                     }
//                     else{
//                       window.location.href = "About.php";
//                     }
//                 }
//               })
//             }
//         });
// });

$(".logout-link").click(function(e){
  e.preventDefault();
  $.ajax({
    url: "./php/logout.php",
    type: "POST",
    beforeSend : function()
    {

    },
    success: function(data)
    {
       window.location.href="login.html";
       alert("logout successfull");
    },
    error: function(e)
    {
      alert("error occoured");
    }
  })
})

$(".load-more-btn").click(function(){
  $(".load-more-btn-div").hide();
  $(".load-more").removeAttr("hidden");
  $(".load-more").show();
})

$(".load-less-btn").click(function(){
  $(".load-more-btn-div").show();
  $(".load-more").hide("slow");
})
