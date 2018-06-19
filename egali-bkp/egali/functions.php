<?php
/**
 * egali functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package egali 
 */

if ( ! function_exists( 'egali_setup' ) ) :
	/**
	 * Runs before the init hook. The init hook is too late for some features, such as indicating support for post thumbnails.
	 */
	function egali_setup() {
		load_theme_textdomain( 'egali' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'egali' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'egali_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'egali_setup' );

/**
 * Mount enqueue styles
 */ 
function egali_enqueue_styles() {
    wp_enqueue_style( 'egali-material-design-iconic-font-styles', get_stylesheet_directory_uri() . '/css/fonts/material-design-iconic-font.css' );
    wp_enqueue_style( 'egali-oswald-font-styles', 'https://fonts.googleapis.com/css?family=Oswald:300,400,500,700' );
    wp_enqueue_style( 'egali-open-sans-font-styles', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i' );
	wp_enqueue_style( 'egali-bootstrap-min-styles', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );


	if (is_home() || is_category() || preg_match("/local/", $_SERVER['REQUEST_URI']) || is_singular('post') || preg_match("/blog/", $_SERVER['REQUEST_URI'])){
		wp_enqueue_style( 'egali-style-master-blog-styles', get_stylesheet_directory_uri() . '/css/style-master-blog.css' );
		wp_enqueue_style( 'egali-home-styles', get_stylesheet_directory_uri() . '/css/home.css' );
		wp_enqueue_style( 'egali-style-blog-styles', get_template_directory_uri().'/css/style-blog.css');
		if (preg_match("/blog/", $_SERVER['REQUEST_URI']) || preg_match("/local/", $_SERVER['REQUEST_URI']))
			wp_enqueue_style( 'egali-style-styles', get_template_directory_uri().'/css/style.css');
	} else {
		wp_enqueue_style( 'egali-style-master-styles', get_stylesheet_directory_uri() . '/css/style-master.css' );
		wp_enqueue_style( 'egali-home-styles', get_stylesheet_directory_uri() . '/css/home.css' );
		wp_enqueue_style( 'egali-style-styles', get_template_directory_uri().'/css/style.css');
	}

	wp_enqueue_style( 'egali-owl-carousel-min-styles', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'egali-owl-theme-default-min-styles', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css' );

}
add_action( 'wp_enqueue_scripts', 'egali_enqueue_styles' );
/* END Mount enqueue styles */


/**
 * Add scripts child to footer
 */
function enqueue_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'egali-popper-min-script', get_theme_file_uri().'/js/popper.min.js', 'jquery'  );
	wp_enqueue_script( 'egali-bootstrap-min-script', get_theme_file_uri().'/js/bootstrap.min.js', 'jquery'  );
	wp_enqueue_script( 'egali-carousel-script', get_theme_file_uri().'/js/owl.carousel.js', 'jquery');
	wp_enqueue_script( 'egali-html5lightbox-script', get_theme_file_uri().'/js/html5lightbox.js', 'jquery');
	wp_enqueue_script( 'egali-easing-script', get_theme_file_uri().'/js/jquery.easing.1.3.js', 'jquery' );
	wp_enqueue_script( 'egali-functions-script', get_theme_file_uri().'/js/functions.js', 'jquery'  );
	wp_enqueue_script( 'egali-masked-input-script', get_theme_file_uri().'/js/jquery.maskedinput.min.js', 'jquery' );
	wp_enqueue_script( 'egali-localizaUsuario', get_theme_file_uri().'/js/localizaUsuario.js', array('jquery','egali-functions-script') );
}
add_action( 'wp_footer', 'enqueue_scripts' );
/* END Add scripts child to footer */

/**
 * REMOVE unnecessary styles and scripts to the head 
 */
// Removes the emoji styles
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Removes the wlwmanifest link
remove_action( 'wp_head', 'wlwmanifest_link' );
// Removes the RSD link
remove_action( 'wp_head', 'rsd_link' );
// Removes the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links_extra', 3 ); 
// Removes links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'feed_links', 2 ); 
// Removes the index link
remove_action( 'wp_head', 'index_rel_link' );
// remove WP 4.9+ dns-prefetch nonsense
remove_action( 'wp_head', 'wp_resource_hints', 2 );

function remove_json_api () {
    // Remove the REST API lines from the HTML Header
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );
    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );
    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
   // Remove all embeds rewrite rules.
   //add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
}
add_action( 'after_setup_theme', 'remove_json_api' );

// Remove recent comments styles
function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recent_comments_style');
/* END REMOVE unnecessary styles and scripts to the head */

/** SHOW excerpt in ADMIN */
function wpse_edit_post_show_excerpt() {
	$user = wp_get_current_user();
	$unchecked = get_user_meta( $user->ID, 'metaboxhidden_post', true );
	$key = array_search( 'postexcerpt', $unchecked );
	if ( FALSE !== $key ) {
	  array_splice( $unchecked, $key, 1 );
	  update_user_meta( $user->ID, 'metaboxhidden_post', $unchecked );
	}
}
add_action( 'admin_init', 'wpse_edit_post_show_excerpt', 10 );

function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			return mb_substr( $subex, 0, $excut ).'[...]';
		} else {
			return $subex.'[...]';
		}
	} else {
		return $excerpt;
	}
}
/** END SHOW excerpt in ADMIN */

/**
 * FUNCTIONS default WordPress
 */
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 * END FUNCTIONS default WordPress
 */

/**
 * CUSTOM FUNCTIONS
 */

//Custom Post Types e outras funções do admin.
require get_template_directory() . '/admin/admin.php';

//CONEXÃO BASE EPS-TM.
require get_template_directory() . '/admin/connect_eps.php';

//INSERIR CONTATOS E ATENDIMENTOS NO EPS-TM PELO FC E OF
add_filter("wpcf7_posted_data", function ($wpcf7_posted_data) {
    $post = get_post($wpcf7_posted_data["_wpcf7_container_post"]);
	$wpcf7_posted_data["url"] = get_permalink($post);
	
    return $wpcf7_posted_data;
});

function validateDate($date, $format = 'Y-m-d H:i:s')
{
	$d = DateTime::createFromFormat($format, $date);
	return $d && $d->format($format) == $date;
}

function var_error_log( $var ){
    ob_start();                    // start buffer capture
    var_dump( $var );              // dump the values
    $contents = ob_get_contents(); // put the buffer into a variable    
	error_log( $contents );        // log contents of the result of var_dump( $object )
	return ob_get_clean();
}

function databaseRecord($wpcf7){
	date_default_timezone_set("America/Sao_Paulo");
	setlocale(LC_ALL, 'pt_BR');
	global $egali_globais;
	session_start();
	if (!isset($wpcf7->posted_data) && $wpcf7->id !== 2411 && class_exists('WPCF7_Submission')) {
		$date = date( 'y-m-d H:i:s' );
		$exception = '';
		$stringData = '';
		$log = "posted data set and class exists!\n";
	
		$submission = WPCF7_Submission::get_instance();

		if ( $submission ) {
			$log .= "submission exists!\n";
			$data = $submission->get_posted_data();

			$nome = $data['nome'];
			$email = $data['email'];
			$telefone = $data["telefone"];
			$comoconheceu = $data["como_conheceu"];
			$assunto = $data["assunto"];
			$unidade = $data["unidade"];
			$programa = $data["programa"];
			$pais = $data["pais"];
			$data_viagem = isset($data['data_viagem']) ? $data['data_viagem'] : '';

			if (validateDate($data_viagem, 'd/m/Y')) {
				$data_viagemArray = explode('/', $data_viagem);
				if ((is_numeric($data_viagemArray[2])) && (is_numeric($data_viagemArray[1]))) {
					$data_viagem = $data_viagemArray[2].$data_viagemArray[1];
				}
			}

			$mensagem = $data["descricao"];
			$news = isset($data['news'][0]) ? $data['news'][0] : '0';
			$url = $data["url"];

			$teen = ($programa == 1 || $programa == 2) ? -1 : 1;
			$session_id = md5(uniqid(rand()));

			if(isset($_SESSION['session_id']) && $_SESSION['session_id'] == $session_id){
				echo "session";
				exit();
			}else{
				$_SESSION['session_id'] = $session_id;

				$db = Database::conexao();
				// Consulta no banco de dados se o usuário já existe
				$sql_search_contato = 'SELECT cod_contato 
					FROM contato 
					WHERE email = :email';

				$stmt = $db->prepare( $sql_search_contato );
				$stmt->bindValue(":email", $email);

				try{
					$stmt->execute();

					$contato = $stmt->fetch(PDO::FETCH_ASSOC);

					if ($contato){
						// Atualiza o contato
						$iCodContato = $contato['cod_contato'];
						$iSessionContato = isset($contato['session_id']) ? $contato['session_id'] : '';
						
						if($iSessionContato == $_SESSION['session_id']) $iSessionCt = $iSessionContato;
						
						$sql_update_contato = 'UPDATE contato SET 
							data_prox = CURDATE() 
							WHERE cod_contato = :cod_contato';

						$stmt = $db->prepare( $sql_update_contato );
						$stmt->bindValue(":cod_contato", $iCodContato);

						try{
							$result = $stmt->execute();
						}
						catch(Exception $e) {
							$exception .= 'Exception -> ';
							$exception .= var_error_log($e->getMessage());
							$exception .= var_error_log($stmt->errorInfo());
							$stringData .= "$date\n$exception\nSQL: $sql_update_contato\nLOG: $log\n\n";
							$myFile = "error_log.log";
							$fh2 = fopen($myFile, 'a') or die("can't open file to append");
							fwrite($fh2, $stringData);
							fclose($fh2);
							http_response_code(500);
							die('Error establishing connection with database');
						}
					} else {
						$sql_insert_contato = 'INSERT INTO contato (
							nome, 
							telefone, 
							email, 
							cod_usuario, 
							cod_status, 
							cod_usuario_inc, 
							data_inc, 
							embarque_previsto, 
							data_prox, 
							news, 
							coms, 
							contato1_code, 
							tipo_intercambio, 
							contato1_date, 
							com_id, 
							uni_id, 
							teen, 
							cod_cidade_old, 
							data_upd, 
							data_upd_status,
							url,
							session_id
						)VALUES(
							:nome, 
							:telefone, 
							:email,
							:cod_usuario, 
							:cod_status, 
							:cod_usuario_inc, 
							NOW(), 
							:embarque_previsto,  
							NOW(),  
							:news, 
							:coms, 
							:contato1_code, 
							:tipo_intercambio, 
							NOW(), 
							:com_id, 
							:uni_id, 
							:teen, 
							:cod_cidade_old, 
							:data_upd, 
							:data_upd_status,
							:url,
							:session_id
						)';

						$stmt = $db->prepare( $sql_insert_contato );
						$stmt->bindValue(":nome", $nome);
						$stmt->bindValue(":telefone", $telefone);
						$stmt->bindValue(":email", $email);
						$stmt->bindValue(":cod_usuario", "2");
						$stmt->bindValue(":cod_status", "0"); 
						$stmt->bindValue(":cod_usuario_inc", "2"); 
						$stmt->bindValue(":embarque_previsto", $data_viagem); 
						$stmt->bindValue(":news", $news); 
						$stmt->bindValue(":coms", $mensagem); 
						$stmt->bindValue(":contato1_code", "3"); 
						$stmt->bindValue(":tipo_intercambio", $programa); 
						$stmt->bindValue(":com_id", $comoconheceu); 
						$stmt->bindValue(":uni_id", $unidade); 
						$stmt->bindValue(":teen", $teen); 
						$stmt->bindValue(":cod_cidade_old", "1"); 
						$stmt->bindValue(":data_upd", "0000-00-00 00:00:00");
						$stmt->bindValue(":data_upd_status", "0000-00-00 00:00:00");
						$stmt->bindValue(":url", $url);
						$stmt->bindValue(":session_id", $_SESSION['session_id']);

						try {
							$result = $stmt->execute();
							$iCodContato = $db->lastInsertId();
						}
						catch(Exception $e) {
							$exception .= 'Exception -> ';
							$exception .= var_error_log($e->getMessage());
							$exception .= var_error_log($stmt->errorInfo());
							$stringData = "$date\n$exception\nSQL: $sql_insert_contato\nLOG: $log\n\n";
							$myFile = "error_log.log";
							$fh2 = fopen($myFile, 'a') or die("can't open file to append");
							fwrite($fh2, $stringData);
							fclose($fh2);
							http_response_code(500);
							die('Error establishing connection with database');
						}
					}

					// Verifica se já tem uma session igual nos atendimentos
					if (!isset($iSessionCt)){
						if (isset($iCodContato) && !empty($iCodContato)) {
							// Insere atendimento
							$sql_insert_atendimento = 'INSERT INTO contato_atend (
								cod_contato, 
								cod_usuario, 
								prc_id, 
								src_id, 
								atend_data, 
								atend_com
							)VALUES(
								:cod_contato,
								:cod_usuario,
								:prc_id,
								:src_id,
								NOW(),
								:atend_com
							)';

							$stmt = $db->prepare( $sql_insert_atendimento );
							$stmt->bindValue(":cod_contato", $iCodContato);
							$stmt->bindValue(":cod_usuario", "2");
							$stmt->bindValue(":prc_id", "3");
							$stmt->bindValue(":src_id", "2");
							$stmt->bindValue(":atend_com", $mensagem); 

							try{
								$result = $stmt->execute();

								$termsPais = get_terms( array('taxonomy' => 'local') , array( 'parent' => 0 ) );
								foreach ( $termsPais as $paisArray ){
									if(trim($paisArray->name) != "") {
										if ($paisArray->description == $pais){
											$nomePais = $paisArray->name;
										}
									}
								}

								// Consulta ID do país
								//$pais_trat = utf8_decode($nomePais);

								$sql_search_pais = 'SELECT cod_pais 
									FROM pais 
									WHERE pais = :pais';
								
								$stmt = $db->prepare( $sql_search_pais );
								$stmt->bindValue(":pais", $nomePais);

								try{
									$stmt->execute();

									$pais_result = $stmt->fetch(PDO::FETCH_ASSOC);

									if ($pais_result){
										$codPais = $pais_result['cod_pais'];

										// Relaciona com país
										$sql_insert_pais = 'INSERT INTO contato_pais (
											cod_contato, 
											cod_pais
										)VALUES(
											:cod_contato,
											:cod_pais
										)';

										$stmt = $db->prepare( $sql_insert_pais );
										$stmt->bindValue(":cod_contato", $iCodContato);
										$stmt->bindValue(":cod_pais", $codPais);

										try{
											$stmt->execute();
										}
										catch(Exception $e) {
											$exception .= 'Exception -> ';
											$exception .= var_error_log($e->getMessage());
											$exception .= var_error_log($stmt->errorInfo());
											$stringData .= "$date\n$exception\nSQL: $sql_insert_pais\nLOG: $log\n\n";
											$myFile = "error_log.log";
											$fh2 = fopen($myFile, 'a') or die("can't open file to append");
											fwrite($fh2, $stringData);
											fclose($fh2);
											http_response_code(500);
											die('Error establishing connection with database');
										}
									}
								}
								catch(Exception $e) {
									$exception .= 'Exception -> ';
									$exception .= var_error_log($e->getMessage());
									$exception .= var_error_log($stmt->errorInfo());
									$stringData .= "$date\n$exception\nSQL: $sql_search_pais\nLOG: $log\n\n";
									$myFile = "error_log.log";
									$fh2 = fopen($myFile, 'a') or die("can't open file to append");
									fwrite($fh2, $stringData);
									fclose($fh2);
									http_response_code(500);
									die('Error establishing connection with database');
								}
							}
							catch(Exception $e) {
								$exception .= 'Exception -> ';
								$exception .= var_error_log($e->getMessage());
								$exception .= var_error_log($stmt->errorInfo());
								$stringData .= "$date\n$exception\nSQL: $sql_insert_atendimento\nLOG: $log\n\n";
								$myFile = "error_log.log";
								$fh2 = fopen($myFile, 'a') or die("can't open file to append");
								fwrite($fh2, $stringData);
								fclose($fh2);
								http_response_code(500);
								die('Error establishing connection with database');
							}
					
						}
					}
				}
				catch(Exception $e) {
					$exception .= 'Exception -> ';
					$exception .= var_error_log($e->getMessage());
					$exception .= var_error_log($stmt->errorInfo());
					$stringData .= "$date\n$exception\nSQL: $sql_search_contato\nLOG: $log\n\n";
					$myFile = "error_log.log";
					$fh2 = fopen($myFile, 'a') or die("can't open file to append");
					fwrite($fh2, $stringData);
					fclose($fh2);
					http_response_code(500);
					die('Error establishing connection with database');
				}
			}
		}		
	}
}
add_action('wpcf7_before_send_mail','databaseRecord');
//FIM INSERIR CONTATOS E ATENDIMENTOS NO EPS-TM PELO FC E OF

//Seta permalink de intercâmbios para "intercambios/tipointercambio/titulo
function intercambio_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'intercambio' ){
        $terms = wp_get_object_terms( $post->ID, 'tipointercambio' );
        if( $terms ){
            return str_replace( '%tipointercambio%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'intercambio_permalinks', 1, 2 );

//Seta permalink de destinos para "destinos/local/titulo
function destino_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'destino' ){
        $terms = wp_get_object_terms( $post->ID, 'local' );
        if( $terms ){
			return str_replace( '%local%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'destino_permalinks', 1, 2 );

//Popula selects com dados dinâmicos nos forms de orçamento fácil e fale conosco
function forms_populaSelects($tag) {
	global $egali_globais;
	
	switch($tag['name']) {
		
		case "programa":
		$termsTiposIntercambios = get_terms( array('taxonomy' => 'tipointercambio') , array( 'parent' => 0 ) );
		foreach ( $termsTiposIntercambios as $tipoIntercambio ){
			// o campo "description" do termo contem um json onde set zero é a ID EPS 
			$jsonDados = json_decode($tipoIntercambio->description);
			if($jsonDados != null) {
				$idEps = $jsonDados[0];
			} else {
				$idEps = "";
			}
			if(trim($tipoIntercambio->name) != "") {
				$tag['raw_values'][] = $tipoIntercambio->name.'|'.$idEps;
				$tag['values'][] = $idEps;
				$tag['labels'][] = $tipoIntercambio->name;
			}
		}
		break;

		case "unidade":
		$args = array(
			'post_type' => 'loja',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC'
		);
		$lojas = new WP_Query($args);
		if ( $lojas->have_posts() ) {
			while ( $lojas->have_posts()) {
				$lojas->the_post();
				$loja_idEps = get_post_meta(get_the_ID(),'loja_idEps',true);
				$tag['raw_values'][] = get_the_title().'|'.$loja_idEps;
				$tag['values'][] = $loja_idEps;
				$tag['labels'][] = get_the_title();
			}
		}
		break;

		case "pais":
		$termsPais = get_terms( array('taxonomy' => 'local') , array( 'parent' => 0 ) );
		foreach ( $termsPais as $pais ){
			if(trim($pais->name) != "") {
				if ($pais->slug !== "todos-os-paises"){
					$tag['raw_values'][] = $pais->name.'|'.$pais->description;
					$tag['values'][] = $pais->description;
					$tag['labels'][] = $pais->name;
				}
			}
		}
		break;

		case "como_conheceu":
		$como_conheceu = array(
			array('id_eps' => "36", 'nome' => 'Agência de Turismo'),
			array('id_eps' => "48", 'nome' => 'AIESEC'),
			array('id_eps' => "37", 'nome' => 'Cartaz'),
			array('id_eps' => "38", 'nome' => 'Colégio'),
			array('id_eps' => "55", 'nome' => 'Empresas'),
			array('id_eps' => "47", 'nome' => 'Escolas de Idiomas'),
			array('id_eps' => "57", 'nome' => 'Eventos'),
			array('id_eps' => "39", 'nome' => 'Indicação'),
			array('id_eps' => "50", 'nome' => 'Internet - BLOGS'),
			array('id_eps' => "51", 'nome' => 'Internet - E-MAIL MKT'),
			array('id_eps' => "49", 'nome' => 'Internet - FACEBOOK'),
			array('id_eps' => "46", 'nome' => 'Internet - GOOGLE'),
			array('id_eps' => "58", 'nome' => 'Internet - GOOGLE PLUS'),
			array('id_eps' => "59", 'nome' => 'Internet - INSTAGRAM'),
			array('id_eps' => "60", 'nome' => 'Internet - TWITTER'),
			array('id_eps' => "62", 'nome' => 'Internet - YOUTUBE'),
			array('id_eps' => "40", 'nome' => 'Jornal'),
			array('id_eps' => "42", 'nome' => 'Panfleto'),
			array('id_eps' => "43", 'nome' => 'Rádio'),
			array('id_eps' => "44", 'nome' => 'Revista'),
			array('id_eps' => "33", 'nome' => 'Salão do Estudante'),
			array('id_eps' => "64", 'nome' => 'Superplayer'),
			array('id_eps' => "35", 'nome' => 'Televisão'),
			array('id_eps' => "45", 'nome' => 'Universidade'),
			array('id_eps' => "23", 'nome' => 'Vitrine')
		);
		foreach($como_conheceu as $value) {
			$tag['raw_values'][] = $value["nome"].'|'.$value["id_eps"];
			$tag['values'][] = $value["id_eps"];
			$tag['labels'][] = $value["nome"];
		}
		break;	
	}

	$pipes = new WPCF7_Pipes( $tag['raw_values'] );
	$tag['values'] = $pipes->collect_befores();
	$tag['pipes'] = $pipes;

    return $tag;
}
add_filter('wpcf7_form_tag','forms_populaSelects',10, 2);

//Cria arrays com destinos, intercâmbios etc
function egali_criaEstruturasDados() {
	global $egali_globais;

	//array categorias

	$categorias = get_categories();
	foreach($categorias as $cat) {
		$egali_globais["assuntos"][] = array( "nome" => $cat->name , "slug" => $cat->slug );
	}

	//array taxonomia "locais" (paises/cidades)

	$termsPaises = get_terms( array('taxonomy' => 'local') , array( 'parent' => 0 ) );
	$paises = array();
	foreach ( $termsPaises as $pais ){
		$paises[$pais->slug] = array( "nome" => $pais->name , "slug" => $pais->slug , "link" => false , "cidades" => array());
		$termsCidades = get_terms( array('taxonomy' => 'local') , array( 'parent' => $pais->term_id ) );
		foreach ( $termsCidades as $cidade ){
			$paises[$pais->slug]["cidades"][$cidade->slug] = array( "nome" => $cidade->name , "slug" => $cidade->slug , "link" => false );
		}
		ksort($paises[$pais->slug]["cidades"]);
		//$paises[$pais->slug]["cidades"] = array_values($paises[$pais->slug]["cidades"]);
	}
	ksort($paises);
	//$paises = array_values($paises);
	$egali_globais["locais"] = $paises;


	//array destinos
	$egali_globais["destinos"] = $paises;
	$argsDestinos = array(
		'posts_per_page' => -1,
		'post_type'	=> 'destino'
	);
	$buscaDestinos = new WP_Query($argsDestinos);
	if($buscaDestinos->have_posts()) {
		while ($buscaDestinos->have_posts()) {
			$buscaDestinos->the_post();

			$destino_id = get_the_ID();
			$locais = get_the_terms($destino_id,'local');
			$locais = (array)$locais;
			if(count($locais) == 1 && $locais[0]->parent == 0) {

				//destino é país
				
				$pais_nome = get_the_title();
				$pais_link = get_the_permalink();
				$pais_slug = $post->post_name;
				$pais_key = $locais[0]->slug;
				$pais_dados = get_post_meta($destino_id,'destino_dados',true);
				$pais_imagemDestaque = $pais_dados["imagemDestaque"];
				$egali_globais["destinos"][$pais_key]["nome"] = $pais_nome;
				$egali_globais["destinos"][$pais_key]["slug"] = $pais_slug;
				$egali_globais["destinos"][$pais_key]["link"] = $pais_link;
				$egali_globais["destinos"][$pais_key]["imagemDestaque"] = $pais_imagemDestaque;
				//$egali_globais["destinos"][$pais_key]["dados"] = $pais_dados;


			} else if(count($locais) == 2 && ($locais[0]->parent == 0 || $locais[1]->parent == 0 && $locais[0]->parent > 0 || $locais[1]->parent > 0)) {

				//destino é cidade

				if($locais[0]->parent == 0) {
					$pais = 0;
					$cidade = 1;
				} else {
					$pais = 1;
					$cidade = 0;
				}
				$pais_key = $locais[$pais]->slug;
				if($locais[$cidade]->parent == $locais[$pais]->term_id) {
					$cidade_nome = get_the_title();
					$cidade_link = get_the_permalink();
					$cidade_slug = $post->post_name;
					$cidade_key = $locais[$cidade]->slug;
					$cidade_dados = get_post_meta($destino_id,'destino_dados',true);
					$cidade_imagemDestaque = $cidade_dados["imagemDestaque"];
					$egali_globais["destinos"][$pais_key]["cidades"][$cidade_key]["nome"] = $cidade_nome;
					$egali_globais["destinos"][$pais_key]["cidades"][$cidade_key]["slug"] = $cidade_slug;
					$egali_globais["destinos"][$pais_key]["cidades"][$cidade_key]["link"] = $cidade_link;
					$egali_globais["destinos"][$pais_key]["cidades"][$cidade_key]["imagemDestaque"] = $cidade_imagemDestaque;
					//$egali_globais["destinos"][$pais_key]["cidades"][$cidade_key]["dados"] = $cidade_dados;
				}

			}

		}

	}

	//array intercambios

	$argsIntercambios = array(
		'posts_per_page' => -1,
		'post_type'	=> 'intercambio'
	);
	$buscaIntercambios = new WP_Query($argsIntercambios);
	if($buscaIntercambios->have_posts()) {
		$egali_globais["intercambios"] = array();
		while ($buscaIntercambios->have_posts()) {

			$buscaIntercambios->the_post();
			$intercambio_id = get_the_ID();
			$nome = get_the_title();
			$nomeKey = $post->post_name;
			$link = get_the_permalink();
			$dados = get_post_meta($intercambio_id,'intercambio_dados',true);
			$fraseDestaque = get_post_meta($intercambio_id,'intercambio_fraseDestaque',true);
			$tipos = get_the_terms($intercambio_id,'tipointercambio');
			$tipos = (array)$tipos;

			foreach($tipos as $tipo) {
				$tipo = (array)$tipo;
				$tipoNome = $tipo["name"];
				$tipoKey = $tipo["slug"];
			}
			if(!isset($egali_globais["intercambios"][$tipoKey])) {
				$egali_globais["intercambios"][$tipoKey] = array( 'nome' => $tipoNome , 'slug' => $tipoKey , 'cursos' => array());
			}
			$egali_globais["intercambios"][$tipoKey]['cursos'][] = array( 'nome' => $nome , 'link' => $link , 'imagem' => $dados["imagemDestaque"] , 'fraseDestaque' => $fraseDestaque );
		}
	}
	//coloca intercambios por ordem alfabética (tipos e cursos)
	ksort($egali_globais["intercambios"]);
	//$egali_globais["intercambios"] = array_values($egali_globais["intercambios"]);
	foreach($egali_globais["intercambios"] as $k => $v) {
		ksort($egali_globais["intercambios"][$k]["cursos"]);
		//$egali_globais["intercambios"][$k]["cursos"] = array_values($egali_globais["intercambios"][$k]["cursos"]);
	}

	wp_reset_query();

}
add_action('init', 'egali_criaEstruturasDados');


// POSTS MAIS ACESSADOS
// Verifica se não existe nenhuma função com o nome tutsup_session_start
if ( ! function_exists( 'tutsup_session_start' ) ) {
    // Cria a função
    function tutsup_session_start() {
        // Inicia uma sessão PHP
        if ( ! session_id() ) session_start();
    }
    // Executa a ação
    add_action( 'init', 'tutsup_session_start' );
}

// Verifica se não existe nenhuma função com o nome tp_count_post_views
if ( ! function_exists( 'tp_count_post_views' ) ) {
    // Conta os views do post
    function tp_count_post_views () {	
        // Garante que vamos tratar apenas de posts
        if ( is_single() ) {
            // Precisamos da variável $post global para obter o ID do post
            global $post;
            
            // Se a sessão daquele posts não estiver vazia
            if ( empty( $_SESSION[ 'tp_post_counter_' . $post->ID ] ) ) {
                
                // Cria a sessão do posts
                $_SESSION[ 'tp_post_counter_' . $post->ID ] = true;
            
                // Cria ou obtém o valor da chave para contarmos
                $key = 'tp_post_counter';
                $key_value = get_post_meta( $post->ID, $key, true );
                
                // Se a chave estiver vazia, valor será 1
                if ( empty( $key_value ) ) { // Verifica o valor
                    $key_value = 1;
                    update_post_meta( $post->ID, $key, $key_value );
                } else {
                    // Caso contrário, o valor atual + 1
                    $key_value += 1;
                    update_post_meta( $post->ID, $key, $key_value );
                } // Verifica o valor
            } // Checa a sessão
        } // is_single
        
        return;
    }
    add_action( 'get_header', 'tp_count_post_views' );
}
// FIM POSTS MAIS ACESSADOS

//COMENTÁRIOS
function enqueue_comment_reply() {
    // on single blog post pages with comments open and threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
        // enqueue the javascript that performs in-link comment reply fanciness
        wp_enqueue_script( 'comment-reply' ); 
    }
}
// Hook into wp_enqueue_scripts
add_action( 'wp_enqueue_scripts', 'enqueue_comment_reply' );

function format_comment($comment, $args, $depth) {
    
	$GLOBALS['comment'] = $comment; 
	$GLOBALS['comment_depth'] = $depth;
	?>
	
	 <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	 	<article id="div-comment-<?php comment_ID() ?>" class="comment-body">
			<div class="img-comments"><?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?></div>
			
			<?php if ($comment->comment_approved == '0') : ?>
				<em><?php _e('Your comment is awaiting moderation.') ?></em><br />
			<?php endif; ?>
			
			<div class="text-comments">
				<small><?php printf(__('%s'), get_comment_author_link()) ?> - <span><?php printf(__('%1$s'), get_comment_date(), get_comment_time()) ?></span></small>
				<?php comment_text(); ?>
			</div>
			
			<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('reply_text' => 'Responder', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
			</div>
		</article>
	 
<?php }
// FIM COMENTÁRIOS

/**
 * END CUSTOM FUNCTIONS
 */

 /*
 * FUNÇÕES AJAX
 */

 //carrega lojas de acordo com filtro - script archive-loja.php
add_action( 'wp_ajax_nopriv_carregaLojas', 'egali_carregaLojas');
add_action( 'wp_ajax_carregaLojas', 'egali_carregaLojas');
function egali_carregaLojas() {

	extract($_POST,EXTR_OVERWRITE);
	$l = array();
	$args = array(
		'post_type' => 'loja',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'localloja',
				'field' => 'slug',
				'terms' => $local
			)
		),
		'orderby' => 'title',
		'order' => 'ASC'
	);
	$lojas = new WP_Query($args);
	if ( $lojas->have_posts() ) {
		while ( $lojas->have_posts()) {
			$lojas->the_post();
			$loja_dados = get_post_meta(get_the_ID(),'loja_dados',true);
			$l[] = array( "nome" => get_the_title() , "endereco" => str_replace("'","",$loja_dados["endereco"]) , "telefone" => $loja_dados["telefone"] );
		}
	}

	exit(json_encode(array( 'sucesso' => true , 'lojas' => $l )));
}

//recebe posição do usuário que veio do js, via navigator.geolocation.getCurrentPosition() /  script: js/localizaUsuario.js
add_action( 'wp_ajax_nopriv_enviaPosicao', 'egali_enviaPosicao');
add_action( 'wp_ajax_enviaPosicao', 'egali_enviaPosicao');
function egali_enviaPosicao() {

	if(!session_id()) session_start();
	extract($_POST,EXTR_OVERWRITE);
	if(isset($posicao["sucesso"]) && $posicao["sucesso"] == false) {

		//não foi possível localizar o usuário por js. Usa "fallback" via ip
		$json = @file_get_contents("http://ipinfo.io/{$_SERVER['REMOTE_ADDR']}");
		json_decode($json,true);
		if($json != null) {
			
			//exemplo json retorno: {"ip":"177.18.189.188","hostname":"177.18.189.188.static.host.gvt.net.br","city":"Porto Alegre","region":"Rio Grande do Sul","country":"BR","loc":"-30.0333,-51.2000","org":"AS18881 TELEF\u00d4NICA BRASIL S.A"}

			$loc = explode(",",$json["loc"]);
			$loc[0] = floatval($loc[0]);
			$loc[1] = floatval($loc[1]);

			$userLocation = array( "status" => "localIp" , "latitude" => $loc[0] , "longitude" => $loc[1] , "lojaMaisProxima" => 0 , "destinoMaisProximo" => 0 , "baseMaisProxima" => 0 , "houseMaisProxima" => 0 , "hostelMaisProximo" => 0 );
			
		} else {

			//localização por ip também não foi possível, usa localização de Porto Alegre
			$userLocation = array( "status" => "localDesconhecido" , "latitude" => -30.0333 , "longitude" => -51.2000 , "lojaMaisProxima" => 0 , "destinoMaisProximo" => 0 , "baseMaisProxima" => 0 , "houseMaisProxima" => 0 , "hostelMaisProximo" => 0 );

		}

	} else {

		//localização por js
		$userLocation = array( "status" => "localJs" , "latitude" => $posicao["coords"]["latitude"] , "longitude" => $posicao["coords"]["longitude"] , "lojaMaisProxima" => 0 , "destinoMaisProximo" => 0 , "baseMaisProxima" => 0 , "houseMaisProxima" => 0 , "hostelMaisProximo" => 0 );

	}
	
	//busca loja mais próxima da posição do usuário
	$menorDistancia = 20000.0;
	$distanciaLoja = 0;
	$args = array(
		'post_type' => 'loja',
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC'
	);
	$lojas = new WP_Query($args);
	if($lojas->have_posts()) {
		$p1 = array( "latitude" => $userLocation["latitude"] , "longitude" => $userLocation["longitude"] );
		while($lojas->have_posts()) {
			$lojas->the_post();
			$loja_id = get_the_ID();
			$loja_nome = get_the_title();
			$loja_dados = get_post_meta($loja_id,'loja_dados',true);
			$p2 = array( "latitude" => floatval($loja_dados["latitude"]) , "longitude" => floatval($loja_dados["longitude"]));
			$distanciaLoja = distanciaEntreDoisPontos( $p1 , $p2 );
			if($distanciaLoja < $menorDistancia) {
				$menorDistancia = $distanciaLoja;
				$lojaMaisProxima_nome = $loja_nome;
				$lojaMaisProxima_id = $loja_id;
			}
		}
	}
	if(isset($lojaMaisProxima_id)) {

		$userLocation["lojaMaisProxima"] = preg_replace_callback("/(&#[0-9]+;)/", function($m) { return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES"); }, $lojaMaisProxima_nome);
		//$userLocation["lojaMaisProxima"] = get_post_meta($lojaMaisProxima_id,'loja_idEps',true);

		$locais = get_the_terms($lojaMaisProxima_id,'localloja');
		$locais = (array)$locais;
		foreach($locais as $local) {
			$local = (array)$local;
			if($local["slug"] == "mundo" || $local["slug"] == "brasil") {
				$userLocation["local1"] = $local["slug"];
			} else {
				$userLocation["local2"] = $local["slug"];
			}
		}
		if(!isset($userLocation["local1"])) $userLocation["local1"] = "brasil";
		if(!isset($userLocation["local2"])) $userLocation["local2"] = "rio-grande-do-sul";
	}
	
	$_SESSION["userLocation"] = $userLocation;
	exit(json_encode(array( 'sucesso' => true , 'userLocation' => $userLocation )));	

}

//retorna posts do blog via ajax
add_action( 'wp_ajax_nopriv_carregaPostsBlog', 'egali_carregaPostsBlog');
add_action( 'wp_ajax_carregaPostsBlog', 'egali_carregaPostsBlog');
function egali_carregaPostsBlog() {
	
	$resposta = array();
	extract($_POST["info"],EXTR_OVERWRITE);
	
	if($pagina == 1) {
		$posts_per_page = 7;
		if($categoria == 0) {
			$argsPostsBlog = array(
				'post_type'      => 'post',
				//'offset'         => 1,
				'post__not_in'   => array($ids),
				'post_status'    => 'publish',
				'posts_per_page' => $posts_per_page,
				'paged'          => $pagina
			);
		} else if ($slug){
			$argsPostsBlog = array(
				'post_type'      => 'post',
				'post__not_in'   => array($ids),
				'post_status'    => 'publish',
				'posts_per_page' => $posts_per_page,
				'paged'          => $pagina,
				'tax_query' => array(
					array(
						'taxonomy' => 'local',
						'field'    => 'term_id',
						'terms'    => $categoria,
					)
				)
			);
		} else {
			$argsPostsBlog = array(
				'post_type'      => 'post',
				'post__not_in'   => array($ids),
				'post_status'    => 'publish',
				'posts_per_page' => $posts_per_page,
				'paged'          => $pagina,
				'cat'            => $categoria
			);
		}
	} else {
		$posts_per_page = 8;
		if($categoria == 0) {
			$argsPostsBlog = array(
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'posts_per_page' => $posts_per_page,
				'paged'          => $pagina
			);
		} else if ($slug){
			$argsPostsBlog = array(
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'posts_per_page' => $posts_per_page,
				'paged'          => $pagina,
				'tax_query' => array(
					array(
						'taxonomy' => 'local',
						'field'    => 'term_id',
						'terms'    => $categoria,
					)
				)
			);
		} else {
			$argsPostsBlog = array(
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'posts_per_page' => $posts_per_page,
				'paged'          => $pagina,
				'cat'            => $categoria
			);
		}
	}

	$postsBlog = new WP_Query($argsPostsBlog);
	if($postsBlog->have_posts()) {
		while($postsBlog->have_posts()) {
			$postsBlog->the_post();
			$categorias = get_the_category();
			foreach($categorias as $cat) {
				if($cat->slug != 'todos-os-assuntos') {
					$categ = $cat->name;
					break;
				}
			}
			$resposta[] = array(
				"thumb" => get_relative_thumb(get_post_thumbnail_id( $post->ID ),'thumbnail'),
				"imagem" => get_relative_thumb(get_post_thumbnail_id( $post->ID ),'large'),
				"titulo" => get_the_title(),
				"resumo" => the_excerpt_max_charlength(140),
				"link" => get_the_permalink(),
				"data" => get_the_date('d/m/Y'),
				"categoria" => $categ
			);
		}
	}
	exit(json_encode(array( 'sucesso' => true , 'posts' => $resposta )));	

}

/*
 * OUTRAS FUNÇÕES AUXILIARES
 */


//calcula distância entre dois pontos [ latitude , longitude ]
function distanciaEntreDoisPontos($p1,$p2) {
	
	$earthRadius = 6371;

	// convert from degrees to radians
	$latFrom = deg2rad($p1["latitude"]);
	$lonFrom = deg2rad($p1["longitude"]);
	$latTo = deg2rad($p2["latitude"]);
	$lonTo = deg2rad($p2["longitude"]);

	$latDelta = $latTo - $latFrom;
	$lonDelta = $lonTo - $lonFrom;

	$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
	return $angle * $earthRadius;
}

//Retorna url relativa de imagem
function get_relative_thumb($id,$size) {
	//$id = id da imagem
	//$size = tamanho da imagem (thumbnail, medium, large)
	$absolute_url = wp_get_attachment_image_src($id,$size);
	$domain = get_site_url();
	if(strpos($domain,"localhost/trabalho") === false) {
		$relative_url = substr($absolute_url[0],strpos($absolute_url[0],"/wp-content/"));
		return $relative_url;
	} else {
		return $absolute_url[0];		
	}
}

/** SHORTCODE para inserir iframe */
add_shortcode('iframe', array('iframe_shortcode', 'shortcode'));
class iframe_shortcode {
    function shortcode($atts, $content=null) {
		extract(shortcode_atts(array(
			'id'           => '',
			'url'          => '',
			'scrolling'    => 'no',
			'width'        => '100%',
			'height'       => '500',
			'frameborder'  => '0',
			'marginheight' => '0',
		), $atts));
		if (empty($url)) return '<!-- Iframe: You did not enter a valid URL -->';
	 	return '<iframe id="'.$id.'" src="'.$url.'" width="'.$width.'" height="'.$height.'" scrolling="'.$scrolling.'" frameborder="'.$frameborder.'" marginheight="'.$marginheight.'"></iframe>';
    }
}

/** REMOVE FILTRO do WP para iframe */
// before saving post
remove_filter('content_save_pre', 'wp_filter_post_kses');
remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');

// save code here

// after saving post
add_filter('content_save_pre', 'wp_filter_post_kses');
add_filter('content_filtered_save_pre', 'wp_filter_post_kses');
/** END REMOVE FILTRO do WP para iframe */