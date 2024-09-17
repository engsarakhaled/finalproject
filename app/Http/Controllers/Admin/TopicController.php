<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Traits\Common;
class TopicController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topic::with('category')->get();
        return view('admin.topics', compact('topics'));
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories=Category::select('id','category_name')->get(); 
        return view('admin.add_topic',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     //dd($request);
        $data=$request->validate([
            'topicsTitle'=>'required|string',
            'content'=>'required|string|max:1000',
            'image' => 'image|required|mimes:png,jpg,jpeg',
           'category_id' => 'required|integer|exists:categories,id',
        ]);
        $data['trending']=isset($request->trending);
        $data['published']=isset($request->published);
        if ($request->hasFile('image')) {
           $data['image'] = $this->uploadFile($request->image, 'assets/admin/images/topics');
        }
        Topic::create($data);
        return redirect()->route('topics.index');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic = Topic::with('category')->findOrFail($id);
        return view('admin.topic_details', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topics=Topic::with('category')->FindorFail($id);
        $categories = Category::select('id', 'category_name')->get();
         return view('admin.edit_topic',compact('topics','categories'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {  
        //dd($request);
        $data=$request->validate([
            'topicsTitle'=>'required|string',
            'content'=>'required|string|max:1000',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif',
            'category_id' =>'sometimes|integer|exists:categories,id',
                ]);
                  
        if($request->hasfile('image')){ //if there a request with a new image ,the orders will execute.
        $data['image'] =$this->uploadFile($request->image,'assets/admin/images/topics');
              }
        $data['trending']=isset($request->trending);
        $data['published']=isset($request->published);
            Topic::where('id',$id)->update($data);
            return redirect()->route('topics.index');
        
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Topic::where('id',$id)->delete();
        return redirect()->route('topics.index');
    }
}
