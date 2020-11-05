<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PlanCreateRequest;
use App\Models\Shop;
use App\Models\Plan;
use DB;

class PlanController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('plans.create' , ['shop' => Shop::find($id)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanCreateRequest $request , $id)
    {
        $validated = $request->validated();
        $plan = new Plan;
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->shop_id = $id;
        $plan->save();
        return redirect()->route('shops.show' , ['shop' => $id])->
                           with(['done' => 'Plan Added To The Shop Successfully']);

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = Plan::find($id);
        $clients = $plan->clients;
        return view('plans.show' , ['plan' => $plan , 'clients' => $clients]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('plans.edit' , ['plan' => Plan::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanCreateRequest $request, $id)
    {
        $validated = $request->validated();
        $plan = Plan::find($id);
        $plan->update($validated);
        return redirect()->route('shops.show' , ['shop' => $plan->shop_id])->
                           with(['done' => 'Plan Edited Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::find($id);
        // $plan->clients()->delete();
        $plan->delete();
        return back()->with(['done' => 'Plan Deleted Successfully']);
    }

    public function addClient(Request $request , $id)
    {
        if(DB::table('client_plan')->where('client_id' , $request->client_id)->where('plan_id' , $id)->exists())
            {
                return back()->with(['error' => 'Client Exists']);
            }
            else
            {
        DB::table('client_plan')->insert(
            [
               'client_id' => $request->client_id,
               'plan_id' => $id, 
            ]
            
            );
        return back()->with(['done' => 'Client Added Successfully']);
            }

    }


    public function changePlanStatus(Request $request , $id)
    {
        $plan = Plan::find($id);
        $plan->active = !$plan->active;
        $plan->save();

        return back()->with(['done' => 'Plan Status Changed Successfully']);

    }
}
