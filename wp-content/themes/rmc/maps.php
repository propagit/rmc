<?php
/**
 * Template Name: Map
 */
$address = $_SERVER['QUERY_STRING'];
?>

<iframe width="600" height="450" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?q=<?=$address;?>&key=<?=GOOGLE_API_KEY;?>"></iframe>




