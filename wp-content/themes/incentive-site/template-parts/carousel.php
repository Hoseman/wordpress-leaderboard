<section class="carousel">
    <div class="carousel__content">


    <?php if( get_field('main_carousel_subheading') ){ ?>
        <h4 class="carousel__subheading"><?php the_field('main_carousel_subheading'); ?></h4>
    <?php } else { ?>
        <h4 class="carousel__subheading">Carousel Subheading</h4>
    <?php } ?>


    <?php if( get_field('main_carousel_heading') ){ ?>
        <h1 class="carousel__heading"><?php the_field('main_carousel_heading'); ?></h1>
    <?php } else { ?>
        <h1 class="carousel__heading">CAROUSEL HEADING</h1>
    <?php } ?>

        
    <div class="carousel__underline"></div>


    <?php if( get_field('main_carousel_content') ){ ?>
        <p class="carousel__text"><?php the_field('main_carousel_content') ?></p>
    <?php } else { ?>
        <p class="carousel__text">Scores long description goes in here!</p>
    <?php } ?>



    <?php if( get_field('main_carousel_button') ){ ?>
        <a class="carousel__btn" href="<?php the_field('main_carousel_button_link') ?>"><?php the_field('main_carousel_button'); ?></a>
    <?php } else { ?>
        <a class="carousel__btn" href="#the-leaderboard">SCORES LINK HERE</a>
    <?php } ?>      


        


        <?php
            if (function_exists( 'display_ach_ticker' )) {
                echo do_shortcode( '[ach-ticker/]' );
            }
            else {
                echo "<span class='ticker-not-installed'><h3>Please install the Leaderboard News Ticker!</h3></span>";	
            }
        ?>

    </div>
    <?php $carousel_image = get_field('main_carousel_background_image'); ?> 
    <img class="carousel__img" alt="<?php echo $carousel_image['alt']; ?>" src="<?php echo $carousel_image['url']; ?>">

</section>