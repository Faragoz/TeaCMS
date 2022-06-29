<?php if(!class_exists('Rain\Tpl')){exit;}?><meta charset="utf-8">
<title><?php echo htmlspecialchars( $site["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> &raquo; <?php echo htmlspecialchars( $user["username"], ENT_COMPAT, 'UTF-8', FALSE ); ?></title>
<meta name=description content="<?php echo htmlspecialchars( $site["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>: Haz amig@s, súmate a la diversión y date a conocer.">
<meta name=keywords content="<?php echo htmlspecialchars( $site["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $site["sname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, gratis, mundo, virtual, red social, gratis, comunidad, personaje, chat, online, adolescente, roleplaying, unirse, social, grupos, forums, seguro, jugar, juegos, amigos, adolescentes, raros, furni raros, coleccionable, crear, coleccionar, conectar, furni, muebles, mascotas, diseño de salas, compartir, expresión, placas, pasar el rato, música, celebridad, visitas de famosos, celebridades, juegos en línea, juegos multijugador, multijugador masivo">
<link rel="shorcut icon" href="<?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>img/favicon.gif">
<link rel=stylesheet href="<?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>css/reset.css">
<link rel=stylesheet href="<?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>css/general.css">
<link rel=stylesheet href="<?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>css/boxes.css">
<link rel=stylesheet href="https://fonts.googleapis.com/css?family=Montserrat:400,700">

<script>
    var csrfToken = "<?php echo htmlspecialchars( $site["csrfToken"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
    var siteURL = "<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
</script>
<script src="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>js/jquery.min.1.9.1.js"></script>
<script src="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>js/CSRF.js"></script>
<script src="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>js/showResult.js"></script>
<script src="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>js/menu.js"></script>
<script src="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/radio/player.js"></script>
<?php if( $site["id"] == 2 ){ ?>

    <script src="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>js/news.js"></script>
    <script src="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/js/bbcodeParser.js"></script>
<?php } ?>

<?php if( $site["id"] == 3 ){ ?>

<script src="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>js/credits.js"></script>
<?php } ?>

<?php if( $site["id"] == 5 ){ ?>

<script src="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>js/settings.js"></script>
<?php } ?>

<script>
$(function()
{
		$("div#news div:first-child").show('slow');
		
        $('#news div:gt(0)').hide();
        setInterval(function()
        {
                $('#news div:first-child').fadeOut(0)
                .next('div').fadeIn(1000)
                .end().appendTo('#news');
        }, 4000);
});
</script>