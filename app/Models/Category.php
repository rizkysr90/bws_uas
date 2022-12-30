<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Category extends Model
{
    protected $fillable = [
        "name",
        "url_img",
        "user_id"
    ];
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class, 'supplier_id', 'id');
        // foreign key, local key
    }
}
