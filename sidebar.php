<?php if (wp_is_mobile()) { } else { ?>
<div class="col-lg-4">
    <div class="sidebar_sticky">
        <?php
        if ( is_home() || is_category() || is_tag() || is_search() ) {
            dynamic_sidebar( 'index_widgets' );
        }
        else if ( is_single() ) {
            dynamic_sidebar( 'single_widgets' );
        }
        else {
        }
        ?>
    </div>
</div>
<?php } ?>