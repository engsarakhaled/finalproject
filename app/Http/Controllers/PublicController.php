<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Testimonial;
use App\Models\Topic;
use App\Models\Category;

class PublicController extends Controller
{
    public function contact() 
    {
        return view('public.contact');
    }

    public function index()
    {
        $testimonials = Testimonial::where('published', 1)  
        ->latest()
        ->limit(3)
        ->get();
        $topics= Topic::where('published', 1)
        ->orderBy('no_of_views', 'desc')
        ->take(2)
        ->get();   
        if (count($topics) >= 2) {
            $topic1 = $topics[0];
            $topic2 = $topics[1];
        } else {
            // If there's only one topic, use it for both
            $topic1 = $topics[0];
            $topic2 = $topics[0];
        }
        $categories = Category::with([
            'topics'=>function($query){$query
            ->where('published',1)
            ->limit(3);
            }])
            ->get();  
        //dd($categories);
        return view('public.index', compact('testimonials','topic1','topic2','categories'));
    }

     public function topicdetail(string $id)
    {
         $topic = Topic::with('category')->where('published', 1)->findOrFail($id); 
         return view('public.topics-detail',compact('topic'));      
    }

    public function bookmark(string $id)
    {
    $topic = Topic::findOrFail($id);
    $topic->no_of_views++;
    $topic->save();
    return view('public.topics-detail',compact('topic'));
    }

    public function topiclisting(Request $request)
    {
        $topic= Topic::where('published',1 )  
        ->where('trending', 1)    
        ->latest()
        ->limit(2)
        ->get();   
        if (count($topic) >= 2) {
            $topic1 = $topic[0];
            $topic2 = $topic[1];
        } else {
            // If there's only one topic, use it for both                 
            $topic1 = $topic[0];
            $topic2 = $topic[0];
        }

        $paginatedTopics = Topic::where('published', 1)
        ->orderBy('no_of_views', 'desc')
        ->paginate(3); //only 3 topics in one page
        return view('public.topics-listing',compact('topic1','topic2','paginatedTopics')); 
    }
              
    public function testimonial()
    {
        $testimonials = Testimonial::where('published', 1)->get();
        return view('public.testimonials', compact('testimonials'));
    }
}
    



