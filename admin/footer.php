    <footer class="footer-section bg-light">
      <div class="container">

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
                <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Mora E-Tamils <script>document.write(new Date().getFullYear()+2);</script>
                </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  
    
  </div> <!-- .site-wrap -->
  
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  <script src="js/main.js"></script>
  

  <!-- <script>
    jQuery(document).ready(function(){
        function update_user_activity() {
          var action = 'update_user_activity';
          $.ajax({
            url:"user.activity.update.php",
            method:"POST",
            data:{action:action},
            success:function(data) {
            }
          });
        }
        setInterval(function() {
          update_user_activity();
        }, 15000);
    });
  </script> -->
  
  </body>
</html>

<?php
ob_end_flush();
?>