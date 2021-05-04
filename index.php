<!DOCTYPE html>
<html>
<head>
	<title>Product Review</title>
	<script type="text/javascript">
		function goBack() {
			window.history.back();
		}
	</script>
  
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/progressbar.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <style>
    body {font-family: Arial, Helvetica, sans-serif;align-self: center;}

    .image-container {
      background-image: url("default1.jpg");
      background-size: cover;
      position: relative;
      width: 300px;
      height: 300px;
      border-radius: 150px;
      border: 0px;
      vertical-align: center;
      margin: 5% 0 0 5%;
      /*box-shadow: 20px 30px rgb(200, 200, 200, 0.3);*/
    }

    .text {
      background-color: black;
      color: white;
      font-size: 30px; 
      font-weight: bold;
      margin: 0 auto;
      padding: 10px;
      width: 50%;
      text-align: center;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      mix-blend-mode: screen;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="aboutus.html">About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="feedback.html">FeedBack</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="loginMe.php">Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="signupMe.php">Sign Up</a>
    </li>
  </ul>
</nav>
<br>

	<div>
		<span onclick='goBack()'>Go Back</span>

		<form method="get">
			<input type="search" name="search" style="float: right;margin-top: -15px;">
		</form>
	</div><br>

</body>

<!-- ------------------------------------------------------------------ -->
<!-- Script here -->

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {

  var circleProgress = (function(selector) {
    var wrapper = document.querySelectorAll(selector);
    Array.prototype.forEach.call(wrapper, function(wrapper, i) {
      var wrapperWidth,
        wrapperHeight,
        percent,
        innerHTML,
        context,
        lineWidth,
        centerX,
        centerY,
        radius,
        newPercent,
        speed,
        from,
        to,
        duration,
        start,
        strokeStyle,
        text;

      var getValues = function() {
        wrapperWidth = parseInt(window.getComputedStyle(wrapper).width);
        wrapperHeight = wrapperWidth;
        percent = wrapper.getAttribute('data-cp-percentage');
        innerHTML = '<span class="percentage"><strong>' + percent + '</strong> %</span><canvas class="circleProgressCanvas" width="' + (wrapperWidth * 2) + '" height="' + wrapperHeight * 2 + '"></canvas>';
        wrapper.innerHTML = innerHTML;
        text = wrapper.querySelector(".percentage");
        canvas = wrapper.querySelector(".circleProgressCanvas");
        wrapper.style.height = canvas.style.width = canvas.style.height = wrapperWidth + "px";
        context = canvas.getContext('2d');
        centerX = canvas.width / 2;
        centerY = canvas.height / 2;
        newPercent = 0;
        speed = 1;
        from = 0;
        to = percent;
        duration = 1000;
        lineWidth = 25;
        radius = canvas.width / 2 - lineWidth;
        strokeStyle = wrapper.getAttribute('data-cp-color');
        start = new Date().getTime();
      };

      function animate() {
        requestAnimationFrame(animate);
        var time = new Date().getTime() - start;
        if (time <= duration) {
          var x = easeInOutQuart(time, from, to - from, duration);
          newPercent = x;
          text.innerHTML = Math.round(newPercent) + " %";
          drawArc();
        }
      }

      function drawArc() {
        var circleStart = 1.5 * Math.PI;
        var circleEnd = circleStart + (newPercent / 50) * Math.PI;
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.beginPath();
        context.arc(centerX, centerY, radius, circleStart, 4 * Math.PI, false);
        context.lineWidth = lineWidth;
        context.strokeStyle = "#ddd";
        context.stroke();
        context.beginPath();
        context.arc(centerX, centerY, radius, circleStart, circleEnd, false);
        context.lineWidth = lineWidth;
        context.strokeStyle = strokeStyle;
        context.stroke();

      }
      var update = function() {
        getValues();
        animate();
      }
      update();

      var btnUpdate = document.querySelectorAll(".btn-update")[0];
      btnUpdate.addEventListener("click", function() {
        wrapper.setAttribute("data-cp-percentage", Math.round(getRandom(5, 95)));
        update();
      });
      wrapper.addEventListener("click", function() {
        update();
      });

      var resizeTimer;
      window.addEventListener("resize", function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
          clearTimeout(resizeTimer);
          start = new Date().getTime();
          update();
        }, 250);
      });
    });

    //
    // http://easings.net/#easeInOutQuart
    //  t: current time
    //  b: beginning value
    //  c: change in value
    //  d: duration
    //
    function easeInOutQuart(t, b, c, d) {
      if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
      return -c / 2 * ((t -= 2) * t * t * t - 2) + b;
    }

  });

  circleProgress('.counter');

  // Gibt eine Zufallszahl zwischen min (inklusive) und max (exklusive) zurück
  function getRandom(min, max) {
    return Math.random() * (max - min) + min;
  }
});
</script>

<!-- ------------------------------------------------------------------ -->
<!-- Script here -->

</html>
<!-- 
  <div class="container">
    <div class="row">
      <div class='col-300 image-container'>
        <div class='text'>NATURE</div>
      </div>
    </div>
  </div>
 -->
<?php 
	$conn = new mysqli("localhost","root","","review");

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}


	if (isset($_GET['search'])) {
		
		$s = $_REQUEST['search'];

		$sql1 = "select * from cat where catName LIKE '%" . $s ."%'";
		$result1 = $conn->query($sql1);

		$sql2 = "select * from sub_cat where subCatName LIKE '%" . $s ."%'";
		$result2 = $conn->query($sql2);

		$sql3 = "select * from product where productName LIKE '%" . $s ."%'";
		$result3 = $conn->query($sql3);


		if ($result1 || $result2 || $result3) {
			echo "<div class='main'><form>";

			if ($result1->num_rows > 0) {
				
			    while($row = $result1->fetch_assoc()) {
			    	echo "<button name='catId' value='". ucwords($row["catId"]) ."' type='submit'>" . ucwords($row["catName"]). "</button><br><br>";
			        // echo "id: " . $row["catId"]. "&nbsp;&nbsp;<button name='catId' value='". $row["catId"] ."' type='submit'>" . $row["catName"]. "</button><br><br>";
			    }
			    echo "<hr>";
			}

			if ($result2->num_rows > 0) {

			    while($row = $result2->fetch_assoc()) {
			    	echo "<button name='subId' value='". ucwords($row["subCatId"]) ."' type='submit'>" . ucwords($row["subCatName"]). "</button><br><br>";
			        // echo "Cat id: " . $row["catId"]. "&nbsp;&nbsp; Sub-cat id: " . $row["subCatId"]. "&nbsp;&nbsp; <button name='subId' value='". $row["subCatId"] ."' type='submit'>" . $row["subCatName"]. "</button><br><br>";
			    }
			    echo "<hr>";
			}

			if ($result3->num_rows > 0) {

			    while($row = $result3->fetch_assoc()) {
			    	echo "<button name='pId' value='". ucwords($row["productId"]) ."' type='submit'>" . ucwords($row["productName"]). "</button><br><br>";
			    	// echo "Sub-cat id: " . $row["subCatId"]. "&nbsp;&nbsp; Product id: " . $row["productId"]. "&nbsp;&nbsp; <button name='pId' value='". $row["productId"] ."' type='submit'>" . $row["productName"]. "</button><br><br>";
			    }
			    echo "<hr>";
			}

			echo "</form><br><br></div>";
		} else {
		    echo "Sorry ! No data found.";
		}

	} elseif (isset($_GET['catId'])) {

		$sql = "select * from sub_cat where catId = " . $_GET['catId'];
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "<form><div class='container'><div class='row'>";
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    		echo "<button name='subId' value='". ucwords($row["subCatId"]) ."' type='submit' class='col-300 image-container'><div class='text'>". ucwords($row["subCatName"]) ."</div></button>";
		        // echo "Cat id: " . $row["catId"]. "&nbsp;&nbsp; Sub-cat id: " . $row["subCatId"]. "&nbsp;&nbsp; <button name='subId' value='". $row["subCatId"] ."' type='submit'>" . $row["subCatName"]. "</button><br><br>";
		    }

		  echo "</div></div></form>";
		} else {
		  echo "No sub-categories available.";
		}

	} elseif (isset($_GET['subId'])) {

		$sql = "select * from product where subCatId = " . $_GET['subId'];
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "<form><div class='container'><div class='row'>";
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	echo "<button name='pId' value='". ucwords($row["productId"]) ."' type='submit' class='col-300 image-container'><div class='text'>". ucwords($row["productName"]) ."</div></button>";
		        // echo "Sub-cat id: " . $row["subCatId"]. "&nbsp;&nbsp; Product id: " . $row["productId"]. "&nbsp;&nbsp; <button name='pId' value='". $row["productId"] ."' type='submit'>" . $row["productName"]. "</button><br><br>";
		    }

		    echo "</div></div></form>";
		} else {
		    echo "No Products available.";
		}

	} elseif (isset($_GET['pId'])) {

		$sql = "select * from product where productId = " . $_GET['pId'];
		$result = $conn->query($sql);

		$getReview = "select * from user_review where productId = " . $_GET['pId'];
		$reviewSet = $conn->query($getReview);

		if ($result->num_rows > 0) {

		    while($row = $result->fetch_assoc()) {
echo '	<div class="card">
					<div class="row no-gutters">
						<aside class="col-sm-5 border-right">
							<article class="gallery-wrap">
								<div class="col-12 col-sm-11 mx-auto mt-3" style="height: 380px">
									<div class="img-small-wrap border-bottom pb-3">
										<div>';
										if ($row["image"] == "") {
											echo '<img src="default.jpg" height="380px" class="img-reponsive">';
										} else{
											echo '<img src="'.$row["image"].'" height="380px" class="img-reponsive">';
										}
// echo '											<img src="default.jpg" height="380px" class="img-reponsive">';
echo '
										</div>
									</div>
								</div>

								<!-- progress bar -->
								<div class="ml-5 mt-3 wrapper border-bottom">
									<div class="row">
										<div class="col-12 col-sm-5">';
										if ($row["sentimentAnalysis"] == "") {
											echo '<div>No Data Available</div>';
										} else {
											echo '<div class="counter" data-cp-percentage="'.$row["sentimentAnalysis"].'" data-cp-color="#00bfeb"></div>';
										}
// echo '											<div class="counter" data-cp-percentage="75" data-cp-color="#00bfeb"></div>';
echo '										</div>
										<div class="col-12 col-sm-7 my-auto">';
												$web = "";
											  	$pieces = parse_url($row["website"]);
  												$domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
  												if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
  												  $web = $regs['domain'];
  												}
  												echo '<a href="'.$row["website"].'">'.$web.'</a>';
echo '											Review Analysis From <a href="">goodread.com</a> 
										</div>
									</div>
								</div>
							</article>
						</aside>

						<aside class="col-sm-7">
							<article class="p-5">
								<h2 class="title mb-3">'.ucwords($row["productName"]).'</h2>

								<dl>
									<dt>Description</dt>
									<dd><p>'. ucwords($row["productDesc"]) .'</p>
									</dd>
								</dl>

								<hr>

							</article>
						</aside>
					</div>
				</div>';

// note check condition and add review in article tag after hr tag.

		    	// echo "Name : ". ucwords($row["productName"]) ."<br>Product Description : ". ucwords($row["productDesc"]);
		    }

		} else {
		    echo "No data found.";
		}

	} else {

		$sql = "select * from cat";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "<form><div class='container'><div class='row'>";
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	echo "<button name='catId' value='". ucwords($row["catId"]) ."' type='submit' class='col-300 image-container'><div class='text'>". ucwords($row["catName"]) ."</div></button>";
		        // echo "id: " . $row["catId"]. "&nbsp;&nbsp;<button name='catId' value='". $row["catId"] ."' type='submit'>" . $row["catName"]. "</button><br><br>";
		    }

		    echo "</div></div></form>";
		} else {
		    echo "No Cateories found.";
		}

	}

	$conn->close();

?>
