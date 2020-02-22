<?php
include_once("header.php");
?>

<div class="intro-section single-cover" id="home-section">
      
    <div class="slide-1 " style="background-image: url('images/Banners/bg_results.jpg'); background-position: 50% 0;" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row justify-content-center align-items-center text-center">
                        <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">MORA EXAMS <?=$year?> <br/> RESULTS</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<iframe class="scrollbar" id="style-10" src="result.view.php" width="100%" style="overflow: visible; min-height: 800px" marginheight="1" marginwidth="1" name="cboxmain" id="cboxmain" seamless="seamless" frameborder="0" allowtransparency="true"></iframe>

<?php
include_once("footer.php");
?>