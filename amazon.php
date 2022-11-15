<?php
include_once('simple_html_dom.php');
// required headers
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: access");
//header("Access-Control-Allow-Methods: GET");
//header("Access-Control-Allow-Credentials: true");
//header('Content-Type: application/json');
date_default_timezone_set('Africa/Cairo');

$word  = str_replace(" ", "-", $_GET['word']);;
$page  = $_GET['page'];

$html = file_get_html("http://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3Daps&field-keywords=$word&page=$page");
//$html = file_get_html("http://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3Daps&field-keywords=$word&page=$page");


$data = $html->find('.s-result-item');
$products = array();
$count = 0;
foreach ($data as $_item) {
    $image =  $_item->find('.s-image', 0)->src;
    if ($image != null) {
        $title =  $_item->find('.a-size-medium', 0)->plaintext;
        $rate =  $_item->find('.a-icon-alt', 0)->plaintext;
        $users_rate =  $_item->find('.a-size-base', 0)->plaintext;
        $price =  $_item->find('.a-offscreen', 0)->plaintext;
        $hiden_price =  $_item->find('.a-offscreen', 1)->plaintext;

        if ($title == null) {

            $title =  $_item->find('.a-size-base-plus ', 0)->plaintext;
        }

        $count++;
        // $product = array(
        //     "title" => $title,
        //     "rate" => $rate,
        //     "users_rate" => $users_rate,
        //     "price" => $price,
        //     "hiden_price" => $hiden_price,
        //     "image" => $image,
        // );

        echo "
    <p>
    $_item <br> 
    count : $count <br> 
    title : $title <br>
    rate : $rate <br>
    users_rate : $users_rate <br>
    price : $price <br>
    hiden_price : $hiden_price <br>
    <img style=' height: 100px;'src='$image'>
    </p>
   
        ";
        //array_push($products, $product);
    }
}

//echo json_encode($products);
