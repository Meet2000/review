
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="progressbar.css">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

<div class="card">
	<div class="row no-gutters">
		<aside class="col-sm-5 border-right">
			<article class="gallery-wrap">
				<div class="col-12 col-sm-11 mx-auto mt-3" style="height: 380px">
					<div class="img-small-wrap border-bottom pb-3">
						<div>
							<img src="default.jpg" height="380px" class="img-reponsive">
						</div>
					</div>
				</div>

				<!-- progress bar -->
				<div class="ml-5 mt-3 wrapper border-bottom"><!--  style="height: 170px;" -->
					<div class="row">
						<div class="col-12 col-sm-5">
							<div class="counter" data-cp-percentage="75" data-cp-color="#00bfeb"></div>
						</div>
						<div class="col-12 col-sm-7 my-auto">
							Review Analysis From <a href="https://goodreads.com/book/show/6969361-2-states">goodread.com</a> 
						</div>
					</div>
				</div>
			</article>
		</aside>

		<aside class="col-sm-7">
			<article class="p-5">
				<h2 class="title mb-3">Original Version of Some product name</h2>

				<dl>
					<dt>Description</dt>
					<dd><p>Here goes description consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
					</dd>
				</dl>

				<hr>
			</article>
		</aside>
	</div>
</div>


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