<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $category = Category::latest()->paginate(10);
        $article = Article::latest()->paginate(10);
        return view('home', compact('category','article'));
    }

    public function createCategory(){
        return view('createCategory');
    }

    public function createArticle(){
        $category = Category::latest()->get();
        return view('createArticle', compact('category'));
    }

    public function category(Request $request){
        $category = Category::create([
            'name'     => $request->input('name'),
            'user_id'      => Auth::user()->id,
        ]); 

        if ($category) {
            return redirect('/home')->with(['success' => 'Penilaian Berhasil Dikirim!']);
        } else {
            return redirect()->back()->with(['error' => 'Penilaian Gagal Dikirim!']);
        }
    }

    public function article(Request $request){
        $category = Category::latest()->get();
        $this->validate($request, [
            'image'  => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/images', $image->getClientOriginalName());

        $article = Article::create([
            'title'     => $request->input('title'),
            'content'   => $request->input('content'),
            'user_id'  => Auth::user()->id,
            'image'    => $image->getClientOriginalName(),
            'category_id' => $request->input('category_id')
        ]); 

        if ($category) {
            return redirect('/home')->with(['success' => 'Penilaian Berhasil Dikirim!']);
        } else {
            return redirect()->back()->with(['error' => 'Penilaian Gagal Dikirim!']);
        }
    }

    public function editCategory($id){ 
        $category = Category::findOrFail($id);
        return view('editCategory', compact('category'));
    }
    public function categoryUpdate(Request $request, $id){ 
        $category = Category::find($id)->update($request->all()); 
        return redirect()->route('home');
    }

    public function editArticle($id){ 
        $category = Category::latest()->get();
        $article = Article::findOrFail($id);
        return view('editArticle', compact('category','article'));
    }
    public function articleUpdate(Request $request, $id){ 
        $article = Article::find($id)->update($request->all()); 
        return redirect()->route('home');
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('home')->with('Data Berhasil Dihapus!');
    }

    public function destroy2($id){
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('home')->with('Data Berhasil Dihapus!');
    }
}
