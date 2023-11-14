<?php

use App\Http\Controllers\api\V1\InvoiceController;
use App\Http\Controllers\api\V1\UserController;
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
    Route::get("/invoices", [InvoiceController::class, "index"])->name("invoices.index");
    Route::get("/invoices/{invoice}", [InvoiceController::class, "show"])->name("invoice.show");
    Route::post("/invoices", [InvoiceController::class, "store"])->name("store");
    Route::put("/invoices/{invoice}", [InvoiceController::class, "update"])->name("update");
    Route::delete("/invoices/{invoice}", [InvoiceController::class, "destroy"])->name("delete");
});
