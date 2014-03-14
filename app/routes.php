<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::get('/', function()
{
	return View::make('hello');
});



Route::get('/products', function()
{
    return View::make('products');
});




Route::group(array('prefix' => 'v1'), function(){

    /*Get all activve categories*/
    Route::get('/categories',function(){
        $categories = Category::where('active','=',1)->get();
        return Response::json($categories);
    });


    /*Get all categories*/
    Route::get('/categories/all',function(){
        $categories = Category::all();
        return Response::json($categories);
    });


    /*Create a category*/
    Route::post('/categories',function(){
        $now = date('Y-m-d H:i:s');
        $category = new Category(Input::get());
        $category->validate();

        $category->created_at = $now;
        $category->updated_at = $now;

        if(!$category->save()){
            App::abort(500, 'Category not saved');
        }
        
    });


    /*Get a specific category using ID*/
    Route::get('/categories/{id}',function($id){
        $category = Category::find($id);
        return Response::json($category);
    });


    /*Update a specific category detail*/
    Route::post('/categories/{id}',function($id){
        
        $category = Category::find($id);
        $now = date('Y-m-d H:i:s');

        if($category->id == $id){
            if(Input::has('name')){
            $category->name = Input::get('name');
            }
            if(Input::has('active')){
                $category->active = Input::get('active');
            }

            $category->validate();
            $category->updated_at = $now;
            if(!$category->save()){
                App::abort(500, 'Category not saved');
            }
            return Response::json($category);
        }

        App::abort(500, 'Category not saved');
        
    });

    /*Delete a specific category*/
    Route::delete('/categories/{id}',function($id){
        $category = Category::find($id);
        if(!$category || !$category->delete()){
            App::abort(500, 'Category not deleted');
        }

        return Response::make(null, 204);
    });


    /*Get all active products*/
    Route::get('/products',function(){
        $products = Product::where('active','=',1)->get();
        return Response::json($products);
    });

    /*Get all active products*/
    Route::get('/products/all',function(){
        $products = Product::all();
        return Response::json($products);
    });

    /*Create a new product*/
    Route::post('/products',function(){

        $product = new Product(Input::get());
        $now = date('Y-m-d H:i:s');

        $product->validate();
        
        $product->created_at = $now;
        $product->updated_at = $now;

        if(!$product->save()){
            App::abort(500, 'Product not saved');
        }
    });

    /*Get a specific product*/
    Route::get('/products/{id}',function($id){
        $product = Product::find($id);
        return Response::json($product);
    });


    /*Update a specific product details*/
    Route::post('/products/{id}',function($id){
        $product = Product::find($id);
        $now = date('Y-m-d H:i:s');

        if($product){
            if(Input::has('name')){
                $product->name = Input::get('name');
            }
            if(Input::has('stock')){
                $product->stock = Input::get('stock');
            }
            if(Input::has('active')){
                $product->active = Input::get('active');
            }

            $product->validateStock();
            $product->updated_at = $now;
            if(!$product->save()){
                App::abort(500, 'Category not saved');
            }
        }else{
            App::abort(500, 'Product not saved');
        }

        return Response::json($product);
    });

    /*Delete a specific product*/
    Route::delete('/products/{id}',function($id){
        $product = Product::find($id);
        if(!$product || !$product->delete()){
            App::abort(500, 'Product not deleted');
        }

        return Response::make(null, 204);
    });

});