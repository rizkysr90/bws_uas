<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "url_img",
        "modal",
        "harga_jual",
        "stock",
        "description",
        "user_id",
        "category_id"
    ];
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
        // foreign key, local key
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
        // foreign key, local key
    }
}
