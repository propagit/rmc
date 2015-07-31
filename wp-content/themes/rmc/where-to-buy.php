<?php
/**
 * Template Name: Where To Buy
 */
get_header();
?>
<div class="container-fluid locations-wrap results">
    <div class="container locations-content">


        <div class="store-wrap bg-aus-map">
            <div class="overlay push fw">
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
                <div class="locations-details-wrap col-xs-12 x-border">
                    <div class="locations-details-header col-xs-12 hide" id="selected-location-bar">

                    </div>
                    <div class="locations-details col-xs-12" id="stores">
                        <h2 class="hide">Enter your suburb or postcode above to find a store near you</h2> 
                    </div>


                    <div class="locations-details-header location-details-header-close col-xs-12 hide" id="surrounding-location-bar">

                    </div>

                    <div class="locations-details location-details-close col-xs-12" id="surrounding-stores">

                    </div>


                </div>
            </div><!--overlay-->
        </div>
       	<hr id="supplier-hr">

        <h1 class="push fw" style="margin-top:60px;">RMC Suppliers</h1>
        <h3>Find RMC products at a store near you</h3>

        <div class="suppliers">
            <?php
            if (have_rows('suppliers', 'option')) {
                while (have_rows('suppliers', 'option')) {
                    the_row();
                    #$name = get_sub_field('franchise_name', 'option');
                    $image = get_sub_field('supplier_logo', 'option');
                    #$desc = get_sub_field('description', 'option');
                    ?>
                    <span class="f-logo">
                        <img src="<?php echo $image['url']; ?>"/>
                    </span>
                    <?php
                } # while
            } # if
            ?>

        </div> 

    </div>
</div>

<div id="loading" class="hide"><div class="loading"><i class="fa fa-cog fa-spin"></i></div></div>

<script>
    $(document).ready(function () {
        $('.fancybox-media').fancybox({
            'openEffect': 'none',
            'closeEffect': 'none',
            'type': 'iframe',
            maxHeight: 466,
            width: 600,
            helpers: {
                media: {}
            }
        });
    });

    var loading = $('#loading').html();

    $(function () {
        $('#select-location').keyup(function () {
            get_locations($(this).val());
        });
        $('.location-search-icon').click(function () {
            get_locations($('#selected-postcode').val());
        });

        $(document).on('click', '#search-results li', function () {
            var $this = $(this);
            $('.locations-details-wrap').removeClass('x-border');
            $('#supplier-hr').addClass('hide-hr');
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

    function get_locations(keyword) {
        if (keyword.length >= 3) {
            $('#search-results').html('<li>' + loading + '</li>').removeClass('hide');
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                method: 'POST',
                data: {
                    action: 'get_locations',
                    keyword: keyword

                }
            }).done(function (response) {
                $('#search-results').html(response).removeClass('hide');
            })
        }
    }

    function populate_location_bar() {
        var p = $('#selected-postcode').val();
        var s = $('#selected-suburb').val();
        var st = $('#selected-state').val();

        $('#selected-location-bar').html('<h2>Where to buy in ' + s + ' ' + st + ' ' + p + '</h2>').removeClass('hide');
    }

    function populate_surrounding_location_bar() {
        var p = $('#selected-postcode').val();
        var s = $('#selected-suburb').val();
        var st = $('#selected-state').val();

        $('#surrounding-location-bar').html('<h2>Where to buy near ' + s + ' ' + st + ' ' + p + '</h2>').removeClass('hide');
    }

    function get_stores() {
        $('#stores').html(loading);
        $('#selected-location-bar').addClass('hide');
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            method: 'POST',
            data: {
                action: 'get_stores',
                suburb: $('#selected-suburb').val(),
                postcode: $('#selected-postcode').val()

            }
        }).done(function (response) {
            populate_location_bar();
            $('#stores').html(response);
            $('.store-wrap').addClass('bg-25').removeClass('bg-50');
        })
    }

    function get_surrounding_stores() {
        $('#surrounding-stores').html(loading);
        $('#surrounding-location-bar').addClass('hide');
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            method: 'POST',
            data: {
                action: 'surrouding_stores',
                lat: $('#selected-lat').val(),
                lon: $('#selected-lon').val(),
                suburb: $('#selected-suburb').val(),
                postcode: $('#selected-postcode').val()

            }
        }).done(function (response) {
            populate_surrounding_location_bar();
            $('#surrounding-stores').html(response);
        })

    }
</script>

<?php
get_footer();
?>
