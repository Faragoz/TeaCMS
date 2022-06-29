<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="es">
    <head>
        <?php require $this->checkTemplate(".\widgets/cms_head");?>

    </head>
    <body>
        <?php require $this->checkTemplate(".\widgets/box/header");?>

        <div section-name="Home">
            <?php require $this->checkTemplate(".\ads/160_600");?>

            <div id="content">
                <aside>
                    <?php require $this->checkTemplate(".\widgets/box/twitter");?><br>
					<?php require $this->checkTemplate(".\widgets/box/home/radio");?>

                </aside>
                <div id="main">
					<?php require $this->checkTemplate(".\widgets/box/home/rooms");?>

                    <br>
                    <?php require $this->checkTemplate(".\widgets/box/home/groups");?>

                    <br>
                </div>
                <?php require $this->checkTemplate(".\ads/468_60");?>

            </div>
        </div>
        <?php require $this->checkTemplate(".\widgets/cms_footer");?>

    </body>
</html>