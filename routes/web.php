<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController; // Importa el controlador de autenticación

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación. Estas
| rutas son cargadas por RouteServiceProvider y serán asignadas al grupo de middleware "web",
| que está definido en tu kernel. ¡Disfruta construyendo tu API!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Ruta para el login
Route::post('/login', [AuthController::class, 'login'])->name('login');

    // Ruta para almacenar un nuevo producto
    Route::post('/products', [ProductController::class, 'store']);


 // Ruta para mostrar todos los productos
 Route::get('/products', [ProductController::class, 'index']);

 // Ruta para mostrar un producto específico por su ID
 Route::get('/products/{id}', [ProductController::class, 'show']);
