<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="box orange">
    <div class="top">
        TOP Créditos
    </div>
    <div data-role="tops">
        <?php $counter1=-1;  if( isset($topCredits) && ( is_array($topCredits) || $topCredits instanceof Traversable ) && sizeof($topCredits) ) foreach( $topCredits as $key1 => $value1 ){ $counter1++; ?>

            <div data-msg>
                <?php if( $value1["credits"] > 0 ){ ?>

                    <div data-user>
                        <img title="Ir al perfil de <?php echo htmlspecialchars( $value1["username"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" src="http://www.habbohotel.es/habbo-imaging/avatarimage?figure=<?php echo htmlspecialchars( $value1["look"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&direction=2&head_direction=3&gesture=sml&action=&size=s">
                    </div>
                    <div title="Visitar su perfil"><?php echo htmlspecialchars( $value1["username"], ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
                    <?php echo htmlspecialchars( $value1["credits"], ENT_COMPAT, 'UTF-8', FALSE ); ?> créditos<br>
                <?php }else{ ?>

                    <div data-user>
                        <img src="http://www.habbohotel.es/habbo-imaging/avatarimage?figure=lg-3116-107-62.ch-9700-66.hr-828-35.sh-3016-79.hd-180-2&direction=2&head_direction=3&gesture=sml&action=&size=s">
                    </div>
                    <div>¡Nadie!</div>
                    ¿Qué esperas para ocuparlo tú?...<br>
                <?php } ?>

            </div>
        <?php } ?>

    </div>
</div>