<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <!--==================== CSS ====================-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <title>Sign in & Sign up Form</title>
</head>

<body>
  <!--==================== ERROR ====================-->
  <?php
        if(isset($_GET["error"])){
          if($_GET["error"] == "emptyinput"){
            echo "<div style=\"padding: 20px;
            background-color: #f44336;
            color: white;\">
            <span style=\"margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;\" onclick=\"this.parentElement.style.display='none';\">&times;</span> Fill out all Fields.
            </div>";
          }
          else if($_GET["error"] == "nouser"){
            echo "<div style=\"padding: 20px;
            background-color: #f44336;
            color: white;\">
            <span style=\"margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;\" onclick=\"this.parentElement.style.display='none';\">&times;</span> Please Login first.
            </div>";
          }
          else if($_GET["error"] == "sessionexpire"){
            echo "<div style=\"padding: 20px;
            background-color: #f44336;
            color: white;\">
            <span style=\"margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;\" onclick=\"this.parentElement.style.display='none';\">&times;</span> Your Session Expire, Please Login again.
            </div>";
          }
          else if($_GET["error"] == "invalidUsername"){
            echo "<div style=\"padding: 20px;
            background-color: #f44336;
            color: white;\">
            <span style=\"margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;\" onclick=\"this.parentElement.style.display='none';\">&times;</span> Invalid Username.
            </div>";
          }
          else if($_GET["error"] == "invalidEmail"){
            echo "<div style=\"padding: 20px;
            background-color: #f44336;
            color: white;\">
            <span style=\"margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;\" onclick=\"this.parentElement.style.display='none';\">&times;</span> Invalid Email.
            </div>";
          }
          else if($_GET["error"] == "passwordMatch"){
            echo "<div style=\"padding: 20px;
            background-color: #f44336;
            color: white;\">
            <span style=\"margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;\" onclick=\"this.parentElement.style.display='none';\">&times;</span> Password is not the same.
            </div>";
          }
          else if($_GET["error"] == "usernameExist"){
            echo "<div style=\"padding: 20px;
            background-color: #f44336;
            color: white;\">
            <span style=\"margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;\" onclick=\"this.parentElement.style.display='none';\">&times;</span> Username Already Exist.
            </div>";
          }
          else if($_GET["error"] == "emailExist"){
            echo "<div style=\"padding: 20px;
            background-color: #f44336;
            color: white;\">
            <span style=\"margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;\" onclick=\"this.parentElement.style.display='none';\">&times;</span> Email Already Exist.
            </div>";
          }
          else if($_GET["error"] == "nouser"){
            echo "<div style=\"padding: 20px;
            background-color: #f44336;
            color: white;\">
            <span style=\"margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;\" onclick=\"this.parentElement.style.display='none';\">&times;</span> Incorect Username.
            </div>";
          }
          else if($_GET["error"] == "wrongpass"){
            echo "<div style=\"padding: 20px;
            background-color: #f44336;
            color: white;\">
            <span style=\"margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;\" onclick=\"this.parentElement.style.display='none';\">&times;</span> Incorrect Password.
            </div>";
          }
          else if($_GET["error"] == "none"){
            echo "<div style=\"padding: 20px;
            background-color: #04aa6d;
            color: white;\">
            <span style=\"margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;\" onclick=\"this.parentElement.style.display='none';\">&times;</span> Request Sent.
            </div>";
          }
        }
        ?>
  <!--==================== SIGNUP/LOGIN FORM ====================-->
  <div class="form__container">
    <div class="forms__container">
      <div class="signin__signup">
        <!--==================== LOGIN ====================-->
        <form action="/includes/login.inc.php" method="post" class="sign__in__form">
          <h2 class="title">Sign in</h2>
          <div class="input__field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="Username" required
              oninvalid="this.setCustomValidity('Enter User Name Here')" oninput="this.setCustomValidity('')" />
          </div>
          <div class="input__field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="Password" required
              oninvalid="this.setCustomValidity('Enter Password Here')" oninput="this.setCustomValidity('')" />
          </div>
          <input type="submit" name="submit" value="Login" class="btn solid" />
          <h3>Forgot Password?</h3>
          <p>Please Email us at </p><a href="mailto:hydroponic.adteam@gmail.com?subject=Forgot Password">hydroponic.adteam@gmail.com</a>
        </form>

        <!--==================== SIGNUP ====================-->
        <form action="includes/signup.inc.php" method="post" class="sign__up__form">
          <h2 class="title">Sign up</h2>
          <div class="input__field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="Username" required
              oninvalid="this.setCustomValidity('Enter User Name Here')" oninput="this.setCustomValidity('')" />
          </div>
          <div class="input__field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="Email" required
              oninvalid="this.setCustomValidity('Enter Email Here')" oninput="this.setCustomValidity('')" />
          </div>
          <div class="input__field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="Password" required
              oninvalid="this.setCustomValidity('Enter Password Here')" oninput="this.setCustomValidity('')" />
          </div>
          <div class="input__field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirm Password" name="Confirm_Password" required
              oninvalid="this.setCustomValidity('Confirm Password Here')" oninput="this.setCustomValidity('')" />
          </div>
          <input type="submit" name="submit" class="btn" value="Signup" />
        </form>
      </div>
    </div>

    <!--==================== SIGNUP BUTTON ====================-->
    <div class="panels__container">
      <div class="panel left__panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Do you want to have an access to our automated hydroponic system?
            Sign up here!
          </p>
          <button class="btn transparent" id="sign__up__btn">Sign up</button>
        </div>
        <img src="assets/img/login.svg" class="image" alt="" />
      </div>
      <div class="panel right__panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Sign in for more information about automated hydroponic system.
          </p>
          <button class="btn transparent" id="sign__in__btn">Sign in</button>
        </div>
        <img src="assets/img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <!--==================== MAIN JS ====================-->

  <script>{ { payload.script } }</script>
  <script>
    $(document).ready(function (e) {

      $("form[ajax=true]").submit(function (e) {

        e.preventDefault();

        var form_data = $(this).serialize();
        var form_url = $(this).attr("action");
        var form_method = $(this).attr("method").toUpperCase();

        $("#loadingimg").show();

        $.ajax({
          url: form_url,
          type: form_method,
          data: form_data,
          cache: false,
          success: function (returnhtml) {
            $("#result").html(returnhtml);
            $("#loadingimg").hide();
          }
        });
      });
    });
  </script>
  <script>
    /*==================== SIGNUP/LOGIN BUTTON====================*/
    const sign_in_btn = document.querySelector("#sign__in__btn");
    const sign_up_btn = document.querySelector("#sign__up__btn");
    const container = document.querySelector(".form__container ");

    sign_up_btn.addEventListener("click", () => {
      container.classList.add("sign__up__mode");
    });

    sign_in_btn.addEventListener("click", () => {
      container.classList.remove("sign__up__mode");
    });
  </script>
</body>

</html>