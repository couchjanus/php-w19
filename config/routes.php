<?php

return [
   'about' => 'AboutController@index',
   'blog' => 'BlogController@index',
   'contact' => 'ContactController@index',
   'admin' => 'Admin\DashboardController@index',
   'admin/categories' => 'Admin\CategoryController@index',
   'admin/categories/create' => 'Admin\CategoryController@create',
   'admin/categories/stote' => 'Admin\CategoryController@store',
   'admin/categories/show/{id}' => 'Admin\CategoryController@show',
   'admin/categories/edit/{id}' => 'Admin\CategoryController@edit',
   'admin/categories/update' => 'Admin\CategoryController@update',
   'admin/categories/delete/{id}' => 'Admin\CategoryController@delete',

   'api/categories/insert_image' => 'Admin\CategoryController@insertImage',
   'api/products/insert_image' => 'Admin\ProductController@insertImage',
   


   'admin/brands' => 'Admin\BrandController@index',
   'admin/brands/create' => 'Admin\BrandController@create',
   'admin/brands/stote' => 'Admin\BrandController@store',
   'admin/brands/show/{id}' => 'Admin\BrandController@show',
   'admin/brands/edit/{id}' => 'Admin\BrandController@edit',
   'admin/brands/update' => 'Admin\BrandController@update',
   'admin/brands/delete/{id}' => 'Admin\BrandController@delete',

   'admin/products' => 'Admin\ProductController@index',
   'admin/products/create' => 'Admin\ProductController@create',
   'admin/products/stote' => 'Admin\ProductController@store',
   'admin/products/show/{id}' => 'Admin\ProductController@show',
   'admin/products/edit/{id}' => 'Admin\ProductController@edit',
   'admin/products/update' => 'Admin\ProductController@update',
   'admin/products/delete/{id}' => 'Admin\ProductController@delete',
   
   'api/products' => 'HomeController@getProducts',
   'api/products/{id}' => 'HomeController@getProduct',
   'api/product/{id}'=> 'HomeController@getProductItem',
   'api/categories'=> 'HomeController@getCategories',
   'api/categories/{id}'=> 'HomeController@getProductsByCategory',

   //Главаня страница
   '' => 'HomeController@index', 
];
