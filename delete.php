<?php
require_once "./actions/db_connect.php";
$dummypic = "https://images.unsplash.com/photo-1519682337058-a94d519337bc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80";

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM media WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        $title = $data['title'];
        $type = $data['type'];
        $isbn = $data['isbn'];
        $description = $data['description'];
        $author_fname = $data['author_first_name'];
        $author_lname = $data['author_last_name'];
        $publisher_name = $data['publisher_name'];
        $publisher_address = $data['publisher_address'];
        $publish_date = $data['publish_date'];
        $status = $data['status'];

        if (empty($data['image'])) {
            $image = $dummypic;
        } else {
            $image = $data['image'];
        }
    } else {
        header("location: error.php");
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
    <?php require_once "./components/styles.php" ?>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <fieldset>
        <div class='my-3 d-flex justify-content-around'>
            <div>
                <h2 class="my-5">Delete request</h2>
                <h5>You have selected the data below:</h5>
                <table class="table w-75 mt-3">
                    <tr>
                        <td>Title: <?php echo $title ?></td>
                    </tr>
                    <tr>
                        <td>ISBN: <?php echo $isbn ?></td>
                    </tr>
                </table>
            </div>
            <img class='img-thumbnail' src='<?php echo $image; ?>'>
        </div>

        <div class="px-5 mx-5">
            <h3 class="mx-3 mt-5">Do you really want to delete this product?</h3>
            <form action="actions/a_delete.php" method="post" class="m-3">
                <input type="hidden" name="id" value="<?php echo $id ?>" />
                <input type="hidden" name="picture" value="<?php echo $image ?>" />
                <button class="btn btn-outline-danger" type="submit">Delete!</button>
                <a href="index.php"><button class="btn btn-outline-warning" type="button">No, go back!</button></a>
            </form>
        </div>
    </fieldset>

</body>

</html>