<?php

namespace App\Http\Controllers;

use App\pay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $payments = pay::all();

        return response()->json(["data"=>$payments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function findAllPayUser()
    {


        $payments = pay::where('user_id',auth()->user()->id)->get();
        return response()->json(["data"=>$payments]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function show(pay $pay)
    {

        $payments = pay::where('user_id',auth()->user()->id)->where('id',$pay->id)->get();

        return response()->json(["data"=>$payments]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pay  $pay
     * @return \Illuminate\Http\Response
     */



    public function update(Request $request, pay $pay)
    {
        if ($request->hasFile('img_pay')){

            $paz_save = Cloudinary::upload($request->file('img_pay')->getRealPath(),[
                'folder' => 'bomberos',
                'transformation' => [
                        'width' =>800 ,
                        'height' => 800,
                        'crop' => 'limit'
                ]
                ])->getSecurePath();

                $pay->img_pay = $paz_save;
                $pay->status ="payment";
                $pay->save();



        }



        return response()->json(["data"=>$pay]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function destroy(pay $pay)
    {
        //
    }
}
