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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        $email = Auth::user()->email;
        $email2 = DB::table('company')->where('email', $email)->value('email');
        if ($email2 == NULL) {
            $lname = DB::table('applicant')->where('email', '=', $email)->value('lastname');
            $fname = DB::table('users')->where('email', '=', $email)->value('name');
            $url = DB::table('applicant')->where('email', '=', $email)->value('profile_pic');
            if ($url != "")
                $url = ('profile/data/' . $email . '/' . $url);
            $name = $fname . " " . $lname;
            return view('applicantdashboard', ['url' => $url, 'email' => $email, 'name' => $name]);
        } else
            return view('companydashboard', []);
    })->name('home');

    Route::get('view_applicants', function () {
        $email = Auth::user()->email;
        $email2 = DB::table('company')->where('email', '=', $email)->value('email');
        if ($email2 == NULL)
            return "Not Permitted";
        else
            return view('viewapplicants', []);
    })->name('viewapplicants');

    Route::get('/post_a_job', function () {
        $email = Auth::user()->email;
        $email2 = DB::table('company')->where('email', '=', $email)->value('email');
        if ($email2 == NULL)
            return "Not Permitted";
        else
            return view('postajob', ['alert' => '']);
    })->name('postajob');

    Route::post('/post_a_job', function (Request $request) {
        $data = $request->all();
        $email = Auth::user()->email;
        $email2 = DB::table('company')->where('email', '=', $email)->value('email');
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


    Route::post('/update_profile', function (Request $request) {
        $email = Auth::user()->email;
        $email1 = DB::table('applicant')->where('email', '=', $email)->value('email');
        if ($email1 == NULL)
            return "Not Permitted";
        else {
            $pic = $request->file('pic');
            $resume = $request->file('resume');
            DB::table('applicant')
                ->where('email', '=', $email)
                ->update([
                    'profile_pic' => $pic->getClientOriginalName(),
                    'resume' => $resume->getClientOriginalName()
                ]);
            $des = 'profile/data/' . $email;
            $pic->move($des, $pic->getClientOriginalName());
            $resume->move($des, $resume->getClientOriginalName());
            $lname = DB::table('applicant')->where('email', '=', $email)->value('lastname');
            $fname = DB::table('users')->where('email', '=', $email)->value('name');
            $name = $fname . " " . $lname;
            $url = ($des . '/' . $pic->getClientOriginalName());
            return redirect()->route('home');
        }
    })->name('updateprofile');

});
