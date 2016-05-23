<?php
    // Dados para Configuração 
    $short_host = "127.0.0.1";
    $short_user = "root";
    $short_pass = "";
    $short_dabs = "d3sconn3ct_shorter";

    $short_base_url = "http://www.website.com/";




    // ======================================================

    // Conexão ao Mysql
    $mysqli = new mysqli($short_host, $short_user, $short_pass, $short_dabs);

    // Se houver erro, sera avisado :)
    if($mysqli->connect_errno) {
        echo "[ERROR]: ". $mysqli->connect_error;
        exit();
    }

    // ======================================================
 
    // Pega os dados digitados na url do site
    if(isset($_GET['d'])):

        // Vai pegar os dados da URL
    	$request = $_GET['d'];

        // Verifica se e um codigo ou não
        if(empty($request)):
    	    defaultview();
        else:
    	    redirectWebCode($request);
        endif;
    endif;

    // Pega a nova URL para salvar
    if(@$_POST['shorter_new']){
        saveNewShorter();
        exit();
    }

    // ======================================================


    // Função para gerar o codigo encurtado
    function generateUrlCode($size){
        $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $return= "";
        for($count= 0; $size > $count; $count++){
            $return.= $basic[rand(0, strlen($basic) - 1)];
        }
        return $return;
    }

    // Função para visualisar a index normalmente
    function defaultview(){
    	echo "
            <!DOCTYPE html>
            <html>
                <head>
                    <title>D3.sh - Free Shorter</title>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
                    <link rel='stylesheet' href='assets/css/default.css'>
                    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
                </head>
                <body>
                    <div class='banner'>
                        <div class='wrap'>
                            <div class='banner-text'>
                                <h1>D3.sh - Free Shorter</h1>
                                <h2>Faça as suas URL administrável.</h2>
                                <div class='form-info'>
                                    <form method='post' action=''>
                                        <input type='text' class='text' placeholder='http://' name='shorter_new' required>
                                        <input type='submit' value='Encurtar !'>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class='clear'> </div>
                    </div>
                </body>
            </html> ";
    }

    // Função que visualiza a pagina de 'deleted'
    function deletedView(){
    	echo "
    	    <html>
                <head>
                    <title>D3.ly - Não encontrado</title>
                    <link rel='stylesheet' href='assets/css/deleted.css'>
                </head>
                <body>
                    <p><a href='index.php'>shorter.d3sconn3ct.net</a></p><br>
                    <img src='assets/img/not_found.png'><br><br><br>
                    <h2>Desculpe, mas este link foi deletado !</h2>
                    <div>
                        <a href='index.php'>← Voltar para o site !</a>
                    </div>
                </body>
            </html>";
    }

    // Função para reredicionar
    function redirectWebCode($request){

        global $mysqli;

        $query_data = "SELECT * FROM d3sc_short WHERE short_url_code = '".$request."'";
    	$search = $mysqli->query($query_data);

    	if($search->num_rows == 0){
    		deletedView();
    	} else {
    		while($url = $search->fetch_array(MYSQLI_ASSOC)) {
    			$mysqli->query("UPDATE d3sc_short SET short_hits = short_hits + 1 WHERE short_url_code = '". $request ."'");
    			header('HTTP/1.1 302 Moved Temporarily');
    			header("Location:". $url['short_url_base']);
    		}
    	}
    }

    // Função para salvar a nova shorter
    function saveNewShorter(){

        global $mysqli;
        global $short_base_url;

    	$short_url_code = generateUrlCode(6);
    	$short_owner_ip = $_SERVER["REMOTE_ADDR"];
    	$short_url_base = $_POST["shorter_new"];

        $search_data = "SELECT * FROM d3sc_short WHERE short_url_code = '".$short_url_code."'";
    	$search_action = $mysqli->query($search_data);

    	if($search_action->num_rows == 0){
    		$query_insert = "INSERT INTO `d3sc_short` (short_owner_ip, short_url_code, short_url_base, short_hits) VALUES ('$short_owner_ip', '$short_url_code', '$short_url_base', '0')";

    	    $insert_shorter = $mysqli->query($query_insert);

            if($insert_shorter){
        	    echo "<center><br><br><h1 class='h2-preview'>URL Encurtada</h1>
                      <a href='". $short_base_url, $short_url_code ."' class='url-preview'>". $short_base_url, $short_url_code ."</a>
                      </center>";
            } else{
        	    echo "[ERROR]: ". $mysqli->error;
            }
    	} else {
    		saveNewShorter();
    	}
    }


// Finaliza o mysql
$mysqli->close();

?>