<?php

namespace App\Http\Controllers;

use App\Models\carts;
use App\Models\articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class articlesController extends Controller
{
    public function index()
    {
        $articles = articles::all();
        return view('home', ['articles' => $articles]);
    }

    public static function getSingle($id)
    {
        $article = articles::find($id);
        return $article;
    }

    public function show($id)
    {
        if (count(articles::all()) >= 3 ) {
            $tab = articles::all()->except($id)->random(3);
        } else {
            $tab = articles::random(3)->except($id);    
        }

        $article = articles::find($id);
        return view('article',['article' => $article, 'tab' => $tab]);
    }
  
    public function add(Request $request)
    {
        $cart=new carts([
            'user_id' => $request -> user_id ,
            'article_id'=> $request -> article_id
        ]);
        $cart->save();
        return redirect('/');
    }

    public function index2()
    {
        if (Auth::user() && Auth::user()->role == 1) {
            $articles = articles::all();
            return view('admin.home', ['articles' => $articles]);
        } else {
            return redirect('/');
        }
    }

    public function edit($id)
    {
        if (Auth::user() && Auth::user()->role == 1) {
            $article = articles::find($id);
            return view('admin.edit')->with('articles', $article);
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $article = articles::find($id);
        $article->update($input);
        return redirect('/admin/home');
    }

    public function create()
    {
        if (Auth::user() && Auth::user()->role == 1) {
            return view('admin.create');
        }
    }

    public function store(Request $request)
    {
        $input = $request->all();
        articles::create($input);
        return redirect('admin')->with('flash_message', 'Articles Ajouté !');
    }

    public function destroy($id)
    {
        if (Auth::user()->role == 1) {
            $article = articles::find($id);
            $article->delete();
            return redirect('/admin/home');
        } else {
            return redirect('/');
        }
    }
}

