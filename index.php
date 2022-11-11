<?php
require_once "./actions/db_connect.php";

$sql = "SELECT * FROM media";
$result = mysqli_query($connect, $sql);
$bookswiper = "";
$dvdswiper = "";
$cdswiper = "";
$swiper = "";


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $status = $row['status'];
        $class = "";
        $icon = "";
        if ($status == 'available') {
            $class = "success";
            $icon = "<i class='fa-solid fa-circle-check'></i>";
        } else {
            $class = "danger";
            $icon = "<i class='fa-solid fa-circle-xmark'></i>";
        }
        $swiper = "<div class='swiper-slide'>
        <img src='$row[image]' alt=''>

        <div class='slide-text'>
            <p class='fs-4 text-uppercase mb-0'>$row[title]</p>
            <p class='small text-$class'> $icon $row[status]</p>

            <button type='button' class='btn btn-outline-dark text-uppercase me-2'>Details</button>
            <button type='button' class='btn btn-outline-dark  text-uppercase mx-2'>Update</button>
            <button type='button' class='btn btn-outline-dark text-uppercase ms-2'>Delete</button>
        </div>
    </div>";
        $type = $row['type'];
        if ($type == 'book') {
            $bookswiper .= $swiper;
        } else if ($type == 'CD') {
            $cdswiper .= $swiper;
        } else {
            $dvdswiper .= $swiper;
        };
    }
} else {
    $swiper = "sorry no data available";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "./components/styles.php"; ?>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <title>Document</title>
</head>

<body>

    <!--
    Dummy Image : https://images.unsplash.com/photo-1585521550659-64a7cafb39e2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NzJ8fGxpYnJhcnl8ZW58MHx8MHx8&auto=format&fit=crop&w=800&q=60
-->

    <!------------------
    Nav Bar
-------------------->

    <nav class="navbar">
        <div class="container-fluid d-lfex justify-content-between">
            <a class="navbar-brand fs-3">Vienna City Library</a>
            <i class="fa-solid fa-bars fs-3"></i>
        </div>
    </nav>

    <!------------------
    Hero
-------------------->
    <div class="hero">
        <div class="hero-nav h1 text-center">
            <a href="#books" class="me-3">Books</a>
            <span class="me-3"> | </span>
            <a href="#cd" class="me-3">CD's</a>
            <span class="me-3"> | </span>
            <a href="#dvd">DVD's</a>
        </div>
    </div>

    <!------------------
    Content
-------------------->
    <div class="content-header text-end">
        <a href="create.php"><button type="button" class="btn btn-outline-dark"><i class="fa-solid fa-plus me-2"></i>add new media</button></a>
    </div>

    <!-- Swiper -->
    <div class="container mb-5">


        <!--BOOKS SECTION-->
        <h2 class="media-heading" id="books">Books</h2>
        <div class="swiper mySwiper my-4">
            <div class="swiper-wrapper">
                <?php echo $bookswiper; ?>
            </div>
            <div class="swiper-button-next text-light"></div>
            <div class="swiper-button-prev text-light"></div>

        </div>

        <!--CD SECTION-->

        <h2 class="media-heading" id="cd">Cd's</h2>
        <div class="swiper mySwiper my-4">
            <div class="swiper-wrapper">
                <?php echo $cdswiper; ?>
            </div>
            <div class="swiper-button-next text-light"></div>
            <div class="swiper-button-prev text-light"></div>

        </div>

        <!--DVD SECTION-->

        <h2 class="media-heading" id="dvd">Dvd's</h2>
        <div class="swiper mySwiper my-4">
            <div class="swiper-wrapper">
                <?php echo $dvdswiper; ?>
            </div>
            <div class="swiper-button-next text-light"></div>
            <div class="swiper-button-prev text-light"></div>

        </div>
    </div>


    <!------------------
   Footer
-------------------->

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            // pagination: {
            //     el: ".swiper-pagination",
            //     clickable: true,
            // },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

</body>

</html>