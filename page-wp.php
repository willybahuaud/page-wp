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

			<?php  query_posts('showposts=9&category_name="APropos"' . '&paged=' . get_query_var('paged')) ; ?>



			<?php while ( have_posts() )
					{
					 	the_post();

					  get_template_part( 'content', 'list-posts');

					}; // end of the loop de la catégorie à propos ?>
			<div class="clear"></div>
		</section><!-- #content-article -->
	</section><!-- #primary -->


<?php get_footer(); ?>

</div> <!-- fermeture de #page  -->

</body>

</html>