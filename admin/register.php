<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        #message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form method="post" action="create_account.php" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required name="uname" type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="User Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <select required name="atype"  class="form-control " value="Account type"  name="" id="">
                                            <option  value="">Account type</option>
                                            <option value="a" selected value="">Admin Account</option>
                                            <option value="u">User Account</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input  required name="tel" type="tel" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <input required name="email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="psw" required name="pwd" type="password" class="form-control form-control-user id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <input required name="cpwd" type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                    <div id="message">
                                    <h3>Password must contain the following:</h3>
                                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                    <p id="number" class="invalid">A <b>number</b></p>
                                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                    </div>
                                    <script>
                                    var myInput = document.getElementById("psw");
                                    var letter = document.getElementById("letter");
                                    var capital = document.getElementById("capital");
                                    var number = document.getElementById("number");
                                    var length = document.getElementById("length");

                                    // When the user clicks on the password field, show the message box
                                    myInput.onfocus = function() {
                                    document.getElementById("message").style.display = "block";
                                    }

                                    // When the user clicks outside of the password field, hide the message box
                                    myInput.onblur = function() {
                                    document.getElementById("message").style.display = "none";
                                    }

                                    // When the user starts to type something inside the password field
                                    myInput.onkeyup = function() {
                                    // Validate lowercase letters
                                    var lowerCaseLetters = /[a-z]/g;
                                    if(myInput.value.match(lowerCaseLetters)) {  
                                        letter.classList.remove("invalid");
                                        letter.classList.add("valid");
                                    } else {
                                        letter.classList.remove("valid");
                                        letter.classList.add("invalid");
                                    }
                                    
                                    // Validate capital letters
                                    var upperCaseLetters = /[A-Z]/g;
                                    if(myInput.value.match(upperCaseLetters)) {  
                                        capital.classList.remove("invalid");
                                        capital.classList.add("valid");
                                    } else {
                                        capital.classList.remove("valid");
                                        capital.classList.add("invalid");
                                    }

                                    // Validate numbers
                                    var numbers = /[0-9]/g;
                                    if(myInput.value.match(numbers)) {  
                                        number.classList.remove("invalid");
                                        number.classList.add("valid");
                                    } else {
                                        number.classList.remove("valid");
                                        number.classList.add("invalid");
                                    }
                                    
                                    // Validate length
                                    if(myInput.value.length >= 8) {
                                        length.classList.remove("invalid");
                                        length.classList.add("valid");
                                    } else {
                                        length.classList.remove("valid");
                                        length.classList.add("invalid");
                                    }
                                    }
                                    </script>
                                </div>
                                <input name="submit" type='submit' value="Add User" class="btn btn-primary btn-user btn-block">
                                </input>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="../../login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>