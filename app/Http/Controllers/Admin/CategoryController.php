<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required|string',
        ]);
        Category::create($data);
        return redirect()->route('categories.index');
    }
        
 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {    
         $categories=Category::FindorFail($id);
         return view('admin.edit_category',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'category_name' => 'required|string',
        ]);
        Category::where('id',$id)->update($data);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Check if the category has any associated topics
        $hasTopics = Topic::where('category_id', $id)->exists();
    
        if ($hasTopics) {
            // If the category has topics, return a response indicating that it cannot be deleted
            return redirect()->back()->with('error', 'Cannot delete a category with associated topics.');
        } else {
            // If the category has no topics, delete it
            Category::where('id', $id)->delete();
            return redirect()->route('categories.index');
        }
    }
}
