<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [

        'post_id',
        'sort',
        'price',
        'color',
        'weight',
        'size',

    ];

    /**
     * Get the Product associated with the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Post()
    {
        return $this->hasOne(Post::class, 'id', 'post_id');
    }
}
