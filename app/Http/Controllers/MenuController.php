<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use Illuminate\Support\Str;
use App\Models\Menu;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Menu::query();
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-indigo-500 bg-indigo-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline" 
                        href="' . route('dashboard.menu.gallery.index', $item->id) . '">
                            Gallery
                        </a>
                        <a class="inline-block border focus:ring-4 focus:ring-gray-300 text-white bg-blue-500 hover:bg-blue-600 rounded-md px-2 py-1 m-2 transition duration-500 ease select-none focus:outline-none focus:shadow-outline" 
                            href="' . route('dashboard.menu.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="inline-block" action="' . route('dashboard.menu.destroy', $item->id) . '" method="POST">
                        <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                ->editColumn('price', function($item){
                    return number_format($item->price);
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.menu.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        Menu::create($data);

        return redirect()->route('dashboard.menu.index');
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
    public function edit(Menu $menu)
    {
        return view('pages.dashboard.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $menu->update($data);

        return redirect()->route('dashboard.menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('dashboard.menu.index');
    }
}
