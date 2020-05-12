<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Provider;
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

        $dataPage = "";
        $datos['providers']=Provider::paginate(5);
        return view ('Providers.index', $datos, ['dataPage' => $dataPage]);   
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataPage = "";
        return view ('Providers.create',['dataPage' => $dataPage]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       $name=request()->input('name');
       $nif=request()->input('nif');
       $logo=request()->input('logo');
       

       if ($picture= $request->file('logo')) {

        $namePicture = $picture->getClientOriginalName();
        $picture->move(public_path().'/images',$namePicture);

        $logo= $namePicture;

       }


      $data=array(
        
        'name'=>$name,
        'nif'=>$nif,
        'logo'=>$logo,
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now()
    
        );
       

       Provider::insert($data);

        return redirect('Providers')->with('success','Proveedor creado!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $Provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $Provider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataPage = "";
        $provider = Provider::findOrFail($id);

        return view('Providers.edit',['provider' => $provider, 'dataPage' => $dataPage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $Provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
       $name=$request->input("name");
       $nif=$request->input("nif");
       $logo=$request->input("logo");

       if ($picture= $request->file('logo')) {

        $namePicture = $picture->getClientOriginalName();
        $picture->move(public_path().'/images',$namePicture);

        $logo= $namePicture;

       }

      $data=array(
        
        'name'=>$name,
        'nif'=>$nif,
        'logo'=>$logo,
        'updated_at'=>Carbon::now()
    
        );
       
        //No se porque tiene que ser un '='. Si pongo 2 iguales no funciona
       Provider::where('id','=',$id)->update($data);

       $provider = Provider::findOrFail($id);
       return redirect('Providers')->with('edit','Proveedor actualizado!');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $Provider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Provider::destroy($id);

        return redirect('Providers')->with('delete','Proveedor eliminado!');
    }
}
