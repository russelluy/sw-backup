<?php

    if(of_get_option('facebook_app_id') and of_get_option('facebook_comments')){
        echo '<div id="comments" class="comments-area comments-area-facebook">';
        echo '<div class="fb-comments" data-href="'.urlencode(get_permalink()).'" data-width="470" data-num-posts="10"></div>';
        echo '</div>';
    }else{

        if ( post_password_required() )
            return;
?>
        <div id="comments" class="comments-area">
     
        <?php if ( have_comments() ) : ?>
            <h3 class="comments-title">
                <i class="icon-comment-empty"></i>&nbsp;
                <?php
                    printf( _n('%d comment', '%d comments', get_comments_number(), 'swblog' ),
                        number_format_i18n( get_comments_number() ) );
                ?>
            </h3>
     
            <ol class="commentlist">
                <?php
                    wp_list_comments( array( 'callback' => 'swblog_comment' ) );
                ?>
            </ol><!-- .commentlist -->
     
            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through? If so, show navigation ?>
            <nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation clearfix">
                <div class="nav-previous"><i class="icon-left-open"></i>&nbsp;<?php echo get_previous_comments_link( __( 'Older Comments', 'swblog' ) ); ?></div>
                <div class="nav-next"><?php echo get_next_comments_link( __( 'Newer Comments', 'swblog' ) ); ?>&nbsp;<i class="icon-right-open"></i></div>
            </nav><!-- #comment-nav-below .site-navigation .comment-navigation -->
            <?php endif; ?>
     
        <?php endif; // have_comments() ?>
     
        <?php
            // If comments are closed and there are comments, let's leave a little note, shall we?
            if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
            <p class="nocomments"><?php _e( 'Comments are closed.', 'swblog' ); ?></p>
        <?php endif; ?>
     
        <?php comment_form(); ?>
</div><!-- #comments .comments-area -->
<?php } ?> 