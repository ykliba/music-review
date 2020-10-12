<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;

class CreateReviewController extends Controller
{
  protected $validationRules = [
      "title" => ["required", "string"],
      "artist" => ["required", "string"],
      "desc" => ["nullable", "text"],
      "image" => ["nullable", "text"],
      "link" => ["nullable", "text"],
  ];

  function __constract() {
    $this->middleware('auth');
  }

  function create() {
      return view('review.review_create');
  }

  function store(Request $request) {
    $validatedData = $request->validate($this->validationRules);
    $validatedData["user_id"] = \Auth::id();
    $new = Review::create($validatedData);
    return redirect()->route('create_review')->withStatus("タイトル: {#new->name}を作成しました");

  }
}
