<div class="item row mb-3">
    <div class="col-md-3 d-none d-md-block">
        <img style="width:150px !important" alt="Card image cap" src="<?php echo item_default_image_url(); ?>" class="card-img-top">
    </div>
    <div class="col-md-9">
       <h5><b><a class="text-dark" href="<?php echo osc_item_url();?>"><?php echo osc_highlight(osc_item_title(), '50');?></a></b> <br /><small>by: <a href="<?php echo osc_user_public_profile_url(osc_item_user_id());?>"><?php echo osc_item_contact_name();?></a> </small></h5>
      <p class="mb-0"><?php echo osc_highlight( strip_tags( osc_item_description()), 50) ; ?></p>
      <p class="mb-0 text-secondary"><small><?php echo osc_item_views(); ?> Views</small></p>
            <?php if($admin){ ?>
                    <span class="admin-options">
                        <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'market'); ?></a>
                        <span>|</span>
                        <a class="delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'bender')); ?>')" href="<?php echo osc_item_delete_url();?>" ><?php _e('Delete', 'market'); ?></a>
                        <?php if(osc_item_is_inactive()) {?>
                        <span>|</span>
                        <a href="<?php echo osc_item_activate_url();?>" ><?php _e('Activate', 'market'); ?></a>
                        <?php } ?>
                    </span>
                <?php } ?>
    </div>
    <div class="clearfix"><hr/></div>
</div>
