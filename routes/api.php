<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('chart','ChartController@index') ;

Route::get('/auth/user', function (Request $request) {

    $token = $request->bearerToken();

    \App\Models\User::first()->tokens;
    dd(\App\Models\User::first()->tokens[0]->id , $token);

});


Route::get('/books',function(){
    $books=\App\Models\Atom\Article::all();
    return $books->map(function($book){
        return [
            'id'=>$book->id,
            'title'=>$book->title,
            'body'=>$book->description,
            'author'=>strip_tags($book->description),
            'created_at'=>$book->created_at->diffForHumans(),
            'updated_at'=>$book->updated_at->diffForHumans(),
            'image'=>url($book->image),
            'price'=>$book->subtitle,
            'count'=>1,
            'category'=>$book->category,
        ];
    });
});


Route::post('/login',function(){
    $request = request();
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $user= auth()->user();
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token, 'user'=>$user], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }

});
