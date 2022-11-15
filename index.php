<?php
include_once('simple_html_dom.php');
// required headers
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: access");
//header("Access-Control-Allow-Methods: GET");
//header("Access-Control-Allow-Credentials: true");
//header('Content-Type: application/json');
//date_default_timezone_set('Africa/Cairo');

$word  = str_replace(" ", "-", $_GET['word']);;
$page  = $_GET['page'];
$html = file_get_html( "https://www.jumia.com.eg/catalog/?q=phone"
);
$data = $html->find('.-paxs');
$products = array();
$count = 0;
foreach ($data as $_item) {
   
   
        echo "
    <p>
    $_item <br>
  
    </p>
   
        ";
        //array_push($products, $product);
    
}

//echo json_encode($products);
