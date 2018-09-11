<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Transformers\CategoryTransformer;

class CategoriesController extends Controller
{
    public function index(Category $category)
    {
        $categories = $category->all();

        return $this->response->collection($categories, new CategoryTransformer())->setStatusCode(201);
    }
}
