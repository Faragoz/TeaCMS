<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="box">
    <div class="top">Mis salas</div>
    <div data-role="rooms">
        <?php $counter1=-1;  if( isset($roomsRecommended) && ( is_array($roomsRecommended) || $roomsRecommended instanceof Traversable ) && sizeof($roomsRecommended) ) foreach( $roomsRecommended as $key1 => $value1 ){ $counter1++; ?>

        <div data-roomid="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            <div><?php echo htmlspecialchars( $value1["caption"], ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
                <?php if( $value1["description"] ){ ?>

                    <?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                <?php }else{ ?>

                    ¡Sin descripción!...
                <?php } ?>

            <div><a href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>client">ir</a></div>
        </div>
        <?php }else{ ?>

        <div data-roomid="000">
            <div>¡No hay salas recomendadas!</div>
            ¿Qué esperas para que la tuya esté aquí?
            <div><a href="<?php echo htmlspecialchars( $site["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $site["sub"], ENT_COMPAT, 'UTF-8', FALSE ); ?>client">Crear</a></div>
        </div>
        <?php } ?>

    </div>
</div>