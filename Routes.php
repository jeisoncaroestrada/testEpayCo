<?php
namespace App;

include './app/Route.php';
include './controllers/Index.php';
use Route;
use Index;

Route::set('index.php',function(){
    Index::CreateView('index');
});

Route::set('create_pay',function(){
    $data = file_get_contents('php://input');
    $data = json_decode($data);
    echo Index::CreatePay($data);
});

?>