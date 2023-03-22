<?php

require_once "./actions/db_connect.php";
$dummypic = "https://images.unsplash.com/photo-1519682337058-a94d519337bc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80";


if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM media WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $title = $data['title'];
        $type = $data['type'];
        $isbn = $data['isbn'];
        $description = $data['description'];
        $image = $data['image'];
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
        if ($status == 'available') {
            $button = "<button type='submit' class='btn btn-outline-dark'>Reserve</button>";
        } else if ($status == 'reserved') {
            $button = "<button class='btn btn-outline-dark' disabled>Reserve</button>";
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
    <title>Details <?= $title; ?></title>
    <?php require_once "./components/styles.php" ?>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!------------------
    Nav Bar
-------------------->
    <nav class="navbar">
        <div class="container-fluid d-lfex justify-content-between">
            <a class="navbar-brand fs-3" href="index.php">Vienna City Library</a>
            <i class="fa-solid fa-bars fs-3"></i>
        </div>
    </nav>

    <!------------------
    Hero
-------------------->
    <div class="create-hero">
        <div class="fs-2">

        </div>

    </div>

    <!------------------
    Content
-------------------->
    <div class="container my-3 my-md-5 ">
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="<?php echo $image ?>" alt="<?php echo $title ?>" class="media-img">
            </div>
            <div class="book-info col">
                <!--Book Head-->
                <div class="pt-2 p-md-3 media-title">
                    <h2 class="mb-0"><?php echo $title ?></h2>
                    <p>von <?php echo $author_fname . " " . $author_lname ?></p>
                    <p class="mt-md-5"> <?php echo $description ?></p>
                </div>
                <!-- Details-->
                <div class="mt-3 border border-black rounded p-3">
                    <h3><?php echo $type; ?> Details</h3>
                    <hr>
                    <p>ISBN: <?php echo $isbn ?></p>
                    <p>Publisher: <?php echo $publisher_name ?></p>
                    <p>Published In: <?php echo $publisher_address ?></p>
                    <p>First Published: <?php echo $publish_date ?></p>
                </div>
                <!--Buttons-->
                <form action="actions/a_reserve.php" method="POST" class="mt-3">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <a href="index.php"><button type="button" class="btn btn-outline-dark me-2"><i class="fa-solid fa-arrow-left-long me-2"></i>Go Back</button></a>
                    <?php
                    echo $button
                    ?>
                </form>
            </div>


        </div>
    </div>
</body>

</html>