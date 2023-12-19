<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\PvzObject;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function (Request $request) {
    $objects = PvzObject::query();
    if($request->query("type")){
        $objects = $objects->where("type", $request->query("type"));
    }

    $objects = $objects->get();


    

    return view('main', [
        "objects" => $objects,
        "title" => "PlantsVsZombies"
    ]);
});

Route::get("/pvz_objects/{id}", function(Request $request, $id){
    //$object = DB::selectOne("SELECT * FROM pvz_objects WHERE id = ?", [$id]);
    $object = PvzObject::query()
        ->where("id", $id)
        ->first();

    if($object->image)
    

    return view('object', [
        "object" => $object,
        "title" => $object->title,
        "is_image" => $request->query("show") == 'image',
        "is_info" => $request->query("show") == 'info',
    ]);
})->name("pvz_objects")->whereNumber('id');

Route::get("/pvz_objects/{id}/edit", function(Request $request, $id){
    $object = PvzObject::query()
        ->where("id", $id)
        ->first();
    

    return view('object_edit', [
        "object" => $object,
        "title" => $object->title,
    ]);
})->name("pvz_objects.edit")->whereNumber('id');

Route::post("/pvz_objects/{id}", function(Request $request, $id){
    $object = PvzObject::query()
        ->where("id", $id)
        ->first();
    
    
    $object->title = $request->input("title");
    $object->description = $request->input("description");
    $object->save();

    return redirect()->route("pvz_objects.edit", ["id"=> $id]);
})->name("pvz_objects.update")->whereNumber('id');

Route::get("/pvz_objects/create", function(Request $request){

    return view('object_create', [
        "title" => "Создать обьект растение зомбиевой войны",
    ]);
})->name("pvz_objects.create_form");

Route::post("/pvz_objects", function(Request $request){
    $object = new PvzObject;
    
    
    $object->title = $request->input("title");
    $object->description = $request->input("description");
    $object->image = $request->file("image")->store("/public/images");
    $object->save();

    return redirect()->route("pvz_objects.edit", ["id"=> $object->id]);
})->name("pvz_objects.create");