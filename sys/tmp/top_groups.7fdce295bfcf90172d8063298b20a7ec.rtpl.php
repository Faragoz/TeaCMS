<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="box darkblue">
    <div class="top">
        Grupos recomendados
    </div>
    <div data-role="groups">
        <?php $counter1=-1;  if( isset($groupsRecommended) && ( is_array($groupsRecommended) || $groupsRecommended instanceof Traversable ) && sizeof($groupsRecommended) ) foreach( $groupsRecommended as $key1 => $value1 ){ $counter1++; ?>

            <?php if( $value1["id"] > 0 ){ ?>

                <div data-group="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div>
                        <img src="http://drakohotel.net/habbo-imaging/badge.php?badge=b0617Xs12014s44014s05014s17114">
                    </div>
                    <div><?php echo htmlspecialchars( $value1["Caption"], ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
                    <?php if( $value1["description"] ){ ?>

                        <?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                    <?php }else{ ?>

                        ¡Sin descripción!...
                    <?php } ?>

                </div>
                <div data-group="000">
                    <div>
                        <img src="http://drakohotel.net/habbo-imaging/badge.php?badge=b0617Xs12014s44014s05014s17114">
                    </div>
                    <div>¡No hay grupos recomendados!</div>
                    ¿Qué esperas para que el tuyo esté aquí?...
                </div>
            <?php }else{ ?>

                <div data-group="000">
                    <div>
                        <img src="http://drakohotel.net/habbo-imaging/badge.php?badge=b0617Xs12014s44014s05014s17114">
                    </div>
                    <div>¡No hay grupos recomendados!</div>
                    ¿Qué esperas para que el tuyo esté aquí?...
                </div>
            <?php } ?>

        <?php } ?>

    </div>
</div>