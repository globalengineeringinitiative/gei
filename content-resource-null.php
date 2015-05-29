<?php
/**
 * @package Global Engineering Initiative
 */
?>

<div id="null" class="resource">
	<header>
		<h1 class="resource-title"><?php the_field( 'no_match_title', 'options' ); // translated text on Options page ?></h1>
	</header>
	<section class="resource-content">
		<?php the_field( 'no_match_text', 'options' ); // translated text on Options page ?>
	</section>
</div>