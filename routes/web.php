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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    return view('tasks.index')->with(['tasks' => \App\Task::all()]);
});

Route::post('/tasks', function () {
	$data = request()->all();

	if(request()->has('status')){
		$data['status'] = true;
	}
	// return \App\Task::create($data);
	return request()->all();
    return view('tasks.index');
});
