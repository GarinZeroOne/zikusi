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
	function mostrar()
	{
		

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
			case '70':
				$vote_count = 50;
				$vote_average = 6;
				break;
			case '40':
				$vote_count = 5;
				$vote_average = 4;
				break;
			case '0':
				$vote_count = 0;
				$vote_average = 0;
				break;
		
		}

		//dump($_POST);
		if($decada)
		{
			$recomendadas = $this->tmdbv3->discoverMovies(1,'release_date.gte='.$decada_inicio.'&release_date.lte='.$decada_fin.'&with_genres='.$genero.'&vote_count.gte='.$vote_count.'&vote_average.gte='.$vote_average);	
		}
		else
		{
			$recomendadas = $this->tmdbv3->discoverMovies(1,'&with_genres='.$genero.'&vote_count.gte='.$vote_count.'&vote_average.gte='.$vote_average);
		}
		

		//dump($recomendadas);die;

		
		foreach($recomendadas['results'] as $moviesim)
	    {
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

	    	/* Cuantas muestro?
	    	if($i  == 3)
	    		break;
			*/

	    	$i++;
	    	/*echo "<img src='".$img_url_small.$moviesim['poster_path']."' />";
	    	echo $moviesim['title']."(".$moviesim['vote_average'].")";*/
	    }

	    $datos['peliculas'] = $peliculas;

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