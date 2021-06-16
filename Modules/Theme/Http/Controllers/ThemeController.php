<?php

namespace Modules\Theme\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ThemeController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('theme::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('theme::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $theme)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param \$Theme $theme
     * @return Renderable
     */
    public function show(\Theme $theme)
    {
        return view('theme::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param \$Theme $theme
     * @return Renderable
     */
    public function edit(\Theme $theme)
    {
        return view('theme::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $theme
     * @return Renderable
     */
    public function update(Request $request, $theme)
    {
        \Theme::find($theme);
        $theme->update($request->all());
        return redirect()->route('show.themes', $theme);
    }

    /**
     * Remove the specified resource from storage.
     * @param $theme
     * @return Renderable
     */
    public function destroy($theme)
    {
        //
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function frontend()
    {
        return view('theme::master.index');
    } 

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function backend()
    {
        return view('theme::backend.index');
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
