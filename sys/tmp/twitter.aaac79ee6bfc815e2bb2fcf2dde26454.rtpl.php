<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="box" style="height: 250px !important; border-radius: 5px">
	<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/<?php echo htmlspecialchars( $twitter["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-widget-id="<?php echo htmlspecialchars( $twitter["widgetid"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Tweets por @<?php echo htmlspecialchars( $site["twitter"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
	<script>
	!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
	</script>
</div>