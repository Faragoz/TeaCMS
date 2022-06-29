<!doctype html>
<html lang="en">

<head>
	{include="widgets/cms_head"}
</head>

<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title">Menú</h1>
			<h2 class="section_title">{$site.sec}</h2>
			<div class="btn_view_site"><a href="{$site.url}{$site.sub}">Hotel</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>{$user.username} (<a href="{$site.url}{$site.sub}{$site.admin}logout">salir</a>)</p>
			 <a class="logout_user" href="{$site.url}{$site.sub}{$site.admin}logout" title="Logout">Logout</a>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="{$site.url}{$site.sub}{$site.admin}panel">Inicio</a> <div class="breadcrumb_divider"></div> <a class="current">{$site.sec}</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" placeholder="Buscar usuario">
		</form>
		<hr/>
		{include="widgets/cms_menu"}
		
		<footer>
			{include="widgets/cms_footer"}
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">

		{if="$_GET['do'] == 'add'"}
			{include="widgets/box/news/add"}
		{elseif="$_GET['do'] == 'edit'"}
			
		{/if}
		</div>
		<div class="clear"></div>
		<div class="spacer"></div>
	</section>


</body>

</html>