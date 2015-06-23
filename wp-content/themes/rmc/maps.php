<?php

$address = $_GET['address'];
$postcode = $_GET['postcode'];
$name = $_GET['name'];
$state = $_GET['state'];
$suburb = $_GET['suburb'];

$maps_args = array(
       'address' => '143 Palmer Street' . ',' . 'Richmond' . ',' . 'VIC',
        'width' => 300,
        'height' => 300,
        'id' => 'the_map',
        'zoom' => 15,
        'title' => 'Richmond Mitre 10',
        'hidepanning' => 'false',
        'hidescale' => 'false',
        'scrollwheel' => 'true'
);

flexmap_show_map($maps_args);?>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.0043113306147!2d144.951892!3d-37.813368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d48cc9e2af9%3A0x234c05580a2d190a!2s585+La+Trobe+St%2C+Melbourne+VIC+3000!5e0!3m2!1sen!2sau!4v1434986204776" width="600" height="450" frameborder="0" style="border:0"></iframe>

