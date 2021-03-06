<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Review;
use Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Review::latest();
        return view('restaurant', compact('data'));
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
        $request->validate([
            'reviews' => 'required',
            'rating' => 'required'            
            ]);

        // $restaurant = Restaurant::find($request->restaurantID);
        Review::create([
            'reviews' => $request->reviews,
            'userID' => Auth::id(),
            'restaurantID' => $request->restaurantID,
            'rating' => $request->rating,
        ]);
        // Review::create($request->all());
        return redirect()->back()->with('success', 'Comment Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        $review = Review::where('restaurantID', $id)->paginate(4);
        


       
        //dd($review);
        return view('restaurant',compact(['restaurant','review']));

        

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
        // $dataReviews = User::where('id', $id); 
        // $dataRestaurant = Restaurant::where('')
        // $dataReviews->delete();
 

        // Restaurant::find($id)->delete();
        // return redirect()->route('adminDashboard')->with('success', 'Resturant Deleted Successfully.');
    }
}
