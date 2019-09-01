<?php echo osc_current_web_theme_path('header.php'); ?>
<section id="user-header" style="background: #f4f4f4;" class="pt-4 pb-4">
	<div class="container">
    	<div class="row col-md-12">
            <div class="button-group float-right">
                <a href="<?php echo osc_user_profile_url(); ?>" class="btn btn-primary disabled">Edit account</a>
                <?php if(dev(osc_logged_user_id())) { ?>
					<a href="<?php echo osc_user_list_items_url(); ?>" class="btn btn-primary">My uploads</a>
					<a href="<?php echo osc_user_public_profile_url(); ?>" class="btn btn-primary">My profile</a>
				<?php } ?>
            </div>
         </div>
    </div>
</section>

<section id="edit-account" class="col-md-12 mt-4">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<h2><?php _e('Edit account', 'market'); ?></h2>
                <?php //osc_run_hook('user_profile_form', osc_user()); ?>
                <form action="<?php echo osc_base_url(true); ?>" method="post">
                    <input type="hidden" name="page" value="user" />
                    <?php $user = User::newInstance()->findByPrimaryKey(osc_logged_user_id());?>
                    <?php if($user['b_company']==1) {?>
                    <input id="b_company" type="hidden" value="1" name="b_company">
                    <?php } else { ?>
                    <input id="b_company" type="hidden" value="0" name="b_company">
                    <?php }?>
                    <input type="hidden" name="action" value="profile_post" />

                    <div class="form-group">
                        <label class="control-label" for="name"><?php _e('Name', 'market'); ?></label>
                      	<input id="s_name" class="form-control" type="text" value="<?php echo osc_user_name();?>" name="s_name">
                    </div>

                   	<div class="form-group">
                    	<label class="control-label" for="s_info"><?php _e('About you', 'market'); ?></label>
                      	<textarea id="s_infoen_US" class="form-control" rows="5" name="s_info[en_US]"><?php echo osc_user_info();?></textarea>
                   	</div>

                	<?php if(dev(osc_logged_user_id())){ ?>
	                   	<div class="form-group">
	                    	<label class="control-label" for="name"><?php _e('Paypal donation page link', 'market'); ?></label>
	                      	<input id="donation_link" class="form-control" type="url" value="<?php echo get_donation_link(osc_user_id())?>" name="donation_link">
							<small>Leave empty if you don't want donation option</small>
	                    </div>
                   	<?php } ?>

					<div class="form-group">
						<div class="controls">
							<?php osc_run_hook('user_form', osc_user()); ?>
						</div>
					</div>

                    <div class="form-group">
                       	<button type="submit" class="btn btn-dark"><?php _e("Update", 'market');?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section id="edit-email-pass" class="col-md-12 mt-4">
	<div class="container">
    	<div class="row">
			<div class="col-md-6">
				<h2><?php _e('Change e-mail', 'market'); ?></h2>
				<form id="change-email" action="<?php echo osc_base_url(true); ?>" method="post">
					<input type="hidden" name="page" value="user" />
					<input type="hidden" name="action" value="change_email_post" />

					<div class="form-group">
						<label class="control-label" for="email"><?php _e('Current e-mail', 'market'); ?> *</label>
						<div class="controls">
							<input type="email" class="form-control" name="new_email" id="new_email" value="<?php echo osc_logged_user_email(); ?>" autocomplete="off" disabled />
						</div>
					</div>

					<div class="form-group">
						<label class="control-label" for="email"><?php _e('New e-mail', 'market'); ?> *</label>
						<div class="controls">
							<input type="email" class="form-control" name="new_email" id="new_email" value="" autocomplete="off" />
						</div>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-dark"><?php _e("Update", 'market');?></button>
					</div>
				  </form>
			  </div>
			<div class="col-md-6">
				<h2><?php _e('Change password', 'market'); ?></h2>
				<form action="<?php echo osc_base_url(true); ?>" method="post">
					<input type="hidden" name="page" value="user" />
					<input type="hidden" name="action" value="change_password_post" />

					<div class="form-group">
						<label class="control-label" for="password"><?php _e('Current password', 'market'); ?> *</label>
						<div class="controls">
							<input type="password" class="form-control" name="password" id="password" value="" autocomplete="off" />
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col">
							<label class="control-label" for="new_password"><?php _e('New password', 'market'); ?> *</label>
							<div class="controls">
								<input type="password" class="form-control" name="new_password" id="new_password" value="" autocomplete="off" />
							</div>
						</div>

						<div class="form-group col">
							<label class="control-label" for="new_password2"><?php _e('Repeat new password', 'market'); ?> *</label>
							<div class="controls">
								<input type="password" class="form-control" name="new_password2" id="new_password2" value="" autocomplete="off" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-dark"><?php _e("Update", 'market');?></button>
					</div>
				</form>
			</div>
        </div>
    </div>
</section>
<?php echo osc_current_web_theme_path('footer.php'); ?>
