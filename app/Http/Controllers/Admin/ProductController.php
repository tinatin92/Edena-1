<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ProductController extends Controller
{
    public function DeleteProduct($que)
    {
        dd($que);
        $post = Post::where('id', $que)->first();
        if ($post->product != '') {

            $post->product->delete();
        }
        $post->product = '';

        return response()->json(['success' => 'File Deleted']);

    }
}
