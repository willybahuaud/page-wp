<?php /* Template Name: a propos */

 /* Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary"     <?php post_class('apropos'); ?>    role="main"       >

			<section  id="page-loop">

					<!-- première boucle pour récupérer le contenu créé dans le back end pour la page -->

					<?php if (have_posts())
						{
							while (have_posts())
								{
									 ?><h1><?php the_title(); ?></h1><?php

									the_post();

									the_content();


								} 	//end while
						}		// end if


						 if (current_user_can( 'administrator'))
								{		?>
						  			<span class="edit-link">'	<a href="<?php  echo get_edit_post_link();  ?>" target='new'>modifier</a> </span>
					<?php  }  ?>



				</section> <!-- fin de "page-loop"  -->


		<section  id="content-articles" role="main" class="boxes">

			<?php
				// query_posts('showposts=9&category_name="APropos"' . '&paged=' . get_query_var('paged')) ;  première manière d' écrire la query, mais je préfère celle ci-dessous

				$args = array (
											//"showposts" => 10,  cette ligne et la suivante sont équivalentes
											"posts_per_page"   => 10,
											"category_name" => "APropos",
											"paged" => $paged,
										); // tous les arguments sont disponibles ici: http://codex.wordpress.org/Class_Reference/WP_Query

			$about = new WP_Query($args);		// c' est la query pour la catégorie à propos listée dans une page de titre "A propos". Il serait possible d' utiliser la catégorie dans le menu, mais c' est une mauvaise habitude. Il vaut mieux créer un template de page.
			// Mettre cette requête dans un nouvel objet WP_Query permet de toujours pouvoir récupérer la requête initiale (on ne l'écrase pas)…
			// … et de pouvoir aussi utiliser cette nouvelle requête à plusieurs endroits
			if ( $about->the_post() ) {
				while ( $about->have_posts() ) {
					$about->the_post();
					get_template_part( 'content', 'list-posts');
				} 
			} 
			wp_reset_postdata();
			// end of the loop de la catégorie à propos ?>


			<div class="clear"></div>
		</section><!-- #content-article -->

		<nav id="next-previous" class="page-navigation" role="navigation">
	        <span class="previous"><?php next_posts_link('ANCIENS') ?> </span>
			<span class="next"><?php previous_posts_link('NOUVEAUX') ?></span>
		</nav>


	</section><!-- #primary -->


<?php get_footer(); ?>

</div> <!-- fermeture de #page  -->

</body>

</html>
