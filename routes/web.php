<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\PageController;

use App\Models\AwsVideo;

// VIGILA AWS Cloud Simulator (Single Page Unified)
// Prioridad alta: Dominio Principal de Producción y fallback local
Route::domain('velasco.aywsolution.com')->group(function () {
    Route::get('/', function () { 
        $videos = AwsVideo::latest()->get();
        return view('aws.single', compact('videos')); 
    })->name('aws.single.domain');
});
Route::get('/simulador', function () { 
    $videos = AwsVideo::latest()->get();
    return view('aws.single', compact('videos')); 
})->name('aws.single.local');

Route::post('/aws/videos/upload', [App\Http\Controllers\AwsVideoController::class, 'store'])->name('aws.videos.upload');

// Página principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Listado público de cámaras
Route::get('/camaras', [NewsController::class, 'publicIndex'])->name('news.public');

// Páginas informativas
Route::get('/contactenos', [PageController::class, 'contact'])->name('pages.contact');
Route::get('/acerca-de-nosotros', [PageController::class, 'about'])->name('pages.about');
Route::get('/paginas/editar', [PageController::class, 'edit'])->middleware('auth')->name('pages.edit');
Route::put('/paginas/actualizar', [PageController::class, 'update'])->middleware('auth')->name('pages.update');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// CRUD Cámaras
Route::get('/camaras/admin', [NewsController::class, 'index'])
    ->middleware('auth')
    ->name('news.index');

// VIGILA AWS Cloud Simulator Routes (Multi-Page)
Route::prefix('aws')->name('aws.')->group(function () {
    Route::get('/monitoreo', function () { return view('aws.monitoring'); })->name('monitoring');
    Route::get('/computo', function () { return view('aws.compute'); })->name('compute');
    Route::get('/almacenamiento', function () { return view('aws.storage'); })->name('storage');
    Route::get('/rds', function () { return view('aws.rds'); })->name('rds');
    Route::get('/ssm', function () { return view('aws.ssm'); })->name('ssm');
    Route::get('/tco', function () { return view('aws.tco'); })->name('tco');
    Route::get('/sst', function () { return view('aws.sst'); })->name('sst');
});


Route::resource('camaras', NewsController::class)->except(['index', 'show'])
    ->parameters(['camaras' => 'news'])
    ->names('news')
    ->middleware('auth');
Route::get('/camaras/{news}', [NewsController::class, 'show'])->name('news.show');

// Secciones públicas y administrativas
Route::get('/secciones/{section}', [SectionController::class, 'show'])->name('sections.show');
Route::get('sections/{section}/news', [SectionController::class, 'news'])->middleware('auth')->name('sections.news.index');
Route::resource('sections', SectionController::class)->except(['show'])
    ->middleware('auth');

// CRUD Publicidad
Route::resource('advertisements', AdvertisementController::class);

// CRUD Encabezado
Route::get('/header/edit', [HeaderController::class, 'edit'])->name('header.edit');
Route::put('/header/update', [HeaderController::class, 'update'])->name('header.update');

// CRUD Usuarios
Route::resource('users', UserController::class)
    ->except(['show'])
    ->middleware('auth');

// Rutas de autenticación
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Illuminate\Http\Request $request) {
    $credentials = $request->only('email', 'password');
    
    if (auth()->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }
    
    return back()->withErrors([
        'email' => 'Las credenciales no coinciden con nuestros registros.',
    ]);
});

Route::post('/logout', function (Illuminate\Http\Request $request) {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');