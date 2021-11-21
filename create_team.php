<?php
    session_start();
    // database connection
?>

<html lang = "en">
    <head>
        <title>ProjectEase</title>
        <link rel="icon" href="./assets/EASE_icon.png" type="image/gif" sizes="16x16">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Imported CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    </head>
    <body>
      <!-- ------ Header and Logo------ -->
      <header id="header" class=" d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="#"><span>ProjectEase</span></a></h1>
            </div>

            <!-- ------ Nav Menu ------ -->
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                <li><a href="">
                        Welcome,
                        <?php
                          echo $_SESSION['username'];
                        ?>
                    </a>
                  </li>
                  <li><a class="logout-link">Log Out</a></li>
                </ul>
            </nav><!-- End Nav Menu -->

        </div>
      </header><!-- End Header -->
        <br>

        <main id="main">
          <!-- Data Entry Form -->
          <div class="container">
            <form class="needs-validation" method="post" action="#" novalidate>
              <h3>Register Your Team</h3>
              <hr>

              <div class="form-row">

                <div class="col-md-4 mb-3">
                  <label for="data_name">Project Name</label>
                  <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Project Name" required>
                  <div class="invalid-feedback">
                    Please enter a Project Name
                  </div>
                </div>

                <div class="col-md-4 mb-3">
                  <label for="data_name">Team Name</label>
                  <input type="text" class="form-control" id="team_name" name="team_name" placeholder="Team Name" required>
                  <div class="invalid-feedback">
                    Please enter a Team Name
                  </div>
                </div>

                <div class="col-md-4 mb-3">
                  <label for="data_name">Team ID</label>
                  <input type="text" class="form-control" id="team_id" name="team_id" value="<?php echo rand(100001,999999) ?>" readonly>
                </div>

              </div>
              <br>
              <div class="form-row">

                <div class="col">
                  <label for="data_name">Introduction</label>
                  <textarea class="Introduction form-control" rows="6" id="intro" name="intro" minlength="500" maxlength="1000" placeholder="Describe your Project. Please write a Minimum 500 and Maximum 1000 Characters" required></textarea>
                  <div class="invalid-feedback">
                    Please enter a Project Description. Number of characters should be between 500 and 1000
                  </div>
                </div>

              </div>
              <br>
              <div class="form-row">

                <div class="col-md-6 mb-3">
                  <label for="data_name">Problem Statement</label>
                  <textarea class="problem_statement form-control" rows="7" id="prob_stat" name="prob_stat" minlength="500" maxlength="1000" placeholder="What Problem it solves? Please write a Minimum 500 and Maximum 1000 Characters" required></textarea>
                  <div class="invalid-feedback">
                    Please write the problem statement that Project solves. Number of characters should be between 500 and 1000
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="data_name">Resources Required</label>
                  <textarea class="resources_required form-control" rows="7" id="resources" name="resources" minlength="300" maxlength="1000" placeholder="Software, Hardware, Datasets, Funds, Equipment etc. required for success of this project. Please write a Minimum 300 Characters and Maximum 1000 Characters." required></textarea>
                  <div class="invalid-feedback">
                    Please provide the resources required for your project. Number of characters should be between 300 and 1000
                  </div>
                </div>

              </div>
              <br>
              <div class="form-row">

                <div class="col-md-6 mb-3">
                  <label for="data_name">Target Audience</label>
                  <textarea class="form-control" rows="7" id="clients" name="clients" minlength="500" maxlength="1000" placeholder="Who will be the potential clients/customers/users/startups/beneficiaries of the project? Why you think they are your target audience? Please write minimum 500 and maximum 1000 Characters." required></textarea>
                  <div class="invalid-feedback">
                    Please describe your target audience. Number of characters should be between 500 and 1000.
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="data_name">Outcome of Project</label>
                  <textarea class="form-control" rows="7" id="outcome" name="outcome" minlength="500" maxlength="1000" placeholder="What will be the parameters of achievement in your project and Why? Here you are specifying the assessment criteria of your project at the final evaluation time. Please write a Minimum 500 Characters and Maximum 1000 Characters." required></textarea>
                  <div class="invalid-feedback">
                    Please write how you will measure the success of this project. Number of characters should be between 500 and 1000.
                  </div>
                </div>

              </div>
              <br>
              <div class="form-row">

                <div class="col-md-6 mb-3">
                  <label for="data_name">Innovation</label>
                  <textarea class="form-control" rows="7" id="innovation" name="Innovation" minlength="1000" maxlength="2000" placeholder="What will be the innovation in this project? Write at least Three Innovations. You may be proposing a new technology model, new paradigm or framework to solve the problem. Please write Minimum 1000 Maximum 2000 Characters." required></textarea>
                  <div class="invalid-feedback">
                    Please describe what is the innovation in this project. Number of characters should be between 1000 and 2000.
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="data_name">Risk Analysis</label>
                  <textarea class="form-control" rows="7" id="risk_analysis" name="risk_analysis" minlength="500" maxlength="1000" placeholder="What are the factors which pose risk of failure of your project and risk of not completing your project. How you are taking care of these risks so that they can be avoided. Please write a Minimum 500 Characters and Maximum 1000 Characters." required></textarea>
                  <div class="invalid-feedback">
                    Please write risk of not completing your project. Number of characters should be between 500 and 1000.
                  </div>
                </div>

              </div>
              <br>
              <div class="form-row">

                <div class="col">
                  <label for="data_name">Terms & Conditions</label>
                  <textarea class="form-control" rows="6" id="tandc" name="t&c" minlength="500" maxlength="2000" placeholder="List down the Ethics, Privacy, Moral and Legal issues related with the project. Even if there are no issues, then describe how it fulfills all the norms. Please write a Minimum 500 and Maximum 2000 Characters." required></textarea>
                  <div class="invalid-feedback">
                    Please enter Terms & Conditions of your Project. Number of characters should be between 500 and 2000.
                  </div>
                </div>

              </div>
              <br>
              <hr>
              <button class="submit-form btn btn-primary" type="submit" style="border-radius: 20px; background-color: #3498db;">Register</button>
            </form>

            <script>
              (function() {
                'use strict';
                window.addEventListener('load', function() {
                  var forms = document.getElementsByClassName('needs-validation');
                  var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                      if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                    }, false);
                  });
                }, false);
              })();
            </script>

          </div>

        </main>

        <!-- Vendor JS Files -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/join_create.js"></script>
        <!-- <script src="js/admin.js"></script> -->

      </body>
</html>
