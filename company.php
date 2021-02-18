<?php
  require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Dealer Page</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/style1.css">
</head>
<body style="background-color:#bdc3c7">
  <header>
    <nav>
      <h1>E-Waste Management</h1>
      <link rel="stylesheet" href="css/style.css">
      <ul id="nav">
        <li><a class="homered1" href="homepage.php">BACK</a></li>
        <!--<li><a class="homered" href="data.php">DATA</a></li>--> 
      </ul>
    </nav>
  </header>

  <div id="main-wrapper">
    <center>
      <h2>Company Entry</h2>
      <img src="imgs/recycle.jpg" class="avatar"/>
    </center>
  
    <form class="myform" action="company.php" method="post"> 
      Name: <input name="c_name" type="text" class="inputvalues" placeholder="Enter Company name" required/><br>
      Date: <input name="date" type="date" class="inputvalues" placeholder="Enter Date" required/><br> 
      Mail-ID: <input name="c_mail" type="text" class="inputvalues" placeholder="Enter Mail Id" required/><br>  
      <a href="homepage.php"><input name="ok" type="submit" id="login_btn" value="Send"/><br>
    <!--  <a href="pbdata.php"><input name="bill" type="submit" id="login_btn" value="Generate Bill"/><br>-->
    </form>
     <?php
      if(isset($_POST['ok']))
      {
         
        $c_name =$_POST['c_name'];
        $c_date =$_POST['date'];
        $c_mail = $_POST['c_mail'];
        
            $query= "insert into company values('','$c_name','$c_date','$c_mail')";
            $query_run = mysqli_query($con,$query);
            
            if($query_run)
            {
              header('location:homepage.php');
              echo '<script type="text/javascript"> alert("Mail Sended Succesfully..") </script>';
            }
            else
            {
              echo '<script type="text/javascript"> alert("Error..!! While Adding Product ") </script>';
            }
           
      }
    ?>
  </div>
</body>
</html>