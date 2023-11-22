<section id="terms" class="terms">

    <h2 class="terms__heading u-center-text"><?php if( get_field('terms_heading') ){  the_field('terms_heading'); } else { echo "Terms Heading goes in here"; } ?></h2>
    <div class="terms__underline"></div>
    <div class="container display-flex">
        <div class="terms__colleft">
            <h4>The Points</h4>
            <ul>
                <?php
                    // Pull in the scores from the leaderboard plugin (if the plugin is active)
                    $valid3 = true;
                    $SQL3 = "SELECT * FROM " . $wpdb->prefix . "lb_point_types order by menu_order";
                    $formData3 = $wpdb-> get_results($SQL3);
                    if (!$formData3) {
                    $valid3 = false;
                    }
                    if($valid3) {
                    foreach ($wpdb->get_results($SQL3) as $key => $row) {

                            if( function_exists( 'ah_leaderboard_admin_menu' ) ) {
                                echo "<li>";
                                echo $row->description;
                                echo "</li>";
                            } else {
                                echo "<li>Leaderboard plugin is NOT active</li>";
                            }
                        
                        } 
                    }
                    


                ?>
            </ul>




        </div>




        <div class="terms__colright">

                    <p><?php if( get_field('terms_content') ){  the_field('terms_content'); } else { echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce porta, lectus ut pulvinar commodo, nunc enim suscipit augue, dictum elementum risus velit id sem. Sed a orci molestie, rutrum arcu in, molestie risus. Vestibulum cursus sapien eu orci tincidunt, non ullamcorper libero feugiat. Nam erat elit, eleifend eget ex ac, accumsan condimentum magna. In accumsan, nibh non tempus luctus, risus massa tempus nunc, et efficitur neque nulla sit amet sem. Cras sit amet arcu metus. Vivamus auctor vitae diam ut fringilla. Maecenas a dolor eu nisi vehicula molestie at et justo."; } ?></p>

        </div>
    </div>
</section>

<section class="four-pictures">
    <div class="container display-flex">
        <div class="four-pictures__col">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/four-pictures-1.jpg" alt="Soccer Incentive">
        </div>
        <div class="four-pictures__col">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/four-pictures-2.jpg" alt="Soccer Incentive">
        </div>
        <div class="four-pictures__col">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/four-pictures-3.jpg" alt="Soccer Incentive">
        </div>
        <div class="four-pictures__col">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/four-pictures-4.jpg" alt="Soccer Incentive">
        </div>
    </div>
</section>