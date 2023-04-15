<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\foods;
use App\Models\food_categories;
use App\Models\food_food_category;
use Illuminate\Support\Facades\DB;
Use App\Models\nutrition_information;
use App\Models\food_food_part;
use Illuminate\Support\Str;
use \Edamam\Support\Nutrient;
use \Edamam\Api\FoodDatabase\FoodRequest;
use \Edamam\Api\FoodDatabase\FoodDatabase;


class crudcontroller extends Controller
{          
                
        /**
         * index
         *
         * @return void
         */
        public function index(){
            //details for the user table are passed to the admin dashboard
        $data1= User::all(); 
        $Users= User::all()->count(); 
           //details for the foods table are passed to the admin dashboard
        $Food=foods::all();
        $Food1=foods::all()->count();
           //details for the NutritionInformation table are passed to the admin dashboard
        $nutrientdata1=nutrition_information::all();
         $nutrientdata=nutrition_information::all()->count();
           //details for the FoodFoodCategory table are passed to the admin dashboard
         $FoodFoodCategory =food_food_category::all();
           ////details for the FoodPart table are passed to the admin dashboard
           $FoodPart = food_food_Part::all();


         return view('admindashboard')->with('m', [ 
             'data'=>$data1, 
             'userno'=>$Users, 
             'nutrients'=>$nutrientdata, 
             'nutrients1'=>$nutrientdata1,
             'foods'=> $Food,
              'Category'=>$FoodFoodCategory,
             'Part'=>$FoodPart
            ]);
        } 
        public function create() { 
            //
            // return view('crud.create');
            }        
        /**
         * store
         *
         * @param  mixed $request
         * @return string
         */
        public function store(Request $request): string {
              //
              
              DB::transaction(function () use ($request) {
                $food = foods::create([
                    'name' => $request['local_name'],
                    'api_name' => $request['api_name'],
                   // 'image' => $request['image'],
                    'description' => $request['description'],
                ]);
    
                $nutrition = nutrition_information::create([
                    'food_id' => $food->id,
                    'serving_size' => 50,
                    'calories' => $request['calories'],
                    'protein' => $request['protein'],
                    'fat' => $request['fat'],
                    'carbohydrates' => $request['carbohydrates'],
                    'fibre' => $request['minerals'],
                ]);
    
                $categoryIds = $request['category'];
                $food->foodCategory()->attach($categoryIds);
    
                $partIds = $request['part'];
                $food->foodParts()->attach($partIds);
            });
    
            return 'Success';
            } 
        public function show($m) { 
            //
        }
                
               
        /**
         * edit
         *
         * @param  mixed $id
         * @param  mixed $id1
         * @return void
         */
        public function edit($id1) {
             //Foods
            // $Food = Food::find($id1);
            $Food = DB::select( 'select * from foods where id = ?', [$id1]);
            //NutritionInformation
            //$nutrient = NutritionInformation::find($id2);
            //Category
           // $category = FoodFoodCategory::find($id3);
            //Part
            //$part = FoodFoodPart::find($id4);
            return view('crud.edit')->with('Foods',[
                'row'=>$Food, 
              //  'nutrients'=>$nutrient,
              //  'Categories'=>$category,
               // 'Parts'=>$part
            ]);
        } 
                
        /**
         * update
         *
         * @param  mixed $req
         * @param  mixed $id1
         * @return void
         */
        public function update(Request $req ,$id1) { 
            //foods update
            DB::transaction(function () use ($req,$id1) {
                $food= foods::find($id1);
                $food->name = $req['local_name'];
                $food->api_name = $req['api_name'];
                $food->image = $req['image'];
                $food->description = $req['description'];
                $food->save();
                
    
                // $nutrition = NutritionInformation::find(id1);
                // $nutrition->food_id = $food->id;
                // $nutrition->serving_size = 50;
                // $nutrition->calories = $req['calories'];
                // $nutrition->protein = $req['protein'];
                // $nutrition->fat = $req['fat'];
                // $nutrition->carbohydrates = $req['carbohydrates'];
                // $nutrition->fibre = $req['minerals'];
                // $nutrition->save();
    
                $categoryIds = $req['category'];
                $food->foodCategory()->attach($categoryIds);
    
                $partIds = $req['part'];
                $food->foodParts()->attach($partIds);
            });
         

         return redirect()->route('admindashboard')->with('success','Foods table updated successfully');
             
        }
                
        /**
         * destroy
         *
         * @param  mixed $id1
         * @return void
         */
        public function destroy($id1 ) {
             // 
             $food = foods::find($id1);
 
             $food->delete(); 
             return redirect()->route('admindashboard')->with('success','Foods row deleted successfully'); 

        }
    }