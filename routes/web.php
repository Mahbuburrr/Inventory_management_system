<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfilesController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\MissionController;
use App\Http\Controllers\Backend\VisionController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\StockController;
use App\Http\Controllers\Backend\InvoiceController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

    Route::get('/', [FrontendController::class, 'index']);
    Route::get('/aboutus', [FrontendController::class, 'aboutus'])->name('about.us');
    Route::get('/contactus', [FrontendController::class, 'contactus']);

    // Default Controller
    Route::get('/get-category', [DefaultController::class, 'getcategory'])->name('get-category');
    Route::get('/get-product', [DefaultController::class, 'getproduct'])->name('get-product');
    Route::get('/get-stock', [DefaultController::class, 'getstock'])->name('check-product-stock');
    
    
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
// Users Controller Group======================
    Route::prefix('users')->group(function(){
    Route::get('/view', [UserController::class, 'view'])->name('users.view');
    Route::get('/add', [UserController::class, 'add'])->name('users.add');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
   
       
    });


    // Profiles Controller Group======================
    Route::prefix('profiles')->group(function(){
        Route::get('/view', [ProfilesController::class, 'view'])->name('profiles.view');
        Route::get('/edit', [ProfilesController::class, 'edit'])->name('profiles.edit');
        Route::post('/update', [ProfilesController::class, 'update'])->name('profiles.update');
        Route::get('/password/view', [ProfilesController::class, 'passwordview'])->name('profiles.password.view');
        Route::post('/password/update', [ProfilesController::class, 'passwordupdate'])->name('profiles.password.update');
        
           
        });

        // Suppliers Controller Group======================
    Route::prefix('suppliers')->group(function(){
        Route::get('/view', [SupplierController::class, 'view'])->name('suppliers.view');
        Route::get('/add', [SupplierController::class, 'add'])->name('suppliers.add');
        Route::post('/store', [SupplierController::class, 'store'])->name('suppliers.store');
        Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('suppliers.edit');
        Route::post('/update/{id}', [SupplierController::class, 'update'])->name('suppliers.update');
        Route::get('/delete/{id}', [SupplierController::class, 'delete'])->name('suppliers.delete');
       
           
        });

         // Customers Controller Group======================
    Route::prefix('customers')->group(function(){
        Route::get('/view', [CustomerController::class, 'view'])->name('customers.view');
        Route::get('/add', [CustomerController::class, 'add'])->name('customers.add');
        Route::post('/store', [CustomerController::class, 'store'])->name('customers.store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customers.update');
        Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('customers.delete');
        Route::get('/credit', [CustomerController::class, 'creditCustomer'])->name('customers.credit');
        Route::get('/credit/pdf', [CustomerController::class, 'creditCustomerPdf'])->name('customers.credit.pdf');
        Route::get('/invoice/edit/{invoice_id}', [CustomerController::class, 'editInvoice'])->name('customers.edit.invoice');
        Route::post('/invoice/update/{invoice_id}', [CustomerController::class, 'updateInvoice'])->name('customers.update.invoice');
        Route::get('/invoice/details/pdf/{invoice_id}', [CustomerController::class, 'invoiceDetailsPdf'])->name('invoice.details.pdf');
        Route::get('/paid', [CustomerController::class, 'paidCustomer'])->name('customers.paid');
        Route::get('/paid/pdf', [CustomerController::class, 'paidCustomerPdf'])->name('customers.paid.pdf');
        Route::get('/wise/report', [CustomerController::class, 'customerWiseReport'])->name('customers.wise.report');
        Route::get('/wise/credit/report', [CustomerController::class, 'customerWiseCreditReport'])->name('customers.wise.credit.report');
        Route::get('/wise/paid/report', [CustomerController::class, 'customerWisePaidReport'])->name('customers.wise.paid.report');
       
           
        });

 //UnitController  Group======================
        Route::prefix('units')->group(function(){
            Route::get('/view', [UnitController::class, 'view'])->name('units.view');
            Route::get('/add', [UnitController::class, 'add'])->name('units.add');
            Route::post('/store', [UnitController::class, 'store'])->name('units.store');
            Route::get('/edit/{id}', [UnitController::class, 'edit'])->name('units.edit');
            Route::post('/update/{id}', [UnitController::class, 'update'])->name('units.update');
            Route::get('/delete/{id}', [UnitController::class, 'delete'])->name('units.delete');
           
               
            });

            //CategoryController  Group======================
        Route::prefix('categories')->group(function(){
            Route::get('/view', [CategoryController::class, 'view'])->name('categories.view');
            Route::get('/add', [CategoryController::class, 'add'])->name('categories.add');
            Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
           
               
            });

            
            //ProductController  Group======================
        Route::prefix('products')->group(function(){
            Route::get('/view', [ProductController::class, 'view'])->name('products.view');
            Route::get('/add', [ProductController::class, 'add'])->name('products.add');
            Route::post('/store', [ProductController::class, 'store'])->name('products.store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
            Route::post('/update/{id}', [ProductController::class, 'update'])->name('products.update');
            Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
           
               
            });


             //PurchaseController  Group======================
            Route::prefix('purchase')->group(function(){
            Route::get('/view', [PurchaseController::class, 'view'])->name('purchase.view');
            Route::get('/add', [PurchaseController::class, 'add'])->name('purchase.add');
            Route::post('/store', [PurchaseController::class, 'store'])->name('purchase.store');
            Route::get('/pending', [PurchaseController::class, 'pendinglist'])->name('purchase.pending.list');
            Route::get('/delete/{id}', [PurchaseController::class, 'delete'])->name('purchase.delete');
            Route::get('/approve/{id}', [PurchaseController::class, 'purchaseapprove'])->name('purchase.approve.product');
            Route::get('/daily/report', [PurchaseController::class, 'purchaseReport'])->name('daily.purchase.report');
            Route::get('/daily/report/pdf', [PurchaseController::class, 'purchaseReportPdf'])->name('purchase.report.pdf');
           
               
            });

            //InvoiceController  Group======================
            Route::prefix('invoice')->group(function(){
                Route::get('/view', [InvoiceController::class, 'view'])->name('invoice.view');
                Route::get('/add', [InvoiceController::class, 'add'])->name('invoice.add');
                Route::post('/store', [InvoiceController::class, 'store'])->name('invoice.store');
                Route::get('/pending', [InvoiceController::class, 'pendinglist'])->name('invoice.pending.list');
                Route::get('/print/list', [InvoiceController::class, 'printlist'])->name('invoice.print.list');
                Route::get('/print/{id}', [InvoiceController::class, 'printinvoice'])->name('invoice.print');
                Route::get('/delete/{id}', [InvoiceController::class, 'delete'])->name('invoice.delete');
                Route::get('/approve/{id}', [InvoiceController::class, 'purchaseapprove'])->name('invoice.approve');
                Route::post('/approve/store/{id}', [InvoiceController::class, 'approvestore'])->name('approval.store');
                Route::get('/daily/report', [InvoiceController::class, 'dailyreport'])->name('daily.invoice.report');
                Route::get('/daily/report/pdf', [InvoiceController::class, 'dailyreportpdf'])->name('daily.invoice.pdf');
               
                   
                });
    

        //StockController  Group======================
            Route::prefix('stock')->group(function(){
            Route::get('/report', [StockController::class, 'stockreport'])->name('stock.view');
            Route::get('/report/pdf', [StockController::class, 'stockreportpdf'])->name('stock.report.pdf');
            Route::get('/report/supplier/product/wise', [StockController::class, 'supplierProductWise'])->name('stock.report.supplier.product.wise');
            Route::get('/report/supplier/wise/pdf', [StockController::class, 'supplierProductWisePdf'])->name('stock.report.supplier.product.wise.pdf');
            Route::get('/report/product/wise/pdf', [StockController::class, 'productWise'])->name('stock.report.product.wise.pdf');
            
           
               
            });



// Route::get('/dashboard', function () {
//     return view('backend.layouts.home');
// })->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
