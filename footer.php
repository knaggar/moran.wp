<?php
/**
* @package moran
* @subpackage footer template
* @version 1.5
* Template Name: Footer template
* Description: contains closing tags for global HTML elemetns. Also list blocks of navigation (not necessarily) and credits of website coding and contents licenses.
*/
?>
</main>
<footer>
  <?php get_template_part('templates/footer', 'credit'); ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>
