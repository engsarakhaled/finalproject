<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Traits\Common;
class TestimonialController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests = Testimonial::get();
        return view('admin.testimonials', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_testimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);
        $data['published']=isset($request->published);
        if ($request->hasFile('image')) {
           $data['image'] = $this->uploadFile($request->image, 'assets/admin/images/testimonials');
        }
        Testimonial::create($data);
        return redirect()->route('test.index');
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
        $tests=Testimonial::FindorFail($id);
        return view('admin.edit_testimonial',compact('tests'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg',
        ]);
        $data['published']=isset($request->published);
        if ($request->hasFile('image')) {
           $data['image'] = $this->uploadFile($request->image, 'assets/admin/images/testimonials');
        }
        Testimonial::where('id',$id)->update($data);;
        return redirect()->route('test.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         Testimonial::where('id',$id)->delete();
        return redirect()->route('test.index');
    }
}
