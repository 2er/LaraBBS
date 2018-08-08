<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\User;

class CategoriesController extends Controller
{
    public function show(Category $category, Request $request, Topic $topic, User $user)
    {
        $topics = $topic->where('category_id',$category->id)->withOrder($request->order)->paginate(20);
        $active_users = $user->getActiveUsers();
        return view('topics.index',compact('topics','category', 'active_users'));
    }
}
