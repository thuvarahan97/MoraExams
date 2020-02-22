<?php

$year               = "2019";           //Examination Year - ex: Mora Exams 2019
$committeeYear      = "2021";           //Mora E-Tamils Year - ex: Mora E-Tamils 2021

$contactUsTelephone = "0775132189";     //Telephone Number to be displayed in the Contact Us Page Banner ----- Format: 0######### ----- (starting with 0 and total of 10 digits)

$lastYear_centres   = 44 ;              //Last Year - No. of Centres
$lastYear_students  = 5224 ;            //Last Year - No. of Students Registered
$lastYear_districts = 17 ;              //Last Year - No. of Districts


/* ----------- Enable or Disable Features ---------- */
//  0 = 'Disabled'
//  1 = 'Enabled'

$header_results     = 1;                //Enable or Disable Results in Header
$header_timetable   = 1;                //Enable or Disable TimeTable in Header
$header_pastpapers  = 1;                //Enable or Disable PastPapers in Header
$header_centres     = 1;                //Enable or Disable Centres in Header
$header_contact_us  = 1;                //Enable or Disable Contact Us in Header

$display_results    = 1;                //Enable or Disable displaying Results
$display_timetable  = 1;                //Enable or Disable displaying TimeTable
$display_centres    = 1;                //Enable or Disable displaying Centres
$display_committee  = 1;                //Enable or Disable displaying Examination Committee in Contact Us
$display_sponsors   = 1;                //Enable or Disable displaying Sponsors in Home Page Banner (Slider)

$display_sponsor_footer = 1;            //Enable or Disable displaying Sponsor Advertisment in the Footer Section of Home Page
$display_sponsor_website_facebook = 0;  //Enable or Disable displaying button links to website and facebook page of the Sponsor in the Footer Section of Home Page - (Keep disabled if links to both website and facebook page are not required)


/* ------------------- TimeTable ------------------- */

$date1 = "2019-07-05";                  //Date of Day-1 Examinations ----- Format: YYYY-MM-DD
$date2 = "2019-07-06";                  //Date of Day-2 Examinations ----- Format: YYYY-MM-DD
$date3 = "2019-07-08";                  //Date of Day-3 Examinations ----- Format: YYYY-MM-DD
$date4 = "2019-07-09";                  //Date of Day-4 Examinations ----- Format: YYYY-MM-DD
$date5 = "2019-07-11";                  //Date of Day-5 Examinations ----- Format: YYYY-MM-DD
$date6 = "2019-07-12";                  //Date of Day-6 Examinations ----- Format: YYYY-MM-DD

$time_part1 = "2:30 P.M - 4:30 P.M";    //Time for Part-1 of Biology, Physics, Chemistry and ICT -------------------- Format: hh:mm A.M/P.M - hh:mm A.M/P.M -------- (Starting_Time - Ending_Time)
$time_part2 = "2:30 P.M - 5:30 P.M";    //Time for Part-1 of Combined Mathematics and Part-2 of all subjects -------- Format: hh:mm A.M/P.M - hh:mm A.M/P.M -------- (Starting_Time - Ending_Time)



/* ----------- Sponsors - Home Page Banner -------------- */

$Sponsors  = array (array('name' => 'Informatics Institute of Technology', 'type' => 'Sponsor', 'logo' => 'iit_logo.png'),

                    array('name' => '', 'type' => 'Main Sponsor', 'logo' => ''),

                    array('name' => '', 'type' => 'Co-Sponsor', 'logo' => '')

                    );



/* ----------- Sponsor Advertisement - Home Page Footer (only one sponsor advertisement) -------------- */

$footer_sponsor_name        = "Informatics Institute of Technology";        //Name of the Sponsor - ex: IDM Nations Campus
$footer_sponsor_type        = "Sponsor";                                    //Type of Sponsor - ex: Sponsor / Main Sponsor / Co-Sponsor
$footer_sponsor_logo        = "iit_logo_footer.png";                        //Sponsor Logo Image File Name - ex: idm_logo.png
$footer_sponsor_telephone   = "";                                           //Telephone Number of Sponsor - ex: 0774419901
$footer_sponsor_website     = "";                                           //Website Address of the Sponsor - ex: http://www.idmedu.lk/
$footer_sponsor_facebook    = "";                                           //Facebook Page Address of the Sponsor - ex: https://www.facebook.com/idmnc/



/* ----------- Examination Committee -------------- */

$Committee  = array(array('name' => 'T. Rajinthan', 'telephone' => '0775132189', 'department' => 'Computer Science & Engineering', 'img' => 'c0.jpg', 'post' => 'President '),

                    array('name' => 'G. Arudshankar', 'telephone' => '0774088956', 'department' => 'Civil Engineering', 'img' => 'c1.jpg', 'post' => 'Vice President'),

                    array('name' => 'K. Thulaanchan', 'telephone' => '0779826916', 'department' => 'Material Science & Engineering', 'img' => 'c2.jpg', 'post' => 'Secretary '),

                    array('name' => 'P. Ratheesan', 'telephone' => '0769915351', 'department' => 'Electrical Engineering', 'img' => 'c3.jpg', 'post' => 'Vice Secretary'),

                    array('name' => 'V. Nishothan', 'telephone' => '0773949123', 'department' => 'Computer Science & Engineering', 'img' => 'c4.jpg', 'post' => 'Treasurer'),

                    array('name' => 'W. Tharsanen', 'telephone' => '0775215539', 'department' => 'Material Science & Engineering', 'img' => 'c5.jpg', 'post' => 'Coordinator ')
                    );

?>