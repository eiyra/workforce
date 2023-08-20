<?php
include "inc/header.php";
?>
<script src="js/user.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
  .back-to-login {
    text-decoration: none;
    display: inline-block;
    color: black;
  }

  .btnSubmit {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    cursor: pointer;
  }

  .reset-form .btnSubmit {
    font-weight: 600;
    color: #FFFF;
    background-color: #4B9EFF;
  }

  .hidden {
    display: none;
  }

  body .password-field {
    position: relative;
  }

  body .password-field input {
    width: 21.2rem;
    height: 3em;
    padding: 1em;
    border: 0;
    border-radius: 10px;
    box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.2);
    font-size: 15px;
    letter-spacing: 0.5px;
  }

  body .password-field input::placeholder {
    color: #a9a9a9;
  }

  body .password-field #newPasswordToggler {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
  }

  body .password-field #confirmPasswordToggler {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
  }
</style>

<body>
  <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body reset-form">
          <h4 class="card-title text-center text-uppercase mb-5">Reset Password</h4>
          <?php if (!empty($_GET['authtoken']) && $_GET['authtoken']) { ?>
            <form id="savePasswordForm" method="POST">
              <div id="errorMessge" class="alert hidden"></div>
              <div class="form-group">
                <div class="password-field">
                  <input type="password" id="newPassword" name="newPassword" placeholder="New Password" required />
                  <span><i id="newPasswordToggler" class="fa-solid fa-eye"
                      onclick="togglePasswordVisibility('newPassword', this)"></i></span>
                </div>
              </div>

              <div class="form-group mt-3">
                <div class="password-field">
                  <input type="password" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm Password"
                    required />
                  <span><i id="confirmPasswordToggler" class="fa-solid fa-eye"
                      onclick="togglePasswordVisibility('confirmNewPassword', this)"></i></span>
                </div>
              </div>

              <div class="form-group text-center mt-5 mb-3">
                <input type="hidden" name="action" value="savePassword" />
                <input type="hidden" name="authtoken" value="<?php echo $_GET['authtoken']; ?>" />
                <input type="submit" class="btnSubmit" value="Reset Password" />
              </div>
            </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <script>
    function togglePasswordVisibility(inputId, iconElement) {
      const passwordInput = document.getElementById(inputId);

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        iconElement.classList.remove("fa-eye");
        iconElement.classList.add("fa-eye-slash");
      } else {
        passwordInput.type = "password";
        iconElement.classList.remove("fa-eye-slash");
        iconElement.classList.add("fa-eye");
      }
    }
  </script>
</body>

</html>