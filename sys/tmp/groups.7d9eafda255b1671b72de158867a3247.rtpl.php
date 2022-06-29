<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="box red">
    <div class="top">
        Mis grupos
        <ul data-role=toolbox>
            <li data-tool=new onclick="doAction('groups')" style="margin-left: -1px;">+</li>
        </ul>
        </div>
        <div data-role="groups">
            <?php $counter1=-1;  if( isset($groups) && ( is_array($groups) || $groups instanceof Traversable ) && sizeof($groups) ) foreach( $groups as $key1 => $value1 ){ $counter1++; ?>

                <div data-group="4440">
                    <div><img src="http://www.habbo.es/habbo-imaging/badge/b2203Xs12114s17155s17123s17014ed686c0c7fd20e4e10a6d440ffdf2d69.gif"></div>
                    <div><?php echo htmlspecialchars( $value1["Caption"], ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
                    <?php if( $value1["description"] ){ ?>

                        <?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                    <?php }else{ ?>

                        ¡Sin descripción!...
                    <?php } ?>

                    <br>
                    <div><?php echo htmlspecialchars( $value1["count"], ENT_COMPAT, 'UTF-8', FALSE ); ?> miembros</div>
                </div>
            <?php }else{ ?>

                <div data-group="4440">
                    <div><img src="http://www.habbo.es/habbo-imaging/badge/b2313Xs61037s46033s47035cfc21df87a25d71652a2894fb86cb528.gif"></div>
                    <div>No tienes grupos</div>
                    ¿Qué esperas para unirte a uno?...<br>
                </div>
            <?php } ?>

    </div>
</div>