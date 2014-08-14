<div id="main" class="without_sidebar">
			<div id="main_inner" class="clearboth blog_style_fullpost">
				<!-- content -->
				<h2>Últimas peliculas recomendadas</h2>
				<div id="content" class="content_blog post_single" >
					<div class="itemscope" itemscope itemtype="http://schema.org/Article">
						<article class="theme_article post_format_standard instock">
							<div class="post_content without_paddings">
								<div itemprop="articleBody" class="post_text_area">
									<div class="sc_section sc_puzzles custom-container">

										<?php foreach($peliculas as $pelicula): ?>

											<!-- puzzle item -->
											<div class="sc_blogger_item sc_blogger_item_puzzles first">
												<div class="post_thumb image_wrapper <?php echo $pelicula['estilo']; ?>">
													<a href="<?php echo site_url(); ?>pelicula/<?php echo $pelicula['url']; ?>"><img alt="<?php echo $pelicula['titulo']; ?>" title="<?php echo $pelicula['titulo']; ?>" src="<?php echo $pelicula['imagen']; ?>"></a>
													
													<span class="post_category theme_accent_bg" data-categoryiconbg="<?php echo $pelicula['color_fecha']; ?>"><?php echo $pelicula['fecha_estreno']; ?></span>
													<div class="post_content_wrapper theme_puzzles " data-puzzlecolor="<?php echo $pelicula['color']; ?>">
														<h2 class="post_subtitle"><a href="<?php echo site_url(); ?>single-format-standard.html"><?php echo $pelicula['titulo']; ?></a></h2>
														<div class="reviews_summary blog_reviews" data-puzzlecolor="<?php echo $pelicula['color']; ?>">
															<div class="criteria_summary criteria_row">
																<span class="criteria_stars" title="<?php echo $pelicula['valoracion_5']; ?> de 5">
																	<span class="stars_off"><span class="theme_stars"></span><span class="theme_stars"></span><span class="theme_stars"></span><span class="theme_stars"></span><span class="theme_stars"></span></span>
																	<span class="stars_on" data-review="<?php echo $pelicula['valoracion']; ?>"><span class="theme_stars theme_stars_on"></span><span class="theme_stars theme_stars_on"></span><span class="theme_stars theme_stars_on"></span><span class="theme_stars theme_stars_on"></span><span class="theme_stars theme_stars_on"></span></span>
																</span>
															</div>
														</div>
														<div class="post_descr"><p>Descripcion...</p></div>
														<div class="post_content_padding theme_puzzles"></div>
													</div>
												</div>
											</div>
											<!-- /puzzle item -->

										<?php endforeach; ?>

										

									</div>
								</div>
							</div>
						
						</article>
					</div>
					
				</div><!-- #content -->

			</div><!-- #main_inner -->
    	</div><!-- #main -->