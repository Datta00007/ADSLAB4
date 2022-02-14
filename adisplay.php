<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        tbody{
            font-size:2rem;
        }
    </style>
</head>
<body>
    <br><br>
<center>
    <h1>
        Admin Panel
    </h1>
    <br><br>
    <?php
        session_start();
        $count=1;
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $con = mysqli_connect('localhost','root','','srms');
        if($con)
        {
            //echo "connection successful";
        }
        else{
            echo "conection failed";
        }
        $sql = "SELECT * FROM admin";
        $query = $con->query($sql);
        
        
        while($row = $query->fetch_assoc())
        { 
        
        if($row['username']==$username && $row['password']==$password)
        {
            $count++;
            
        ?>
    <h3>
    <?php echo "Admin: ".$row['username'];}
    ?> 
    </h3>
    <?php 
        }
     if($count==1)
     {
        echo "<script>
        alert('wrong username and password');
        window.location.href='ALogin.html';
        </script>";
        //  echo "wrong username or password";
        //  header("location:Alogin.html");
     }
  ?>
</center>
<br><br>
<br><br><b></b>
        <center>
            <p>
        <a href="displayS.php"><button type="submit" class="btn btn-primary "> Display Student</button></a>
        <a href="registration.html"><button type="submit" class="btn btn-primary "> Register Student</button></a>
        <div class="form-group">
							<a href="index.html">	<button  class="btn btn-primary" type="submit" value="Submit" name="submit"> Home </button></a>
							</div> </p>
                            </center><!-- form-group// -->

</body>
</html>