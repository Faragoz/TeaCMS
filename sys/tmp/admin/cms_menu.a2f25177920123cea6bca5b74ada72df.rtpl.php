<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $userData['rank'] >= $fuses['admin["news"]'] ){ ?>

<h3>Noticias</h3>
<ul class="toggle">
	<li class="icn_new_article"><a href="news?do=add">Nueva noticia</a></li>
	<li class="icn_edit_article"><a href="#">Editar noticias</a></li>
	<li class="icn_categories"><a href="#">Categorias</a></li>
	<!--<li class="icn_tags"><a href="#">Tags</a></li>-->
</ul>
<?php } ?>

<?php if( $userData['rank'] >= $fuses['admin["users"]'] ){ ?>

<h3>Usuarios</h3>
<ul class="toggle">
	<!--<li class="icn_add_user"><a href="#">Agregar nuevo usuario</a></li>-->
	<li class="icn_view_users"><a href="users?do=see">Ver usuarios</a></li>
	<li class="icn_edit_article"><a href="users?do=edit">Editar usuarios</a></li>
	<!--<li class="icn_profile"><a href="#">Tú perfil</a></li>-->
</ul>
<?php } ?>

<!--<h3>Media</h3>
<ul class="toggle">
	<li class="icn_folder"><a href="#">File Manager</a></li>
	<li class="icn_photo"><a href="#">Gallery</a></li>
	<li class="icn_audio"><a href="#">Audio</a></li>
	<li class="icn_video"><a href="#">Video</a></li>
</ul>-->
<h3>Administración</h3>
<ul class="toggle">
	<?php if( $userData['rank'] >= $fuses['admin["settings"]'] ){ ?>

		<li class="icn_settings"><a href="#">Opciones</a></li>
		<li class="icn_security"><a href="#">Seguridad</a></li>
	<?php } ?>

	<li class="icn_jump_back"><a href="#">Salir</a></li>
</ul>

