<?php
/**
 * Template Name: Where To Buy
 */
get_header();


?>
<div class="container-fluid locations-wrap">
    <div class="container locations-content">
        <h1>Where To Buy</h1>
        <h3>Find RMC products close to you</h3>
        <div class="search-location col-sm-12">
            <input type="text" id="select-location" name="keyword" placeholder="enter your suburb or postcode..."/>
            <input type="hidden" id="selected-postcode">
            <input type="hidden" id="selected-suburb">
            <input type="hidden" id="selected-state">
            <input type="hidden" id="selected-lat">
            <input type="hidden" id="selected-lon">
            <i class="fa fa-search location-search-icon"></i>
            <div class="location-results">
            	<ul id="search-results" class="hide">
           
                </ul>
            </div>
        </div>
        <div class="locations-details-wrap col-xs-12">
            <div class="locations-details-header col-xs-12 hide" id="selected-location-bar">
     
            </div>
            <div class="locations-details" id="stores">
                <!--<div class="col-sm-4 location-part">
                    <h2>Richmond</br> Mitre 10</h2>
                    <p>143 - 153 Palmer Street,</br>
                        Richmond VIC 3121</br>
                        Australia</p>
                    <p class="location-mark"><i class="fa fa-map-marker"></i>
                        <a class="fancybox-media" href="<?php echo bloginfo('template_directory') . '/maps.php'; ?>"> View Map</a></p>
                </div>
                <div class="col-sm-4 location-part">
                    <h2>Richmond North</br> 
                        Martin's Mitre 10 Handy</h2>
                    <p>38 Victoria Street,</br>
                        Richmond North VIC 3121</br>
                        Australia</p>
                    <p class="location-mark"><i class="fa fa-map-marker"></i> View Map</p>
                </div>
                <div class="col-sm-4 location-part">
                    <h2>Richmond South</br>
                        Reece</h2>
                    <p>380 Victoria Street</br>
                        Richmond VIC 3121</br>
                        Australia</p>
                    <p class="location-mark"><i class="fa fa-map-marker"></i> View Map</p>
                </div>-->
            </div>
			
            
            <div class="locations-details-header location-details-header-close col-xs-12 hide" id="surrounding-location-bar">
     
            </div>
            
            <div class="locations-details location-details-close col-xs-12" id="surrounding-stores">

            </div>

			<!--
            <div class="locations-details-header location-details-header-close col-xs-12">
                <h2>Where to buy in - Richmond VIC 3181</h2>
            </div>
            <div class="locations-details location-details-close col-xs-12">
                <div class="col-sm-4 location-part">
                    <h2>Hawthorn</br>
                        Bunnings</h2>
                    <p>230 Burwood Rd</br>
                        Hawthorn VIC 3122</br>
                        Australia</p>
                    <p class="location-mark"><i class="fa fa-map-marker"></i> View Map</p>
                </div>
                <div class="col-sm-4 location-part">
                    <h2>Hawthorn East</br>
                        Masters</h2>
                    <p>742 Toorak Road</br>
                        Hawthorn East VIC 3123</br>
                        Australia</p>
                    <p class="location-mark"><i class="fa fa-map-marker"></i> View Map</p>
                </div>
                <div class="col-sm-4 location-part">
                    <h2>Prahran</br>
                        Chapel Street Hardware</h2>
                    <p>183 High Street</br>
                        Prahran VIC 3181</br>
                        Australia</p>
                    <p class="location-mark"><i class="fa fa-map-marker"></i> View Map</p>
                </div>
                <div class="col-sm-4 location-part">
                    <h2>Albert Park</br>
                        Bisbas Hardware</h2>
                    <p>196 Bridport St</br>
                        Albert Park VIC 3206</br>
                        Australia</p>
                    <p class="location-mark"><i class="fa fa-map-marker"></i> View Map</p>
                </div>
            </div>-->
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.fancybox-media').fancybox({
            'openEffect': 'none',
            'closeEffect': 'none',
            'type' : 'iframe',
            helpers: {
                media: {}
            }
        });
    });
	
$(function(){
	$('#select-location').keyup(function(){
		get_locations($(this).val());
	});
	$('.location-search-icon').click(function(){
		get_locations($('#selected-location').val());
	});
	
	$(document).on('click','#search-results li',function(){
		var $this = $(this);
		//console.log($this.html());
		$('#select-location').val($this.html());
		$('#selected-postcode').val($this.attr('data-postcode'));
		$('#selected-suburb').val($this.attr('data-suburb'));
		$('#selected-state').val($this.attr('data-state'));
		$('#selected-lat').val($this.attr('data-lat'));
		$('#selected-lon').val($this.attr('data-lon'));
		
		$(this).parent().addClass('hide');
		get_stores();
		get_surrounding_stores();
	});
});//ready	

function get_locations(keyword){
	if(keyword.length >= 3){
		$.ajax({
			url:'<?php echo admin_url('admin-ajax.php'); ?>',
			method:'POST',
			data:{
				action:'get_locations',
				keyword:keyword
					
			}
		}).done(function(response){
			$('#search-results').html(response).removeClass('hide');
		})
	}
}

function populate_location_bar(){
	var p = $('#selected-postcode').val();
	var s = $('#selected-suburb').val();
	var st = $('#selected-state').val();	
	
	$('#selected-location-bar').html('<h2>Where to buy in ' + s + ' ' + st + ' ' + p + '</h2>').removeClass('hide');
}

function populate_surrounding_location_bar(){
	var p = $('#selected-postcode').val();
	var s = $('#selected-suburb').val();
	var st = $('#selected-state').val();	
	
	$('#surrounding-location-bar').html('<h2>Where to buy near ' + s + ' ' + st + ' ' + p + '</h2>').removeClass('hide');
}

function get_stores(){
	$.ajax({
		url:'<?php echo admin_url('admin-ajax.php'); ?>',
		method:'POST',
		data:{
			action:'get_stores',
			suburb:$('#selected-suburb').val(),
			postcode:$('#selected-postcode').val()
				
		}
	}).done(function(response){
		populate_location_bar();
		$('#stores').html(response);
	})
}

function get_surrounding_stores(){
	$.ajax({
		url:'<?php echo admin_url('admin-ajax.php'); ?>',
		method:'POST',
		data:{
			action:'surrouding_stores',
			lat:$('#selected-lat').val(),
			lon:$('#selected-lon').val(),
			suburb:$('#selected-suburb').val(),
			postcode:$('#selected-postcode').val()
				
		}
	}).done(function(response){
		populate_surrounding_location_bar();
		$('#surrounding-stores').html(response);
	})
	
}
</script>

<?php
get_footer();
?>
