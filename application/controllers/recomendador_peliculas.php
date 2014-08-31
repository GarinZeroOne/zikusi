<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recomendador_peliculas extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * 
	 */
	public function index($id_pelicula = '13065')
	{
		// API TheMovieDatabase
		$this->load->library('TMDBv3');

		// Populares
		$generos = $this->tmdbv3->getGenres('es');

		// Peliculas sugeridas
		//$peliculas = $this->tmdbv3->discoverMovies();



		$datos['generos'] = $generos['genres'];

		/*********************************************
		*  Cargar VISTAS
		*********************************************/

		// HTML head + body + apertura div #page
		$this->load->view('base/head');
		// Menu
		$this->load->view('base/header');

		// Contenido
		$this->load->view('recpelis/inicio',$datos);

		// Listas tops abajo
		$this->load->view('base/advert');
		// Form contacto,info,...
		$this->load->view('base/footer');

		// Cierre div #page body html
		$this->load->view('base/bottom');
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	function mostrar( $pag = false )
	{
		
		// Si no hay post, tiene que haber paginacion
		// si tampoco llega pagina, GTFO!
		if(!$_POST && $pag === false)
		{
			if(!$page)
			{
				redirect('Recomendador_peliculas');
			}
		}


		// Pagina? Si no hay pagina, se solicita la primera
		if(!$pag)
			$pag = 1;
		

		// URL amigables
		$this->load->helper('url_amigables');

		// API TheMovieDatabase
		$this->load->library('TMDBv3');

		$img_url_small = 'http://image.tmdb.org/t/p/w300/';

		//FILTROS: Genero
		if($_POST['genero'][0] != 'all')
		{
			foreach($_POST['genero'] as $id_genero)
			{
				$genero .=','.$id_genero;
			}

			// Quitar la primera coma
			$genero = substr($genero, 1);
		}

		//FILTROS: Decada
		$decada = true;

		if($_POST['decada'] == 'all')
		{
			$decada = false;
		}
		elseif($_POST['decada'] == 2010)
		{
			$decada_inicio = $_POST['decada'].'-01-01';
			$decada_fin = date('Y-m-d');
		}
		else
		{
			$decada_inicio = $_POST['decada'].'-01-01';
			$decada_fin = ($_POST['decada']+9).'-12-30';
		}

		
		

		//FILTROS: Calidad
		$calidad  = $_POST['calidad'];

		switch ($calidad) {
			// Calidad cremas: Que al menos tengan 50 votaciones
			//                 y que la media supere el 6. Asi no mostrara carroña
			case '70':
				$vote_count = 50;
				$vote_average = 6;
				break;
			// Calidad media: Al menos 5 votaciones y superior a una media de 4, lo que viene siendo
			//	              evitar mostrar la autentica mierda
			case '40':
				$vote_count = 5;
				$vote_average = 4;
				break;
			// Calidad baja: Sin filtro, se muestran todas las peliculas de cualquier calidad
			case '0':
				$vote_count = 0;
				$vote_average = 0;
				break;
		
		}

		// guardar en session parametros busqueda
		if($_POST)
		{
			$parametros = array(
						'genero'  => $genero,
						'decada_inicio'  => $decada_inicio,
						'decada_fin'  => $decada_fin,
						'vote_count' => $vote_count,
						'vote_average' => $vote_average
						);
			$this->session->set_userdata($parametros);	
		}

		//dump($_POST);
		if($decada)
		{
			$recomendadas = $this->tmdbv3->discoverMovies($pag,'release_date.gte='.$this->session->userdata('decada_inicio').'&release_date.lte='.$this->session->userdata('decada_fin').'&with_genres='.$this->session->userdata('genero').'&vote_count.gte='.$this->session->userdata('vote_count').'&vote_average.gte='.$this->session->userdata('vote_average'));	
		}
		else
		{
			$recomendadas = $this->tmdbv3->discoverMovies($pag,'&with_genres='.$this->session->userdata('genero').'&vote_count.gte='.$this->session->userdata('vote_count').'&vote_average.gte='.$this->session->userdata('vote_average'));
		}
		

		//dump($recomendadas);die;


		foreach($recomendadas['results'] as $moviesim)
	    {
	    	// Si no tiene poster , ni la enseñamos!
	    	if(!$moviesim['poster_path'])
	    		continue;

	    	$peliculas[$i]['titulo'] = $moviesim['title'];
	    	$peliculas[$i]['id_pelicula'] = $moviesim['id'];
	    	$peliculas[$i]['url']  = urls_amigables($moviesim['title']." ".$moviesim['id']);
	    	$peliculas[$i]['fecha_estreno'] = $moviesim['release_date'];
	    	$peliculas[$i]['color'] = $colores[$i];
	    	$peliculas[$i]['color_fecha'] = $coloresl[$i];
	    	$peliculas[$i]['estilo'] = 'down-1';
	    	$peliculas[$i]['valoracion_5'] = $moviesim['vote_average']/2;
	    	$peliculas[$i]['valoracion'] = $moviesim['vote_average'] * 10;
	    	$peliculas[$i]['imagen'] = $img_url_small.$moviesim['poster_path'];

	    	// Mostrar mas realisticamente la valoracion de una pelicula
	    	// Si solo la ha votado una persona, no vamos a mostrar su puntuacion
	    	// Hasta un numero de votos de 4 personas, dudaremos!
	    	if($moviesim['vote_count']<5)
	    	{
	    		$peliculas[$i]['valoracion_5'] = round(($moviesim['vote_count'] * $moviesim['vote_average'])/9,2);
	    		$peliculas[$i]['valoracion'] = $peliculas[$i]['valoracion_5'] * 20;
	    	}

	    	/* Cuantas muestro?
	    	if($i  == 3)
	    		break;
			*/

	    	$i++;
	    	/*echo "<img src='".$img_url_small.$moviesim['poster_path']."' />";
	    	echo $moviesim['title']."(".$moviesim['vote_average'].")";*/

	    	//if($i == 4) break;
	    }

	    $datos['peliculas'] = $peliculas;
		$datos['total_encontradas'] = $recomendadas['total_results'];

		$datos['next_page'] = $pag + 1;


		/*********************************************
		*  Cargar VISTAS
		*********************************************/

		// HTML head + body + apertura div #page
		$this->load->view('base/head');
		// Menu
		$this->load->view('base/header');

		// Contenido
		$this->load->view('recpelis/recomendaciones',$datos);

		// Listas tops abajo
		$this->load->view('base/advert');
		// Form contacto,info,...
		$this->load->view('base/footer');

		// Cierre div #page body html
		$this->load->view('base/bottom');
	}
}