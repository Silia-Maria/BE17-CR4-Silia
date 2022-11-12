<?php
require_once "db_connect.php";
if ($_POST) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $type = $_POST['type'];
    $isbn = $_POST['isbn'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $author_fname = $_POST['author_first_name'];
    $author_lname = $_POST['author_last_name'];
    $publisher_name = $_POST['publisher_name'];
    $publisher_address = $_POST['publisher_address'];
    $publish_date = $_POST['publish_date'];
    $status = $_POST['status'];

    $sql = "UPDATE media SET title = '$title', image='$image', isbn = '$isbn', description = '$description', type = '$type', author_first_name = '$author_fname', author_last_name = '$author_lname', publisher_name = '$publisher_name', publisher_address = '$publisher_address', publish_date = '$publish_date', status = '$status' WHERE id = {$id}";

    if (mysqli_query($connect, $sql) == TRUE) {
        $class = "success";
        $icon = "<i class='fa-solid fa-circle-check me-2'></i>";
        $message = "The record was successfully updated!";
    } else {
        $class = "danger";
        $icon = "<i class='fa-solid fa-circle-xmark me-2'></i>";
        $message = "Error while updating record: <br>" . mysqli_connect_error();
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
    <?php require_once "../components/styles.php" ?>
    <link rel="stylesheet" href="../style.css">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Update request response</h1>
        </div>
        <div class="alert alert-<?php echo $class; ?> " role="alert">
            <p class="fs-5"><?php echo $icon, $message; ?></p>
            <a href='../update.php?id=<?= $id; ?>'><button class="btn btn-outline-dark" type='button'>Back</button></a>
            <a href='../index.php'><button class="btn btn-outline-dark" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>