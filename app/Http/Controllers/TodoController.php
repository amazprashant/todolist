<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;
use DB,Redirect,Validator,Session;

class TodoController extends Controller
{
    public function index()
    {
        //$category_all = Category::all();
        // You can do any further processing with the $category_all data here

        $category_all = Category::getCategory();
        $todo_all = Todo::getTodo();
        $category_drop = [];
        foreach ($category_all as $category) {
            $category_drop[$category->id ]=$category->name;
        }

        return view('welcome', compact('category_all','todo_all','category_drop'));
    }
    function add(Request $request){
		
		$thisData						=	$request->all();

		$validator 					=	Validator::make(
			$request->all(),
			 array(
			 	'todo_name'				=> 'required',
                 'category'				=> 'required',
			 ),
			 array(
			 	"todo_name.required"			=>	trans("The todo name field is required."),
			 	"category.required"			=>	trans("The category field is required."),

			 )
		);

		if ($validator->fails()) {	
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
				DB::beginTransaction();
				$obj 					=    new Todo;
				$obj->name		        = 	strtoupper($thisData['todo_name']);
                $obj->category_id		= 	strtoupper($thisData['category']);
                $obj->created_at		= 	now();
                $obj->updated_at		= 	now();
				//}
				$objSave				=   $obj->save();
				$last_id				=	$obj->id;
				if(!$objSave) {
					DB::rollback();
					Session::flash('error', trans("Something went wrong.")); 
					return Redirect::route("index");
				}
				DB::commit();
				Session::flash('success',trans("Todo item has been added successfully"));
        	}	return Redirect::route("index");
			
	}// end save()

    public function delete($id =0){
        $todoDetails	=	Todo::find($id);
		//dd($modelDetails);
		if(empty($todoDetails)) {
			return Redirect::route("index");
		}
		if($id){		
			$todoDetails->delete();
			Session::flash('flash_notice',trans("Todo item has been removed successfully")); 
			return Redirect::route("index");
		}
		return Redirect::back();
    }
}