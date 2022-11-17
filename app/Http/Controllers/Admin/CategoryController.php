<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    ### Admin Profile
    public function profile()
    {
        $id = auth()->user()->id;  // Get User ID from Login 
        // dd($id); 
        $userData = User::where('id', $id)->first(); // use first() instead of get() bcoz to get one Record        
        // dd($userData->toArray());  obj to Array convert
        return view('Admin.profile.index')->with(['USER' => $userData]); // $userData is an Object Format
    }

    ###  Category List
    public function category()
    {
        // $data = Category::get();
        $data = Category::paginate(5);
        //dd($data); ### $data is Object
        return view('Admin.Category.list')->with(['categoryList' => $data]);
    }

    ### Create New Category
    public function createCategory(Request $request)
    {
        //dd("create New One");

       ///  Validation ///
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'category_name' => $request->name,  // Catch Category Name from Blade ('name' comes from Blade TextBox name)
        ];

        Category::create($data);
        return redirect()->route('admin#categorylist')->with(['CategoryAdd' => "Add New Category !"]);
    }

    ### Add Category
    public function addCategory()
    {
        return view('Admin.Category.addCategory');
    }

    ### Delete Category
    public function deleteCategory($id)
    {
        // dd($id);
        Category::where('category_id', $id)->delete();
        return back()->with(['DeleteCategory' => "Delete Category"]);
    }

    ### Edit Category
    public function editCategory($id)
    {
        // dd($id);
        $data = Category::where('category_id', $id)->first(); // first is the Array value Without Index Room, just Directly Array
        //  dd($data->toArray());
        return view('Admin.Category.update')->with(['category' => $data]);
    }

    ### Update Category
    public function updateCategory(Request $request)
    { ### $id comes from Hidden TextField
        // dd($request->all());  
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255', //  'name' comes from TextField in blade file           
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'category_name' => $request->name,  // Catch Category Name from Blade ('name' comes from Blade TextBox name)
        ];

        $updateCategory = [
            'category_name' => $request->name,
        ];

        Category::where('category_id', $request->id)->update($updateCategory);
        // dd($updateCategory);
        return redirect()->route('admin#categorylist')->with(['updateCategory' => "Category Updated !"]);
    }

    ### Search Category
    public function searchCategory(Request $request)
    {
        // dd($request->searchCategory);        
        // $checkData = Category::where('category_name' ,'Like','%'.$request->searchCategory.'%')->get();  // Search Data must be the same as category_name in DB
        // dd($checkData);
        // if($checkData == null ){            
        //     dd('No Data');
        // }
        // else{

        $data = Category::where('category_name', 'Like', '%' . $request->searchCategory . '%')->paginate(5); // Search Data with Like Keyword 
        // dd($data->toArray());

        // }       

        return view('Admin.Category.list')->with(['categoryList' => $data]);
    }
}
