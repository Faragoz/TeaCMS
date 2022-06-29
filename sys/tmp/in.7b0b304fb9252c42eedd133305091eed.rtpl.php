<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="es">
    <head>
        <?php require $this->checkTemplate("widgets/cms_head");?>

    </head>
    <body>
        <?php require $this->checkTemplate("widgets/box/header");?>

        <div section-name="Home">
            <aside class="ads">
                <span>Publicidad</span>
                <img src="http://placehold.it/160x600">
            </aside>
            <div id="content">
                <aside>
                    <?php require $this->checkTemplate("widgets/box/home/rooms");?>

                    <br>
                    <?php require $this->checkTemplate("widgets/box/home/groups");?>

                    <br>
                    <?php require $this->checkTemplate("widgets/box/home/radio");?>

                </aside>
                <div id="main">
                    <?php require $this->checkTemplate("widgets/box/home/messages");?>

                    <br>
                    <?php require $this->checkTemplate("widgets/box/twitter");?>

                </div>
                <div class="ads">
                    <span>Publicidad</span><br>
                    <img src="http://www.placehold.it/468x60">
                </div>
            </div>
        </div>
        <div section-name="Community" style="display:none;">
            <aside class="news">
                <?php require $this->checkTemplate("widgets/box/community/news/list");?>

                <div class="ads" id="small">
                    <?php require $this->checkTemplate("ads/234_60");?>

                </div>
            </aside>
            <div id="content">
                <div id="newsbox">
                    <?php require $this->checkTemplate("widgets/box/home/messages");?>

                </div>
            </div>
            <div id="content" class="ads">
                <span>Publicidad</span><br>
                <?php require $this->checkTemplate("ads/728_90");?>

            </div>
        </div>
        <div section-name="Top" style="display:none;">
            <aside class="ads">
                <span>Publicidad</span>
                <img src="http://placehold.it/160x600">
            </aside>
            <div id="content">
                <aside>
                    <?php require $this->checkTemplate("widgets/box/community/top_credits");?>

                    <br>
                    <?php require $this->checkTemplate("widgets/box/community/top_pixels");?>

                    <br>
                    <?php require $this->checkTemplate("widgets/box/community/top_respects");?>

                </aside>
                <div id="main">
                    <?php require $this->checkTemplate("widgets/box/community/top_groups");?>

                    <br>
                    <?php require $this->checkTemplate("widgets/box/twitter");?>

                </div>
                <div class="ads">
                    <span>Publicidad</span><br>
                    <img src="http://www.placehold.it/468x60">
                </div>
            </div>
        </div>
        <div section-name="Credits" style="display:none;">
            <?php require $this->checkTemplate("widgets/box/home/groups");?>

        </div>
        <div section-name="Shop" style="display:none;">
            <?php require $this->checkTemplate("widgets/box/home/rooms");?>

        </div>
        <footer>
            <b>&copy;</b> <?php echo htmlspecialchars( $site["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 2012 - 2013 | Todos los derechos reservados - algunas imágenes pertenecen a Sulake Oy.<span>Designed by <strong>JamieBlade</strong></span>
        </footer>
    </body>
</html>