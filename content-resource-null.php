<?php
/**
 * @package Global Engineering Initiative
 */
?>

<div id="null" class="resource">
	<header>
		<h1 class="resource-title"><?php if ( ICL_LANGUAGE_CODE == 'en' ) :
			the_field( 'no_match_title', 'options' );
		elseif ( ICL_LANGUAGE_CODE == 'fr' ) :
			the_field( 'no_match_title_fr', 'options' );
		endif; ?></h1>
	</header>
	<section class="resource-content">
		<?php if ( ICL_LANGUAGE_CODE == 'en' ) :
			the_field( 'no_match_text', 'options' );
		elseif ( ICL_LANGUAGE_CODE == 'fr' ) :
			the_field( 'no_match_text_fr', 'options' );
		endif; ?>
	</section>
</div>