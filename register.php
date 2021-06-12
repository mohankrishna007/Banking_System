<style>
    /* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=number] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=number]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.RegisterButton{
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.RegisterButton:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
    </style>


<form action="register.php" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="FullName"><b>Full Name</b></label>
    <input type="text" placeholder="Enter your Full Name" name="FullName" required>

    <label for="gender"><b> Gender</b></label>
    <input type="radio" name="gender" value="male" required> Male
    <input type="radio" name="gender" value="female" required> Female </br></br>

    <label for="balance"><b>Intial balance </b></label>
    <input type="number" placeholder="Intial Balance" name="balance" required>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="RegisterButton" name="register">Register</button>
  </div>
</form> 

<?php

if(isset($_POST['register'])){

    $name = $_POST['FullName'];
    $acc = rand();
    $gender = $_POST['gender'];
    $bal = $_POST['balance'];

    $db = mysqli_connect('localhost', 'id16980220_mohankrishna', '/D)h+B>6B<WoX2Gb');
    $er = mysqli_select_db($db, "id16980220_banking");
    $sql = "INSERT INTO `customers` (`id`, `username`, `acc_num`, `gender`, `balance`) VALUES (NULL, '$name', '$acc', '$gender', '$bal')";
    $result = mysqli_query($db, $sql);

    if($result){  
        header('Location: index.html');
    }
}

?>