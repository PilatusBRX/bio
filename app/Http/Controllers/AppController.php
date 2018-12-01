<?php

namespace App\Http\Controllers;
use App\App;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Gate;
use Laracasts\Flash\Flash;


class AppController extends Controller
{
    public function index()
    {
        $apps = App::orderBy('created_at', 'desc')->paginate(12);
        return view('admin.index', compact('apps'));
    }
    public function create()
    {
        return view('admin.create');
    }
    public function store(Request $request)
    {
        // Get filename with extension
         $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
         // Get just the filename
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
         // Get extension
         $extension = $request->file('profile_image')->getClientOriginalExtension();
         // Create new filename
         $filenameToStore = $filename.'_'.time().'.'.$extension;
         // Uplaod image
         $path= $request->file('profile_image')->storeAs('public/profile_images', $filenameToStore);

        $app = new App;
        $app->name = $request->input('name');
        $app->bio = $request->input('bio');
        $app->age = $request->input('age');
        $app->profession = $request->input('profession');
        $app->email = $request->input('email');
        $app->phone = $request->input('phone');
        $app->profile_image = $filenameToStore;
        Auth::user()->apps()->save($app);
        Flash::success("Bio criada com sucesso!");
        return redirect('/');
    }
    public function show($id)
    {
        $app = App::find($id);
        return view('admin.show', compact('app'));
    }
    public function edit($id)
    {
        $app = App::find($id);
        if(Gate::denies('show-link', $app)){
             abort(403, "Não autorizado");
         }
        return view('admin.edit', compact('app'));
    }

    public function update(Request $request, $id)
    {


        // Get filename with extension
         $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
         // Get just the filename
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
         // Get extension
         $extension = $request->file('profile_image')->getClientOriginalExtension();
         // Create new filename
         $filenameToStore = $filename.'_'.time().'.'.$extension;
         // Uplaod image
         $path= $request->file('profile_image')->storeAs('public/profile_images', $filenameToStore);

        $app = App::find($id);
        $app->name = $request->input('name');
        $app->bio = $request->input('bio');
        $app->age = $request->input('age');
        $app->profession = $request->input('profession');
        $app->email = $request->input('email');
            $app->profile_image = $filenameToStore;
        $app->save();
        Flash::success("Bio atualizada com sucesso!");
        return redirect('/');

    }

    public function destroy($id)
    {
            $app = App::find($id);
            $app->delete();
            Flash::success("Bio exlcuída  com sucesso!");
            return redirect('/');

    }


}//Fim
