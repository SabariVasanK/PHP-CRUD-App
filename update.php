<?php
include "config.php";

if(isset($_POST['update'])){
    $original_user_id = $_POST['original_user_id']; // Retrieve the original user ID
    $user_id = $_POST['user_id']; // Retrieve the updated user ID
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $sql = "UPDATE guest SET id = '$user_id', firstname = '$firstname', lastname = '$lastname',
            email = '$email', gender = '$gender', password = '$password' WHERE id = '$original_user_id'";

    $result = $conn->query($sql);

    if($result === TRUE){
        echo "Record updated successfully";
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if(isset($_GET['id'])){
    $user_id = $_GET['id'];

    $sql = "SELECT * FROM guest WHERE id='$user_id'"; // corrected table name and removed single quotes around column names

    $result = $conn->query($sql);

    if($result->num_rows > 0){ // corrected property access
        $row = $result->fetch_assoc();
        $user_id = $row['id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $gender = $row['gender'];
        $password = $row['password'];
        ?>
        <html>
        <body>
            <h2>User Update Form</h2>
            <form action="" method="post">
                <fieldset>
                    <legend>Personal Information</legend>
                    Original User ID: <br>
                    <input type="text" name="original_user_id" value="<?php echo $user_id; ?>" readonly> <!-- Display original user ID (readonly) -->
                    <br>
                    Updated User ID: <br>
                    <input type="text" name="user_id" value="<?php echo $user_id; ?>"> <!-- Allow updating user ID -->
                    <br>
                    First name: <br>
                    <input type="text" name="firstname" value="<?php echo $firstname;?>">
                    <br>       
                    Last name: <br>
                    <input type="text" name="lastname" value="<?php echo $lastname;?>">
                    <br>
                    Email: <br>
                    <input type="text" name="email" value="<?php echo $email;?>">
                    <br>
                    Password: <br>
                    <input type="text" name="password" value="<?php echo $password;?>">
                    <br>
                    Gender: <br>
                    <input type="radio" name="gender" value="male" <?php if($gender == 'male'){echo "checked";}?> >Male
                    <input type="radio" name="gender" value="female" <?php if($gender == 'female'){echo "checked";}?> >Female
                    <br>
                    <input type="submit" value="Update" name="update">
                </fieldset>
            </form>
            <a class="btn btn-info" href="view.php">View</a>
        </body>
        </html>
        <?php 
    }
    else{
        header('Location:view.php');
    }
}
?>
