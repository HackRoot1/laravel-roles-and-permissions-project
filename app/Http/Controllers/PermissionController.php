<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    // This method will show permissions page
    public function index() {
        return view('permissions.list');
    }
  
    // This method will show create permissions page
    public function create() {
        return view('permissions.create');
    }
   
    // This method will insert permission in DB
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3',
        ]);


        if($validator->fails()) {
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }

        Permission::create(['name' => $request->name ]);

        return redirect()->route('permissions.index')->with('success', 'Permission added successfully.');

    }

    // This method will show edit permissions page
    public function edit() {

    }
 
    // This method will update a permissions in DB
    public function update() {

    }

    // This method will delete a permissions in DB
    public function destroy() {

    }


}
