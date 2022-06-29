<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang=es>
    <head>
        <?php require $this->checkTemplate("widgets/cms_head");?>
    </head>
    <body>
        <?php require $this->checkTemplate("widgets/box/header");?>
        <div section-name="Credits">
            <?php require $this->checkTemplate("ads/160_600");?>
            <div id="content">
                <?php require $this->checkTemplate("widgets/box/credits/credits");?>
                <?php require $this->checkTemplate("widgets/box/credits/premium");?>
                <div id="response">
                </div>
                <?php require $this->checkTemplate("widgets/box/credits/voucher");?>
            </div>
            <?php require $this->checkTemplate("ads/468_60");?>
        </div>
        <?php require $this->checkTemplate("widgets/cms_footer");?>
    </body>
</html>