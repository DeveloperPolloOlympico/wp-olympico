<?php
//get template header
get_header();
?>
        
        <!-- HERO  -->
        <section id="hero" class="hero-full">
            <div id="page-title" class="wrapper align-center">
                <h2><?php esc_html_e("Lo sentimos!","dani"); ?><br><?php esc_html_e("la página que estás buscando no existe","dani"); ?></h2>
                <div class="spacer-medium"></div>
                <h1 class="notfound"><strong>Error 404</strong></h1>
                <div class="spacer-medium"></div>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sr-button"><?php esc_html_e("Volver al Inicio","dani"); ?></a>
            </div>
        </section>
        <!-- HERO --> 
        
<?php get_footer(); ?>
