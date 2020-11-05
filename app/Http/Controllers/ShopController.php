<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreShopRequest;
use App\Models\Shop;
use App\Models\Client;
use App\Models\Plan;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::latest()->paginate(15);
        return view('shops.index' , ['shops' => $shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopRequest $request)
    {
        $validated = $request->validated();
        Shop::create($validated);
        return redirect()->route('shops.index')->with(['done' => 'Shop Created Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::find($id);
        $plans = $shop->plans()->latest()->get();
        $clients = $shop->clients()->latest()->get();
        return view('shops.show' , ['shop' => $shop , 'plans' => $plans , 'clients' => $clients]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $shop = Shop::find($id);
       return view('shops.edit' , ['shop' => $shop]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreShopRequest $request, $id)
    {
        $validated = $request->validated();
        Shop::find($id)->update($validated);
        return redirect()->route('shops.index')->with(['done' => 'Shop Edited Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::find($id);
        // $shop->clients()->delete();
        $shop->plans()->delete();
        $shop->delete();
        return back()->with(['done' => 'Shop Deleted Successfully']);


    }
}
