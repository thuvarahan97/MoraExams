<?php
include_once("header.php");
?>

<div class="intro-section single-cover" id="home-section">
    <div class="slide-1 " style="background-image: url('images/Banners/bg_contact_us.jpg'); background-position: 50% 0;" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row justify-content-center align-items-center text-center">
                        <div class="col-lg-12">
                            <h1 data-aos="fade-up" data-aos-delay="0">Contact Us</h1>
                            <p data-aos="fade-up" data-aos-delay="100" style="">
                                <i class="fas fa-envelope"></i> <a href="mailto:moraetamils@gmail.com" target="_top"> moraetamils@gmail.com </a> &nbsp;
                                <i class="fab fa-facebook-square"></i> <a href="https://www.facebook.com/moraexams/" target="_blank"> MORA EXAMS </a> &nbsp;
                                <span class="contactUsBreak"> <br/> </span>
                                <i class="fab fa-twitter"></i> <a href="https://twitter.com/MoraExams" target="_blank"> @MoraExams </a> &nbsp;
                                <?php if (isset($contactUsTelephone) && ($contactUsTelephone != '')) { ?>
                                <i class="fas fa-phone-alt"></i> <a href="tel:+94<?=substr($contactUsTelephone, 1)?>" target="_top"> <?=$contactUsTelephone?> </a>
                                <?php } ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php if(isset($display_committee) && ($display_committee == 1) && isset($Committee) && !empty($Committee)) { ?>

<div class="site-section committee-section" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
        <div class="row">
            <div class="head_title text-center" style="margin:0 auto 50px;">
                <div data-aos="fade-up" data-aos-delay="">
                    <h2 class="h2-custom" data-aos="fade-up" data-aos-delay="">Examination Committee</h2>
                    <div class="separator"></div>
                </div>
            </div>

            <div class="owl-carousel col-12 nonloop-block-14">

                <?php foreach ($Committee as $member): if (isset($member['name']) && ($member['name'] != '')) { ?>
                
                <div class="committeeMemberCard bg-white align-self-stretch">
                    <div class="committeeMember text-center">
                        
                        <?php if (isset($member['img']) && ($member['img'] != '')): ?>
                        <img src="images/Committee_Members/<?=$member['img']?>" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
                        <?php endif; ?>
                        
                        <div class="py-2">

                            <?php if (isset($member['name']) && ($member['name'] != '')): ?>
                            <h3 class="text-black"><?=$member['name']?></h3>
                            <?php endif; ?>

                            <?php if (isset($member['department']) && ($member['department'] != '')): ?>
                            <p class="department">
                                Department of <?=$member['department']?><br/>
                                Faculty of Engineering, University of Moratuwa
                            </p>
                            <?php endif; ?>
                            
                            <?php if (isset($member['post']) && ($member['post'] != '')): ?>
                            <p class="position"><?=$member['post']?> of the Examination Committee</p>
                            <?php endif; ?>

                        </div>
                    </div>

                    <?php if (isset($member['telephone']) && ($member['telephone'] != '')): ?>

                    <div class="d-flex border-top contacts">
                        <div class="py-3 px-4 text-center" style="margin:auto;"><i class="fas fa-phone-alt"></i> <?=$member['telephone']?></div>
                    </div>

                    <?php endif; ?>

                </div>                

                <?php } endforeach; ?>

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-7 text-center">
            <button class="customPrevBtn btn btn-primary m-1">Prev</button>
            <button class="customNextBtn btn btn-primary m-1">Next</button>
            </div>
        </div>

    </div>
</div>

<?php } ?>


<div class="site-section bg-image overlay" style="background-image: url('images/Backgrounds/bg_about_us_bw.jpg');">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 testimony" style="color:#FFF; font-weight:350;">
                <div class="text-center">
                    <img src="images/logo.png" alt="Image" class="img-fluid w-25 mb-4">
                </div>
                <p align="justify">Mora E-Tamils is a student driven organization founded and fostered by 
                                    the Tamil students of the Engineering Faculty of the University of Moratuwa on 
                                    the sole aim of the uplifting and advancing the academic standards of the Tamil 
                                    students in the country.</p>
                <p align="justify">From its inception, it has been actively engaging 
                                    itself in a great number of projects focused towards the educational development 
                                    of secondary students such as conducting pilot examinations, organizing seminars 
                                    and assisting the infrastructural development of educational institutions. Inspired 
                                    by the notion of bringing the talents of Tamil students to light and recognition, 
                                    it's on its way towards service.</p>
            </div>
        </div>
    </div>
</div>


<div class="site-section bg-light" id="contact-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h2 class="section-title mb-5 text-center">Message Us</h2>
                
                <form method="post" action="contact_us.function.php" data-aos="fade">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="place" placeholder="District" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea class="form-control" cols="30" rows="5" name="message" placeholder="Message" required></textarea>
                        </div>
                    </div>

                    <div class="form-group text-center my-4">
                        <input type="submit" name="send" class="btn btn-primary py-3 px-5 btn-pill" value="Send Message">
                        <input type="reset" class="btn btn-secondary py-3 px-5 btn-pill" value="Clear">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<section style="background: url(images/Backgrounds/bg_facebook_share.jpg) no-repeat center center; overflow: hidden; background-size:cover;">
    <div class="callus_overlay">
        <div class="container">
            <div class="row main_callus">
                <div class="col-sm-6 col-xs-12 text-center">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmoraexams%2F&tabs&width=450&height=154&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="450" height="154" style="border:none;overflow:hidden;vertical-align:middle;" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
                
                <div class="col-sm-6 col-xs-12 single_callus_right text-center">
                    <a href="http://www.facebook.com/sharer.php?u=https://www.facebook.com/moraexams/" onclick="window.open('http://www.facebook.com/sharer.php?u=https://www.facebook.com/moraexams/', 'newwindow', 'width=500,height=400'); return false;" class="btn btn-primary" style="font-size:1.2rem; font-weight:500;"><i class="fa fa-facebook" style="color:#0938e0;"></i>&nbsp; Share</a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Alertify CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/alertify.min.css"/>
<!-- Alertify Default theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/themes/default.min.css"/>
<!-- Alertify Semantic UI theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/themes/semantic.min.css"/>
<!-- Alertify JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/alertify.min.js"></script>


<?php
if(!empty($_GET['msg'])) 
{
    if ($_GET['msg']=='11101') 
    { ?>
        <script >
            alertify.success("Thank you, Your message has been submited.");
        </script>
    <?php
    }
    else if ($_GET['msg']=='10001')
    { ?>
        <script >
            alertify.error("Sorry, Unable to submit your message!");
        </script>
    <?php
    }
}
?>

<?php
include_once("footer.php");
?>