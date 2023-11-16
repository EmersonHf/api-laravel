<?php

use App\Http\Controllers\api\V1\InvoiceController;
use App\Http\Controllers\api\V1\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TesteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix("v1")->group(function () {
    Route::get("/users", [UserController::class, "index"])->name("users.index");
    Route::get("/users/{user}", [UserController::class, "show"])->name("user.show");

    Route::apiResource("invoices", InvoiceController::class);

    Route::post("/login", [AuthController::class, "login"])->name("login");
    Route::middleware('auth:sanctum')->group(function () {


        Route::post("/logout", [AuthController::class, "logout"])->name("logout");
        Route::get("/teste", [TesteController::class, "index"]);
    });
});
