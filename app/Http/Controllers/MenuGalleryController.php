<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuGalleryRequest;
use App\Models\Menu;
use App\Models\MenuGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class MenuGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Menu $menu)
    {
        if(request()->ajax())
        {
            $query = MenuGallery::where('menus_id', $menu->id);
            
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <form class="inline-block" action="' . route('dashboard.gallery.destroy', $item->id) . '" method="POST">
                        <button class="border font-bold border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                ->editColumn('url', function($item){
                    return '<img style="max-width: 150px" src="'. Storage::url($item->url) .'"/>';
                })
                ->editColumn('is_featured', function($item){
                    return $item->is_featured ? 'Yes' : 'No';
                })
                ->rawColumns(['action', 'url'])
                ->make();
        }
        return view('pages.dashboard.gallery.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Menu $menu)
    {
        return view('pages.dashboard.gallery.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuGalleryRequest $request, Menu $menu)
    {
        $files = $request->file('files');

        if($request->hasFile('files'))
        {
            foreach ($files as $file) {
                $path = $file->store('public/gallery');
                // $path = $file->storeAs('public/gallery', $file->hashName());

                MenuGallery::create([
                    'menus_id'   =>  $menu->id,
                    'url'           =>  $path
                ]);
            }
        }

        return redirect()->route('dashboard.menu.gallery.index', $menu->id);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuGallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('dashboard.menu.gallery.index', $gallery->menus_id);
    }
}
