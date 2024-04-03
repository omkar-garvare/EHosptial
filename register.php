<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('image/RBC6.jpg'); /* Background image */
            background-size: cover;
            background-position: center;
            color: #343a40; /* Dark text color */
            font-family: Arial, sans-serif;
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .nav-tabs {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .nav-link {
            color: #343a40;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }
        .nav-link.active {
            color: #fff;
            background-color: #dc3545;
            border-radius: 10px;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease-in-out;
        }
        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }
        input[type="submit"] {
            border-radius: 10px;
            background-color: #dc3545;
            color: #fff;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }
        input[type="submit"]:hover {
            background-color: #c82333;
        }
        .text-center {
            text-align: center;
        }
        a {
            color: #dc3545;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }
        a:hover {
            color: #c82333;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Navigation and Header -->
    <?php require 'header.php'; ?>

    <div class="container cont">

      <?php require 'message.php'; ?>

      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7 mb-5">
          <div class="card rounded">
            <ul class="nav nav-tabs justify-content-center bg-light">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#hospitals">Hospitals</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#receivers">User</a>
              </li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane container active" id="hospitals">
                <form id="hospitalForm" action="file/hospitalReg.php" method="post" enctype="multipart/form-data" onsubmit="return validateHospitalForm()">
                  <input type="text" name="hname" id="hname" placeholder=" Name" class="form-control mb-3" required>
                  <input type="text" name="hcity" id="hcity" placeholder=" City" class="form-control mb-3" required>
                  <input type="tel" name="hphone" id="hphone" placeholder=" Phone Number" class="form-control mb-3" required pattern="[0,6-9]{1}[0-9]{9,11}" title="Phone number must start from 0, 6, 7, 8 or 9 and must have 10 to 12 digits">
                  <input type="email" name="hemail" id="hemail" placeholder=" Email" class="form-control mb-3" required>
                  <input type="password" name="hpassword" id="hpassword" placeholder=" Password" class="form-control mb-3"   title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                  <input type="submit" name="hregister" value="Register" class="btn btn-primary btn-block mb-4">
                </form>
              </div>

              <div class="tab-pane container fade" id="receivers">
               <form id="receiverForm" action="file/receiverReg.php" method="post" enctype="multipart/form-data" onsubmit="return validateReceiverForm()">
                  <input type="text" name="rname" id="rname" placeholder="User Name" class="form-control mb-3" required>
                  <select name="rbg" id="rbg" class="form-control mb-3" required>
                    <option disabled="" selected="">Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                  </select>
                  <input type="text" name="rcity" id="rcity" placeholder="User City" class="form-control mb-3" required>
                  <input type="tel" name="rphone" id="rphone" placeholder="User Phone Number" class="form-control mb-3" required pattern="[0,6-9]{1}[0-9]{9,11}" title="Phone number must start from 0, 6, 7, 8 or 9 and must have 10 to 12 digits">
                  <input type="email" name="remail" id="remail" placeholder="User Email" class="form-control mb-3" required>
                  <input type="password" name="rpassword" id="rpassword" placeholder="User Password"  class="form-control mb-3" required minlength="6">
                  <input type="submit" name="rregister" value="Register" class="btn btn-primary btn-block mb-4" >
                </form>
              </div>
            </div>
            <a href="login.php" class="text-center mb-4" title="Click here">Already have an account?</a>
          </div>
        </div>
      </div>
    </div>

    <script>
      function validateHospitalForm() {
        // Field-level validation for hospital registration form
        var hname = document.getElementById("hname").value.trim();
        var hcity = document.getElementById("hcity").value.trim();
        var hphone = document.getElementById("hphone").value.trim();
        var hemail = document.getElementById("hemail").value.trim();
        var hpassword = document.getElementById("hpassword").value.trim();

        if (hname === "") {
          alert("Please enter Hospital Name");
          return false;
        }

        if (hcity === "") {
          alert("Please enter Hospital City");
          return false;
        }

        // You can add more validations for other fields

        return true;
      }

      function validateReceiverForm() {
        // Field-level validation for receiver registration form
        var rname = document.getElementById("rname").value.trim();
        var rbg = document.getElementById("rbg").value.trim();
        var rcity = document.getElementById("rcity").value.trim();
        var rphone = document.getElementById("rphone").value.trim();
        var remail = document.getElementById("remail").value.trim();
        var rpassword = document.getElementById("rpassword").value.trim();

        if (rname === "") {
          alert("Please enter User Name");
          return false;
        }

        if (rcity === "") {
          alert("Please enter User City");
          return false;
        }

        // You can add more validations for other fields

        return true;
      }
    </script>

</body>
</html>
