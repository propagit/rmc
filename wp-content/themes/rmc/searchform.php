<?php $search_text = "search"; ?> 
               <!-- <form method="get" id="searchform"  
                      action="<?php bloginfo('home'); ?>/"> 
                    <input type="text" value="<?php echo $search_text; ?>"  
                           name="s" id="s"  
                           onblur="if (this.value == '')
                                   {
                                       this.value = '<?php echo $search_text; ?>';
                                   }"  
                           onfocus="if (this.value == '<?php echo $search_text; ?>')
                                   {
                                       this.value = '';
                                   }" /> -->
               <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/search' ) ); ?>">
                    <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="search..."/>
                    <input type="hidden" id="searchsubmit" /> 
                    <i class="fa fa-search"></i>
                </form>


