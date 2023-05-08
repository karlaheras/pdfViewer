<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator as Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home=Home::orderBy('id','desc')->get();
     
        /*dd($home->id);
        die();*/
        return view("home.index", ["model"=>$home]);

    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $input =$request->validate( [
            'nombre'=>'nullable',
            'url' => 'required|mimes:pdf|max:10000'
           ]);
           if ($request->hasFile('url')){
            $filepath=$request->file('url')->store('documentos');
           $input['url']=$filepath;
        }
        Home::create($input);
        $home=Home::orderBy('id','desc')->get();
        return view("home._table",["model"=>$home]);
         //return redirect()->route('home', $home);
      // return back()->with('notification','Su documento se a subido con éxito');
       //return response()->json('El documento se subio con exito');
    }

    


    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomeRequest  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeRequest $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        $home->delete();
        return redirect()->route('home');
    }
}
