<?php
include 'connect.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>Doctor Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f2f2f2;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h2 {
            color: #333;
        }
    </style>
</head>
<body>

<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctorName = $_POST["doctor_name"];
    $location = $_POST["location"];
    $email = $_POST["email"];
    $mobileNumber = $_POST["mobile_number"];

    //insert query
    $sql = "INSERT INTO `searchdoctor` (dname, location, email, mobile) VALUES ('$doctorName', '$location', '$email', '$mobileNumber')";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
}
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="doctor_name">Doctor Name:</label>
    <input type="text" name="doctor_name" required autocomplete="off" >

    <label for="location">Location:</label>
    <input type="text" name="location" required autocomplete="off" >

    <label for="email">Email:</label>
    <input type="email" name="email" required  autocomplete="off">

    <label for="mobile_number">Mobile Number:</label>
    <input type="tel" name="mobile_number" required autocomplete="off" >

    <input type="submit" value="Submit"name="submit" >
</form>

</body>
</html>
