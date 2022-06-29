<?php if(!class_exists('Rain\Tpl')){exit;}?><!doctype html>
<html lang="en">

<head>
	<?php require $this->checkTemplate(".\widgets/cms_head");?>

</head>

<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title">Menú</h1>
			<h2 class="section_title"><?php echo htmlspecialchars( $site["sec"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
			<div class="btn_view_site"><a href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Hotel</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><?php echo htmlspecialchars( $user["username"], ENT_COMPAT, 'UTF-8', FALSE ); ?> (<a href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["admin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>logout">salir</a>)</p>
			 <a class="logout_user" href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["admin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>logout" title="Logout">Logout</a>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["admin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>panel">Inicio</a> <div class="breadcrumb_divider"></div> <a class="current"><?php echo htmlspecialchars( $site["sec"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<?php if( $userData['rank'] >= $fuses['admin["users"]'] ){ ?>

			<form class="quick_search">
				<input type="text" placeholder="Buscar usuario">
			</form>
			<hr/>
		<?php } ?>

		<?php require $this->checkTemplate(".\widgets/cms_menu");?>

		
		<footer>
			<?php require $this->checkTemplate(".\widgets/cms_footer");?>

		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">

		<?php if( $_GET['do'] == 'add' ){ ?>

			<?php require $this->checkTemplate(".\widgets/box/news/add");?>

		<?php }elseif( $_GET['do'] == 'edit' ){ ?>

			
		<?php } ?>

		</div>
		<div class="clear"></div>
		<div class="spacer"></div>
	</section>


</body>

</html>