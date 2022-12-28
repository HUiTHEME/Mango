<?php get_header(); ?>


<?php if (get_option( 'sticky_posts' )) { ?>
<section class="index_banner">
    <div class="container">
        <div id="banner" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php
                $i = 0;
                $sticky = get_option( 'sticky_posts' );
                rsort( $sticky );
                $sticky = array_slice( $sticky, 0, 5 );
                query_posts( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
                while ( have_posts() ) : the_post(); ?>
                    <button type="button" data-bs-target="#banner" data-bs-slide-to="<?php echo $i ?>" class="<?php if ( $i == '0') { echo 'active'; } ?>"></button>
                <?php $i++; endwhile; wp_reset_query();?>
            </div>
            <div class="carousel-inner">
                <?php
                $i = 0;
                $sticky = get_option( 'sticky_posts' );
                rsort( $sticky );
                $sticky = array_slice( $sticky, 0, 5 );
                query_posts( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
                while ( have_posts() ) : the_post(); ?>
                    <div class="carousel-item <?php if ( $i == '0') { echo 'active'; } ?>">
                        <a class="banlist" href="<?php the_permalink(); ?>">
                            <?php
                            if (wp_is_mobile()) { $w = 500 ; $h = 400; } else { $w = 900 ; $h = 350; }
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail(array($w, $h, true));
                            } else {
                                echo wp_get_attachment_image( get_theme_mod('ds_nopic'), array($w, $h, true) );
                            }
                            ?>
                            <h2><?php the_title(); ?></h2>
                            <i>置顶精彩</i>
                        </a>
                    </div>
                <?php $i++; endwhile; wp_reset_query();?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev"><i class="bi bi-chevron-left"></i></button>
            <button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next"><i class="bi bi-chevron-right"></i></button>
        </div>
    </div>
</section>
<?php } ?>

<section class="index_area">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="post_box">
                    <?php while( have_posts() ): the_post(); ?>
                        <?php include('excerpt.php') ?>
                    <?php endwhile; ?>
                </div>
                <?php get_ds_posts_nav(); ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<section class="links mobile_none">
    <div class="container">
        <span>友情链接：</span>
        <?php wp_list_bookmarks( 'title_li=&categorize=0&before=&after=' ); ?>
    </div>
</section>

<?php get_footer(); ?>