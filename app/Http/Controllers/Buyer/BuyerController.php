<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::has('transactions')
                                    ->get();
        return $this->showAll($buyers);
        // XOY AM FUNCTIONA 2 PARAM WARAGRE BALAM EMA LA KATY DRWST KRDNYA PEMAN WTWA GAR NRXY DWAMT BO NAHAT
        // KA $codeA AWA XOT 200 DANE XO GAR NRXMAN PEYA AWA AW NRXA WARAGRE KA TAZA PEMAN YAWA
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Buyer $buyers
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Buyer $buyers)
    {
        //$buyers = Buyer::has('transactions')
            //->findOrFail($id);

        return $this->showOne($buyers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
