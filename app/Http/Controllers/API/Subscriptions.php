<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Http\Requests\API\SubscriptionRequest;
use App\Http\Resources\API\SubscriptionResource;


class Subscriptions extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Subscription::all(); 
        return SubscriptionResource::collection(Subscription::all());  
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Subscription $subscription)
    {
        // $data = $request->all();
        // $subscription = Subscription::create($data);
        // return new SubscriptionResource($subscription);
        $data = $request->all(); 
        $subscription = new Subscription($data); // ** create new animal IN MEMORY (not yet in db)
        $subscription->save(); // only now, after associating owner, save to the database
        $subscription->setCategories($request->get("categories")); //  call set treatments method on what is now a database entry
        return new SubscriptionResource($subscription);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        return new SubscriptionResource($subscription);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        $data = $request->all();
        $subscription->fill($data)->save();        
        $subscription->setCategories($request->get("categories"));
        return new SubscriptionResource($subscription);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return response(null, 204);
    }
}
