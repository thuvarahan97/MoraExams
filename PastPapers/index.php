<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-4893980070714819",
    enable_page_level_ads: true,
    overlays: {bottom: true}
  });
</script>
<!-- Adsense -->

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
<script src="js/modernizr.js"></script> <!-- Modernizr -->
<link rel="stylesheet" href="css/card.css">


<?php
    $subjects = array(

                /* 2019 PastPapers */
/*
                array('H' => 'Combined Mathematics 2019','T' => 'Maths','Y' => '2019','syllabus' => 'new',
                                'tam' => '19MathsT', 'eng' => '19MathsE', 's' => '19MathsS', 'ts' => '', 'es' => '' ,'fi' => 'maths_stream maths new y19' ),

                array('H' => 'Combined Mathematics 2019','T' => 'Maths','Y' => '2019','syllabus' => 'old',
                                'tam' => '19MathsT', 'eng' => '19MathsE', 's' => '19MathsS', 'ts' => '', 'es' => '' ,'fi' => 'maths_stream maths old y19' ),

                array('H' => 'Biology 2019','T' => 'Biology','Y' => '2019','syllabus' => 'new',
                                'tam' => '19BioT', 'eng' => '19BioE', 's' => '', 'ts' => '19BioTS', 'es' => '19BioES' ,'fi' => 'bio_stream bio new y19'  ),

                array('H' => 'Biology 2019','T' => 'Biology','Y' => '2019','syllabus' => 'old',
                                'tam' => '19BioT', 'eng' => '19BioE', 's' => '', 'ts' => '19BioTS', 'es' => '19BioES' ,'fi' => 'bio_stream bio old y19'  ),

                array('H' => 'Physics 2019','T' => 'Physics','Y' => '2019','syllabus' => 'new',
                                'tam' => '19PhyT', 'eng' => '19PhyE', 's' => '', 'ts' => '19PhyTS', 'es' => '19PhyES' ,'fi' => 'maths_stream bio_stream phy new y19'  ),

                array('H' => 'Physics 2019','T' => 'Physics','Y' => '2019','syllabus' => 'old',
                                'tam' => '19PhyT', 'eng' => '19PhyE', 's' => '', 'ts' => '19PhyTS', 'es' => '19PhyES' ,'fi' => 'maths_stream bio_stream phy old y19'  ),

                array('H' => 'Chemistry 2019','T' => 'Chemistry','Y' => '2019','syllabus' => 'new',
                                'tam' => '19CheT', 'eng' => '19CheE', 's' => '', 'ts' => '19CheTS', 'es' => '19CheES' ,'fi' => 'maths_stream bio_stream che new y19'  ),

                array('H' => 'Chemistry 2019','T' => 'Chemistry','Y' => '2019','syllabus' => 'old',
                                'tam' => '19CheT', 'eng' => '19CheE', 's' => '', 'ts' => '19CheTS', 'es' => '19CheES' ,'fi' => 'maths_stream bio_stream che old y19'  ),

                array('H' => 'ICT 2019','T' => 'ICT','Y' => '2019',
                                'tam' => '19IctT', 'eng' => '19IctE', 's' => '19IctS', 'ts' => '', 'es' => '' ,'fi' => 'maths_stream etech_stream ict y19' ),
*/                                        
                /* 2018 PastPapers */

                array('H' => 'Combined Mathematics 2018','T' => 'Maths','Y' => '2018',
                                'tam' => '18MathsT', 'eng' => '18MathsE', 's' => '18MathsS', 'ts' => '', 'es' => '' ,'fi' => 'maths_stream maths y18' ),

                array('H' => 'Biology 2018','T' => 'Biology','Y' => '2018',
                                'tam' => '18BioT', 'eng' => '18BioE', 's' => '', 'ts' => '18BioTS', 'es' => '18BioES' ,'fi' => 'bio_stream bio y18'  ),

                array('H' => 'Physics 2018','T' => 'Physics','Y' => '2018',
                                'tam' => '18PhyT', 'eng' => '18PhyE', 's' => '', 'ts' => '18PhyTS', 'es' => '18PhyES' ,'fi' => 'maths_stream bio_stream phy y18'  ),

                array('H' => 'Chemistry 2018','T' => 'Chemistry','Y' => '2018',
                                'tam' => '18CheT', 'eng' => '18CheE', 's' => '', 'ts' => '18CheTS', 'es' => '18CheES' ,'fi' => 'maths_stream bio_stream che y18'  ),

                array('H' => 'ICT 2018','T' => 'ICT','Y' => '2018',
                                'tam' => '18IctT', 'eng' => '18IctE', 's' => '18IctS', 'ts' => '', 'es' => '' ,'fi' => 'maths_stream etech_stream ict y18' ),
                                        
                /* 2017 PastPapers */
            
                array('H' => 'Combined Mathematics 2017','T' => 'Maths','Y' => '2017',
                                'tam' => '17MathsT', 'eng' => '17MathsE', 's' => '17MathsS', 'ts' => '', 'es' => '' ,'fi' => 'maths_stream maths y17'),

                array('H' => 'Biology 2017','T' => 'Biology','Y' => '2017',
                                'tam' => '17BioT', 'eng' => '17BioE', 's' => '', 'ts' => '17BioTS', 'es' => '17BioES' ,'fi' => 'bio_stream bio y17' ),

                array('H' => 'Physics 2017','T' => 'Physics','Y' => '2017',
                                'tam' => '17PhyT', 'eng' => '17PhyE', 's' => '', 'ts' => '17PhyTS', 'es' => '17PhyES' ,'fi' => 'maths_stream bio_stream phy y17' ),

                array('H' => 'Chemistry 2017','T' => 'Chemistry','Y' => '2017',
                                'tam' => '17CheT', 'eng' => '17CheE', 's' => '', 'ts' => '17CheTS', 'es' => '17CheES' ,'fi' => 'maths_stream bio_stream che y17' ),

                array('H' => 'ICT 2017','T' => 'ICT','Y' => '2017',
                                'tam' => '17IctT', 'eng' => '', 's' => '17IctS', 'ts' => '', 'es' => '' ,'fi' => 'maths_stream etech_stream ict y17' ),

                array('H' => 'Engineering Technology 2017','T' => 'E-Tec','Y' => '2017',
                                'tam' => '17tEtecT', 'eng' => '', 's' => '17tEtecS', 'ts' => '', 'es' => '' ,'fi' => 'etech_stream etec y17' ),

                array('H' => 'Bio Technology 2017','T' => 'B-Tec','Y' => '2017',
                                'tam' => '17tBiostrT', 'eng' => '', 's' => '17tBiostrS', 'ts' => '', 'es' => '' ,'fi' => 'btech_stream btec y17' ),

                array('H' => 'Science for Technology 2017','T' => 'Sci for Tec','Y' => '2017',
                                'tam' => '17tSftT', 'eng' => '', 's' => '17tSftS', 'ts' => '', 'es' => '' ,'fi' => 'etech_stream btech_stream sft y17' ),

                array('H' => 'Agriculture 2017','T' => 'Agriculture','Y' => '2017',
                                'tam' => '17tArcT', 'eng' => '', 's' => '17tArcS', 'ts' => '', 'es' => '' ,'fi' => 'etech_stream btech_stream agr y17' ),

                /* 2016 PastPapers */

                array('H' => 'Combined Mathematics 2016','T' => 'Maths','Y' => '2016',
                                'tam' => '16MathsT', 'eng' => '16MathsE', 's' => '16MathsS/pdf.pdf', 'ts' => '', 'es' => '' ,'fi' => 'maths_stream maths y16' ),

                array('H' => 'Biology 2016','T' => 'Biology','Y' => '2016',
                                'tam' => '16BioT', 'eng' => '16BioE', 's' => '16BioS', 'ts' => '', 'es' => '' ,'fi' => 'bio_stream bio y16' ),

                array('H' => 'Physics 2016','T' => 'Physics','Y' => '2016',
                                'tam' => '16PhyE', 'eng' => '16PhyE', 's' => '16PhyS', 'ts' => '', 'es' => '' ,'fi' => 'maths_stream bio_stream phy y16' ),

                array('H' => 'Chemistry 2016','T' => 'Chemistry','Y' => '2016',
                                'tam' => '16CheT', 'eng' => '16CheE', 's' => '16CheS', 'ts' => '', 'es' => '' ,'fi' => 'maths_stream bio_stream che y16' ),

                array('H' => 'ICT 2016','T' => 'ICT','Y' => '2016',
                                'tam' => '16IctT', 'eng' => '', 's' => '16IctS', 'ts' => '', 'es' => '' ,'fi' => 'maths_stream etech_stream ict y16' ),

                array('H' => 'Engineering Technology 2016','T' => 'E-Tec','Y' => '2016',
                                'tam' => '16tetecT', 'eng' => '', 's' => '16tetecS', 'ts' => '', 'es' => '' ,'fi' => 'etech_stream etec y16' ),

                array('H' => 'Bio Technology 2016','T' => 'B-Tec','Y' => '2016',
                                'tam' => '16tBiostrT', 'eng' => '', 's' => '16tBiostrS', 'ts' => '', 'es' => '' ,'fi' => 'btech_stream btec y16' ),

                array('H' => 'Science for Technology 2016','T' => 'Sci for Tec','Y' => '2016',
                                'tam' => '16sftT', 'eng' => '', 's' => '16sftS', 'ts' => '', 'es' => '' ,'fi' => 'etech_stream btech_stream sft y16' ),

                /* 2015 PastPapers */

                array('H' => 'Combined Mathematics 2015','T' => 'Maths','Y' => '2015',
                                'tam' => '15MathsT', 'eng' => '15MathsE', 's' => '15MathsS', 'ts' => '', 'es' => '' ,'fi' => 'maths_stream maths y15' ),

                array('H' => 'Biology 2015','T' => 'Biology','Y' => '2015',
                                'tam' => '15BioT', 'eng' => '15BioE', 's' => '15BioS', 'ts' => '', 'es' => '' ,'fi' => 'bio_stream bio y15' ),

                array('H' => 'Physics 2015','T' => 'Physics','Y' => '2015',
                                'tam' => '15PhyT', 'eng' => '15PhyE', 's' => '15PhyS', 'ts' => '', 'es' => '' ,'fi' => 'maths_stream bio_stream phy y15' ),

                array('H' => 'Chemistry 2015','T' => 'Chemistry','Y' => '2015',
                                'tam' => '15CheTp2', 'eng' => '15CheE', 's' => '', 'ts' => '', 'es' => '' ,'fi' => 'maths_stream bio_stream che y15' ),

                array('H' => 'ICT 2015','T' => 'ICT','Y' => '2015',
                                'tam' => '15ICTT', 'eng' => '', 's' => '', 'ts' => '', 'es' => '' ,'fi' => 'maths_stream etech_stream ict y15' ),
            );
?>



<main class="cd-main-content">
    <div class="cd-tab-filter-wrapper">
        <div class="cd-tab-filter">
            <ul class="cd-filters">
                <li class="placeholder"> 
                    <a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
                </li>
                <li class="filter"><a class="selected" href="#0" data-type="all">All</a></li>
                <li class="filter" data-filter=".maths_stream"><a href="#0" data-type="maths_stream">Maths Stream</a></li>
                <li class="filter" data-filter=".bio_stream"><a href="#0" data-type="bio_stream">Bio Stream</a></li>
                <li class="filter" data-filter=".etech_stream"><a href="#0" data-type="etech_stream">E-Tec Stream</a></li>
                <li class="filter" data-filter=".btech_stream"><a href="#0" data-type="btech_stream">B-Tec Stream</a></li>
            </ul> <!-- cd-filters -->
        </div> <!-- cd-tab-filter -->
    </div> <!-- cd-tab-filter-wrapper -->

    <section class="cd-gallery">
        <ul>
            <?php foreach ($subjects as $sub): ?>
                <li class="<?php echo 'mix '.$sub['fi'].' '.$sub['H']; ?>">
                    <br />
                    <div class = "pastpapercard">
                        <div class="card3d" class="ppaper">
                            <div class="imgBox">
                                <img src="img/card.jpg">
                                <h2 class="detailspp" id="cardhead" <?php if (isset($sub['syllabus']) && $sub['syllabus']!='') { ?> style="font-size: 23px;" <?php } ?>>
                                    <?php echo $sub['T'].' '.$sub['Y']; ?>
                                    <?php if (isset($sub['syllabus']) && $sub['syllabus'] == 'new'): ?> 
                                        <p style="font-size: 15px;">(NEW SYLLABUS)</p>
                                    <?php endif; ?>
                                    <?php if (isset($sub['syllabus']) && $sub['syllabus'] == 'old'): ?>
                                        <p style="font-size: 15px;">(OLD SYLLABUS)</p>
                                    <?php endif; ?>
                                </h2>
                            </div>

                            <div class="detailspp">
                                <h4> <?php echo $sub['H']; ?></h4>
                                <p style="font-size: 16px;">
                                <br />
                                <?php if ($sub['tam'] != ''): ?> 
                                        <a target="_blank" href="<?php echo 'PastPaper/'.$sub['Y'].'/'.$sub['tam'].'.pdf' ?>" download >Tamil Medium<br /></a><br />
                                <?php endif; ?>
                                <?php if ($sub['eng'] != ''): ?>
                                        <a target="_blank" href="<?php echo 'PastPaper/'.$sub['Y'].'/'.$sub['eng'].'.pdf' ?>" download >English Medium<br /></a><br />
                                <?php endif; ?>
                                <?php if ($sub['s'] != ''): ?>
                                        <a target="_blank" href="<?php echo 'PastPaper/'.$sub['Y'].'/'.$sub['s'].'.pdf' ?>" download >Scheme Answer<br /></a><br />
                                <?php endif; ?>
                                <?php if ($sub['ts'] != ''): ?>
                                        <a target="_blank" href="<?php echo 'PastPaper/'.$sub['Y'].'/'.$sub['ts'].'.pdf' ?>" download >Scheme (Tamil)<br /></a><br />
                                <?php endif; ?>
                                <?php if ($sub['es'] != ''): ?>
                                        <a target="_blank" href="<?php echo 'PastPaper/'.$sub['Y'].'/'.$sub['es'].'.pdf' ?>" download >Scheme (English)<br /></a><br />
                                <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                
                <?php endforeach; ?>
            
            <li class="gap"></li>
            <li class="gap"></li>
            <li class="gap"></li>

        </ul>
        <div class="cd-fail-message">No results found. Select the correct Stream.</div>
    </section> <!-- cd-gallery -->

    <div class="cd-filter">
        <form>
            <div class="cd-filter-block">
                <h4>Search</h4>
                <div class="cd-filter-content">
                    <input type="search" placeholder="Search">
                </div> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->


            <div class="cd-filter-block">
                <h4>Year</h4>

                <ul class="cd-filter-content cd-filters list">
                    <li>
                        <input class="filter" data-filter=".y19" type="checkbox" id="checkboxy9">
                        <label class="checkbox-label" for="checkboxy9">2019</label>
                    </li>

                    <li>
                        <input class="filter" data-filter=".y18" type="checkbox" id="checkboxy8">
                        <label class="checkbox-label" for="checkboxy8">2018</label>
                    </li>
                    
                    <li>
                        <input class="filter" data-filter=".y17" type="checkbox" id="checkboxy7">
                        <label class="checkbox-label" for="checkboxy7">2017</label>
                    </li>

                    <li>
                        <input class="filter" data-filter=".y16" type="checkbox" id="checkboxy6">
                        <label class="checkbox-label" for="checkboxy6">2016</label>
                    </li>

                    <li>
                        <input class="filter" data-filter=".y15" type="checkbox" id="checkboxy5">
                        <label class="checkbox-label" for="checkboxy5">2015</label>
                    </li>
                </ul> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->

            
            <div class="cd-filter-block">
                <h4>Syllabus</h4>

                <ul class="cd-filter-content cd-filters list">
                    <li>
                        <input class="filter" data-filter=".new" type="checkbox" id="checkboxy1">
                        <label class="checkbox-label" for="checkboxy1">New Syllabus</label>
                    </li>

                    <li>
                        <input class="filter" data-filter=".old" type="checkbox" id="checkboxy2">
                        <label class="checkbox-label" for="checkboxy2">Old Syllabus</label>
                    </li>
                </ul> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->


            <div class="cd-filter-block">
                <h4>Subject</h4>

                <ul class="cd-filter-content cd-filters list">
                    <li>
                        <input class="filter" data-filter=".maths" type="checkbox" id="checkbox1">
                        <label class="checkbox-label" for="checkbox1">Combined Mathematics</label>
                    </li>

                    <li>
                        <input class="filter" data-filter=".bio" type="checkbox" id="checkbox2">
                        <label class="checkbox-label" for="checkbox2">Biology</label>
                    </li>

                    <li>
                        <input class="filter" data-filter=".che" type="checkbox" id="checkbox3">
                        <label class="checkbox-label" for="checkbox3">Chemistry</label>
                    </li>

                    <li>
                        <input class="filter" data-filter=".ict" type="checkbox" id="checkbox4">
                        <label class="checkbox-label" for="checkbox4">ICT</label>
                    </li>

                    <li>
                        <input class="filter" data-filter=".etec" type="checkbox" id="checkbox5">
                        <label class="checkbox-label" for="checkbox5">Engineering Technology</label>
                    </li>

                    <li>
                        <input class="filter" data-filter=".btec" type="checkbox" id="checkbox6">
                        <label class="checkbox-label" for="checkbox6">Bio Technology</label>
                    </li>

                    <li>
                        <input class="filter" data-filter=".sft" type="checkbox" id="checkbox7">
                        <label class="checkbox-label" for="checkbox7">Science for Technology</label>
                    </li>

                    <li>
                        <input class="filter" data-filter=".agr" type="checkbox" id="checkbox8">
                        <label class="checkbox-label" for="checkbox8">Agriculture</label>
                    </li>
                </ul> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->

            
        </form>

        <a href="#0" class="cd-close">Close</a>
    </div> <!-- cd-filter -->

    <a href="#0" class="cd-filter-trigger">Filters</a>
</main> <!-- cd-main-content -->

<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->