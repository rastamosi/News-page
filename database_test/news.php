<?php

include 'config/db.con.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css./style.css">
    <title>Document</title>
</head>

<body>
    <section class="container">
        <div class="main">
            <div class="page_title">
                <h1>Новости</h1>
            </div>
            <div class="news_container">

                <?php


                //number of post in a page 
                $limit = 5;
                if (isset($_GET["page"])) {
                    $page_number  = $_GET["page"];
                } else {
                    $page_number = 1;
                }



                // get the initial page number

                $initial_page = ($page_number - 1) * $limit;

                //import data
                $sql = "SELECT * From news ORDER BY idate DESC LIMIT $initial_page, $limit";
                $result = mysqli_query($conn, $sql);
                $result_check = (mysqli_num_rows($result));


                //data ognization

                if ($result_check > 0) {
                    foreach ($result as $title) {
                ?>
                        <div class="news_box" href="view.php?id<?= $title['id'] ?>">

                            <div class="title">
                                <h5 for=""><?= date("d.m.Y ", $title["idate"]); ?>
                                </h5>
                                <a href="view.php?id=<?= $title['id'] ?>"><?= $title['title'] ?>
                                </a>
                            </div>

                            <div class="caption">
                                <p><?= substr($title["announce"], 0) ?>
                                </p>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>
            </div>
            <!-- page number section -->


            <section>
                <div class="pages">


                    <div class="page_title_btm">
                        <h1>Страницы:</h1>
                    </div>


                    <div class="page_num">
                        <div class="items">

                            <?php

                            $getQuery = "SELECT COUNT(*) FROM news";
                            $result = mysqli_query($conn, $getQuery);
                            $row = mysqli_fetch_row($result);
                            $total_rows = $row[0];

                            // get the required number of pages

                            $total_pages = ceil($total_rows / $limit);
                            $pageURL = "";

                            for ($i = 1; $i <= $total_pages; $i++) {
                                if ($i == $page_number) {
                                    $pageURL .= "<a class = 'active' href='news.php?page="
                                        . $i . "'>" . $i . " </a>";
                                } else {

                                    $pageURL .= "<a href='news.php?page=" . $i . "'>   
                                          " . $i . " </a>";
                                }
                            };

                            echo $pageURL;
                            ?>
                        </div>
                    </div>
                    </center>

                    <script>
                        function go2Page() {
                            var page = document.getElementById("page").value;
                            page = ((page > <?php echo $total_pages; ?>) ? <?php echo $total_pages; ?> : ((page < 1) ? 1 : page));
                            window.location.href = 'news.php?page=' + page;
                        }
                    </script>
            </section>
        </div>

    </section>
</body>

</html>