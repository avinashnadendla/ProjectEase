$(".logout-link").click(function(e){
  e.preventDefault();
  $.ajax({
    url: "../php/logout.php",
    type: "POST",
    beforeSend : function()
    {

    },
    success: function(data)
    {
       window.location.href="../login.html";
       alert("logout successfull");
    },
    error: function(e)
    {
      alert("error occoured");
    }
  })
})
