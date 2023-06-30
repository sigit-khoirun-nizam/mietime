<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menu = Menu::count();
        $reservasi = Transaction::count();
        $user = User::count();
        $kategori = Category::count();
        $post = Post::count();
        return view('dashboard', compact('menu', 'reservasi', 'user', 'kategori', 'post'));
    }

    public function banner()
    {
        return view('banner');
    }
}
