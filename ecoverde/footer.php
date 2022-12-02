<footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">

          <?php

          dynamic_sidebar('footer_sidebar');

          ?>

        </div>
        <div class="row">
          <div class="col-md-12 text-center">
	
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>

<!-- Footer scripts (selfmade) -->
<!-- Add <span> elements to links with fa class (>)-->
<script>
  // Span for menus
  const footerMenuLink = document.querySelectorAll('.menu li a');

  for (var i = 0, len = footerMenuLink.length; i < len; i++){
    var spanBeforeA = document.createElement('span')
    const emptySpanBeforeA = document.createTextNode("");
    spanBeforeA.classList.add('fa', 'fa-chevron-right', 'mr-2')
    spanBeforeA.appendChild(emptySpanBeforeA);
    footerMenuLink[i].parentNode.insertBefore(spanBeforeA, footerMenuLink[i])
  }

  // last block
  const haveAQuestions = document.querySelector('.col-md:last-child');
  haveAQuestions.classList.add('block-23')


</script>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    

    <?php wp_footer() ?>
  </body>
</html>


<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>