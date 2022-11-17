<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class PizzaController extends Controller
{
     ######## Pizza
     public function pizza(){
        return view('Admin.Pizza.list');
    }

    // Create Pizza
    public function createPizza(){
        $categoryData = Category::get();
        //dd($data->toArray());
        
        return view('Admin.Pizza.create')->with(['category' =>$categoryData]);  // send All Categories to createPizza Page with 'category' KEY.
    }

    // Insert Pizza
    public function insertPizza(Request $request){
       // dd($request->all());
        $data = $this->requestPizzaData($request);
        Pizza::create($data);

        return redirect()->route('admin#pizza')->with(['createSuccess' => 'Pizza Created !']);
    }

    // request Data
    private function requestPizzaData($request){

        return [
            'pizza_name'=>$request->name,
            'image' =>$request->image,
            'price' =>$request->price,
            'publish_status'=>$request->publish,
            'category_id'=>$request->category,
            'discount_price'=>$request->discount,
            'buy_one_get_one_staut' =>$request->buyOnegetOne,
            'waiting_time' =>$request->waitingTime,
            'description' =>$request->description,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

}
