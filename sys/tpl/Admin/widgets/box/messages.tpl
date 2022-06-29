<article class="module width_quarter">
			<header><h3>Mensajes</h3></header>
			<div class="message_list">
				<div class="module_content">
					{loop="$adminMessages"}
					<div class="message">
						<p><strong>{$value.username}</strong></p>
						<p>{$value.message}</p>
					</div>
					{/loop}
				</div>
			</div>
			<footer>
				<form class="post_message" method="POST">
					<input type="text" placeholder="Mensaje..." maxlength="255" minlength="10" required>
					<input type="submit" class="btn_post_message"/>
				</form>
			</footer>
		</article><!-- end of messages article -->