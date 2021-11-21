$(".file-chs-btn").click(function(event){
  event.preventDefault();
  $(".file-chs").trigger('click');
  $(".file-chs").change(function(){
    var rndm = $(".file-chs").val().split('');
    var len = rndm.length;
    var name='';
    for(var i=len-1; i>=0; i--){
      if(rndm[i]=="\\"){
        break;
      }
      name+=rndm[i];
    }
    rndm=name.split('');
    name='';
    for(var i=rndm.length-1; i>=0; i--){
      name+=rndm[i];
    }
    $(".choosen-file").val(name);
  })
})


$(document).ready(function (e) {
 $(".uploadformGUI").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "php/GUI_upload.php",
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
            alert("successfully uploaded "+data);
            $(".carousel-item").removeClass("active");
            $(".carousel-inner:last").append('<div class="carousel-item active"><img height="90%" class="d-block w-100" src="php/GUI/'+data+'" alt="slide"></div>');
            $(".carousel-indicators").append('<li data-target="#carouselExampleIndicators" data-slide-to="'+$(".carousel-indicators").length+'"></li>');
         },
         error: function(e)
         {
           alert("error occoured");
         }
    });
 }));
});
