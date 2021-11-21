$(".add-timeline").click(function(event){
  var date = $(".timeline-date").val();
  var content = $(".timeline-content").val();
  if(date!=""){
    if(content!=""){
        $.ajax({
          url: "./php/timeline.php",
          type: 'POST',
          data: {
            date: date,
            content: content
          },
          success: function(result){
            addTimeline(date, content);
          },
          error: function(msg){
            alert("failed to connect to the database!");
          }
        })
    }
    else{
      alert("Please fill content field!");
    }
  }
  else{
    alert("Please fill date field!");
  }
})


function addTimeline(date, content){
  var len = $(".timeline div").length/2;
  len+=1;
  var element = '<div class="Container ';
  if(len%2==0){
    element = element + "Right"+'">';
  }
  else{
    element = element + "Left"+'">';
  }
  element = element + '<div class="Content">'+'<h2>'+date+'</h2>';
  element = element + '<p>'+content+'</p>'+'</div></div>';
  $(".timeline").append(element)
  $(".close-modal").click();
}
