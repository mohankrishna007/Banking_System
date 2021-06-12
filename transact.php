<!DOCTYPE html>
<html>
    <head>
        <title>
            Make Transaction 
        </title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
    </head>

    <?php
    
    $db = mysqli_connect('localhost', 'id16980220_mohankrishna', '/D)h+B>6B<WoX2Gb');
    $er = mysqli_select_db($db, "id16980220_banking");
    ?>

    <body style="margin-top: 5%;">
        <div class="section-title">
            <h2> ! Tranfer Funds !</h2>
         </div>
         

         <h2 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                    color:cornflowerblue;
                    margin: 5%;"> From :
                    
                    <?php
                    session_start();
                     $name = mysqli_query($db, "SELECT username,balance FROM customers where id=".$_GET['id']);
                    $row = mysqli_fetch_array($name); 
                    $bal = $row['balance'];

                    $_SESSION['sender'] = $row['username'];

                    echo "<p style=\"font-family:verdhana; color: blue; font-size:1.8em;\">".$row['username']." --- ".$bal."</p>";
                    ?>
                
        </h2>

        
        <h2 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                    color:cornflowerblue;
                    margin: 5%;"> TO :
                
    <form action="updatetransact.php?id=$_GET['id']" method="POST">
    <select name="receiver" style="padding: 10px;">
    <?php 
    $sql = mysqli_query($db, "SELECT username FROM customers");   
    while ($row = mysqli_fetch_array($sql)){
    echo "<option>" . $row['username'] . "</option>";
    }
    ?>
    </select>

    <input type="number" name="amount" placeholder=" AMOUNT " style="padding-right: 20px; margin:30px; width:250px; height:70px "/>
    <input type="submit"  name="transfer" class="btn btn-outline-primary"  data-mdb-ripple-color="dark" value=" Transfer "> </input>
</form>
    </h2>      

  
    </body>
</html>