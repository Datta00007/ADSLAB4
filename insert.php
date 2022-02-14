<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password']) &&
        isset($_POST['branch']) && isset($_POST['year']) &&
        isset($_POST['batch']) && isset($_POST['name'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $branch = $_POST['branch'];
        $year = $_POST['year'];
        $batch = $_POST['batch'];
        $name = $_POST['name'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "srms";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT username FROM students WHERE username = ? LIMIT 1";
            $Insert = "INSERT INTO students(username, password, branch, year, batch, name) values(?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($resultusername);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssss",$username, $password, $branch, $year, $batch, $name);
                if ($stmt->execute()) {
                    echo "<script>
                    alert('student created successfully');
                    
                    </script>";
                    
                }
                else {
                     echo "<script>
        alert('usernmae exist');
        window.location.href='registration.html';
        </script>";
                }
            }
            else {
                echo "Wrong PRN. Please enter PRN right";
                
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
<center>
        <h1>Go back to Register</h1>
        <a href="registration.html"><button type="submit" class="btn btn-primary "> Register Student</button></a>
    </center>
</body>
</html>