<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Mews\Purifier\Purifier;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::latest()->paginate(3);
        return view('pages.index',compact('pages')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request-> validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $dom = new \DOMDocument();

        $dom->loadHTML($data['body']);
        
        $script = $dom->getElementsByTagName('script');
        
        $remove = [];
        foreach($script as $item)
        {
          $remove[] = $item;
        }
        
        foreach ($remove as $item)
        {
          $item->parentNode->removeChild($item); 
        }
        
        $html = $dom->saveHTML();

        

        Page::create([
            'title' => $data['title'],
            'body' => $html
        ])->save();

        return redirect('/page')->with('status','Your page has been saved.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('pages.show',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        
        $page->update($request->all());
        return redirect('/page')->with('status','Page has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('page.index')->with('status','Page has been deleted');;
    }
}
