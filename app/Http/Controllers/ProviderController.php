<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['providers']=provider::paginate(5);
        return view ('providers.index', $datos);   
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $name=$request->input("name");
       $nif=$request->input("nif");
       $logo=$request->input("logo");


      $data=array(
        
        'name'=>$name,
        'nif'=>$nif,
        'logo'=>$logo,
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now()
    
        );
       

       provider::insert($data);

       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(provider $provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, provider $provider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(provider $provider)
    {
        //
    }
}
