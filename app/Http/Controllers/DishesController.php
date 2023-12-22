<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DishesController extends Controller
{   
  
    public function step1(){
        $data = json_decode(file_get_contents('dishes.json'));
        
        $meals = [];
        foreach ($data->dishes as $key) {
            $meals = array_merge($meals, $key->availableMeals);
        }
        $meals = array_unique($meals);
      
        return view('step1',compact('meals'));
    }

    public function step2(Request $reqest){

        $data = json_decode(file_get_contents('dishes.json'));

        $availableMeals= $reqest->post('availableMeals');
        $num_people= $reqest->post('num_people');
        $restaurants = [];
        foreach ($data->dishes as $key) {
            foreach($key->availableMeals as $meals =>$mealName){      
                if($mealName == $availableMeals){
                    $restaurants[] = $key->restaurant;
                }
            }              
        }
        $restaurants = array_unique($restaurants);
        
        return view('step2',compact(['availableMeals','num_people','restaurants']));
         
    }

    public function step3(Request $reqest){

        $data = json_decode(file_get_contents('dishes.json'));

        $availableMeals= $reqest->post('availableMeals');
        $num_people= $reqest->post('num_people');
        $restaurant = $reqest->post('restaurant');
   
        $dishes = [];
        foreach ($data->dishes as $key) {
            foreach($key->availableMeals as $meals =>$mealName){      
                if($mealName ==  $availableMeals && $restaurant ==$key->restaurant){
                    $dishes[] = $key->name;
                }
            }              
        }      
        return view('step3',compact(['availableMeals','num_people','restaurant','dishes']));
         
    }

    public function step4(Request $reqest){

        $data = json_decode(file_get_contents('dishes.json'));

        $availableMeals= $reqest->post('availableMeals');
        $num_people= $reqest->post('num_people');
        $restaurant = $reqest->post('restaurant');
        $dishes = $reqest->post('dishes');
        $quantities = $reqest->post('quantity');
        
        $menus = [];
        
        for ($i = 0; $i < count($dishes); $i++) {
            $dish = $dishes[$i];
            $quantity = $quantities[$i];
            if (array_key_exists($dish, $menus)) {
                $menus[$dish] += $quantity;
            } else {
                $menus[$dish] = $quantity;
            }
        }
        
        return view('step4',compact(['availableMeals','num_people','restaurant','menus']));
         
    }
        
}
