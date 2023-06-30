<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest;
use App\Http\Requests\TransactionRequest;
use App\Models\Testi;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = Testimonial::query();
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <form class="inline-block" action="' . route('dashboard.testimonial.destroy', $item->id) . '" method="POST">
                        <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                ->editColumn('url', function($item){
                    return '<img style="max-width: 150px" src="'. url($item->image) .'"/>';
                })
                ->rawColumns(['action', 'url'])
                ->make();
        }
        return view('pages.dashboard.testimonial.index');
    }

    public function create()
    {
        return view('pages.dashboard.testimonial.create');
    }

    public function store(TestimonialRequest $request)
    {
        $imageName = time().'.'.$request->image->extension();
        $uploadedImage = $request->image->move(public_path('storage/testimonial'), $imageName);
        $imagePath = 'storage/testimonial/' . $imageName;

        $params = $request->validated();
        
        if ($testimonial = Testimonial::create($params)) {
            $testimonial->image = $imagePath;
            $testimonial->save();

            return redirect(route('dashboard.testimonial.index'));
        }
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('dashboard.testimonial.index');
    }

    public function indexTesti()
    {
        $testi = Testi::all();
        return view('pages.dashboard.testi.index', compact('testi'));
    }

    public function show(string $id): View
    {
        $testi = Testi::findOrFail($id);
        return view('pages.dashboard.testi.show', compact('testi'));
    }
}
