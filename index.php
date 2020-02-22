<?php
include_once("header.php");
include_once("home.banner.php");
?>

<section id="about_us" class="site-section about_us">
    <div class="container">
        <div class="row">
            <div class="main_about_us_area sections text-center">
                <div class="head_title">
                    <div data-aos="fade-up" data-aos-delay="">
                        <h2 class="h2-custom">Who We Are?</h2>
                        <div class="separator"></div>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="100">
                        <p align="justify">“An Engineer is a person who applies the basic knowledge of sciences for the betterment of the Society.”</p>
                        <p align="justify">Engineers are usually damned for being socially irresponsible and considered as one of the egocentric, nerd, selfish, money minded psychopaths who never shed blood for the community. But mere truth is we are high functioning Sociopath and has inculcated the love for community. We, Engineers are very much concerned about the society and its betterment and belief that the betterment of the society will bring a prosperous and hybrid future generation than the irrelevant mutations. Engineers and their works have been encouraged for one predominant reason, that is benefiting humankind. In modern society, we are incessantly assembling with our environment. We harvest and draw out all the resources that we require to sustain human life. It is the role of engineer, however to decrease the effects of harm on the living ecosystems and develop necessary substructures that are both efficacious and safe.</p>
                        <p align="justify">It is very obvious that how the engineering students in our society bring up themselves and plan out schemes to assist our community in many ways. We too, the Tamil people of The University of Moratuwa brought together ourselves under the banner of Mora E-Tamils. We also stand along with our Tamil Literary Association in all its speculations and extend our heartiest support to them during Thamilaruvi affairs, Sotkanai, Blood donations and at the times of disasters. All these programmes are designed and developed with the motive of strengthening the longevity and enrichment of culture and tradition of the society. The organization Mora E-Tamils was established and fostered by the Tamil students of the Engineering faculty of University of Moratuwa with the sole aim of uplifting and forward-moving the academic standards of the Tamil speaking students in our country.</p>
                    </div>
                </div>

                <div class="head_title text-center">
                    <div data-aos="fade-up" data-aos-delay="">
                        <h2 class="h2-custom" data-aos="fade-up" data-aos-delay="">What is Mora A/L Pilot Examination?</h2>
                        <div class="separator"></div>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="100">
                        <p align="justify">When sweeping over the ideas as to choose the ways to advance the academic standards of Tamil speaking students, our buddies thought of Pilot Examinations which could boost up the last time preparations and a way to appraise the students themselves at the very edge. But providing a common exam paper and marking wouldn’t help them out as they are very much familiar to them. So, to append more and more spice, the exam papers are set in a way, which portray the final examination environment. This attempt also helps the students to ensure the time management. We too release island ranks based on their z-scores which is a night mare to the examinations which are even supported by the educational departments. We initiated the first pilot examinations in the year of 2007 in 5 districts which was accommodated only 500 people of the two main streams of academy, physical science and biological science. The examinations did not take place for the next two years due to the unfavorable conditions in our country and had renovated our system and came up with the superiority in 2k10 again. We too have included the Technology stream due to the kindful request of the students and also the Provincial Director of Education in 2k16. But now because of the demands, we have handed over the responsibilities of Technology stream to the very own faculty of Technology students, The University of Jaffna and we just guide them for the betterment. Now we have expanded our service to the 18 districts and have conducted the examinations in above 40 examination centers and have accommodated above 5000 candidates per year. It vividly canvases the standards of the examinations and its potential among the students so that the students can adjust themselves to become more and more fit to the final contest (G.C.E A/L), which make their future more efficacious.</p>
                    </div>
                </div>
                
                <div class="head_title text-center">
                    <div data-aos="fade-up" data-aos-delay="">
                        <h2 class="h2-custom" data-aos="fade-up" data-aos-delay="">What Else We Do?</h2>
                        <div class="separator"></div>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="100">
                        <p align="justify">From its inception, The Mora E-Tamils has been actively encaging itself in a great number of projects which has been focusing towards the educational development of secondary students such as conducting pilot examinations, organizing seminars and assisting the infrastructural development of educational institutions. Inspired by the notion of bringing the talents of Tamil students to light and recognition, it’s on its way towards service. Stay with us. Let us uplift the students’ community to its standards.</p>
                        <p align="justify">We strongly believe in the norm that education is the soul of recognition for any civilians. As people with recognition this is our fight to facilitate the students’ community to earn their own. We are heading the front; stay with us.</p>
                    </div>
                </div>
                
                <div class="text-center" data-aos="fade-up" data-aos-delay="">

                    <?php if (isset($lastYear_centres) && ($lastYear_centres != '')): ?>
                    <div class="col-sm-4">
                        <div class="single_about_us">
                            <div class="single_about_us_icon">
                                <span class="count counter" style="font-weight: 400; color: #645540"><?=$lastYear_centres?></span>
                            </div>
                            <h3>CENTERS</h3>
                            <div class="separator"></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (isset($lastYear_students) && ($lastYear_students != '')): ?>
                    <div class="col-sm-4">
                        <div class="single_about_us">
                            <div class="single_about_us_icon">
                                <span class="count counter" style="font-weight: 400; color: #645540"><?=$lastYear_students?></span>
                            </div>
                            <h3>LAST YEAR REGISTERED STUDENTS</h3>
                            <div class="separator"></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (isset($lastYear_districts) && ($lastYear_districts != '')): ?>
                    <div class="col-sm-4">
                        <div class="single_about_us">
                            <div class="single_about_us_icon">
                                <span class="count counter" style="font-weight: 400; color: #645540"><?=$lastYear_districts?></span>
                            </div>
                            <h3>DISTRICTS</h3>
                            <div class="separator"></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>


<?php if (isset($display_sponsor_footer) && ($display_sponsor_footer == 1)) { ?>

<section id="sponsor-footer" class="callus">
    <div class="callus_overlay">
        <div class="container">
            <div class="row main_callus">
                <?php if (isset($display_sponsor_website_facebook) && ($display_sponsor_website_facebook == 1)): ?>
                <div class="col-sm-6 col-xs-12">
                <?php else: ?>
                <div class="col-sm-12 col-xs-12">
                <?php endif; ?>
                    <div class="row single_callus">
                        <?php if (isset($display_sponsor_website_facebook) && ($display_sponsor_website_facebook == 1)): ?>
                        <div class="skypeicon_left col-sm-3">
                        <?php else: ?>
                        <div class="skypeicon_left col-sm-2">
                        <?php endif; ?>
                            <img src="images/Sponsors/<?=$footer_sponsor_logo?>" alt="Logo"/>
                        </div>
                        <?php if (isset($display_sponsor_website_facebook) && ($display_sponsor_website_facebook == 1)): ?>
                        <div class="skypeicon_right col-sm-9">
                        <?php else: ?>
                        <div class="skypeicon_right margin-left-minus-25 col-sm-10">
                        <?php endif; ?>
                            <?php if (isset($footer_sponsor_type) && ($footer_sponsor_type != '')): ?>
                            <h3>Our <?=$footer_sponsor_type?></h3>
                            <?php endif; ?>
                            
                            <?php if (isset($footer_sponsor_name) && ($footer_sponsor_name != '')): ?>
                            <h2><?=$footer_sponsor_name?></h2>
                            <?php endif; ?>
                            
                            <?php if (isset($footer_sponsor_telephone) && ($footer_sponsor_telephone != '')): ?>
                            <h5>Call Now : <?=$footer_sponsor_telephone?></h5>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <?php if (isset($display_sponsor_website_facebook) && ($display_sponsor_website_facebook == 1)): ?>
                <div class="single_callus_right col-sm-6 col-xs-12">
                    <?php if (isset($footer_sponsor_website) && ($footer_sponsor_website != '')): ?>
                    <a href="<?=$footer_sponsor_website?>" class="btn btn-primary" style="margin-right: 3px;">Web Page</a>
                    <?php endif; ?>

                    <?php if (isset($footer_sponsor_facebook) && ($footer_sponsor_facebook != '')): ?>
                    <a href="<?=$footer_sponsor_facebook?>" class="btn btn-primary">Facebook Page</a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php } ?>

<?php
include_once("footer.php");
?>