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
    <script>
        var car_steal = [
            <?php
            $DB_NAME = "final";
            $DB_USER = "user1";
            $DB_PASS = "test123";
            $DB_HOST = "localhost";

            $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
            if (empty($con)) {
                print mysqli_error($con);
                die("資料庫連接失敗！");
                exit;
            }

            if (!mysqli_select_db($con, $DB_NAME)) {
                die("選取資料庫失敗！");
            } else {
            }

            mysqli_query($con, "SET NAMES 'UTF-8'");
            $sql = "SELECT lat,lng FROM car_steal";
            $result = mysqli_query($con, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo " [{$row['lat']}, {$row['lng']}], ";
                }
            }
            ?>
        ];

        var bike_steal = [
            <?php
            $sql = "SELECT lat,lng FROM bike_steal";
            $result = mysqli_query($con, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo " [{$row['lat']}, {$row['lng']}], ";
                }
            }
            ?>
        ];

        var house_steal = [
            <?php
            $sql = "SELECT lat,lng FROM house_steal";
            $result = mysqli_query($con, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo " [{$row['lat']}, {$row['lng']}], ";
                }
            }
            ?>
        ];

        var random_rob = [
            <?php
            $sql = "SELECT lat,lng FROM random_rob";
            $result = mysqli_query($con, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo " [{$row['lat']}, {$row['lng']}], ";
                }
            }
            ?>
        ];

        var random_snatch = [
            <?php
            $sql = "SELECT lat,lng FROM random_snatch";
            $result = mysqli_query($con, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo " [{$row['lat']}, {$row['lng']}], ";
                }
            }
            ?>
        ];

        var motorcycle_steal = [
            <?php
            $sql = "SELECT lat,lng FROM motorcycle_steal";
            $result = mysqli_query($con, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo " [{$row['lat']}, {$row['lng']}], ";
                }
            }
            ?>
        ];

        function genMap(elm_id) {
            console.log(elm_id);
            return new google.maps.Map(document.getElementById(elm_id), {
                center: new google.maps.LatLng(25.071649, 121.548307),
                //center: new google.maps.LatLng(25.0329694, 121.5654177),
                zoom: 12
            });
        }

        function genMarker(mapitem, pos, icon) {
            return new google.maps.Marker({
                map: mapitem,
                position: new google.maps.LatLng(pos[0], pos[1]),
                icon: icon,
            });
        }

        function initMap() {
            var car_steal_map = genMap('car_steal_map');
            var bike_steal_map = genMap('bike_steal_map');
            var random_rob_map = genMap('random_rob_map');
            var random_snatch_map = genMap('random_snatch_map');
            var house_steal_map = genMap('house_steal_map');
            var motorcycle_steal_map = genMap('motorcycle_steal_map');
            Array.prototype.forEach.call(car_steal, function(mE) {
                if (mE[0] !== 0 || mE[1] !== 0) {
                    var marker = genMarker(car_steal_map, mE, 'images/dot1.png');
                }
            });
            Array.prototype.forEach.call(bike_steal, function(mE) {
                if (mE[0] !== 0 || mE[1] !== 0) {
                    var marker = genMarker(bike_steal_map, mE, 'images/dot2.png');
                }
            });
            Array.prototype.forEach.call(random_rob, function(mE) {
                if (mE[0] !== 0 || mE[1] !== 0) {
                    var marker = genMarker(random_rob_map, mE, 'images/dot3.png');
                }
            });
            Array.prototype.forEach.call(random_snatch, function(mE) {
                if (mE[0] !== 0 || mE[1] !== 0) {
                    var marker = genMarker(random_snatch_map, mE, 'images/dot4.png');
                }
            });
            Array.prototype.forEach.call(house_steal, function(mE) {
                if (mE[0] !== 0 || mE[1] !== 0) {
                    var marker = genMarker(house_steal_map, mE, 'images/dot5.png');
                }
            });
            Array.prototype.forEach.call(motorcycle_steal, function(mE) {
                if (mE[0] !== 0 || mE[1] !== 0) {
                    var marker = genMarker(motorcycle_steal_map, mE, 'images/dot6.png');
                }
            });
        }

        function setmapvisible(elmid) {
            var elms = document.getElementsByClassName("map");
            var i;
            for (i = 0; i < elms.length; i++) {
                elms[i].style.display = "none";
            }
            var elm = document.getElementById(elmid);
            elm.style.display = "block";
        }
    </script>
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

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="#intro" class="active">網站簡介</a></li>
                <li><a href="#new">最新消息</a></li>
                <li><a href="#second">熱點地圖</a></li>
                <li><a href="./add.php">新增犯罪熱點</a></li>
                <li><a href="./menu.php">熱點目錄</a></li>
                <li><a href="./district.php">分區查詢</a></li>
            </ul>
        </nav>

        <!-- Main -->
        <div id="main">

            <!-- Introduction -->
            <section id="intro" class="main">
                <div class="spotlight">
                    <div class="content">
                        <header class="major">
                            <h2>網站簡介</h2>
                        </header>
                        <p>本網站結合了臺北市政府警察局刑事警察大隊所提供的公開資料。包含機車竊盜、住宅竊盜、街頭隨機搶奪案件事發地點資料，搭配Google地圖，讓使用者可以評估自身所屬地點是否安全，繼而保護使用者。
                        </p>
                       <a onclick="geofunc()" class="button primary small fit">離你最近熱點</a>
                    </div>
                    <span class="image"><img src="images/globe.png" alt="" /></span>
                </div>
            </section>

            <section id="new" class="main special">
                <header class="major">
                    <h2>最新消息</h2>
                </header>
                <div class="table-wrapper">

                    <table>
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

                            $sql = "select * from bike_steal b union select * from car_steal c union select * from house_steal h union select * from motorcycle_steal m union select * from random_rob r union select * from random_snatch s order by date desc limit 5;";
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

                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </section>

            <!-- Second Section -->
            <section id="second" class="main special">
                <header class="major">
                    <h2>熱點地圖</h2>
                    <p>各類犯罪熱點分佈</p>
                </header>
                <section>
                    <div style="display: block" class="map" id="house_steal_map"></div>
                    <div style="display: none" class="map" id="car_steal_map"></div>
                    <div style="display: none" class="map" id="bike_steal_map"></div>
                    <div style="display: none" class="map" id="motorcycle_steal_map"></div>
                    <div style="display: none" class="map" id="random_snatch_map"></div>
                    <div style="display: none" class="map" id="random_rob_map"></div>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApaj14PBOXclTYt8Bg3fIJnkiSiELkMZA&callback=initMap&libraries=&v=weekly">
                    </script>
                </section>

                <ul class="statistics">
                    <li class="style1">
                        <a href="javascript:void(0)" onclick="setmapvisible('house_steal_map')" style="border-bottom:none">
                            <span class="icon solid fa-signal"></span>
                            <strong>
                                <?php
                                $sql = "SELECT * FROM house_steal";
                                $result = mysqli_query($con, $sql);

                                if ($result) {
                                    $num = mysqli_num_rows($result);
                                    echo $num;
                                }


                                ?>

                            </strong> 住宅竊盜
                        </a>
                    </li>
                    <li class="style2">
                        <a href="javascript:void(0)" onclick="setmapvisible('car_steal_map')" style="border-bottom:none">
                            <span class="icon solid fa-signal"></span>
                            <strong>
                                <?php

                                $sql = "SELECT * FROM car_steal";
                                $result = mysqli_query($con, $sql);

                                if ($result) {
                                    $num = mysqli_num_rows($result);
                                    echo $num;
                                }


                                ?>


                            </strong> 汽車竊盜
                        </a>
                    </li>
                    <li class="style1">
                        <a href="javascript:void(0)" onclick="setmapvisible('bike_steal_map')" style="border-bottom:none">
                            <span class="icon solid fa-signal"></span>
                            <strong>
                                <?php

                                $sql = "SELECT * FROM bike_steal";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                    $num = mysqli_num_rows($result);
                                    echo $num;
                                }

                                ?>
                            </strong> 自行車竊盜
                        </a>
                    </li>
                    <li class="style2">
                        <a href="javascript:void(0)" onclick="setmapvisible('motorcycle_steal_map')" style="border-bottom:none">
                            <span class="icon solid fa-signal"></span>
                            <strong>
                                <?php
                                $sql = "SELECT * FROM motorcycle_steal";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                    $num = mysqli_num_rows($result);
                                    echo $num;
                                }

                                ?>
                            </strong> 機車竊盜
                        </a>
                    </li>
                    <li class="style1">
                        <a href="javascript:void(0)" onclick="setmapvisible('random_snatch_map')" style="border-bottom:none">
                            <span class="icon solid fa-signal"></span>
                            <strong>
                                <?php

                                $sql = "SELECT * FROM random_snatch";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                    $num = mysqli_num_rows($result);
                                    echo $num;
                                }

                                ?>


                            </strong> 搶奪
                        </a>
                    </li>
                    <li class="style2">
                        <a href="javascript:void(0)" onclick="setmapvisible('random_rob_map')" style="border-bottom:none">
                            <span class="icon solid fa-signal"></span>
                            <strong>
                                <?php
                                $sql = "SELECT * FROM random_rob";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                    $num = mysqli_num_rows($result);
                                    echo $num;
                                }
                                ?>

                            </strong> 強盜
                        </a>
                    </li>
                </ul>
            </section>


            <section id="calc" class="main special">
                <header class="major">
                    <h2>統計資料</h2>
                </header>

                <h3>各時段犯罪率</h3>
                <p>以兩小時為單位</p>


                <div class="table-wrapper">

                    <table>
                        <thead>
                            <tr>
                                <th style="text-align: center;">時段</th>
                                <th style="text-align: center;">犯罪率</th>
                                <th style="text-align: center;">時段</th>
                                <th style="text-align: center;">犯罪率</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $sql = "with crimes as
                            (select code, time_start, time_end
                                    from bike_steal
                                    union all
                                    select code, time_start, time_end
                                    from car_steal
                                    union all
                                    select code, time_start, time_end
                                    from house_steal
                                    union all
                                    select code, time_start, time_end
                                    from motorcycle_steal
                                    union all
                                    select code, time_start, time_end
                                    from random_rob
                                    union all
                                    select code, time_start, time_end
                                    from random_snatch)
                        select t1.crime_rate/t2.sum*100 as crime_rate, t1.time
                        from (select count(code) as crime_rate, '00~02' as time
                              from crimes t
                              where (time_start + time_end)/2 >= 0 and (time_start + time_end)/2 < 2
                              group by time
                              union
                              select count(code), '02~04' as time
                              from crimes t
                              where (time_start + time_end)/2 >= 2 and (time_start + time_end)/2 < 4
                              group by time
                              union
                              select count(code), '04~06' as time
                              from crimes t
                              where (time_start + time_end)/2 >= 4 and (time_start + time_end)/2 < 6
                              group by time
                              union
                              select count(code), '06~08' as time
                              from crimes t
                              where (time_start + time_end)/2 >= 6 and (time_start + time_end)/2 < 8
                              group by time
                              union
                              select count(code), '08~10' as time
                              from crimes t
                              where (time_start + time_end)/2 >= 8 and (time_start + time_end)/2 < 10
                              group by time
                              union
                              select count(code), '10~12' as time
                              from crimes t
                              where (time_start + time_end)/2 >= 10 and (time_start + time_end)/2 < 12
                              group by time) t1,
                              (select count(code) as sum, 'total' as total
                               from crimes t
                               group by total) t2;";

                            $sql2 = "with crimes as
                            (select code, time_start, time_end
                                    from bike_steal
                                    union all
                                    select code, time_start, time_end
                                    from car_steal
                                    union all
                                    select code, time_start, time_end
                                    from house_steal
                                    union all
                                    select code, time_start, time_end
                                    from motorcycle_steal
                                    union all
                                    select code, time_start, time_end
                                    from random_rob
                                    union all
                                    select code, time_start, time_end
                                    from random_snatch)
                        select t1.crime_rate/t2.sum*100 as crime_rate, t1.time
                        from (select count(code) as crime_rate, '12~14' as time
                              from crimes t
                              where (time_start + time_end)/2 >= 12 and (time_start + time_end)/2 < 14
                              group by time
                              union
                              select count(code), '14~16' as time
                              from crimes t
                              where (time_start + time_end)/2 >= 14 and (time_start + time_end)/2 < 16
                              group by time
                              union
                              select count(code), '16~18' as time
                              from crimes t
                              where (time_start + time_end)/2 >= 16 and (time_start + time_end)/2 < 18
                              group by time
                              union
                              select count(code), '18~20' as time
                              from crimes t
                              where (time_start + time_end)/2 >= 18 and (time_start + time_end)/2 < 20
                              group by time
                              union
                              select count(code), '20~22' as time
                              from crimes t
                              where (time_start + time_end)/2 >= 20 and (time_start + time_end)/2 < 22
                              group by time
                              union
                              select count(code), '22~00' as time
                              from crimes t
                              where (time_start + time_end)/2 >= 22 and (time_start + time_end)/2 < 24 
                              group by time) t1,
                              (select count(code) as sum, 'total' as total
                               from crimes t
                               group by total) t2;
                            ";

                            $result = mysqli_query($con, $sql);
                            $result2 = mysqli_query($con, $sql2);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $row2 = mysqli_fetch_assoc($result2);
                            ?>
                                <tr>
                                    <td><?php echo $row['time']; ?></td>
                                    <td><?php echo $row['crime_rate']; ?></td>
                                    <td><?php echo $row2['time']; ?></td>
                                    <td><?php echo $row2['crime_rate']; ?></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>


                <h3>各案件犯罪案件數</h3>
                <p>列出前三高行政區</p>

                <div class="row">
                    <div class="col-2 col-12-medium">
                        <h3>住宅竊盜</h3>
                        <ul>
                            <?php

                            $sql = "select 'house steal' as category, count(code) as crime_cnt, location
                            from (select code, category, mid(location,4,3) as location
                                  from house_steal) t
                            group by location
                            order by crime_cnt desc
                            limit 3";

                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <li><?php echo $row['location']; ?> (<?php echo $row['crime_cnt']; ?>)</li>
                                </tr>

                            <?php } ?>

                        </ul>
                    </div>
                    <div class="col-2 col-12-medium">
                        <h3>汽車竊盜</h3>
                        <ul>
                            <?php

                            $sql = "select 'car steal' as category, count(code) as crime_cnt, location
                            from (select code, category, mid(location,4,3) as location
                                  from car_steal) t
                            group by location
                            order by crime_cnt desc
                            limit 3";

                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <li><?php echo $row['location']; ?> (<?php echo $row['crime_cnt']; ?>)</li>
                                </tr>

                            <?php } ?>

                        </ul>
                    </div>
                    <div class="col-2 col-12-medium">
                        <h3>自行車竊盜</h3>
                        <ul>
                            <?php

                            $sql = "select 'bike steal' as category, count(code) as crime_cnt, location
                            from (select code, category, mid(location,4,3) as location
                                  from bike_steal) t
                            group by location
                            order by crime_cnt desc
                            limit 3";

                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <li><?php echo $row['location']; ?> (<?php echo $row['crime_cnt']; ?>)</li>
                                </tr>

                            <?php } ?>

                        </ul>
                    </div>
                    <div class="col-2 col-12-medium">
                        <h3>機車竊盜</h3>
                        <ul>
                            <?php

                            $sql = "select 'motorcycle steal' as category, count(code) as crime_cnt, location
                            from (select code, category, mid(location,4,3) as location
                                  from motorcycle_steal) t
                            group by location
                            order by crime_cnt desc
                            limit 3";

                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <li><?php echo $row['location']; ?> (<?php echo $row['crime_cnt']; ?>)</li>
                                </tr>

                            <?php } ?>

                        </ul>
                    </div>
                    <div class="col-2 col-12-medium">
                        <h3>搶奪</h3>
                        <ul>
                            <?php

                            $sql = "select 'random snatch' as category, count(code) as crime_cnt, location
                            from (select code, category, mid(location,4,3) as location
                                  from random_snatch) t
                            group by location
                            order by crime_cnt desc
                            limit 3";

                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <li><?php echo $row['location']; ?> (<?php echo $row['crime_cnt']; ?>)</li>
                                </tr>

                            <?php } ?>

                        </ul>
                    </div>
                    <div class="col-2 col-12-medium">
                        <h3>強盜</h3>
                        <ul>
                            <?php

                            $sql = "select 'random rob' as category, count(code) as crime_cnt, location
                            from (select code, category, mid(location,4,3) as location
                                  from random_rob) t
                            group by location
                            order by crime_cnt desc
                            limit 3";

                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <li><?php echo $row['location']; ?> (<?php echo $row['crime_cnt']; ?>)</li>
                                </tr>

                            <?php } ?>

                        </ul>
                    </div>

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

    <script>
        function geofunc() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        // elm.innerText = "lat = " + position.coords.latitude + " lng = " + position.coords.longitude;
                        location.href = "geo.php?lat=" + position.coords.latitude + "&lng=" + position.coords.longitude;

                    },
                    () => {
                        // elm.innerText = "Oops!";
                    }
                );
            }
        }
    </script>

</body>

</html>
>>>>>>> Stashed changes
