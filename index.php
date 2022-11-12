<?php
require_once "./actions/db_connect.php";

$sql = "SELECT * FROM media";
$result = mysqli_query($connect, $sql);
$dummypic = "https://images.unsplash.com/photo-1519682337058-a94d519337bc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80";
$emptypic = "https://images.unsplash.com/photo-1610513320995-1ad4bbf25e55?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80";
$emptyswiper = "<div class='swiper-slide'>
<img src='$emptypic' alt=''>   
</div>";
$bookswiper = "";
$dvdswiper = "";
$cdswiper = "";
$swiper = "";


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Status available/reserved:
        $status = $row['status'];
        if ($status == 'available') {
            $class = "success";
            $icon = "<i class='fa-solid fa-circle-check'></i>";
        } else {
            $class = "danger";
            $icon = "<i class='fa-solid fa-circle-xmark'></i>";
        }
        // When no picture is selected:
        if (empty($row['image'])) {
            $row['image'] = $dummypic;
        }
        // general Swiper structure
        $swiper = "<div class='swiper-slide'>
        <img src='$row[image]' alt=''>

        <div class='slide-text'>
            <p class='fs-4 text-uppercase mb-0'>$row[title]</p>
            <p class='small text-$class'> $icon $row[status]</p>

            <button type='button' class='btn btn-outline-dark text-uppercase me-2'>Details</button>
            <a href='update.php?id=$row[id]'><button type='button' class='btn btn-outline-dark  text-uppercase mx-2'>Update</button></a>
            <a href='delete.php?id=$row[id]'><button type='button' class='btn btn-outline-dark text-uppercase ms-2'>Delete</button></a>
        </div>
    </div>";
        // Where books, cds, dvds should be printed
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

// if Book row is empty 
$sql = "SELECT * FROM media WHERE type = 'book'";
$bookrow = mysqli_query($connect, $sql);
if (mysqli_num_rows($bookrow) == 0) {
    $bookswiper = $emptyswiper;
}

// if CD row is empty 
$sql = "SELECT * FROM media WHERE type = 'CD'";
$cdrow = mysqli_query($connect, $sql);
if (mysqli_num_rows($cdrow) == 0) {
    $cdswiper = $emptyswiper;
}

// if DVD row is empty 
$sql = "SELECT * FROM media WHERE type = 'DVD'";
$dvdrow = mysqli_query($connect, $sql);
if (mysqli_num_rows($dvdrow) == 0) {
    $dvdswiper = $emptyswiper;
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

    <!-- "<div class='swiper-slide'>
            <img src='https://images.unsplash.com/photo-1609530180421-df41188eb3de?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1771&q=80' alt=''>
    
            <div class='slide-text'>
                <p class='fs-4 text-uppercase mb-0'>No data available</p>
            </div>
        </div>"; -->

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
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

</body>

</html>