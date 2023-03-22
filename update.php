<?php

require_once "./actions/db_connect.php";

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
        <div class="fs-2 text-center">
            Update Media
        </div>

    </div>

    <!------------------
        Form
-------------------->
    <div class="container">

        <fieldset class="my-5">

            <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
                <table class="table table-borderless">
                    <tr>
                        <th>Title*</th>
                        <td><input type="text" name="title" class="w-100 form-control" placeholder="Title" value="<?php echo $title; ?>"></td>
                    </tr>
                    <tr>
                        <th>Type*</th>
                        <td><select name="type" class="w-100 form-select form-control">
                                <?php
                                if ($type == 'book') {
                                    echo "<option value='book' selected>Book</option>
                                <option value='CD'>CD</option>
                                <option value='DVD'>DVD</option>";
                                } else if ($type == 'CD') {
                                    echo "<option value='book'>Book</option>
                            <option value='CD' selected>CD</option>
                            <option value='DVD'>DVD</option>";
                                } else {
                                    echo "<option value='book'>Book</option>
                            <option value='CD'>CD</option>
                            <option value='DVD'selected>DVD</option>";
                                }
                                ?>
                            </select></td>
                    </tr>

                    <tr>
                        <th>ISBN*</th>
                        <td><input type="text" name="isbn" class="w-100 form-control" placeholder="143-9-3455523-87 (max 13 digits!)" value="<?php echo $isbn; ?>"></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><textarea name="description" cols="30" rows="4" class="form-control" placeholder="description"><?php echo $description; ?></textarea></td>

                    </tr>
                    <tr>
                        <th>Image</th>
                        <td><input type="text" name="image" placeholder="url" class="w-100 form-control" value=" <?php echo $image; ?>"></td>
                    </tr>
                    <tr>
                        <th>Author First Name</th>
                        <td><input type="text" name="author_first_name" placeholder="Author First Name" class="w-100 form-control" value="<?php echo $author_fname; ?>"></td>
                    </tr>
                    <tr>
                        <th>Author Last Name*</th>
                        <td><input type="text" name="author_last_name" placeholder="Author Last Name" class="w-100 form-control" value="<?php echo $author_lname; ?>"></td>
                    </tr>
                    <tr>
                        <th>Publisher*</th>
                        <td><input type="text" name="publisher_name" placeholder="Publisher" class="w-100 form-control" value="<?php echo $publisher_name; ?>"></td>
                    </tr>
                    <tr>
                        <th>Publisher Address</th>
                        <td><input type="text" name="publisher_address" placeholder="Publisher Adress" class="w-100 form-control" value="<?php echo $publisher_address; ?>"></td>
                    </tr>
                    <tr>
                        <th>Publish Year</th>
                        <td><input type="text" name="publish_date" placeholder="Publish Year 0000" class="w-100 form-control" value="<?php echo $publish_date; ?>"></td>
                    </tr>
                    <tr>
                        <th>Status*</th>
                        <td><select name="status" class="w-100 form-select form-control">
                                <?php
                                if ($status == 'available') {
                                    echo "<option value='available'selected>available</option>
                                <option value='reserved'>reserved</option>";
                                } else {
                                    echo "<option value='available'>available</option>
                                    <option value='reserved'selected>reserved</option>";
                                }
                                ?>
                            </select></td>
                    </tr>

                </table>
                <div class="text-end">
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <a href="index.php"><button type="button" class="btn btn-outline-dark me-2"><i class="fa-solid fa-arrow-left-long me-2"></i>Go Back</button></a>
                    <button type="submit" class="btn btn-outline-dark me-2"><i class="fa-solid fa-arrow-up me-2"></i>Update</button>
                </div>
                <p class="mt-3 small mb-0 text-secondary">*must be filled out.</p>
            </form>
        </fieldset>
    </div>

</body>

</html>