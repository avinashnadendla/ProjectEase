var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
  mode: 'xml',
  theme: 'dracula',
  lineNumbers: true
});
editor.setOption("mode", 'python');
editor.setSize(1111, 770);


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
 $(".uploadform").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "php/file_upload.php",
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
            alert(data);
         },
         error: function(e)
         {
           alert("error occoured");
         }
    });
 }));
});




// <================================LIST HANDELING=================================>

// $(".click").click(function(event){
//   event.preventDefault();
//   $(".file-list").addClass("active");
//   // alert(data);
// })

function removeActive(){
  var list = $(".list-group li");
  list.each(function(i, li){
    var item=$(li);
    item.removeClass("active");
  })
}

$(document).ready(function(){
  $(".list-group li").click(function(){
    removeActive();
    var index = $(this).index();
    var text = $(this).text();
    $(this).addClass("active");
    $.ajax({
      type: 'POST',
      url: 'php/file_loader.php',
      data: {text: text},
      success: function(result){
        jQuery.get(result, function(data) {
        editor.clearHistory();
        editor.setValue(data);
        });
      }
    })
  })
})
