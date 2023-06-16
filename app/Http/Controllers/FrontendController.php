<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

use function GuzzleHttp\Promise\all;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $menus = Menu::with(['galleries'])->limit(4)->get();
        $testimonials = Testimonial::limit(3)->get();
        return view('pages.frontend.index', compact('menus', 'testimonials'));
    }

    public function details(Request $request, $slug)
    {
        $menus = Menu::with(['galleries'])->where('slug', $slug)->firstOrFail();
        $recommendations = Menu::with(['galleries'])->inRandomOrder()->limit(4)->get();
        return view('pages.frontend.details', compact('menus', 'recommendations'));
    }

    public function cartAdd(Request $request, $id)
    {
        Cart::create([
            'users_id'  =>  Auth::user()->id,
            'menus_id'  =>  $id
        ]);

        return redirect('cart');
    }

    public function cartDelete(Request $request, $id)
    {
        $item = Cart::findOrFail($id);

        $item->delete();

        return redirect('cart');
    }

    public function cart(Request $request)
    {
        $carts = Cart::with(['menu.galleries'])->where('users_id', Auth::user()->id)->get();
        return view('pages.frontend.cart', compact('carts'));
    }

    public function checkout(CheckoutRequest $request)
    {
        $data = $request->all();

        // Get Carts data
        $carts = Cart::with(['menu'])->where('users_id', Auth::user()->id)->get();

        // Add to Transaction data
        $data['users_id'] = Auth::user()->id;
        $data['total_price'] = $carts->sum('menu.price');
    
        // Create Transaction
        $transaction = Transaction::create($data);

        // Create Transaction item
        foreach($carts as $cart) {
            $items[] = TransactionItem::create([
                'transactions_id' => $transaction->id,
                'users_id' => $cart->users_id,
                'menus_id' => $cart->menus_id,
            ]);
        }
        
        // Delete cart after transaction
        Cart::where('users_id', Auth::user()->id)->delete();

        // Konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Setup variable midtrans
        $midtrans = array(
            'transaction_details' => array(
                'order_id' =>  'MT-' . $transaction->id,
                'gross_amount' => (int) $transaction->total_price,
            ),
            'customer_details' => array(
                'first_name'    => $transaction->name,
                'email'         => $transaction->email
            ),
            'enabled_payments' => array('gopay','bank_transfer'),
            'vtweb' => array()
        );

        // Payment process
        try {
            // Ambil halaman payment midtrans
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            $transaction->payment_url = $paymentUrl;
            $transaction->save();

            // Redirect ke halaman midtrans
            return redirect($paymentUrl);
        }
        catch (Exception $e) {
            return $e;
        }

    }

    public function success(Request $request)
    {
        return view('pages.frontend.success');
    }

    public function tes()
    {
        return view('tes');
    }


    public function menu()
    {
        $menus = Menu::with(['galleries'])->latest()->get();
        return view('pages.frontend.menu', compact('menus'));
    }

    public function lokasi()
    {
        return view('pages.frontend.lokasi');
    }

    public function news()
    {
        $posts = Post::where('status', 1)->orderBy('id', 'desc')->get();
        return view('pages.frontend.berita', compact('posts'));
    }

    public function newsDetail($post_slug)
    {
        $post = Post::where('slug', $post_slug)->first();
        return view('pages.frontend.detail', compact('post'));
    }
}
