<?php
//  The template for displaying the footer
?>

<?php wp_footer(); ?>

<?php if  ( !empty(get_option('get_fontawesome'))) : ?> 
    <script src="https://kit.fontawesome.com/<?php wptrek_fapro(); ?>.js" crossorigin="anonymous" defer></script>
<?php endif; ?>

</body>
</html>