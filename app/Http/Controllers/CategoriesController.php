<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoriesController extends Controller
{
    public function index(){

        return view("categories.category");

    }

    public function allCat(){

        $cats = Category::all();

        return view("categories.viewcat", compact('cats'));

    }

    public function addCategory(Request $request){
        $data = $this->validate($request, [
            'category' => 'required'
        ]);

        $category = new Category;
        $category->category = $data['category'];
        $category->save();
        return redirect('/category')->with('cat_message', 'category added successfully');
    }

    public function showCat($id){

        $categories = Category::all();

        $cats = Category::findOrFail($id);
        //$categories = Post::find($categories);
        //dd($categories);
          //$catposts = Post::find($cat_id);

         return view('posts.catposts', compact('categories', 'cats'));

      }

      public function editCat($id){

        $cat = Category::findOrFail($id);

        return view("categories.editcat", compact('cat'));

    }

    public function updateCat(Request $request, $id){

        $data = $this->validate($request, [

            'category' => 'required'

        ]);

        $cat = Category::findOrFail($id);

        $cat->category = $data['category'];

        $cat->update();

        return redirect('category/all')->with('updateCat', "Category successfully updated. Thanks.");

    }

    public function delCat($id){

        $cat = Category::findOrFail($id);

        foreach($cat->posts as $catpost){
            $catpost->delete();
        };

        $cat->delete();

        return redirect()->back()->with('delCat', "Category successfully deleted. Thanks.");

    }

}
