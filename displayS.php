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
<h1>
    <center>
        <p>Students Details</p>
    </center>
</h1>
<br><br>
<div class="table-responsive-md">
<table class="table table-light" >
  <thead>
    <tr>
    
      <th scope="col">Sr. No.</th>
      <th scope="col">PRN NO</th>
      <th scope="col">Name</th>
      <th scope="col">Branch</th>
      <th scope="col">YEAR</th>
      <th scope="col">Batch</th>
      
    </tr>
  </thead>
  
        <?php
        session_start();
        $count=1;
       
        $con = mysqli_connect('localhost','root','','srms');
        if($con)
        {
            //echo "connection successful";
        }
        else{
            echo "conection failed";
        }
        $sql = "SELECT * FROM students";
        $query = $con->query($sql);
        
        while($row = $query->fetch_assoc())
        { 
            $count++;
        ?>
        
      


  <tbody>
  <?php 
        ?>
    <tr>
      
      
        <td><?php echo $row['srno'];?></td>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['name'];?></td>
        <td> <?php echo $row['branch'];?></td>
        <td><?php echo $row['year'];?></td>
        <td><?php echo $row['batch'];}?></td>
       <?php
        
        if($count==1)
        {
            echo "<script>
            alert('No Records');
            window.location.href='adisplay.html';
            </script>";
        }
       ?>
      
    </tr>
  </tbody>
</table>

        </div>
        <br><br><b></b>
        <center>
            <p>        <div class="form-group">
							<a href="index.html">	<button  class="btn btn-primary" type="submit" value="Submit" name="submit"> Home </button></a>
							</div> 
                           
                            </center><!-- form-group// -->
</body>
</html>