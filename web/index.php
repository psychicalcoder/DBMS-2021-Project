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

      function genMarker(mapitem, pos) {
	  return new google.maps.Marker({
	      map: mapitem,
	      position: new google.maps.LatLng(pos[0],pos[1]),
	      icon: 'images/reddot.png',
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
	      var marker = genMarker(car_steal_map, mE);
	  });
	  Array.prototype.forEach.call(bike_steal, function(mE) {
	      var marker = genMarker(bike_steal_map, mE);
	  });
	  Array.prototype.forEach.call(random_rob, function(mE) {
	      var marker = genMarker(random_rob_map, mE);
	  });
	  Array.prototype.forEach.call(random_snatch, function(mE) {
	      var marker = genMarker(random_snatch_map, mE);
	  });
	  Array.prototype.forEach.call(house_steal, function(mE) {
	      var marker = genMarker(house_steal_map, mE);
	  });
	  Array.prototype.forEach.call(motorcycle_steal, function(mE) {
	      var marker = genMarker(motorcycle_steal_map, mE);
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
                <li><a href="./" class="active">網站簡介</a></li>
<!--                <li><a href="#first">偵測熱點</a></li>-->
                <li><a href="#second">熱點地圖</a></li>
                <li><a href="./add.php">新增犯罪熱點</a></li>
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
                        <p>本網站結合了臺北市政府警察局刑事警察大隊所提供的公開資料。包含機車竊盜、住宅竊盜、街頭隨機搶奪案件事發地點資料，搭配Google地圖，讓使用者可以評估自身所屬地點是否安全，繼而保護使用者。</p>
                        <!--
                        <ul class="actions">
                            <li><a href="generic.html" class="button ">繼續看下去</a></li>
                        </ul>
-->
                    </div>
                    <span class="image"><img src="images/globe.png" alt="" /></span>
                </div>
            </section>

            <!-- First Section -->
<!--
            <section id="first" class="main special">
                <header class="major">
                    <h2>偵測熱點</h2>
                </header>
                <section>
                    <pre><code>這是一個空格框框
                    </code></pre>
                </section>

            </section>
-->

            <!-- Second Section -->
            <section id="second" class="main special">
                <header class="major">
                    <h2>熱點地圖</h2>
                    <p>年度最高地點與變化</p>
                </header>
                <section>
		  <div style="display: block" class="map" id="house_steal_map"></div>
		  <div style="display: none" class="map" id="car_steal_map"></div>
		  <div style="display: none" class="map" id="bike_steal_map"></div>
		  <div style="display: none" class="map" id="motorcycle_steal_map"></div>
		  <div style="display: none" class="map" id="random_snatch_map"></div>
		  <div style="display: none" class="map" id="random_rob_map"></div>
		    <!-- 
                    <pre><code>這是一個空格框框
                    </code></pre>
		    -->
		    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApaj14PBOXclTYt8Bg3fIJnkiSiELkMZA&callback=initMap&libraries=&v=weekly"></script>
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


        </div>

        <!-- Footer -->
        <footer id="footer">
            <section>
                <h2>參考資料</h2>
                <p>https://www.flaticon.com/<br>
                https://html5up.net/
                </p>
            </section>
            <section>
                <h2>相關資訊</h2>
                <ul class="icons">
                    <li><a target="_blank" href="https://github.com/psychicalcoder/DBMS-2021-Project" class="icon brands fa-github alt"><span class="label">GitHub</span></a></li>
                </ul>
            </section>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>
