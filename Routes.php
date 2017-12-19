<?php
namespace App;

include './app/Route.php';
include './controllers/Index.php';
use Route;
use Index;

Route::set('index.php',function(){
    Index::CreateView('index');
});

Route::set('response',function(){
    Index::CreateView('response');
});

?>