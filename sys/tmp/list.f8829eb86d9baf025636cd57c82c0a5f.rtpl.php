<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="box white">
    <div class="top">Últimas noticias</div>
    <div data-role="rooms">
        <?php $counter1=-1;  if( isset($list) && ( is_array($list) || $list instanceof Traversable ) && sizeof($list) ) foreach( $list as $key1 => $value1 ){ $counter1++; ?>

            <?php if( $value1["id"] > 0 ){ ?>

            <div data-newid="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <div><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
                <?php echo htmlspecialchars( substr($value1["shortstory"],0,35), ENT_COMPAT, 'UTF-8', FALSE ); ?>

                <div link-newid="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">ir</div>
            </div>
            <?php }else{ ?>

                <div data-newid="000">
                    <div>¡Sin título!</div>
                    ¡En realidad no hay noticias por el momento!...
                    <div>--</div>
                </div>
            <?php } ?>

        <?php } ?>

    </div>
</div>