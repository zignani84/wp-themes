<?php
get_header();

global $posts;
?>
    <!-- MAIN -->
    <main>
		<?php
		//bloco de banners
        require "inc/inc_bloco_banners.php";

		//bloco de intercâmbios
		require "inc/inc_bloco_tiposintercambios.php";

		//bloco de depoimentos
		require "inc/inc_bloco_depoimentos.php";

        //bloco de diferenciais
        require "inc/inc_bloco_diferenciais.php";
        
        //bloco de posts blog
        require "inc/inc_bloco_blog.php";

        //bloco de newsletter
        require "inc/inc_bloco_cadastraNews.php";
        ?>
    </main>

<?php get_footer(); ?>
