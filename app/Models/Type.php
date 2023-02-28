<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'color'];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
