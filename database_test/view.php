<?php

include 'config/db.con.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>

<body>
    <section class="container">
        <div class="main">
            <div class="pages_title">
                <?php
                $id = isset($_GET['id']);


                if ($id) {
                    $slug = mysqli_real_escape_string($conn, $_GET['id']);

                    $posts = "SELECT * FROM news WHERE id='$slug'";
                    $post_run = mysqli_query($conn, $posts);

                    if (mysqli_num_rows($post_run) > 0) {
                        foreach ($post_run as $postItems) {
                ?>
                            <h1 href=""><?= $postItems['title'] ?></h1>
                            </div>
                            <div class="news_container">
                                <p class="content"><?= $postItems['content'] ?></p>
                            </div>
                <?php
                        }
                    }
                }
                ?>
                  <section class="navigator">
            <a href="news.php">Все новости »</a>
        </section>
        </div>
      
    </section>
</body>

</html>