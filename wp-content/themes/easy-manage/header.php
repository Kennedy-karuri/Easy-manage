<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="<?php echo bloginfo('charset');?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo bloginfo('title');?></title>
        <?php wp_head();?>
    </head>
    <body <?php body_class();?>>

    <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="main-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>
        </div>
        <?php
            if (is_user_logged_in()) : 
            ?>
                <a role="button" class="btn btn-outline-primary" href=" <?php echo wp_logout_url(get_permalink()); ?>">Log Out</a>
            <?php 
            else : 
            ?>
                <a role="button" class="btn btn-outline-primary" href="<?php echo wp_login_url(get_permalink()); ?>">Log In</a>
            <?php 
            endif;
        ?>
    </div>
</nav>
    
