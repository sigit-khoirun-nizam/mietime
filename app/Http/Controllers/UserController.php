<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = User::query();
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border focus:ring-4 focus:ring-gray-300 text-white bg-blue-500 hover:bg-blue-600 rounded-md px-2 py-1 m-2 transition duration-500 ease select-none focus:outline-none focus:shadow-outline" 
                            href="' . route('dashboard.user.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="inline-block" action="' . route('dashboard.user.destroy', $item->id) . '" method="POST">
                        <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.user.index');
    }

    public function edit(User $user)
    {
        return view('pages.dashboard.user.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();

        $user->update($data);

        return redirect()->route('dashboard.user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard.user.index');
    }
}
