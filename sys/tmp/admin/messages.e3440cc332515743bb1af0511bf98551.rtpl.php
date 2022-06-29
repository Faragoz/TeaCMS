<?php if(!class_exists('Rain\Tpl')){exit;}?><article class="module width_quarter">
			<header><h3>Mensajes</h3></header>
			<div class="message_list">
				<div class="module_content">
					<?php $counter1=-1;  if( isset($adminMessages) && ( is_array($adminMessages) || $adminMessages instanceof Traversable ) && sizeof($adminMessages) ) foreach( $adminMessages as $key1 => $value1 ){ $counter1++; ?>

					<div class="message">
						<p><strong><?php echo htmlspecialchars( $value1["username"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
						<p><?php echo htmlspecialchars( $value1["message"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
					</div>
					<?php } ?>

				</div>
			</div>
			<footer>
				<form class="post_message" method="POST">
					<input type="text" placeholder="Mensaje..." maxlength="255" minlength="10" required>
					<input type="submit" class="btn_post_message"/>
				</form>
			</footer>
		</article><!-- end of messages article -->