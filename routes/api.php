<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\CarController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




$router->post('login', [ApiController::class, 'login']);

$router->post('register', [ApiController::class, 'register']);

$router->group(['middleware' => ['auth:api']], function () use ($router) {

    $router->post('logout', [ApiController::class, 'logout']);

    $router->get('refresh', [ApiController::class, 'RefreshToken']);

    $router->get('profile', [ApiController::class, 'profile']);
});

//FOR CAR SERVICES
$router->group(['prefix' => 'car', 'middleware' => ['auth:api']], function () use ($router) {
    $router->post('create', [CarController::class, 'create']);
    $router->get('retrive', [CarController::class,'index']);
});