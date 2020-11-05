<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientCreateRequest;
use App\Models\Shop;
use App\Models\Client;
use App\Models\Plan;
use DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('clients.create' , ['shop' => Shop::find($id)]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientCreateRequest $request , $id)
    {
        $validated = $request->validated();
        $client = CLient::create($validated);
        DB::table('client_shop')->insert(
        [
            'client_id' => $client->id,
            'shop_id' => $id, 
        ]);
        return redirect()->route('shops.show' , ['shop' => $id])->
                           with(['done' => 'Client Added To The Shop Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        $plans = $client->plans;
        $shops = $client->shops;
        return view('clients.show' , ['client' => $client , 'plans' => $plans , 'shops' => $shops]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('clients.edit' , ['client' => Client::find($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientCreateRequest $request, $id)
    {
        $validated = $request->validated();
        Client::find($id)->update($validated);
        return back()->with(['done' => 'Client Edited Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        // $client->shops()->delete();
        // $client->plans()->delete();
        $client->delete();
        return back()->with(['done' => 'Client Deleted Successfully']);
    }

    
}
