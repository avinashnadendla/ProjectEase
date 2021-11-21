$(".join_btn").click(function(event){
  event.preventDefault();
  // $.get("php/join_team.php", function(data){
  //
  // });

  var code=$(".input100").val();
  $.ajax({
    type: 'POST',
    url: 'php/join_team.php',
    data: {code: code},
    success: function(result){
        window.location.href = "index.php";
    }
  })
})

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

$(".Join-btn").click(function(event){
  var text = $(".teamcode-input").val();
  if(text!=""){
    $(".modal-title").html(text);
    $.ajax({
      type: 'POST',
      url: './php/TeamName.php',
      data: {text: text},
      success: function(result){
        if(result=='You have entered wrong code or team does not exist !'){
          $(".join_btn").prop("disabled", true);
          $(".modal-body").html(result);
        }
        else{
          $(".modal-body").html(result);
        }
      },
      error: function(result){
        alert("error");
      }
    })
  }
})

$(".create_own_btn").click(function(event){
  event.preventDefault();
  window.location.href = "create_team.php";
})

$(".submit-form").click(function(event){
  event.preventDefault();
  var TeamID = $("#team_id");
  var ProjectName = $("#project_name").val();
  var TeamName = $("#team_name").val();
  var TeamID = $("#team_id").val();
  var Introduction = $("#intro").val();
  if(Introduction==""){
    Introduction="null";
  }
  var ProblemStatement = $("#prob_stat").val();
  if(ProblemStatement==""){
    ProblemStatement="null";
  }
  var ResourcesRequired = $("#resources").val();
  if(ResourcesRequired==""){
    ResourcesRequired="null";
  }
  var TargetAud = $("#clients").val();
  if(TargetAud==""){
    TargetAud="null";
  }
  var Outcome = $("#outcome").val();
  if(Outcome==""){
    Outcome="null";
  }
  var Innovation = $("#innovation").val();
  if(Innovation==""){
    Innovation="null";
  }
  var RiskAny = $("#risk_analysis").val();
  if(RiskAny==""){
    RiskAny="null";
  }
  var TandC = $("#tandc").val();
  if(TandC==""){
    TandC="null";
  }
  if(ProjectName!=""){
      if(TeamName!=""){
        $.ajax({
          type: 'POST',
          url: './php/create_team.php',
          data: {
            TeamID: TeamID,
            ProjectName: ProjectName,
            TeamName: TeamName,
            TeamID: TeamID,
            Introduction: Introduction,
            ProblemStatement: ProblemStatement,
            ResourcesRequired: ResourcesRequired,
            TargetAud: TargetAud,
            Outcome: Outcome,
            Innovation: Innovation,
            RiskAny: RiskAny,
            TandC: TandC
          },
          success: function(result){
              if(result == 1){
                window.location.href="./About.php";
              }
              else{
                alert("Server Error Occoured while submitting team. ");
              }
          },
          error: function(result){
            alert("Failed to connect to the database");
          }
        })
      }
      else{
        alert("Please Enter TeamName. ");
      }
  }
  else{
    alert("Please Enter ProjectName. ")
  }
})
