<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class ArticleController extends Controller
{
  public function index(Request $request)
  {
    // search query
    $q = $request->input('q');

    $articles = Article::latest();

    if ($q) {
      $articles = $articles->orWhere('title', 'like', '%' . $q . '%');
    }

    $articleData = $articles->paginate(15);

    return view('backend.admin.article.show', compact('articleData'));
  }


  public function create()
  {
    return view('backend.admin.article.add');
  }

  public function store(Request $request)
  {
    try {
      // Validate the incoming request data
      $validatedData = $request->validate([
        'title' => 'required|unique:articles|max:255',
        'description' => 'required',
        'display_priority' => 'required',
        'author' => 'required|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
      ]);

      $validatedData['created_at'] = now();
      $validatedData['updated_at'] = now();

      // Process the image
      if ($request->hasFile('image')) {
        $ext = $request->file('image') ? strtolower($request->file('image')->getClientOriginalExtension()) : '';
        $validatedData['image'] = $ext;
      }

      $id = DB::table('articles')
        ->insertGetId($validatedData);

      if ($ext) {
        $file = $request->file('image');
        $file->move(public_path('images/article/'), $id . '-1.' . $ext);
        $pic = Image::make(public_path('images/article/' . $id . '-1.' . $ext));

        // Save the modified image
        $pic->save();
      }


      return back()->with('sms', 'New article created');
    } catch (\Throwable $th) {
      return back()->with('sms', $th->getMessage());
    }
  }


  public function edit($id)
  {
    $articleDetail = Article::findOrFail($id);

    return view('backend.admin.article.edit', compact('articleDetail'));
  }


  public function update(Request $request, $id)
  {
    $validatedData = $request->validate([
      'title' => 'required|max:255',
      'description' => 'required',
      'display_priority' => 'required',
      'author' => 'required|max:255',
      'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
    ]);


    $selected = DB::table("articles")->find($id);
    $ext = $request->file('image');

    // Process the default image
    if ($ext) {
      // Check if the existing image file exists and delete it
      if (file_exists(public_path("images/article/{$id}-1.{$selected->image}"))) {
        unlink(public_path("images/article/{$id}-1.{$selected->image}"));
      }

      // Process the new image
      $file = $request->file('image');
      $ext = strtolower($file->getClientOriginalExtension());
      $file->move(public_path('images/article/'), $id . '-1.' . $ext);
      $pic = Image::make(public_path('images/article/' . $id . '-1.' . $ext));

      $pic->save();

      $validatedData['image'] = $ext;
    } else {
      $ext = $selected->image;
      $validatedData['image'] = $selected->image;
    }

    $update = DB::table('articles')
      ->where('id', $id)
      ->update($validatedData);



    return redirect()->route('article.index')->with('sms', 'Article updated successfully.');
  }



  public function destroy($id)
  {
    $article = Article::findOrFail($id);

    $article->delete();
    return redirect('/article')->with('warning', 'You just deleted an article');
  }
}
