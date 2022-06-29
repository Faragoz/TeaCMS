<?php if(!class_exists('Rain\Tpl')){exit;}?><article class="module width_full">
			<header><h3>Publicar nueva noticia</h3></header>
				<div class="module_content">
					<form method="POST" action="#">
						<fieldset>
							<label>Título</label>
							<input type="text" name="title">
						</fieldset>
						<fieldset>
							<label>Contenido</label>
							<textarea rows="12" name="body"></textarea>
						</fieldset>
						

						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<select>
						<option>Draft</option>
						<option>Published</option>
					</select>
					<input type="submit" value="Publish" class="alt_btn">
					<input type="submit" value="Reset">
				</div>
			</footer>
		</form>
		</article><!-- end of post new article -->