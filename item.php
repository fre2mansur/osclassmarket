<?php
if(osc_item_is_spam() || osc_premium_is_spam()) {
    osc_add_hook('header','market_nofollow_construct');
} else {
    osc_add_hook('header','market_follow_construct');
}

market_add_body_class('item');
osc_current_web_theme_path('header.php');
?>
<section id="item-detail" class="pt-4 pb-4 gray-bg">
	<div class="container">
    	<div class="row">
            <div class="col-md-2 d-none d-md-block">
            	<img alt="<?php echo osc_item_title(); ?>" src="<?php echo item_default_image_url(); ?>" class="img-fluid rounded">
            </div>
            <div class="col-md-10">
            	<div class="col-7 float-left">
                    <h5 class="mb-0"><strong><a class="text-dark" href="<?php echo osc_item_url();?>"><?php echo osc_item_title();?></a></strong></h5>
                    <p class="mb-1">Version: <?php echo item_version(); ?> | Licence: Free | Author: <a href="<?php echo osc_user_public_profile_url(osc_item_user_id());?>"><?php echo osc_item_contact_name();?></a></p>

                    <p class="mb-0"><?php echo osc_highlight(strip_tags(osc_item_description()), 100); ?></p>
                    <p class="mb-0 text-secondary"><small><?php echo osc_item_views(); ?> views | X downloads</small></p>
                </div>
              	<div class="col-5 ml-auto">
                   	<div class="buttons mt-4">
                        <?php if(osc_is_admin_user_logged_in()){ ?>
                        	<button class="btn btn-info">Demo</button>
                        <?php } ?>
                        <a href="<?php echo download_url(); ?>" class="btn btn-dark">Download</a>
                    </div>
            	</div>
            </div>
         </div>
	</div>
</section>
<section id="item-detail" class="pt-4 pb-4">
	<div class="container">
    	<div class="row">
        	<div class="col-md-8">
            	<div class="content">
                	<h2><?php echo osc_item_title();?></h2>
            	        <div class="row col-12">
                            <?php if(osc_count_item_resources() > 0) { ?>
                                <h4 class="mt-3">Screenshots</h4>
                                <div class="carousel slide mb-3" id="gallery" data-ride="carousel" data-interval="false">
                                    <ol class="carousel-indicators">
                                        <?php for($i = 0; $i < osc_count_item_resources(); $i++) { ?>
                                            <li data-target="#gallery" data-slide-to="<?php echo $i; ?>"<?php if($i === 0) { echo ' class="active"'; } ?>></li>
                                        <?php } ?>
                                        </ol>
                                    <div class="sgallery carousel-inner text-center">
                                        <?php for($i = 1; osc_has_item_resources(); $i++) { ?>
                                            <?php $title = $i.'/'.osc_count_item_resources().' - '.osc_item_title(); ?>
                                            <div class="carousel-item<?php if($i === 1) { echo ' active'; } ?>">
                                                <a href="<?php echo osc_resource_url(); ?>" ><img src="<?php echo osc_resource_url(); ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" class="img-fluid"/></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#gallery" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#gallery" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
              		<?php echo osc_item_description(); ?>
                    <br /><br />
                    <?php osc_run_hook('list_questions');?>
                    <?php echo osc_run_hook('questions_comment'); ?>
                </div>
            </div>

            <div class="col-md-4">
            	<div class="card p-2 text-center">
                	<div class="profile-picture" style="margin: 0 auto;">
                		<?php //echo show_avatar(osc_item_user_id()); ?>
                    </div>
                    <div class="author">
                     <h5><strong><a class="text-dark" href="<?php echo osc_user_public_profile_url();?>"><?php echo osc_item_contact_name();?></a></strong> </h5>
                      <?php if(osc_is_admin_user_logged_in()){ ?>
                      <h5><small><?php echo user_total_plugins(osc_item_user_id()); ?> plugins | <?php echo user_total_themes(osc_item_user_id()); ?> Themes  <?php if(osc_is_admin_user_logged_in()){ ?>| 140 Posts <?php } ?></small></h5>
                      <p><button class="btn btn-danger btn-sm">Follow</button> 120 followers <br /></p>
                      <button class="btn btn-success">Job offer</button>
                      <?php } ?>
                 </div>

                 <?php if(osc_get_preference('donation_link', 'donation_link_'.osc_item_user_id()) !=''){ ?>
                 <a target="_blank" href="<?php echo osc_get_preference('donation_link', 'donation_link_'.osc_item_user_id()); ?>" class="btn btn-primary mb-1">Donate</a>
                 <?php } ?>
            </div>

        </div>
    </div>
</section>
<?php if(osc_count_item_resources() > 0) { ?>
    <script>
    $(function() {
        var sgallery = $('.sgallery a').simpleLightbox();
        // Not sure if required. Moves bootstrap carousel when lightbox carousel moved.
        //     $('.sgallery a').on('prev.simplelightbox', function () {
        //         $('#gallery').carousel('prev');
        //     });
        //     $('.sgallery a').on('next.simplelightbox', function () {
        //         $('#gallery').carousel('next');
        //     });
        // });
    </script>
<?php } ?>
<?php osc_current_web_theme_path('footer.php'); ?>
