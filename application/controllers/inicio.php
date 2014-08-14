<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($id_pelicula = '13065')
	{
		//$this->load->view('welcome_message');
		$apikey = 't67qf3pay9rf3tjdvz8r224k';
		$q = urlencode('connan'); // make sure to url encode an query parameters

		// construct the query with our apikey and the query we want to make
		$endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/movies/'.$id_pelicula.'/similar.json?apikey='.$apikey;

		// setup curl to make a call to the endpoint
		$session = curl_init($endpoint);

		// indicates that we want the response back
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

		// exec curl and get the data back
		$data = curl_exec($session);

		// remember to close the curl session once we are finished retrieveing the data
		curl_close($session);

		// decode the json data to make it easier to parse the php
		$search_results = json_decode($data);
		if ($search_results === NULL) die('Error parsing json');

		// play with the data!
		$movies = $search_results->movies;
		echo '<ul>';
		foreach ($movies as $movie) {
		  echo '<li><a href="http://localhost/zikusi/inicio/index/' . $movie->id . '">' . $movie->title . " (" . $movie->year . ")</a> <img src='".$movie->posters->thumbnail."' />".$movie->ratings->audience_score."</li>";
		}
		echo '</ul>';
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	function portada()
	{
		// API TheMovieDatabase
		$this->load->library('TMDBv3');

		// URL amigables
		$this->load->helper('url_amigables');

		$img_url_small = 'http://image.tmdb.org/t/p/w300/';

		// Cartelera
		//$cartelera = $this->tmdbv3->nowPlayingMovies(1,'es');

		// Populares
		$cartelera = $this->tmdbv3->popularMovies(1,'es');
		
		$i = 0;

		$estilos = array('left-1','left-2','down-1','down-2','down-3','down-4','right-1','right-2');
		$colores = array('0080af','111111','9a0000','222222','c95a00','000000','0080af','111111','9a0000','222222','c95a00','000000','0080af','111111','9a0000','222222','c95a00','000000');
		$coloresl = array('00a0db','00a0db','00a0db','e99f00','e99f00','e99f00','00a0db','00a0db','00a0db','e99f00','e99f00','e99f00','00a0db','00a0db','00a0db','e99f00','e99f00','e99f00');

		//echo"<pre>";print_r($cartelera);echo"</pre>";

		foreach($cartelera['results'] as $moviesim)
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

	    	if($i  == 15)
	    		break;

	    	$i++;
	    	/*echo "<img src='".$img_url_small.$moviesim['poster_path']."' />";
	    	echo $moviesim['title']."(".$moviesim['vote_average'].")";*/
	    }
	    
	    //dump($peliculas);

	    $datos['peliculas'] = $peliculas;

		// HTML head + body + apertura div #page
		$this->load->view('base/head');

		// Menu
		$this->load->view('base/header');
		// Contenido
		$this->load->view('base/main',$datos);
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
	function palomitacas()
	{
		//$params = array('apikey' => 'c1f8be0bff5fc11dfd68ddf4c39b7d98','language' => 'es');

		$img_url_small = 'http://image.tmdb.org/t/p/w154/';

		$this->load->library('TMDBv3');

		$img_url_original = $this->tmdbv3->getImageURL();
		//print_r($img_url);die;

		// BUSQUEDA DE PELICULAS

		//Title to search for
	    $title = 'cars';
	    $language='es';
	    $searchTitle = $this->tmdbv3->searchMovie($title,$language);
	    // return array
	    echo"<pre>";print_r($searchTitle);echo"</pre>";

	    foreach($searchTitle['results'] as $movie)
	    {
	    	echo "<img src='".$img_url_small.$movie['poster_path']."' />";
			echo $movie['title']."(".$movie['vote_average'].")<br>";

			$id_pelicula = $movie['id'];

			break;
	    }

		echo "ok";

		// INFORMACION DE LA PELICULA
		$idMovie=$id_pelicula;
	    #Info
	    $movieInfo = $this->tmdbv3->movieDetail($idMovie);
	    // return array
	    echo"<pre>";print_r($movieInfo);echo"</pre>";

	    // TRAILERS YOUTUBE
	    $idMovie=$id_pelicula;
	    $movieTrailer = $this->tmdbv3->movieTrailer($idMovie);
	    // return array
	    echo '<iframe width="420" height="315" src="//www.youtube.com/embed/'.$movieTrailer['youtube'][0]['source'].'" frameborder="0" allowfullscreen></iframe>';

	    // PELICULAS PARECIDAS
	    $idMovie=$id_pelicula;
	    $movieTitles = $this->tmdbv3->similarMovies($idMovie);

	    foreach($movieTitles['results'] as $moviesim)
	    {
	    	echo "<img src='".$img_url_small.$moviesim['poster_path']."' />";
	    }
	    // return array
	    echo"<pre>";print_r($movieTitles);echo"</pre>";
	    

	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	function ultima()
	{
		$this->load->library('TMDBv3');

		$ultima = $this->tmdbv3->latestMovie();

		echo"<pre>";print_r($ultima);echo"</pre>";
	}

	/**
	 * En cartelera
	 *
	 * @return void
	 * @author 
	 **/
	function cartelera()
	{
		$this->load->library('TMDBv3');

		$img_url_small = 'http://image.tmdb.org/t/p/w154/';

		$cartelera = $this->tmdbv3->nowPlayingMovies(1,'es');

		foreach($cartelera['results'] as $moviesim)
	    {
	    	echo "<img src='".$img_url_small.$moviesim['poster_path']."' />";
	    	echo $moviesim['title'];
	    }


	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	function topRated()
	{
		$this->load->library('TMDBv3');

		$img_url_small = 'http://image.tmdb.org/t/p/w154/';

		$toprated = $this->tmdbv3->topRated(1,'es');

		foreach($toprated['results'] as $moviesim)
	    {
	    	echo "<img src='".$img_url_small.$moviesim['poster_path']."' />";
	    	echo $moviesim['title']."(".$moviesim['vote_average'].")";
	    }
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */