<?php

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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/barcode', 'HomeController@generateBarcode')->name('barcode');

// /Product Route
Route::resource('product', 'ProductController');
// POs
Route::resource('pos', 'PosController');
Route::post('view-invoice',"PosController@invoice")->name('view-invoice');
// Customer
Route::resource('customer', 'CustomerController');

// Order
Route::resource('order', 'OrderController');
Route::get('/print-order-invoice/{id}',"OrderController@print")->name('print.order.invoice');

// Payment
Route::resource('payment', 'PaymentController');

// Expense
Route::resource('expense', 'ExpenseController');

// Daily Expens Report
Route::get('daily-expens-report', 'ExpensReportController@daily')->name('daily.expens.report');
Route::post('daily-expens-report-search','ExpensReportController@search')->name('daily.expens.report.search');

// Month Expens Report
Route::get('monthly-expens-report', 'ExpensReportController@monthly')->name('monthly.expens.report');
Route::post('monthly-expens-report-search','ExpensReportController@monthlySearch')->name('monthly.expens.report.search');

// Yearly Expens Report
Route::get('yearly-expens-report', 'ExpensReportController@yearly')->name('yearly.expens.report');
Route::post('yearly-expens-report-search','ExpensReportController@yearlySearch')->name('yearly.expens.report.search');

// Daily Sales Report
Route::get('daily-sales-report','SellsReportController@daily')->name('daily.sales.report');
Route::post('daily-sales-report-search','SellsReportController@search')->name('daily.sales.report-search');

// / Monthly Sales Report
Route::get('monthly-sales-report','SellsReportController@monthly')->name('monthly.sales.report');
Route::post('monthly-sales-report-search','SellsReportController@monthlySearch')->name('monthly.sales.report-search');

// // Monthly Sales Report
Route::get('yearly-sales-report','SellsReportController@yearly')->name('yearly.sales.report');
Route::post('yearly-sales-report-search','SellsReportController@yearlySearch')->name('yearly.sales.report-search');

// Daily Profit Report
Route::get('daily-profit-report','ProfitReportController@daily')->name('daily.profit.report');
Route::post('daily-profit-report-search','ProfitReportController@search')->name('daily.profit.report-search');

// Monthly Profit Report
Route::get('monthly-profit-report','ProfitReportController@monthly')->name('monthly.profit.report');
Route::post('monthly-profit-report-search','ProfitReportController@monthlySearch')->name('monthly.profit.report-search');

// Yearly Profit Report
Route::get('yearly-profit-report','ProfitReportController@yearly')->name('yearly.profit.report');
Route::post('yearly-profit-report-search','ProfitReportController@yearlySearch')->name('yearly.profit.report-search');















