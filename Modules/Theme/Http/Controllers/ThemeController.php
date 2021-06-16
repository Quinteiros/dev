<?php

namespace Modules\Theme\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ThemeController extends Controller
{

    /**
     * Display the module's index page
     * @return Renderable
     */
    public function index()
    {
        return view('theme::index', ['$themes' => \Theme::withTrashed()->get()]);
    }

    /**
     * Display the module's master resource index (frontend)
     * @return Renderable
     */
    public function frontend()
    {
        $entries = \Theme::all();
        return view('theme::master.index', ['entries' => $entries]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme::backend.create', ['crud' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
           'slug' => 'required|unique:themes|max:255',
           'title' => 'required|unique:themes|max:255',
           'lead' => 'required',
           'body' => 'required',
           'user_id' => 'int',
           'photo' => 'image|mimetypes:image/jpeg|max:2048',
           'meta_title' => 'required|unique:themes|max:120',
           'meta_description' => 'required|unique:themes|max:150',
           'meta_keywords' => 'required|unique:themes|max:300',
        ]);
        
        if(!empty($request['photo']))
        {
            \Theme::create($request->all())->addMedia($request['photo'])->toMediaCollection('themes');
            return $this->index();
        }
        \Modules\Core\Entities\Page::create($request->all());
        return $this->index();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \Theme theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        return view('theme::master.show', ['crud' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Theme $LOWER_NAME
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        return view('theme::backend.edit', ['crud' => 'edit', 'theme' => $theme]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Theme $LOWER_NAME
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        theme->update;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Theme $LOWER_NAME
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        return this->index();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function setup()
    {
        return view('theme::setup.index');
    } 
}