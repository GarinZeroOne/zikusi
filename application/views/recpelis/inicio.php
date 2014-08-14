<div id="main" class="without_sidebar">
			<div id="main_inner" class="clearboth blog_style_fullpost">
				<!-- content -->
				
				<h2></h2>
				<div id="content" class="content_blog post_single" >

					<div class="sc_blogger sc_blogger_vertical style_accordion sc_accordion ui-accordion ui-widget ui-helper-reset" role="tablist">

						<form method="post" action="<?php echo site_url();?>recomendador_peliculas/mostrar">

						<div class="sc_blogger_item sc_accordion_item">
							<h3 class="sc_blogger_title sc_title entry-title sc_accordion_title ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-accordion-1-header-0" aria-controls="ui-accordion-1-panel-0" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>
								<a href="shortcodes-full-list.html#"><span class="sc_accordion_icon"></span>Bien, ¿que tipo de pelicula te apetece ver? Tienes algún genero que prefieras?</a>
							</h3>
							<div class="sc_blogger_content sc_accordion_content ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-1-panel-0" aria-labelledby="ui-accordion-1-header-0" role="tabpanel" aria-hidden="true" style="display: none;">
								
								<input type="checkbox" value="all" name="genero[]">Me suda el rabo el  genero
								<?php foreach($generos as $genero): ?>

								<input type="checkbox" value="<?php echo $genero['id'];?>" name="genero[]"><?php echo $genero['name']; ?>
								<?php endforeach; ?>

							</div>
						</div>
						<div class="sc_blogger_item sc_accordion_item">
							<h3 class="sc_blogger_title sc_title entry-title sc_accordion_title ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-accordion-1-header-1" aria-controls="ui-accordion-1-panel-1" aria-selected="false" aria-expanded="true" tabindex="0"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>
								<a href="shortcodes-full-list.html#"><span class="sc_accordion_icon"></span>De que jodida decada?</a>
							</h3>
							<div class="sc_blogger_content sc_accordion_content ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-1-panel-1" aria-labelledby="ui-accordion-1-header-1" role="tabpanel" aria-hidden="true" style="display: none;">
								<input type="radio" value="all" name="decada">Cualquiera
								<input type="radio" value="1940" name="decada">1940
								<input type="radio" value="1950" name="decada">1950
								<input type="radio" value="1960" name="decada">1960
								<input type="radio" value="1970" name="decada">1970
								<input type="radio" value="1980" name="decada">1980
								<input type="radio" value="1990" name="decada">1990
								<input type="radio" value="2000" name="decada">2000
								<input type="radio" value="2010" name="decada">2010

							</div>
						</div>
						<div class="sc_blogger_item sc_accordion_item">
							<h3 class="sc_blogger_title sc_title entry-title sc_accordion_title ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-1-header-2" aria-controls="ui-accordion-1-panel-2" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>
								<a href="shortcodes-full-list.html#"><span class="sc_accordion_icon"></span>Te vale cualquier mierda o quieres solo cremita?</a>
							</h3>
							<div class="sc_blogger_content sc_accordion_content ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-1-panel-2" aria-labelledby="ui-accordion-1-header-2" role="tabpanel" aria-hidden="true" style="display: none;">
								<input type="radio" name="calidad" value="70"> Solo cremita joder!
								<input type="radio" name="calidad" value="40"> Que se pueda ver sin que me sangren los ojos
								<input type="radio" name="calidad" value="0"> No le hago ascos  a nada
								

							</div>
						</div>
						
						<input type="submit" value="Vamos coño!">
						</form>
					</div>

					
					
					

					
					
					
					
				</div><!-- #content -->

			</div><!-- #main_inner -->
    	</div><!-- #main -->