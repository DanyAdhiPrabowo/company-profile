<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class CatalogController extends Controller{

  public function index(){
    $catalogs = \App\Catalog::orderBy('id', 'desc')->paginate(10);
    return view('catalogs.index', ['catalogs'=>$catalogs]);
  }

  public function create(){
    return view('catalogs.create');
  }

  public function store(Request $request) {
    \Validator::make($request->all(),[
      'name'          => 'required|min:2|max:20|unique:catalogs',
      'description'   => 'required',
      'image'         => 'required',
      'price'         => 'required|numeric',
      'category'      => 'required',
    ])->validate();
    $new_catalog = new \App\Catalog;
    $new_catalog->name         = strtoupper($request->get('name'));
    $new_catalog->description  = $request->get('description');
    $new_catalog->price      = $request->get('price');
    $new_catalog->category      = $request->get('category');

    if($request->file('image')){
      $nama_file = time()."_".$request->file('image')->getClientOriginalName();
      $image_path = $request->file('image')->move('catalog_image', $nama_file);
      $new_catalog->image = $nama_file;
    }
    $new_catalog->save();
    return redirect()->route('catalogs.index')->with('success', 'Catalog successfully created');
  }

  public function edit($id){
    $catalog = \App\Catalog::findOrFail($id);
    return view('catalogs.edit', ['catalog'=>$catalog]);
  }

  public function update(Request $request, $id){
    \Validator::make($request->all(),[
      'name'          => 'required|min:2|max:20|unique:catalogs,name,'.$id,
      'description'   => 'required',
      'image'         => 'nullable',
      'price'         => 'required|numeric',
      'category'      => 'required',
    ])->validate();
    $catalog = \App\Catalog::findOrFail($id);
    $catalog->name         = strtoupper($request->get('name'));
    $catalog->description  = $request->get('description');
    $catalog->price        = $request->get('price');
    $catalog->category     = $request->get('category');

    if($request->file('image')){
      if($catalog->image && file_exists(public_path('catalog_image/'.$catalog->image))){
        File::delete('catalog_image/'.$catalog->image);
      }
      $nama_file = time()."_".$request->file('image')->getClientOriginalName();
      $image_path = $request->file('image')->move('catalog_image', $nama_file);
      $catalog->image = $nama_file;
    }
    $catalog->save();
    return redirect()->route('catalogs.index')->with('success', 'Catalog successfully updated');
  }
}
