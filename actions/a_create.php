<?php
require_once "db_connect.php";

if ($_POST) {
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

    $sql = "INSERT INTO media (title, image, isbn, description, type, author_first_name,author_last_name, publisher_name, publisher_address, publish_date, status) VALUES ('$title', '$image', '$isbn', '$description', '$type', '$author_fname', '$author_lname', '$publisher_name', '$publisher_address', '$publish_date', '$status')";

    if (mysqli_query($connect, $sql) == TRUE) {
        $class = "success";
        $message = "Your entry below was successfully created: <br> <table class='table w-50'>
        <tr>Title: $title <br> </tr>
        <tr>Type: $type <br></tr>
        <tr>ISBN: $isbn <br></tr>
        <tr>Description: $description <br></tr>
        <tr>Author: $author_fname $author_lname<br></tr>
        <tr>Publisher: $publisher_name, $publisher_address  <br></tr>
        <tr>First Published: $publish_date <br></tr>
        <tr>Status: $status</tr>
        </table> <hr>";
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again <br>" . $connect->error;
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
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
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?php echo $message; ?></p>
            <a href='../index.php'><button class="btn btn-outline-dark" type='button'>Home</button></a>
        </div>
    </div>

</body>

</html>