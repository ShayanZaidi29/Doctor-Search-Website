<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $search = $_POST['search'];

    $sql = "SELECT * FROM searchdoctor WHERE id LIKE '%$search%' OR dname LIKE '%$search%' OR location LIKE '%$search%'";

    $result = mysqli_query($con, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Data</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <form method="post">
        <input type="text" placeholder="Search Data" name="search">
        <button class="btn btn-dark" name="submit">Search</button>
    </form>
    <div class="container my-5">
        <?php if(isset($result) && mysqli_num_rows($result) > 0) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Doctor Name</th>
                        <th>Location</th>
                        <th>Mobile No.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['dname']; ?></td>
                            <td><?= $row['location']; ?></td>
                            <td><?= $row['mobile']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>

</body>
</html>
