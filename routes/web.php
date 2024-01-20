<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

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

Route::pattern('id', '[0-9]+');

Route::get("/",[\App\Http\Controllers\PagesController::class, "home"])->name("home");

Route::get("/pocetna", [\App\Http\Controllers\PagesController::class, "home"])->name("home");

Route::get("/paketi", [\App\Http\Controllers\PackageController::class, "package"])->name("package");

Route::get("/kontakt", [\App\Http\Controllers\ContactController::class, "page"])->name("page");

// Route::get("/usluge",[\App\Http\Controllers\ServiceController::class, "service"])->name("service");

Route::get("/galerija", [\App\Http\Controllers\GalleryController::class, "page"])->name("page");

Route::post("/kontakt",[\App\Http\Controllers\ContactController::class, "sendMessage"])->name("sendMessage");


Route::get("/odjava", [\App\Http\Controllers\AuthenticationController::class, "logout"])->name("logout")->middleware(["IsLoggedIn"]);



Route::middleware(['LoggedInPageDisallowed'])->group(function () {
    Route::get("/prijava",[\App\Http\Controllers\AuthenticationController::class, "loginPage"])->name("loginPage");
    Route::POST("/prijava",[\App\Http\Controllers\AuthenticationController::class, "login"])->name("login");

    Route::get("/registracija",[\App\Http\Controllers\AuthenticationController::class, "registrationPage"])->name("registrationPage");
    Route::post("/registracija",[\App\Http\Controllers\AuthenticationController::class, "registration"])->name("registration");

    Route::get("/zaboravljenaLozinka",[\App\Http\Controllers\AuthenticationController::class, "forgotPasswordPage"])->name("forgotPasswordPage");
    Route::post("/zaboravljenaLozinka",[\App\Http\Controllers\AuthenticationController::class, "forgotPassword"])->name("forgotPassword");

    Route::get("/obnavljanjeLozinke",[\App\Http\Controllers\AuthenticationController::class, "resetPasswordPage"])->name("resetPasswordPage")->middleware(["ResetPasswordMiddleware"]);;
    Route::post("/obnavljanjeLozinke",[\App\Http\Controllers\AuthenticationController::class, "resetPassword"])->name("resetPassword");
});

Route::prefix("/usluge")->group(function(){
    Route::get("/",[\App\Http\Controllers\ServiceController::class, "page"])->name("page");
    Route::get("/fetch_data",[\App\Http\Controllers\ServiceController::class, "fetch_data"])->name("fetch_data");
    Route::get("/{id}",[\App\Http\Controllers\ServiceController::class, "getOneService"])->name("getOneService");
});



Route::prefix("/admin")->group(function(){
    Route::middleware(["AdminMiddleware"])->group(function(){

        Route::get("/", [\App\Http\Controllers\Admin\ContactController::class,"getContact"])->name("getContact");

        Route::prefix("/contact")->group(function(){

            Route::get("/", [\App\Http\Controllers\Admin\ContactController::class,"getContact"])->name("getContact");
            Route::get("/fetch_data",[\App\Http\Controllers\Admin\ContactController::class, "fetch_data"])->name("fetch_data");
            Route::post("/deleteContact",[\App\Http\Controllers\Admin\ContactController::class, "deleteContact"])->name("deleteContact");
            Route::get("/getContact",[\App\Http\Controllers\Admin\ContactController::class, "ajaxGetContact"])->name("ajaxGetContact");
            Route::post("/getContactText/{id}",[\App\Http\Controllers\Admin\ContactController::class, "getContactText"])->name("getContactText");
            Route::post("/sendAnswer",[\App\Http\Controllers\Admin\ContactController::class, "sendAnswer"])->name("sendAnswer");
            Route::get("/send",[\App\Http\Controllers\Admin\ContactController::class, "sendPage"])->name("sendPage");
            Route::post("/send",[\App\Http\Controllers\Admin\ContactController::class, "sendMail"])->name("sendMail");
        });

        Route::prefix("/service")->group(function(){

            Route::get("/",[\App\Http\Controllers\Admin\ServiceController::class, "getService"])->name("getService");
            Route::get("/insert",[\App\Http\Controllers\Admin\ServiceController::class, "serviceForm"])->name("serviceForm");
            Route::post("/insertService",[\App\Http\Controllers\Admin\ServiceController::class, "insertService"])->name("insertService");
            Route::get("/fetch_data",[\App\Http\Controllers\Admin\ServiceController::class, "fetch_data"])->name("fetch_data");
            Route::post("/deleteService",[\App\Http\Controllers\Admin\ServiceController::class, "deleteService"])->name("deleteService");
            Route::get("/getService",[\App\Http\Controllers\Admin\ServiceController::class, "ajaxGetService"])->name("ajaxGetService");
            Route::get("/edit/{id}",[\App\Http\Controllers\Admin\ServiceController::class, "getServiceWithId"])->name("getServiceWithId");
            Route::post("/edit/updateService",[\App\Http\Controllers\Admin\ServiceController::class, "updateService"])->name("updateService");
        });

        Route::prefix("/gallery")->group(function(){
            Route::get("/",[\App\Http\Controllers\Admin\GalleryController::class, "getGallery"])->name("getGallery");
            Route::get("/insert",[\App\Http\Controllers\Admin\GalleryController::class, "galleryForm"])->name("galleryForm");
            Route::post("/insertGallery",[\App\Http\Controllers\Admin\GalleryController::class, "insertInGallery"])->name("insertInGallery");
            Route::post("/deleteGallery",[\App\Http\Controllers\Admin\GalleryController::class, "deleteGallery"])->name("deleteGallery");
            Route::get("/getGallery",[\App\Http\Controllers\Admin\GalleryController::class, "getGalleryJson"])->name("getGalleryJson");
        });

        Route::prefix("/user")->group(function(){
            Route::get("/",[\App\Http\Controllers\Admin\UserController::class, "getUser"])->name("getUser");
            Route::get("/fetch_data",[\App\Http\Controllers\Admin\UserController::class, "fetch_data"])->name("fetch_data");
            Route::post("/deleteUser",[\App\Http\Controllers\Admin\UserController::class, "deleteUser"])->name("deleteUser");
            Route::get("/getUser",[\App\Http\Controllers\Admin\UserController::class,"ajaxGetUser"])->name("ajaxGetUSer");
            Route::get("/key",[\App\Http\Controllers\Admin\UserController::class, "getKey"])->name("getKey");
            Route::post("/updateKey",[\App\Http\Controllers\Admin\UserController::class, "updateKey"])->name("updateKey");
            Route::get("/insert",[\App\Http\Controllers\Admin\UserController::class, "addUserPage"])->name("addUserPage");
            Route::post("/insertUser",[\App\Http\Controllers\Admin\UserController::class, "addUser"])->name("addUser");
            Route::get("/edit/{id}",[\App\Http\Controllers\Admin\UserController::class, "editUserPage"])->name("editUserPage");
            Route::post("/editUser", [\App\Http\Controllers\Admin\UserController::class, "editUser"])->name("editUser");
        });

        Route::prefix("/package")->group(function(){
            Route::get("/",[\App\Http\Controllers\Admin\PackageController::class, "package"])->name("package");
            Route::get("/edit/{id}",[\App\Http\Controllers\Admin\PackageController::class, "editPricePage"])->name("editPricePage");
            Route::post("/edit/updatePackage",[\App\Http\Controllers\Admin\PackageController::class, "editPackage"])->name("editPackage");
        });

    });
});


Route::get("/sitemap.xml",[\App\Http\Controllers\SitemapController::class, "sitemap"])->name("sitemap");
