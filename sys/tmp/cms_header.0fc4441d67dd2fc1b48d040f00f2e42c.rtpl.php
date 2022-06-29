<?php if(!class_exists('Rain\Tpl')){exit;}?><div id="enteronline">
    <span><?php echo htmlspecialchars( $site["online"], ENT_COMPAT, 'UTF-8', FALSE ); ?> online</span>
    <a href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>client" class="fp_btn" style="width: 160px;">Entrar a <?php echo htmlspecialchars( $site["sname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
</div>
<img src="<?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>img/logo.gif">
<header>
    <nav>
        <a nav-name="Home" class="active">Home</a>
        <a nav-name="Community">Comunidad</a>
        <a nav-name="Credits">Créditos</a>
        <a nav-name="Shop">Tienda</a>
        <div>
            <a href="#">Ajustes</a>
            <a href="#">Salir</a>
        </div>
    </nav>
    <div id="news">
                Me falta hacer el slider; en cuanto lo termine te paso esta parte completa.
    </div>
    <div id="userinfo">
        <img src="http://www.habbohotel.es/habbo-imaging/avatarimage?figure=<?php echo htmlspecialchars( $user["look"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&direction=3&head_direction=3&gesture=sml&action=&size=l">
        <div>
            <span><?php echo htmlspecialchars( $user["username"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span><br>
            <span class="subtitle">"<?php echo htmlspecialchars( $user["motto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"</span>
            <hr>
            <?php echo htmlspecialchars( $user["credits"], ENT_COMPAT, 'UTF-8', FALSE ); ?> créditos<br>
            <?php echo htmlspecialchars( $user["vip_points"], ENT_COMPAT, 'UTF-8', FALSE ); ?> puntos VIP<br>
            5 días de VIP<br>
            <a href="#">Mi perfil</a>
            <a href="#">Ajustes</a>
        </div>
        <a href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>client" class="fp_btn">Entrar</a>
    </div>
</header>