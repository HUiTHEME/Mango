<?php get_header(); ?>
<section class="index_area">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="catbox">
                    <div class="cat_head">
                        <?php z_taxonomy_image(NULL, array(180, 180,true)); ?>
                        <div class="cat_head_r">
                            <h2><i class="bi bi-hash me-1"></i><?php single_cat_title(); ?></h2>
                            <p><?php echo category_description();?></p>
                        </div>
                    </div>
                    <div class="post_box">
                        <?php while( have_posts() ): the_post(); ?>
                            <?php include('excerpt.php') ?>
                        <?php endwhile; ?>
                    </div>
                    <?php get_ds_posts_nav(); ?>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>