<?php

namespace App\Http\Controllers;

use pay;
use App\file;
use App\peticion;
use App\pay as AppPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Notifications\ConfirmPeticion;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PeticionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     //lista todos los usuarios
    public function index()
    {
        $data= peticion::all();
        return response()->json(["data"=>$data,"message"=>"data successfully"]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //guarda
    public function store(Request $request)
    {
         $data = $request->validate([

            'type_edification'=>'required',
            'areas_demolishions'=>'required',
            'type_material'=>'required',
            'electric_pole'=>'required',
            'value_Demolishion'=>'required',
            'number_levels'=>'numeric|required',
            'type_Energy'=>'required|boolean',
            'Contruccion_disable'=>'required',
            'address'=>'required',
            'contruction_company'=>'required',
            'paz_save'=>'required|image',
            'approval'=>'required|image',
            'thecnical_resolution'=>'image',
            'peticion_id'=>''

         ]);
        // $req = peticion::create($data);
        //$data['user_id'] = auth()->user()->id;

        //$req = new peticion ($data);
        //$req->save();


        $data['user_id'] = auth()->user()->id;

        $req = auth()->user()->peticion()->create([

            "type_edification"=>$data['type_edification'],
            "areas_demolishions"=>intval($data['areas_demolishions']),
            "type_material"=>$data['type_material'],
            "electric_pole"=>$data['electric_pole'],
            "value_Demolishion"=>floatval($data['value_Demolishion']),
            "number_levels"=>intval($data['number_levels']),
            "type_Energy"=>intval($data['type_Energy']),
            "Contruccion_disable"=>intval($data['Contruccion_disable']),
            "address"=>$data['address'],
            "contruction_company"=>intval($data['contruction_company']),

        ]);


        if ($request->has('paz_save')){

            $paz_save = Cloudinary::upload($request->file('paz_save')->getRealPath(),[
                'folder' => 'bomberos',
                'transformation' => [
                          'width' =>800 ,
                          'height' => 800,
                          'crop' => 'limit'
                 ]
                ])->getSecurePath();


                $data['paz_save']  = $paz_save;


            if ($request->has('approval')){


                $approval = Cloudinary::upload($request->file('approval')->getRealPath(),[
                    'folder' => 'bomberos',
                    'transformation' => [
                              'width' =>800 ,
                              'height' => 800,
                              'crop' => 'limit'
                     ]
                    ])->getSecurePath();

                    $data['approval']  = $approval;

            }

            if ( $request->has('thecnical_resolution') && $req->contruction_company==1 ){

                $thecnical_resolution = Cloudinary::upload($request->file('thecnical_resolution')->getRealPath(),[
                    'folder' => 'bomberos',
                    'transformation' => [
                              'width' =>800 ,
                              'height' => 800,
                              'crop' => 'limit'
                     ]
                    ])->getSecurePath();

                    $data['thecnical_resolution']  = $thecnical_resolution;

            }

            $data['peticion_id']=$req->id;

            $file = file::create($data);



        }


        $payment = new AppPay();
        $payment->user_id = auth()->user()->id;
        $payment->peticion_id = $req->id;
        $payment->price = 220;
        $payment->save();

        $solicitante = auth()->user();
        $solicitante->notify(new \App\Notifications\Validatepayment);

        return response()->json(["data"=>[$req,$file,$payment],"message"=>"data saved successfully"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\peticion  $peticion
     * @return \Illuminate\Http\Response
     */

     //muestra todos los datos del usuario actual
    public function show()
    {
        $item  = peticion::all();
        $req  = peticion::where('user_id',auth()->user()->id)->get();
        // $req  = $item->where('user_id',auth()->user()->id);

        return response()->json(["data"=>$req,"message"=>"data saved successfully"]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\peticion  $peticion
     * @return \Illuminate\Http\Response
     */

    //trae  los datos del usuario autenticado
    public function edit(peticion $peticion)
    {

        $req =peticion::where('user_id',auth()->user()->id)->where('id',$peticion->id)->get();

        return response()->json(["data"=>$req,"message"=>"data saved successfully"]);

    }

    //muest
    public function showOne(peticion $peticion)
    {
        $peticion->user;
        return response()->json(["data"=>$peticion,"message"=>"data saved successfully"]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, peticion $peticion)
    {



        $data = $request->validate([

            'type_edification'=>'required',
            'areas_demolishions'=>'required',
            'type_material'=>'required',
            'electric_pole'=>'required',
            'value_Demolishion'=>'required',
            'number_levels'=>'required',
            'type_Energy'=>'required',
            'Contruccion_disable'=>'required',
            'address'=>'required',
            'contruction_company'=>'required',

         ]);

         $data['user_id'] = auth()->user()->id;
         $peticion->type_edification = $data['type_edification'];
         $peticion->areas_demolishions = $data['areas_demolishions'];
         $peticion->type_material = $data['type_material'];
         $peticion->electric_pole = $data['electric_pole'];
         $peticion->value_Demolishion = $data['value_Demolishion'];
         $peticion->number_levels = $data['number_levels'];
         $peticion->type_Energy = $data['type_Energy'];
         $peticion->Contruccion_disable = $data['Contruccion_disable'];
         $peticion->address = $data['address'];
         $peticion->contruction_company = $data['contruction_company'];
         $peticion->user_id = $data['user_id'];

         $peticion->status="wait";
         $peticion->save();
         return response()->json(["data"=>$peticion,"message"=>"data update successfully"]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function destroy(peticion $peticion)
    {

        $peticion2 =peticion::where('user_id',auth()->user()->id)->where('id',$peticion->id)->get();

        $status = $peticion2[0]->status;
        $mensaje = "Invalid";
        if ($status === 'rejected'){

            $peticion->delete();

            $mensaje = "Deleted";

        }

        return response()->json(["Data"=>$mensaje]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function ConfirmPeticion(peticion $peticion,$status)
    {

        $peticion->status=$status;
        $peticion->save();

        $UserRequest = $peticion->user;

        if ($status == "wait"){ $status = "Espera"; }
        if ($status == "rejected"){ $status = "Rechazado"; }
        if ($status == "accepted"){ $status = "Aceptado";  }


        $UserRequest->notify(new ConfirmPeticion($status));
        return response()->json(["prueba"=>$peticion,"status"=>$status]);


    }

}
