<?php
require_once "db_connect.php";

if ($_POST) {
    $id = $_POST['id'];

    $sql = "UPDATE media SET status = 'reserved' WHERE id={$id}";

    if (mysqli_query($connect, $sql) == TRUE) {
        $class = "success";
        $icon = "<i class='fa-solid fa-circle-check me-2'></i>";
        $message = "Reservation was Successfull! <br> Please bring your Id to pick it up anytime at Vienna City Library";
    } else {
        $class = "danger";
        $icon = "<i class='fa-solid fa-circle-xmark me-2'></i>";
        $message = "Reservation failed due to: <br>" . mysqli_connect_error();
    }
    mysqli_close($connect);
} else {
    header("location: ./error.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "../components/styles.php"; ?>
    <link rel="stylesheet" href="../style.css">
    <title>Reserve</title>
</head>

<body>

    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Reservation response</h1>
        </div>
        <div class="alert alert-<?php echo $class; ?> " role="alert">
            <p class="fs-5"><?php echo $icon, $message; ?></p>
            <a href='../details.php?id=<?= $id; ?>'><button class="btn btn-outline-dark" type='button'>Back</button></a>
            <a href='../index.php'><button class="btn btn-outline-dark" type='button'>Home</button></a>
        </div>
    </div>

</body>

</html>