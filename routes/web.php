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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        $email = Auth::user()->email;
        $email1 = DB::table('applicant')->where('email', $email)->value('email');
        $email2 = DB::table('company')->where('email', $email)->value('email');
        if ($email2 == NULL)
            $email2 = "lal";
        return view('home', ['email' => $email1, 'email1' => $email2]);
    })->name('home');

    Route::get('/post_a_job', function () {
        $email = Auth::user()->email;
        $email2 = DB::table('company')->where('email', $email)->value('email');
        if ($email2 == NULL)
            return "Not Permitted";
        else
            return view('postajob', ['alert' => '']);
    })->name('postajob');

    Route::post('/post_a_job', function (Request $request) {
        $data = $request->all();
        $email = Auth::user()->email;
        $email2 = DB::table('company')->where('email', $email)->value('email');
        if ($email2 == NULL)
            return "Not Permitted";
        else
            DB::table('job')->insert([
                'job_title' => $data['title'],
                'job_description' => $data['des'],
                'salary' => $data['salary'],
                'country' => $data['country'],
                'location' => $data['location']
            ]);
        return view('postajob', ['alert' => 'yes']);
    })->name('postajob');


});
