<?php
include "config.php";

if(isset($_POST['submit'])){
    $user_id = $_POST['user_id']; // Retrieve user ID
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO guest (id, firstname, lastname, email, password, gender) VALUES ('$user_id', '$firstname', '$lastname', '$email', '$password', '$gender')";
    $result = $conn->query($sql);

    if($result === TRUE){
        echo "Inserted successfully";
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<html>
<body>
    <h2>Signup form</h2>    
    <form action="" method="POST">
        <fieldset>
            User ID: <input type="text" name="user_id"><br><br> <!-- User ID field -->
            Firstname: <input type="text" name="firstname"><br><br>
            Lastname: <input type="text" name="lastname"><br><br>
            E-mail: <input type="text" name="email"><br><br>
            Password: <input type="text" name="password"><br><br>
            Gender: 
            <input type="radio" name="gender" value="male">male
            <input type="radio" name="gender" value="female">female<br><br>
            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>
    <a class="btn btn-info" href="view.php">View</a>
</body>
</html>
