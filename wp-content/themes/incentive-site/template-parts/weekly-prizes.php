<section id="weekly-prizes" class="weekly-prizes u-center-text">

    <?php if( get_field('prizes_panel_title') ){ ?>
        <h2 class="weekly-prizes__heading"><?php the_field('prizes_panel_title'); ?></h2>
    <?php } else { ?>
        <h2 class="weekly-prizes__heading">Prizes Title Here</h2>
    <?php } ?>

    
    <div class="weekly-prizes__underline"></div>
    <h5 class="weekly-prizes__subheading"><i class="fas fa-award"></i> 1st: <?php if( get_field('first_prize') ){ the_field('first_prize'); } else { echo "Prizes First Title Here"; } ?></h5>
    <h5 class="weekly-prizes__subheading"><i class="fas fa-crown"></i> 2nd: <?php if( get_field('second_prize') ){ the_field('second_prize'); } else { echo "Prizes Second Title Here"; } ?></h5>
    <h5 class="weekly-prizes__subheading"><i class="fas fa-medal"></i> 3rd: <?php if( get_field('third_prize') ){ the_field('third_prize'); } else { echo "Prizes Third Title Here"; } ?></h5>

    <br>
    
    <h5 class="weekly-prizes__subheading"><i class="fas fa-trophy"></i> Overall prize: <?php if( get_field('overall_prize') ){ the_field('overall_prize'); } else { echo "Overall Prize Description Goes In Here"; } ?></h5>

    

    <h4 class="weekly-prizes__headingsmall"><?php if( get_field('prizes_panel_subtitle') ){ the_field('prizes_panel_subtitle'); } else { echo "Subtitle goes in here"; } ?></h4>

    <div class="weekly-prizes__underline"></div>

    
    <?php if( get_field('winners_text_1') ){ echo "<p>" . get_field('winners_text_1') . "</p>"; } else { echo "xxx"; } ?>

    <?php if( get_field('winners_text_2') ){ echo "<p>" . get_field('winners_text_2') . "</p>"; } else { echo ""; } ?>

    <?php if( get_field('winners_text_3') ){ echo "<p>" . get_field('winners_text_3') . "</p>"; } else { echo ""; } ?>

    <?php if( get_field('winners_text_4') ){ echo "<p>" . get_field('winners_text_4') . "</p>"; } else { echo ""; } ?>

    <?php if( get_field('winners_text_5') ){ echo "<p>" . get_field('winners_text_5') . "</p>"; } else { echo ""; } ?>


</section>