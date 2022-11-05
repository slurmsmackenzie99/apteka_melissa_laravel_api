<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Manipulate and redirect the request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //wysłany request
        $received = $request->all();

        // modyfikacja danych
        $postRequest = array(
            "payed" => $received["payed"],
            "orderNo" => $received["orderNo"],
            "yourName" => $received["yourName"]
        );
        
        // indentyfikacja sklepu
        $shop_type = $received["shop"]["id"];

        //zwróć odpowiedź (response) po wysłaniu requesta na podany endpoint
        return $response = Http::withHeaders([
            'api-id' => 'rekrutacja',
            'api-key' => 'AAV$BM%FIH^SAX#2CK8JU47QU$3L$J!3Q&9BVYIJWAND#W3'
        ])->post('https://www.apteka-melissa.pl/rekrutacja/sklep/' . $shop_type, $postRequest);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
