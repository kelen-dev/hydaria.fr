<?php

use App\Http\Controllers\ContactsController;
use App\Mail\ContactMessageCreated;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\Admin\NavItemController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use Spatie\Permission\Middleware\RoleMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Route pour afficher la page de gestion des rôles
    Route::get('/roles/manage', [UserController::class, 'manageRoles'])->name('roles.manage');
    // Route pour mettre à jour le rôle d'un utilisateur
    Route::post('/roles/update', [UserController::class, 'updateRole'])->name('roles.update');

    Route::resource('navitems', \App\Http\Controllers\Admin\NavItemController::class)->except(['show']);
    Route::post('/navitems/order', [NavItemController::class, 'updateOrder'])->name('navitems.updateOrder');
    Route::get('/navitems/order', [NavItemController::class, 'order'])->name('navitems.order');

    Route::resource('/posts', PostController::class)->except(['show']);
    Route::post('/upload-image', [ImageUploadController::class, 'store'])->name('upload.image');
});

Auth::routes();

Route::get('/test-middleware', function () {
    if (class_exists(RoleMiddleware::class)) {
        return 'RoleMiddleware est correctement trouvé !';
    }
    return 'RoleMiddleware MISSING !';
});

Route::get('/maintenance', function () {
    return view('maintenance');
})->name('maintenance');

Route::get('/a-propos', function () {
    return view('/p/a-propos');
})->name('a-propos');

Route::get('/mentions-legales', function () {
    return view('/p/mentions-legales');
})->name('mentions-legales');

Route::prefix('projects')->name('projects.')->group(function () {
    Route::get('/bountyfac', function () {
        return view('/p/projets/bountyfac');
    })->name('bountyfac');

    Route::get('/crew', function () {
        return view('/p/projets/crew');
    })->name('crew');
});

Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [ContactsController::class, 'create'])->name('index');
    Route::post('/', [ContactsController::class, 'store'])->name('index');

    Route::get('/test-email', function () {
        return new ContactMessageCreated('KelenS', 'contact@kelens.fr', 'Ceci est un test');
    });
});

Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/', [HomeController::class, 'allPosts'])->name('index');
    Route::post('/{post}/like', [PostController::class, 'like'])->middleware(['auth'])->name('like');
});
Route::get('/post/{post}', [HomeController::class, 'show'])->name('post.show');

Route::get('/tags/{tag}', [\App\Http\Controllers\TagController::class, 'show'])->name('tags.show');
