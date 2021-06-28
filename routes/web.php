<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\FinancialAdmMiddleware;
use App\Http\Middleware\IsAuthenticated;
use App\Xfly\Model\Company;
use App\Xfly\Model\Notifier;
use App\Xfly\Model\User;

Route::middleware([AdminMiddleware::class], [FinancialAdmMiddleware::class])->group(function () {
    //CONFIRM DELETE
    Route::post('/confirm/delete', function (Request $request) {
        $id = $request->id;
        $route = $request->route;

        return view('confirm_delete', compact('id', 'route'));
    });

    //CONTACTS AND ADDRESS
    Route::get('/companies/contact/{id}', 'CompanyController@editContact');
    Route::get('/companies/contact/add/{companyId}', 'CompanyController@addContact');
    Route::get('/companies/address/{id}', 'CompanyController@editAddress');
    Route::get('/companies/address/add/{companyId}', 'CompanyController@addAddress');

    Route::post('/companies/contact/edit', 'CompanyController@updateContact');
    Route::post('/companies/contact/store', 'CompanyController@storeContact');
    Route::post('/companies/contact/destroy', 'CompanyController@destroyContact');

    Route::post('/companies/address/edit', 'CompanyController@updateAddress');
    Route::post('/companies/address/store', 'CompanyController@storeAddress');
    Route::post('/companies/address/destroy', 'CompanyController@destroyAddress');
    Route::post('/search-companies', 'CompanyController@search');
    Route::post('/search-companies/services', 'CompanyController@searchServices');

    //COMPANIES
    Route::get('/companies/show', 'CompanyController@show');
    Route::get('/companies/create', 'CompanyController@create');
    Route::get('/companies/{company}/edit', 'CompanyController@edit');
    Route::get('/companies/{company}/drones', 'CompanyController@drones');
    Route::get('/companies/{company}/products', 'CompanyController@products');
    Route::get('/companies/show/restore', 'CompanyController@showRestore');
    Route::get('/companies/{company}/restore', 'CompanyController@restore');
    Route::get('/companies/report', 'CompanyController@reports');

    Route::get('/companies/reportCreatedAtCompanies/view', 'CompanyController@viewCreatedAtCompanies');
    Route::get('/companies/reportOwnerCompanies/view', 'CompanyController@viewOwnerCompanies');
    Route::get('/companies/reportAllCompanies/pdf', 'CompanyController@reportAllCompanies');

    Route::post('/companies', 'CompanyController@store');
    Route::post('/companies/reportCreatedAtCompanies/pdf', 'CompanyController@reportCreatedAtCompanies');
    Route::post('/companies/reportOwnerCompanies/pdf', 'CompanyController@reportOwnerCompanies');
    Route::post('/companies/delete', 'CompanyController@destroy');

    Route::patch('/companies/{company}', 'CompanyController@update');

    //SERVICES
    Route::get('/services', 'ServiceController@index');
    Route::get('/services/show', 'ServiceController@show');
    Route::get('/services/selection', 'ServiceController@selection');
    Route::get('/services/create/product/{product}', 'ServiceController@createProduct');
    Route::get('/services/create/drone/{drone}', 'ServiceController@createDrone');
    Route::get('/services/{service}/edit_product', 'ServiceController@editProduct');
    Route::get('/services/{service}/edit_drone', 'ServiceController@editDrone');
    Route::get('/services/download-param/{param}', 'ServiceController@downloadParam');

    Route::post('/services/reportAllServices/report', 'ServiceController@reportAllServices');
    Route::post('/services/reportSoldAtServices/report', 'ServiceController@reportSoldAtServices');
    Route::post('/services/reportServiceTypeServices/report', 'ServiceController@reportServiceTypeServices');
    Route::post('/services/reportIdCompanyServices/report', 'ServiceController@reportIdCompanyServices');

    Route::get('/services/report', 'ServiceController@reports');

    Route::get('/services/reportAllServices/view', 'ServiceController@viewAllServices');
    Route::get('/services/reportSoldAtServices/view', 'ServiceController@viewSoldAtServices');
    Route::get('/services/reportServiceTypeServices/view', 'ServiceController@viewServiceTypeServices');
    Route::get('/services/reportIdCompanyServices/view', 'ServiceController@viewIdCompanyServices');

    Route::post('/services/product', 'ServiceController@storeProduct');
    Route::post('/services/drone', 'ServiceController@storeDrone');
    Route::post('/services/delete', 'ServiceController@destroy');

    Route::patch('/services/{service}/product', 'ServiceController@updateProduct');
    Route::patch('/services/{service}/drone', 'ServiceController@updateDrone');

    //PRODUCTS
    Route::get('/products', 'ProductController@index');
    Route::get('/products/create', 'ProductController@create');
    Route::get('/products/{product}/details', 'ProductController@details');
    Route::get('/products/{product}/edit', 'ProductController@edit');
    Route::get('/products/show/restore', 'ProductController@showRestore');
    Route::get('/products/{product}/restore', 'ProductController@restore');

    Route::post('/products', 'ProductController@store');
    Route::post('/products/delete', 'ProductController@destroy');

    Route::patch('/products/{product}', 'ProductController@update');

    //DRONES
    Route::get('/drones', 'DroneController@index');
    Route::get('/drones/create', 'DroneController@create');
    Route::get('/drones/{drone}/details', 'DroneController@details');
    Route::get('/drones/{drone}/edit', 'DroneController@edit');

    Route::post('/drones', 'DroneController@store');
    Route::post('/drones/delete', 'DroneController@destroy');

    Route::patch('/drones/{drone}', 'DroneController@update');

    //USERS
    Route::get('/users', 'UserController@index');
    Route::get('/users/{user}', 'UserController@show');
    Route::get('/users/{user}/edit', 'UserController@edit');

    Route::post('/users/delete', 'UserController@destroy');

    Route::patch('/users/{user}', 'UserController@update');

    //NOTIFIERS
    Route::get('/notifiers/select-company', 'NotifierController@select_company');
    Route::get('/notifiers/select-type', 'NotifierController@select_type');
    Route::get('/notifiers/{notifier}/edit-drone', 'NotifierController@edit_drone');
    Route::get('/notifiers/{notifier}/edit-product', 'NotifierController@edit_product');
    Route::get('/notifiers/drone-create', 'NotifierController@drone_create');
    Route::get('/notifiers/product-create', 'NotifierController@product_create');
    Route::get('/notifiers/{notifier}', 'NotifierController@show');
    Route::get('/notifiers/{notifier}/edit', 'NotifierController@edit');
    Route::get('/notifiers/confirm/{id}', 'NotifierController@confirm');

    Route::post('/notifiers', 'NotifierController@store');
    Route::post('/notifiers/conclusion', 'NotifierController@destroy');
    Route::post('/notifiers/selection', 'NotifierController@selection');

    Route::patch('/notifiers/{notifier}', 'NotifierController@update');
});

Route::middleware([FinancialAdmMiddleware::class])->group(function () {
    //PAYMENTS
    Route::get('/payments/create', 'PaymentController@create');
    Route::get('/payments', 'PaymentController@index');
    Route::get('/payments/{payment}/edit', 'PaymentController@edit');
    Route::get('/payments/report', 'PaymentController@reports');

    Route::post('/payments', 'PaymentController@store');
    Route::post('/payments/delete', 'PaymentController@destroy');

    Route::patch('/payments/{payment}', 'PaymentController@update');

    Route::post('/payments/reportAllPayments/report', 'PaymentController@reportAllPayments');
    Route::post('/payments/reportCreatedAtPayments/report', 'PaymentController@reportCreatedAtPayments');
    Route::post('/payments/reportBuyerPayments/report', 'PaymentController@reportBuyerPayments');
    Route::post('/payments/reportAdminsAndDate/report', 'PaymentController@reportAdminsAndDate');

    Route::get('/payments/reportAllPayments/view', 'PaymentController@viewAllPayments');
    Route::get('/payments/reportCreatedAtPayments/view', 'PaymentController@viewCreatedAtPayments');
    Route::get('/payments/reportBuyerPayments/view', 'PaymentController@viewBuyerPayments');
    Route::get('/payments/reportAdminsAndDate/view', 'PaymentController@viewAdminsAndDate');

    Route::get('/payments/report', 'PaymentController@reports');

    //USERS

    Route::get('/users/{user}/edit', 'UserController@edit');

    Route::patch('/users/{user}', 'UserController@update');
    Route::delete('/users/{user}', 'UserController@destroy');
});

Route::get('/users/create', 'UserController@create');

    Route::post('/users', 'UserController@store');
//AUTHENTICATION
Route::get('/logout', 'AuthController@logout');
Route::middleware([IsAuthenticated::class])->group(function () {
    Route::get('/login/page', 'AuthController@login_page');
    Route::post('/login', 'AuthController@login');
});

//FORGOT PASSWORD
Route::get('/password', 'AuthController@password');

Route::post('/password/confirm', 'AuthController@confirm');
Route::post('/password/token', 'AuthController@verifyToken');
Route::post('/password/reset', 'AuthController@reset');

Route::get('/', function () {
    $companies = Company::all();
    $notifiers = Notifier::all();

    return view('welcome', compact('companies', 'notifiers'));
});

Route::get('/registers', function () {
    $companies = Company::all();
    $users = User::all();

    return view('registers', compact('companies', 'users'));
});

Route::get('/help', function () {
    return response()->file('../public/src/files/documento.pdf');
});
