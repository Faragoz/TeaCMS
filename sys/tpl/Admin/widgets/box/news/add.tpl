<article class="module width_full">
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
						{ignore}<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Categoria</label>
							<select style="width:92%;">
								<option>Articles</option>
								<option>Tutorials</option>
								<option>Freebies</option>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Tags</label>
							<input type="text" style="width:92%;">
						</fieldset>{/ignore}

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