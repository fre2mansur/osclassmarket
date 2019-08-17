<?php
// meta tag robots
    osc_add_hook('header','market_nofollow_construct');
    osc_enqueue_script('jquery-validate');
    market_add_body_class('item item-post');
    $action = 'item_add_post';
    $edit = false;
    if(Params::getParam('action') == 'item_edit') {
        $action = 'item_edit_post';
        $edit = true;
    }
    if(Params::getParam('file') == 'remove') {
        delete_file(osc_item_id());
        osc_redirect_to(osc_item_edit_url());
    }
    ?>
<?php osc_current_web_theme_path('header.php') ; ?>
<section id="add-product" style="background: #f4f4f4;" class="pt-4 pb-4">
	<div class="container">
    	<div class="row">
            <div class="button-group float-right">
                <a href="<?php echo osc_user_public_profile_url(); ?>" class="btn btn-primary">My Profile</a> <a href="<?php echo osc_user_profile_url(); ?>" class="btn btn-primary ">Edit account</a> <a href="<?php echo osc_user_list_items_url(); ?>" class="btn btn-primary">My Uploads</a>
            </div>
         </div>
     </div>
</section>
<section id="add-product-content" class="pt-4 pb-4">
	<div class="container">
    	
    	<div class="row">
        	<div class="col-9">
        	<h2><?php _e('Add your Product', 'market'); ?></h2>
        	<form name="item" action="<?php echo osc_base_url(true);?>" method="post" enctype="multipart/form-data" id="item-post">
                <input type="hidden" name="action" value="<?php echo $action; ?>" />
                <input type="hidden" name="page" value="item" />
                <?php if($edit){ ?>
                    <input type="hidden" name="id" value="<?php echo osc_item_id();?>" />
                    <input type="hidden" name="secret" value="<?php echo osc_item_secret();?>" />
                <?php }?>
              	<div class="form-group">
                    <label class="control-label" for="select_1"><?php _e('Category', 'market'); ?></label>
                   	<?php ItemForm::category_select(null, null, __('Select a category', 'market')); ?>
                </div>
                     
                <div class="form-group">
                    <label class="control-label" for="title[<?php echo osc_current_user_locale(); ?>]"><?php _e('Title', 'market'); ?></label>
                    <input id="titleen_US" class="form-control" type="text" value="<?php echo osc_item_title(); ?>" name="title[en_US]">
                </div>
                <div class="form-group">
                	<label class="control-label" for="description[<?php echo osc_current_user_locale(); ?>]"><?php _e('Description', 'market'); ?></label>
                   	<textarea class="form-control" id="descriptionen_US" rows="10" name="description[en_US]"><?php echo osc_item_description(); ?></textarea>
               </div>
               <div class="form-group">
                    <label class="control-label" for="title[<?php echo osc_current_user_locale(); ?>]"><?php _e('Version', 'market'); ?></label>
                    <input class="form-control" type="text" value="<?php echo get_version(osc_item_id()); ?>" name="file_version">
                </div>
                <div class="form-group">
                    <label class="control-label" for="title[<?php echo osc_current_user_locale(); ?>]"><?php _e('Download link', 'market'); ?></label>
                    <input class="form-control" type="text" value="<?php echo get_file_link(osc_item_id()); ?>" name="file_link">
                </div>
                <?php if (!get_file(osc_item_id())){ ?>
                <div class="form-group">
                    <label class="control-label"><?php _e('or upload', 'market'); ?></label>
                    <input  type="file" name="zip_file">
                </div>
                <?php } else { ?>
                <div class="form-group">
                    <label class="control-label" for="title[<?php echo osc_current_user_locale(); ?>]"><?php _e('File', 'market'); ?></label>
                    <img width="25" src="<?php echo osc_current_web_theme_url("images/rar-icon.jpg"); ?>"> <?php echo get_file(osc_item_id()); ?> <a href="<?php echo osc_item_edit_url()."&file=remove";?>"><small>(Remove and update)</a>
                </div>
                    
               <?php }?>
                    
                           
                        <?php if( osc_images_enabled_at_items() ) { ?>
                            <div class="photo_container">
                                <div class="form-group">
                                    <label><?php _e('Add Screenshots'); ?> <small>(3 screenshots are mandatory)</small></label>
                                    <!--<div class="screenshots">
                                        <?php if($resources==null) { $resources = osc_get_item_resources(); };
                                            if($resources!=null && is_array($resources) && count($resources)>0) { ?>
                                                <div class="photos_div">
                                                <?php foreach($resources as $_r) { ?>
                                                    <div class="pull-left" id="<?php echo $_r['pk_i_id'];?>" fkid="<?php echo $_r['fk_i_item_id'];?>" name="<?php echo $_r['s_name'];?>">
                                                        <img style="border: 1px solid rgb(221, 221, 221); background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 5px; border-radius: 4px; margin-bottom: 5px;" width="130" src="<?php echo osc_apply_filter('resource_path', osc_base_url() . $_r['s_path']) . $_r['pk_i_id'] . '_thumbnail.' . $_r['s_extension']; ?>" /><br /><a href="javascript:delete_image(<?php echo $_r['pk_i_id'].", ".$_r['fk_i_item_id'].", '".$_r['s_name']."', '".Params::getParam('secret')."'";?>);"  class="delete"><?php _e('Delete'); ?></a>
                                                    </div>
                                                <?php } ?>
                                                </div>
                                                <div class="clearfix"></div>
                                        <?php } ?>
                                    </div>-->
                                    <div class='file_upload' id='f1'><input name='photos[]' type='file'/></div>
                                    <?php if(!$edit) { ?>
                                    <div class='file_upload' id='f2'><input name='photos[]' type='file'/></div>
                                    <div class='file_upload' id='f3'><input name='photos[]' type='file'/></div>
                                    <?php } ?>
                                    <div id='file_tools'>
                                        <a class="color" id='add_file'>Add new</a>
                                        
                                    </div>
                                 </div>
                            </div>
                        <?php }?>
                     <div class="control-group">
                        <?php if( osc_recaptcha_items_enabled() ) { ?>
                            <div class="controls">
                                <?php osc_show_recaptcha(); ?>
                            </div>
                        <?php }?>
                        <div class="controls">
                            <button type="submit" class="btn btn-dark"><?php if($edit) { _e("Update", 'market'); } else { _e("Publish", 'market'); } ?></button>
                        </div>
                    </div>
                </fieldset>
            </form>
            
        </div>
    </div>
    </div>
</section>
        <script type="text/javascript">
			$(document).ready(function(){
			var counter = 4;
			$('#del_file').hide();
			$('#file_tools > #add_file').click(function(){
				$('#file_tools').before('<div class="file_upload" id="f'+counter+'"><input name="photos[]" type="file"></div>');
				$('#del_file').fadeIn(0);
			counter++;
			});
			$('#file_tools > #del_file').click(function(){
				if(counter==3){
					$('#del_file').hide();
				}   
				counter--;
				$('#f'+counter).remove();
			});
		});
				
</script>
    <script type="text/javascript">
		function delete_image(id, item_id,name, secret) {
        //alert(id + " - "+ item_id + " - "+name+" - "+secret);
        var result = confirm('<?php echo osc_esc_js( __("This action can't be undone. Are you sure you want to continue?") ); ?>');
        if(result) {
            $.ajax({
                type: "POST",
                url: '<?php echo osc_base_url(true); ?>?page=ajax&action=delete_image&id='+id+'&item='+item_id+'&code='+name+'&secret='+secret,
                dataType: 'json',
                success: function(data){
                    var class_type = "error";
                    if(data.success) {
                        $("div[name="+name+"]").remove();
                        class_type = "ok";
                    }
                    var flash = $("#flash_js");
                    var message = $('<div>').addClass('pubMessages').addClass(class_type).attr('id', 'flashmessage').html(data.msg);
                    flash.html(message);
                    $("#flashmessage").slideDown('slow').delay(3000).slideUp('slow');
                }
            });
        }
		}
									</script>
<?php osc_current_web_theme_path('footer.php'); ?>
