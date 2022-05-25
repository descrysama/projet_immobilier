<?php

namespace App\Http\Controllers;

use App\Models\carts;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartsController extends Controller
{
    public function index()
    {
        $cart_content = [];
        $prix_total = [];
        $cart = carts::where('user_id', Auth::user()->id)->get();
        foreach ($cart as $item) {
            $article = articlesController::getSingle($item->article_id);
            $article['item_id'] = $item->id;
            array_push($cart_content , $article );
        }
        foreach ($cart_content as $item) {
            $prix = number_format($item->prix, 2, '.', ' ');
            array_push($prix_total, $prix);
        }

        $prix_total = array_sum($prix_total);
        return view('dashboard.cart', ['cart_content' => $cart_content, 'prix_total' => $prix_total]);
    }

    public function delete($id)
    {
        $item = carts::find($id);
        if ($item->user_id == Auth::user()->id) {
            $item->delete();
        }
        return redirect('cart');
    }

    public function checkout($total, $id)
    {
        if ($id == Auth::user()->id) {
            $stripe = new StripeClient('sk_test_51KlXzZHHyi6CsHZApxh8nY6YxGECyUDWWMjbuuXpr9F9XEDMjM6IaJ2oKahHbdF0LTzJQQyObIloW0rr0BNLg1l400PJBpn2J3');

            $stripe->paymentIntents->create(
                ['amount' => $total, 'currency' => 'eur', 'payment_method' => 'pm_card_visa']
            );
        }
    }

    public function add(Request $request, $article_id)
    {
        if ($request->user_id == Auth::user()->id) {
            $cart=new carts([
                'user_id' => $request -> user_id ,
                'article_id'=> $article_id
            ]);
            $cart->save();
        }
        return redirect('/');
    }
}
