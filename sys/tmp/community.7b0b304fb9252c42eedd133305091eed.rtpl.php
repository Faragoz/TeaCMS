<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="es">
<head>
    <?php require $this->checkTemplate("widgets/cms_head");?>

</head>
<body>
    <?php require $this->checkTemplate("widgets/box/header");?>

    <div section-name="Community">
        <aside class="news">
            <?php require $this->checkTemplate("widgets/box/community/news/list");?>

            <div class="ads" id="small">
                <?php require $this->checkTemplate("ads/234_60");?>

            </div>
        </aside>
        <div id="content">
            <div id="newsbox">
                <?php require $this->checkTemplate("widgets/box/community/news/news");?>

            </div>
        </div>
        <div id="content" class="ads">
            <span>Publicidad</span><br>
            <?php require $this->checkTemplate("ads/728_90");?>

        </div>
    </div>

    <div section-name="Staff" style="display:none;">
            <?php require $this->checkTemplate("ads/160_600");?>

            <div id="content">
                <aside>
                    <?php require $this->checkTemplate("widgets/box/community/staff/info");?>

                    <br>
                    <?php require $this->checkTemplate("widgets/box/community/staff/help");?>

                </aside>
                <div id="main">
                    <?php require $this->checkTemplate("widgets/box/community/staff/owner");?>

                    <br>
                    <?php require $this->checkTemplate("widgets/box/community/staff/manager");?>

                    <br>
                    <?php require $this->checkTemplate("widgets/box/community/staff/mod");?>

                    <br>
                    <?php require $this->checkTemplate("widgets/box/community/staff/comod");?>

                    <br>
                    <?php require $this->checkTemplate("widgets/box/community/staff/colab");?>

                    <br>
                </div>
                <?php require $this->checkTemplate("ads/468_60");?>

            </div>
    </div>

    <div section-name="Linces" style="display:none;">
            <?php require $this->checkTemplate("ads/160_600");?>

            <div id="content">
                <aside>
                    <?php require $this->checkTemplate("widgets/box/community/linces/info");?>

                </aside>
                <div id="main">
                    <?php require $this->checkTemplate("widgets/box/community/linces/list");?>

                </div>
                <?php require $this->checkTemplate("ads/468_60");?>

            </div>
    </div>

    <div section-name="Top" style="display:none;">
            <?php require $this->checkTemplate("ads/160_600");?>

            <div id="content">
                <aside>
                    <?php require $this->checkTemplate("widgets/box/community/top/top_credits");?>

                    <br>
                    <?php require $this->checkTemplate("widgets/box/community/top/top_pixels");?>

                    <br>
                    <?php require $this->checkTemplate("widgets/box/community/top/top_respects");?>

                </aside>
                <div id="main">
                    <?php require $this->checkTemplate("widgets/box/community/top/roomsRecommended");?>

                    <br>
                    <?php require $this->checkTemplate("widgets/box/community/top/groupsRecommended");?>

                    <br>
                    <?php require $this->checkTemplate("widgets/box/twitter");?>

                </div>
                <?php require $this->checkTemplate("ads/468_60");?>

            </div>
    </div>
    <?php require $this->checkTemplate("widgets/cms_footer");?>

    </body>
</html>