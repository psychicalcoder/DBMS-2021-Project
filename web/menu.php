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
        <?php include("./head.php"); ?>


        <!-- Main -->
        <div id="main">

            <?php
            $category = $categoryErr = "";

            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if (empty($_GET["category"])) {
                    $categoryErr = "需選擇案件類別";
                } else {
                    $category = test_input($_GET["category"]);
                }
            }

            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>

            <section id="form" class="main special">
                <section>
                    <header class="major">
                        <h2>熱點目錄</h2>
                    </header>

                    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row gtr-uniform">
                            <div class="col-12">
                                <p>案件類別</p>
                                <select name="category" id="category">
                                    <option value="">- 類別 -</option>
                                    <option value="house_steal">住宅竊盜</option>
                                    <option value="car_steal">汽車竊盜</option>
                                    <option value="bike_steal">自行車竊盜</option>
                                    <option value="motorcycle_steal">機車竊盜</option>
                                    <option value="random_snatch">搶奪</option>
                                    <option value="random_rob">強盜</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="送出" class="primary" /></li>
                                </ul>
                            </div>

                            <blockquote>


                                <?php

                                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                                    if (empty($_GET["category"])) {
                                        echo "<b style=\"color:#ff0000\">提醒：" . $categoryErr."</b>";
                                    } else {


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
                                        } else {
                                            echo "連接 " . $DB_NAME . " 資料庫成功！ 開始執行查詢<br>";
                                        }
                                    }
                                }

                                ?>
                            </blockquote>
                        </div>
                    </form>
                </section>
            </section>




            <section id="new" class="main special">
                <header class="major">
                    <h2>目錄列表</h2>
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
                                <th>功能</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                                if (!empty($_GET["category"])) {

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

                                    $sql = "select * from " . $category;
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                        <tr>
                                            <td><?php echo $row['code']; ?></td>
                                            <td><?php echo $row['category']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['time_start']; ?> ~ <?php echo $row['time_end']; ?></td>
                                            <td style="text-align:left;"><?php echo $row['location']; ?></td>
                                            <td><?php
                                                echo "<input value=X type=button onClick=\"del($row[code],'$row[category]')\"/>";
                                                echo "<input value=/ type=button onClick=\"up($row[code],'$row[category]','$row[date]','$row[time_start]','$row[time_end]','$row[location]')\"/>";
                                                ?></td>



                                        </tr>

                            <?php
                                    }
                                }
                            }

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

    <script>
        function del(code, category) {
            if (category == "住宅竊盜")
                category = "house_steal";
            else if (category == "汽車竊盜")
                category = "car_steal";
            else if (category == "自行車竊盜")
                category = "bike_steal";
            else if (category == "機車竊盜")
                category = "motorcycle_steal";
            else if (category == "搶奪")
                category = "random_snatch";
            else if (category == "強盜")
                category = "random_rob";
            if (confirm("確定刪除第" + code + "筆紀錄?")) location.href = "del.php?code=" + code + "&category=" + category;
        }

        function up(code, category, date, time_start, time_end, locationv) {
            if (category == "住宅竊盜")
                category = "house_steal";
            else if (category == "汽車竊盜")
                category = "car_steal";
            else if (category == "自行車竊盜")
                category = "bike_steal";
            else if (category == "機車竊盜")
                category = "motorcycle_steal";
            else if (category == "搶奪")
                category = "random_snatch";
            else if (category == "強盜")
                category = "random_rob";
            if (confirm("確定修改第" + code + "筆紀錄?")) {
                location.href = "update.php?code=" + code + "&category=" + category + "&date=" + date + "&start=" + time_start + "&end=" + time_end + "&location=" + locationv;
            }
        }
    </script>


</body>

</html>