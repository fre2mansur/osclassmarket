<html lang="en">
<head>
    <title>Osclass Community</title>
    <?php if(osc_is_ad_page()) { ?>
      <meta name="title" content="<?php echo osc_item_title();?> - Osclass Community">
    <?php } else { ?>
      <meta name="title" content="Osclass Community">
    <?php } ?>
    <meta name="description" content="Osclass community is the one stop website to help Osclass users and developers get free Osclass themes, plugins and other resources.">
    <meta name="keywords" content="osclass, osclass community, osclass themes, osclass plugins, free osclass themes. free osclass plugins, osclass plugin, osclass theme, osclass cms, open source classified script, php classifieds">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo osc_current_web_theme_url("css/bootstrap.min.css");?>">
    <link rel="stylesheet" type="text/css" href="<?php echo osc_current_web_theme_url('css/style.css');?>">
    <?php if(osc_is_ad_page()) { ?>
        <link rel="stylesheet" href="<?php echo osc_current_web_theme_url('css/simplelightbox.min.css');?>" />
    <?php } ?>

    <script src="<?php echo osc_current_web_theme_url("js/jquery.min.js");?>"></script>
    <script src="<?php echo osc_current_web_theme_url("js/popper.min.js");?>"></script>
    <script src="<?php echo osc_current_web_theme_url("js/bootstrap.min.js");?>"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <?php if(osc_is_ad_page()) { ?>
        <script src="<?php echo osc_current_web_theme_url("js/simple-lightbox.min.js");?>"></script>
        <script src="<?php echo osc_current_web_theme_url("js/sweetalert2.min.js");?>"></script>
        <script src="<?php echo osc_current_web_theme_url("js/main.js");?>"></script>
    <?php } ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-147271569-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-147271569-2');
    </script>
    <?php osc_run_hook('market_header'); ?>
</head>
<body>
    <section id="top-header">
    	<div class="container p-2">
            <nav class="navbar navbar-light navbar-expand-lg">
                <a href="<?php echo osc_base_url(); ?>" class="navbar-brand text-dark">
                    <img src="https://osclasscommunity.com/osccommunity.png" alt="Osclass Community" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerNav" aria-controls="headerNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="headerNav">
                    <ul class="nav ml-auto">
                        <?php while(osc_has_categories()) { ?>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="<?php echo osc_search_category_url(osc_category_id()); ?>"><?php echo osc_category_name(); ?></a>
                            </li>
                        <?php } ?>
                        <?php if( osc_is_web_user_logged_in() ) { ?>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="<?php echo osc_user_profile_url(); ?>">My account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="<?php echo osc_user_logout_url(); ?>">Logout</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="<?php echo osc_user_login_url(); ?>">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="<?php echo osc_register_account_url() ; ?>">Register</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="http://forums.osclasscommunity.com">Forum</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-dark" href="<?php echo osc_item_post_url(); ?>">UPLOAD</a>
                        </li>
                    </ul>
            </nav>
        </div>
    </section>

    <div class="clearfix"></div>
    <?php osc_show_flash_message(); ?>
