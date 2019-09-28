<!DOCTYPE html>
<?php osc_current_web_theme_path('header.php'); ?>
<section id="search-header">
    <div class="jumbotron jumbotron-fluid text-center bg-info text-white mb-0">
        <div class="container">
            <h1>Osclass Community Market</h1>
            <p>Free Osclass plugins and themes.</p>
            <div class="btn-group btn-group-lg" role="group" aria-label="...">
                <a href="https://forums.osclasscommunity.com/Osclass_380_NoMarket.zip" class="btn btn-lg btn-dark">Osclass (NoMarket)</a>
                <a href="https://github.com/navjottomer/Osclass/archive/master.zip" class="btn btn-lg btn-secondary">Osclass 3.8 beta 2</a>
            </div>
        </div>
    </div>
</section>

<!--<section id="top-downloads">
     <div class="container">
     	<h2 class="text-center">Top Downloads</h2>
        <br />
        <div class="row">
        	<div class="col-6">
              	<div class="item">
                	<div class="col-3 float-left">
                  		<img alt="Card image cap" src="https://market.osclass.org/oc-content/themes/osclass_org/images/no_photo_plugin_square.gif" class="card-img-top">
                    </div>
                    <div class="col-9">
                       <h5><strong><a class="text-dark" href="">Avatar plugin</a></strong> <br /><small>by: <a href="">Media.dmj</a></small></h5>
                      <p class="mb-0">Avatar plugin can upload the pro...</p>
                      <p class="mb-0 text-secondary"><small>120 views | 2028 Downloads</small></p>
                    </div>
                    <hr />
                </div>
              </div>
              <div class="col-6">
              	<div class="item">
                	<div class="col-3 float-left">
                  		<img alt="Card image cap" src="https://market.osclass.org/oc-content/themes/osclass_org/images/no_photo_plugin_square.gif" class="card-img-top">
                    </div>
                    <div class="col-9">
                       <h5><strong><a class="text-dark" href="">Avatar plugin</a></strong> <br /><small>by: <a href="">Media.dmj</a></small></h5>
                      <p class="mb-0">Avatar plugin can upload the pro...</p>
                      <p class="mb-0 text-secondary"><small>120 views | 2028 Downloads</small></p>
                    </div>
                    <hr />
                </div>
              </div>
              <div class="col-6">
              	<div class="item">
                	<div class="col-3 float-left">
                  		<img alt="Card image cap" src="https://market.osclass.org/oc-content/themes/osclass_org/images/no_photo_plugin_square.gif" class="card-img-top">
                    </div>
                    <div class="col-9">
                       <h5><strong><a class="text-dark" href="">Avatar plugin</a></strong> <br /><small>by: <a href="">Media.dmj</a></small></h5>
                      <p class="mb-0">Avatar plugin can upload the pro...</p>
                      <p class="mb-0 text-secondary"><small>120 views | 2028 Downloads</small></p>
                    </div>
                    <hr />
                </div>
              </div>
              <div class="col-6">
              	<div class="item">
                	<div class="col-3 float-left">
                  		<img alt="Card image cap" src="https://market.osclass.org/oc-content/themes/osclass_org/images/no_photo_plugin_square.gif" class="card-img-top">
                    </div>
                    <div class="col-9">
                       <h5><strong><a class="text-dark" href="">Avatar plugin</a></strong> <br /><small>by: <a href="">Media.dmj</a></small></h5>
                      <p class="mb-0">Avatar plugin can upload the pro...</p>
                      <p class="mb-0 text-secondary"><small>120 views | 2028 Downloads</small></p>
                    </div>
                    <hr />
                </div>
              </div>



         </div>
     </div>
</section>-->

<section id="recent-uploads" class="pt-4 pb-4 gray-bg">
    <div class="container">
     	<h2 class="text-center mb-4">Recently Uploaded</h2>
        <div class="row">
            <?php while(osc_has_latest_items()) { ?>
                <div class="col-md-6">
                  	<div class="item">
                    	<div class="col-3 float-left">
                            <img alt="<?php echo osc_item_title(); ?>" src="<?php echo item_default_image_url(); ?>" class="card-img-top">
                        </div>
                        <div class="col-9">
                            <h5 class="mb-0"><strong><a class="text-dark" href="<?php echo osc_item_url();?>"><?php echo osc_item_title(); ?></a></strong></h5>
                            <p class="mb-1">by: <a href="<?php echo osc_user_public_profile_url(osc_item_user_id());?>"><?php echo osc_item_contact_name();?></a></p>
                            <p class="mb-0"><?php echo osc_highlight( strip_tags( osc_item_description()), 25); ?></p>
                            <p class="mb-0 text-secondary"><small><?php echo get_downloads(osc_item_id()); ?> downloads</small></p>
                        </div>
                        <hr />
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php if(osc_is_admin_user_logged_in()){ ?> <!--Need to remove this condition later-->
<section id="top-developers" class="pt-4 pb-4">
	<div class="container">
     	<h2 class="text-center">Top Helping Developers</h2>
        <br />
        <div class="col-4 float-left">
            <div class="float-left pr-3">
                <img width="120" alt="Card image cap" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="rounded-circle">
            </div>
            <div class="">
                <h5><strong><a class="text-dark" href="">Media.dmj</a></strong> <br /><small>5 plugins | 8 Themes | 140 Posts</small></h5>
                 <p class="mb-0 text-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
            </div>
         </div>
         <div class="col-4 float-left">
            <div class="float-left pr-3">
                <img width="120" alt="Card image cap" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="rounded-circle">
            </div>
            <div class="">
                <h5><strong><a class="text-dark" href="">Media.dmj</a></strong> <br /><small>5 plugins | 8 Themes | 140 Posts</small></h5>
                 <p class="mb-0 text-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
            </div>
         </div>
         <div class="col-4 float-left">
            <div class="float-left pr-3">
                <img width="120" alt="Card image cap" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="rounded-circle">
            </div>
            <div class="">
                <h5><strong><a class="text-dark" href="">Media.dmj</a></strong> <br /><small>5 plugins | 8 Themes | 140 Posts</small></h5>
                 <p class="mb-0 text-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
            </div>
         </div>
         <div class="clearfix"></div>
    </div>
</section>
<?php } ?>
<?php osc_current_web_theme_path('footer.php');?>
