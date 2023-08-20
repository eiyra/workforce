<?php
include 'inc/header.php';
?>
<script src="js/user.js"></script>

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

  .forgot-form .btnSubmit {
    font-weight: 600;
    color: #FFFF;
    background-color: #4B9EFF;
  }

  .hidden {
    display: none;
  }

  body .icField #ic {
    position: absolute;
    right: 30px;
    top: 37.5%;
    transform: translateY(-50%);
  }

  body .emailField #email {
    position: absolute;
    right: 30px;
    top: 59.5%;
    transform: translateY(-50%);
  }
</style>

<body>
  <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body forgot-form">
          <h4 class="card-title text-center text-uppercase mb-5">Forgot Password</h4>
          <form id="forgotPasswordForm" method="POST">
            <div id="errorMessge" class="alert hidden"></div>
            <div class="form-group">
              <div class="icField">
                <label for="userIc">User IC:</label>
                <input type="text" id="userIc" name="userIc" class="form-control" placeholder="Enter IC Number"
                  required />
                <span><i id="ic" class="fa-solid fa-address-card"></i></span>
              </div>
            </div>

            <div class="form-group mt-3">
              <div class="emailField">
                <label for="userEmail">Email:</label>
                <input type="email" id="userEmail" name="userEmail" class="form-control" placeholder="Enter email"
                  required />
                <span><i id="email" class="fa-solid fa-envelope"></i></span>
              </div>
            </div>

            <div class="form-group text-center mt-5">
              <input type="hidden" name="action" value="forgotPassword" />
              <input type="submit" class="btnSubmit" class="btn btn-primary" value="Forgot Password" />
            </div>

            <div class="form-group text-center mt-2">
              <a href="index.php" class="back-to-login" style="font-size: 13px;">
                <i class="fas fa-arrow-left" style="color: blue;"></i> Back to Login</span>
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    const userIcInput = document.getElementById('userIc');

    // This for user must insert limit 12 digit ic number
    userIcInput.addEventListener('input', function (event) {
      let input = event.target;
      let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters

      if (value.length > 12) {
        value = value.slice(0, 12); // Limit to 12 digits
      }

      input.value = value;
    });

    document.getElementById('userIc').addEventListener('input', function (event) {
      let input = event.target;
      let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
      input.value = value;
    });
  </script>
</body>

</html>