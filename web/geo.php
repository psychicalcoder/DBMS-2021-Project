<!DOCTYPE HTML>

<html lang="zh-Hant-TW">

<head>
    <title>台北市安全防護網 | 首頁</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="images/taipei-101.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/map.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>

</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <span class="logo"><img src="images/taipei-101.png" alt="" /></span>
            <h1>台北市安全防護網</h1>
            <p>打造健全環境，讓你遠離犯罪熱點</p>
        </header>

        <!-- Head -->
        <nav id="nav">
            <ul>
                <li><a href="./#intro">網站簡介</a></li>
                <li><a href="./#new">最新消息</a></li>
                <li><a href="./#second">熱點地圖</a></li>
                <li><a href="./add.php">新增犯罪熱點</a></li>
                <li><a href="./menu.php" class="active">熱點目錄</a></li>
                <li><a href="./district.php" >分區查詢</a></li>
            </ul>
        </nav>


        <!-- Main -->
        <div id="main">


            <section id="form" class="main special">
                <section>
                    <h2>離你最近的熱點</h2>
                    <p>發生於三個月內，方圓兩公里內</p>

                    <ul class="statistics">
                        <li class="style1">
                            <span class="icon solid fa-signal"></span>
                            <strong>
                                <?php

                                $DB_NAME = "final";
                                $DB_USER = "user1";
                                $DB_PASS = "test123";
                                $DB_HOST = "localhost";

                                // 連接 MySQL 資料庫伺服器
                                $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
                                if (empty($con)) {
                                    print mysqli_error($con);
                                    die("連接失敗，原因: " . mysqli_connect_error());
                                    exit;
                                }

                                // 選取資料庫
                                if (!mysqli_select_db($con, $DB_NAME)) {
                                    die("選取資料庫失敗！");
                                }
                                $lat = $_GET["lat"];
                                $lng = $_GET["lng"];
                                $today = date('Y-m-d');



                                $sql = "select * 
                                from(select * from house_steal) t
                                where sqrt(power(t.lat - " . $lat . ",2) + power(t.lng - " . $lng . ",2)) < 0.01801801801 and timestampdiff(month,t.date,'" . $today . "') < 3";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                    $num = mysqli_num_rows($result);
                                    echo $num;
                                }

                                ?>

                            </strong> 住宅竊盜
                        </li>
                        <li class="style2">
                            <span class="icon solid fa-signal"></span>
                            <strong>
                                <?php


                                $sql = "select * 
from(select * from car_steal) t
where sqrt(power(t.lat - " . $lat . ",2) + power(t.lng - " . $lng . ",2)) < 0.01801801801 and timestampdiff(month,t.date,'" . $today . "') < 3";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                    $num = mysqli_num_rows($result);
                                    echo $num;
                                }

                                ?>


                            </strong> 汽車竊盜
                        </li>
                        <li class="style1">
                            <span class="icon solid fa-signal"></span>
                            <strong>
                                <?php


                                $sql = "select * 
from(select * from bike_steal) t
where sqrt(power(t.lat - " . $lat . ",2) + power(t.lng - " . $lng . ",2)) < 0.01801801801 and timestampdiff(month,t.date,'" . $today . "') < 3";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                    $num = mysqli_num_rows($result);
                                    echo $num;
                                }


                                ?>
                            </strong> 自行車竊盜
                        </li>
                        <li class="style2">
                            <span class="icon solid fa-signal"></span>
                            <strong>
                                <?php

                                $sql = "select * 
from(select * from motorcycle_steal) t
where sqrt(power(t.lat - " . $lat . ",2) + power(t.lng - " . $lng . ",2)) < 0.01801801801 and timestampdiff(month,t.date,'" . $today . "') < 3";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                    $num = mysqli_num_rows($result);
                                    echo $num;
                                }

                                ?>
                            </strong> 機車竊盜
                        </li>
                        <li class="style1">
                            <span class="icon solid fa-signal"></span>
                            <strong>
                                <?php

                                $sql = "select * 
from(select * from random_snatch) t
where sqrt(power(t.lat - " . $lat . ",2) + power(t.lng - " . $lng . ",2)) < 0.01801801801 and timestampdiff(month,t.date,'" . $today . "') < 3";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                    $num = mysqli_num_rows($result);
                                    echo $num;
                                }

                                ?>


                            </strong> 搶奪
                        </li>
                        <li class="style2">
                            <span class="icon solid fa-signal"></span>
                            <strong>
                                <?php

                                $sql = "select * from(select * from random_rob) t
where sqrt(power(t.lat - " . $lat . ",2) + power(t.lng - " . $lng . ",2)) < 0.01801801801 and timestampdiff(month,t.date,'" . $today . "') < 3";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                    $num = mysqli_num_rows($result);
                                    echo $num;
                                }

                                ?>
                            </strong> 強盜
                        </li>
                    </ul>


                </section>
            </section>




            <section id="new" class="main special">
                <header class="major">
                    <h2>最近熱點目錄</h2>
                </header>
                <div class="table-wrapper">

                    <table id="myTable" class="tablesorter">
                        <thead>
                            <tr>
                                <th>編號</th>
                                <th>案件類別</th>
                                <th>發生日期</th>
                                <th>發生時段</th>
                                <th>發生地點</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $sql = "select * 
                                    from(select *
                                         from bike_steal
                                         union
                                         select *
                                         from car_steal
                                         union
                                         select *
                                         from house_steal
                                         union
                                         select *
                                         from motorcycle_steal
                                         union
                                         select *
                                         from random_rob
                                         union
                                         select *
                                         from random_snatch) t
                                    where sqrt(power(t.lat - " . $lat . ",2) + power(t.lng - " . $lng . ",2)) < 0.01801801801 and timestampdiff(month,t.date,'" . $today . "') < 3;
                                    ";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['code']; ?></td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['time_start']; ?> ~ <?php echo $row['time_end']; ?></td>
                                    <td style="text-align:left;"><?php echo $row['location']; ?></td>

                                </tr>

                            <?php
                            }
                            mysqli_close($con);

                            ?>
                        </tbody>
                    </table>

                </div>
            </section>


        </div>

        <!-- Footer -->
        <?php include("./footer.php"); ?>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- tablesorter -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.30.5/css/theme.blue.min.css">
    </link>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.30.5/js/jquery.tablesorter.min.js"></script>
    <script>
        $("#myTable").tablesorter();
    </script>

</body>

</html>