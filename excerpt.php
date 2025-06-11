<div class="post_loop">
    <div class="post_loop_head">
        <div class="post_loop_head_author">
            <a class="images_author" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_avatar(get_the_author_meta('email'), 80); ?></a>
            <div class="images_author_name">
                <h3><?php the_author_meta('nickname'); ?></h3>
                <span><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . '前'; ?></span>
            </div>
        </div>
        <a class="post_loop_more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="bi bi-three-dots"></i></a>
    </div>
    <div class="post_loop_conter">
        <div class="post_loop_title_box">
            <h2 class="post_loop_title"><a class="stretched-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <?php if( get_theme_mod('ds_index_excerpt') ): ?>
            <p><?php echo wp_trim_words( get_the_content(), 80 ); ?></p>
            <?php endif; ?>
        </div>
        <?php
        $post_content = $post->post_content;
        $search_pattern = '/<img.*?src="(.*?)"/i';
        preg_match_all( $search_pattern, $post_content, $embedded_images );
        $show_count = count( $embedded_images[0] );
        ?>
        <div class="post_images post_img_<?php  if ($show_count <= '9') { echo $show_count; } else { echo '9'; } ?>">
        <?php
        $over = 8;
        for ( $i=0; $i < $show_count ;  ) {
        $pic_id = attachment_url_to_postid($embedded_images[1][$i]);
        ?>
        <?php if ( $i == '8' && $show_count > '8' ) {  ?>
            <a data-fancybox="post-<?php echo $post->ID ?>" href="<?php echo $embedded_images[1][$i] ?>" ><img src="<?php $data = wp_get_attachment_image_src($pic_id, array(340,340,true)); echo $data[0]; ?>"><b>+<?php echo $show_count - $i - 1 ?></b></a>
        <?php } else {  ?>
            <a data-fancybox="post-<?php echo $post->ID ?>" href="<?php echo $embedded_images[1][$i] ?>" ><img src="<?php $data = wp_get_attachment_image_src($pic_id, array(340,340,true)); echo $data[0]; ?>"></a>
        <?php } ?>
        <?php if( $i == $over ) break; $i++; } ?>
        </div>
        <div class="post_loop_tag"><?php the_tags( '<em><i class="bi bi-hash"></i>', '</em><em><i class="bi bi-hash"></i>', '</em>' ); ?></div>
        <div class="post_info_footer">
            <span class=""><i class="bi bi-chat-square-text-fill"></i><?php comments_popup_link ('0评论','1评论','%评论'); ?></span>
            <span class=""><i class="bi bi-eye-fill"></i><?php post_views('',''); ?>浏览</span>
            <span>
            <a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" class="specsZan <?php if(isset($_COOKIE['specs_zan_'.$post->ID])) echo 'done'; ?>">
                <i class="bi bi-heart-fill"></i>
                <em class="count"><?php if( get_post_meta($post->ID,'specs_zan',true) ){ echo get_post_meta($post->ID,'specs_zan',true); } else { echo '0'; }?></em>
            </a>
            </span>
        </div>
    </div>
</div>