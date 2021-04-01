<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DD;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index()
    {
        //db tanpa eloquent utk menampilkan seluruh isi tabel guests
        // $guests= DB::table('guests')->get(); 

        //db dengan eloquent
        $categories = Category::all();
        return view('addGuestForm', ['category' => $categories]);
    }

    //function to save input data to database
    //store adalah nama function dan parameternya $request
    public function store(Request $request)
    {
        $category = new Category;
        $category->title = $request->input('title');
        $category->save();
        return redirect('/')->with('message', 'Data is successfully saved');
        //with adalah session yg akan dikirimkan
    }

    // public function edit($guestId){
    //     $guest
    // }
    
   public function destroy($id=0)
   {
       $category = Category::find($id);
       $category->delete();
       return redirect('/')->with('message','Data is successfully deleted');
   }

   public function edit($id)
   {
       $category = Category::find($id);
       return view('editGuestForm',['category' => $category]);
       return redirect('/')->with('message','Data is successfully deleted');
   }

   public function update(Request $request,$id)
    {
        $category = Category::find($id);
        $category->guestName = $request->input('title');
        $category->save($request->all());
        return redirect('/')->with('message', 'Data is successfully updated');
        //with adalah session yg akan dikirimkan
    }

}