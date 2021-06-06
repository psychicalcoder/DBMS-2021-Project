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
                <li><a href="./menu.php">熱點目錄</a></li>
                <li><a href="./district.php" class="active">分區查詢</a></li>
            </ul>
        </nav>

        <!-- Main -->
        <div id="main">

            <?php
            $category = $categoryErr = "";
            $district = $districtErr = "";
            $month = $monthErr = "";

            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if (empty($_GET["category"])) {
                    $categoryErr = "需選擇案件類別 | ";
                } else {
                    $category = test_input($_GET["category"]);
                }
                if (empty($_GET["district"])) {
                    $districtErr = "需選擇欲查詢分區 | ";
                } else {
                    $district = test_input($_GET["district"]);
                }
                if (empty($_GET["month"])) {
                    $monthErr = "需選擇要查詢近幾個月 | ";
                } else {
                    $month = test_input($_GET["month"]);
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
                        <h2>分區查詢</h2>
                    </header>
                    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row gtr-uniform">
                            <div class="col-4">
                                <p>欲查詢行政區</p>
                                <select name="district" id="district">
                                    <option value="">- 行政區 -</option>
                                    <option value="中正區" <?php 
                                    if($district=="中正區") echo "selected";
                                    ?>>中正區</option>
                                    <option value="大同區" <?php 
                                    if($district=="大同區") echo "selected";
                                    ?>>大同區</option>
                                    <option value="中山區" <?php 
                                    if($district=="中山區") echo "selected";
                                    ?>>中山區</option>
                                    <option value="松山區" <?php 
                                    if($district=="松山區") echo "selected";
                                    ?>>松山區</option>
                                    <option value="大安區" <?php 
                                    if($district=="大安區") echo "selected";
                                    ?>>大安區</option>
                                    <option value="萬華區" <?php 
                                    if($district=="萬華區") echo "selected";
                                    ?>>萬華區</option>
                                    <option value="信義區" <?php 
                                    if($district=="信義區") echo "selected";
                                    ?>>信義區</option>
                                    <option value="士林區" <?php 
                                    if($district=="士林區") echo "selected";
                                    ?>>士林區</option>
                                    <option value="北投區" <?php 
                                    if($district=="北投區") echo "selected";
                                    ?>>北投區</option>
                                    <option value="內湖區" <?php 
                                    if($district=="內湖區") echo "selected";
                                    ?>>內湖區</option>
                                    <option value="南港區" <?php 
                                    if($district=="南港區") echo "selected";
                                    ?>>南港區</option>
                                    <option value="文山區" <?php 
                                    if($district=="文山區") echo "selected";
                                    ?>>文山區</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <p>案件類別</p>
                                <select name="category" id="category">
                                    <option value="">- 類別 -</option>
                                    <option value="house_steal" <?php 
                                    if($category=="house_steal") echo "selected";
                                    ?>>住宅竊盜</option>
                                    <option value="car_steal" <?php 
                                    if($category=="car_steal") echo "selected";
                                    ?>>汽車竊盜</option>
                                    <option value="bike_steal" <?php 
                                    if($category=="bike_steal") echo "selected";
                                    ?>>自行車竊盜</option>
                                    <option value="motorcycle_steal" <?php 
                                    if($category=="motorcycle_steal") echo "selected";
                                    ?>>機車竊盜</option>
                                    <option value="random_snatch" <?php 
                                    if($category=="random_snatch") echo "selected";
                                    ?>>搶奪</option>
                                    <option value="random_rob" <?php 
                                    if($category=="random_rob") echo "selected";
                                    ?>>強盜</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <p>欲查詢近幾個月</p>
                                <select name="month" id="month">
                                    <option value="">- 月份 -</option>
                                    <option value="1" <?php 
                                    if($month=="1") echo "selected";
                                    ?>>01</option>
                                    <option value="2" <?php 
                                    if($month=="2") echo "selected";
                                    ?>>02</option>
                                    <option value="3" <?php 
                                    if($month=="3") echo "selected";
                                    ?>>03</option>
                                    <option value="4" <?php 
                                    if($month=="4") echo "selected";
                                    ?>>04</option>
                                    <option value="5" <?php 
                                    if($month=="5") echo "selected";
                                    ?>>05</option>
                                    <option value="6" <?php 
                                    if($month=="6") echo "selected";
                                    ?>>06</option>
                                    <option value="7" <?php 
                                    if($month=="7") echo "selected";
                                    ?>>07</option>
                                    <option value="8" <?php 
                                    if($month=="8") echo "selected";
                                    ?>>08</option>
                                    <option value="9" <?php 
                                    if($month=="9") echo "selected";
                                    ?>>09</option>
                                    <option value="10" <?php 
                                    if($month=="10") echo "selected";
                                    ?>>10</option>
                                    <option value="11" <?php 
                                    if($month=="11") echo "selected";
                                    ?>>11</option>
                                    <option value="12" <?php 
                                    if($month=="12") echo "selected";
                                    ?>>12</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="送出" class="primary" /></li>
                                </ul>
                            </div>

                            <!-- <blockquote> -->


                                <?php

                                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                                    if (empty($_GET["category"]) || empty($_GET["district"]) || empty($_GET["month"])) {
                                        echo "<b style=\"color:#ff0000\">提醒：" . $districtErr . $categoryErr . $monthErr . "</b>";
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
                                            // echo "連接 " . $DB_NAME . " 資料庫成功！ 開始執行查詢<br>";
                                        }
                                    }
                                }

                                ?>
                            <!-- </blockquote> -->
                        </div>
                    </form>

                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        if (empty($_GET["category"]) || empty($_GET["district"]) || empty($_GET["month"])) {} 
                        else {

                            $today = date('Y-m-d');

                            $category_txt = "";
                            if ($category == "house_steal") {
                                $category_txt = "住宅竊盜";
                            } elseif ($category == "car_steal") {
                                $category_txt = "汽車竊盜";
                            } elseif ($category == "bike_steal") {
                                $category_txt = "自行車竊盜";
                            } elseif ($category == "motorcycle_steal") {
                                $category_txt = "機車竊盜";
                            } elseif ($category == "random_snatch") {
                                $category_txt = "搶奪";
                            } elseif ($category == "random_rob") {
                                $category_txt = "強盜";
                            }

                            $sql = "with crimes as
                            (select code, category, date, time_start, time_end, location
                             from bike_steal
                             union all
                             select code, category, date, time_start, time_end, location
                             from car_steal
                             union all
                             select code, category, date, time_start, time_end, location
                             from house_steal
                             union all
                             select code, category, date, time_start, time_end, location
                             from motorcycle_steal
                             union all
                             select code, category, date, time_start, time_end, location
                             from random_rob
                             union all
                             select code, category, date, time_start, time_end, location
                             from random_snatch)
                        
                        select cnt/total*100 as percentage, location
                        from (select count(code) as cnt, total, location
                              from (select code, category, mid(location,4,3) as location
                                    from crimes t
                                    where timestampdiff(month,t.date,'".$today."') < ".$month." and t.category = '".$category_txt."') t1,
                                   (select count(code) as total, '.' as num
                                    from crimes t
                                    where timestampdiff(month,t.date,'".$today."') < ".$month." and t.category = '".$category_txt."'
                                    group by num) t2
                              where t1.location like '%".$district."%'
                              group by total, location) t;";
                            $result = mysqli_query($con, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $num = number_format($row['percentage'],2);
                                echo "<p>經過查詢，在近 ".$month." 個月內，有 ".$num."% 的 ".$category_txt." 都發生在 ".$district." </p>";
                            }
                        }
                    }
                    ?>

                </section>
            </section>




            <section id="new" class="main special">
                <header class="major">
                    <h2>目錄</h2>
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
                                <!-- <th>功能</th> -->
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
                                    $today = date('Y-m-d');

                                    $category_txt = "";
                                    if ($category == "house_steal") {
                                        $category_txt = "住宅竊盜";
                                    } elseif ($category == "car_steal") {
                                        $category_txt = "汽車竊盜";
                                    } elseif ($category == "bike_steal") {
                                        $category_txt = "自行車竊盜";
                                    } elseif ($category == "motorcycle_steal") {
                                        $category_txt = "機車竊盜";
                                    } elseif ($category == "random_snatch") {
                                        $category_txt = "搶奪";
                                    } elseif ($category == "random_rob") {
                                        $category_txt = "強盜";
                                    }
        
                                    $sql = "with crimes as
                                    (select code, category, date, time_start, time_end, location
                                     from bike_steal
                                     union all
                                     select code, category, date, time_start, time_end, location
                                     from car_steal
                                     union all
                                     select code, category, date, time_start, time_end, location
                                     from house_steal
                                     union all
                                     select code, category, date, time_start, time_end, location
                                     from motorcycle_steal
                                     union all
                                     select code, category, date, time_start, time_end, location
                                     from random_rob
                                     union all
                                     select code, category, date, time_start, time_end, location
                                     from random_snatch)
                                
                                select *
                                from crimes t
                                where t.location like '%".$district."%' and timestampdiff(month,t.date,'".$today."') < ".$month." and t.category = '".$category_txt."';";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                        <tr>
                                            <td><?php echo $row['code']; ?></td>
                                            <td><?php echo $row['category']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['time_start']; ?> ~ <?php echo $row['time_end']; ?></td>
                                            <td style="text-align:left;"><?php echo $row['location']; ?></td>
                                            <!-- <td><?php
                                                echo "<input value=X type=button onClick=\"del($row[code],'$row[category]')\"/>";
                                                echo "<input value=/ type=button onClick=\"up($row[code],'$row[category]','$row[date]','$row[time_start]','$row[time_end]','$row[location]')\"/>";
                                                ?></td> -->



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

    <!-- <script>
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
                // alert("update.php?code=" + code + "&category=" + category + "&date=" + date + "&start=" + time_start + "&end=" + time_end + "&location=" + location);
            }
        }
    </script> -->


</body>

</html>