<?php if(!class_exists('Rain\Tpl')){exit;}?><div id="enteronline">
    <span><?php echo htmlspecialchars( $site["online"], ENT_COMPAT, 'UTF-8', FALSE ); ?> online</span>
    <a href="<?php echo htmlspecialchars( $site["client"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="fp_btn" style="width: 160px;">Entrar a <?php echo htmlspecialchars( $site["sname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
</div>
<img src="<?php echo htmlspecialchars( $site["path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>img/logo.gif">
<header>
    <nav>
        <a<?php if( $site["id"] == 1 ){ ?> class="active" <?php }else{ ?> href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>me" <?php } ?>>Home</a>
        <a<?php if( $site["id"] == 2 ){ ?> class="active" <?php }else{ ?> href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>community" <?php } ?>>Comunidad</a>
        <a<?php if( $site["id"] == 3 ){ ?> class="active" <?php }else{ ?> href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>credits" <?php } ?>>Créditos</a>
        <!--<a<?php if( $site["id"] == 4 ){ ?> class="active" <?php }else{ ?> href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>shop" <?php } ?>>Tienda</a>-->
        <div>
            <a <?php if( $site["id"] == 5 ){ ?> class="active" <?php }else{ ?> href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>settings" <?php } ?>>Ajustes</a>
            <a href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>logout">Salir</a>
        </div>
    </nav>
    <div id="news">
            <?php $counter1=-1;  if( isset($list) && ( is_array($list) || $list instanceof Traversable ) && sizeof($list) ) foreach( $list as $key1 => $value1 ){ $counter1++; ?>

                <?php if( $value1["id"] > 0 ){ ?>

                    <div onclick="window.location.href='/community/news/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'" style="background-image: url(http://i.imgur.com/H88Io1a.png); display:none;">
                        <p id="title"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                        <p id="body"><?php echo htmlspecialchars( substr($value1["shortstory"],0,135), ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    </div>
                <?php }else{ ?>

                    <div style="background-image: url(http://i.imgur.com/H88Io1a.png); display:none;">
                        <p id="title">¡No hay noticias!...</p>
                        <p id="body">Por el momento no existen noticias</p>
                    </div>
                <?php } ?>

            <?php } ?>

        </div>
    </div>
    <div id="userinfo">
        <img src="http://www.habbohotel.es/habbo-imaging/avatarimage?figure=<?php echo htmlspecialchars( $user["look"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&direction=3&head_direction=3&gesture=sml&action=&size=l">
        <div>
            <span><?php echo htmlspecialchars( $user["username"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span><br>
            <span class="subtitle">"<?php echo htmlspecialchars( $user["motto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"</span>
            <hr>
            <?php echo htmlspecialchars( $user["credits"], ENT_COMPAT, 'UTF-8', FALSE ); ?> créditos<br>
            <?php echo htmlspecialchars( $user["vip_points"], ENT_COMPAT, 'UTF-8', FALSE ); ?> puntos VIP<br>
            <!--5 días de VIP<br>-->
            <a href="#">Mi perfil</a>
            <a href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>settings">Ajustes</a>
        </div>
        <a href="<?php echo htmlspecialchars( $site["client"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="fp_btn">Entrar</a>
    </div>
    <nav subnav-name="Community" id="sub" <?php if( $site["id"] != 2 ){ ?>style="display:none;"<?php } ?>>
        <a sub-name="Community" class="active">Noticias</a>
        <a sub-name="Staff">Equipo</a>
        <a sub-name="Linces">Linces</a>
        <!--<a sub-name="DJs">DJs</a>-->
        <a sub-name="Top">Top</a>
    </nav>
</header>