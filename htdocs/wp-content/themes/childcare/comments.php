<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'childcare' ); ?></p>
	<?php return; endif; ?>
         <?php if ( have_comments() ) : ?>
					
				<div class="comment_title"><h3><i class="fa fa-comments"></i>
				<?php echo comments_number(__('No Comments','childcare'), __('1 Comment','childcare'), '% Comments'); ?>
				</h3></div>
				
			<div class="media comment_box">
							<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  
									endif; 
									wp_list_comments( array( 'callback' => 'childcare_comment' ) ); ?>
			</div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'childcare' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'childcare' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'childcare' ) ); ?></div>
		</nav>
		<?php endif; 
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : 
        _e("~~||~~Comments Are Closed~~||~~",'childcare');
		?>
	<?php endif; ?>
	<?php if ('open' == $post->comment_status) : ?>
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e("You must be",'childcare'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e("logged in",'childcare')?></a> <?php _e('to post a comment','childcare'); ?>
</p>
<?php else : ?>
	<div class="comment_form_section">
	<?php  
	  $fields=array(
		'author' => '<input type="text" name="author" id="author" class="form-control form-blog" placeholder="'.esc_attr__('Full-Name','childcare').'">',
		'email' => '<input type="text" name="email" id="email" class="form-control form-blog" placeholder="'.esc_attr__('Email Address','childcare').'">',
	);
		$defaults = array(
		'fields'=> apply_filters( '', $fields ),
		'comment_field'=> '<textarea class="form-control form-blog-message" id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_attr__('Comment','childcare').'"></textarea>',		
		'logged_in_as' => '<p class="logged-in-as">' . esc_html__( "Logged in as ",'childcare' ).'<a href="'. admin_url( 'profile.php' ).'">'.$user_identity.'</a>'. '<a href="'. wp_login_url( esc_url(get_permalink()) ).'" title='.esc_attr__("Log out of this account","childcare").'>'.esc_attr__(" Log out?",'childcare').'</a>' . '</p>',
		'title_reply_to' => __( 'Leave a Reply to %s','childcare'),
		'class_submit' => 'min-btn btn btn-primary',
		'label_submit'=>__( 'SEND COMMENT','childcare'),
		'comment_notes_before'=> '',
		'comment_notes_after'=>'',
		'title_reply'=> '<h2>'.__('LEAVE COMMENT','childcare').'</h2>',		
		'role_form'=> 'form',		
		);
	comment_form($defaults); ?>						
	</div>
<?php endif; 
	  endif;  ?>