<?php
require_once "db_connect.php";

if ($_POST) {
    $id = $_POST['id'];
    $sql = "DELETE FROM media Where id = {$id}";
    if (mysqli_query($connect, $sql) == TRUE) {
        $class = "success";
        $icon = "<i class='fa-solid fa-circle-check me-2'></i>";
        $message = "Successfully Deleted!";
    } else {
        $class = "danger";
        $icon = "<i class='fa-solid fa-circle-xmark me-2'></i>";
        $message = "The entry was not deleted due to:" . $connect->error;
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "../components/styles.php"; ?>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Delete request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p class="fs-5"><?= $icon, $message; ?></p>
            <a href='../index.php'><button class="btn btn-outline-dark" type='button'>Home</button></a>
        </div>
    </div>

</body>

</html>