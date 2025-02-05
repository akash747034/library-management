<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [
        'id'
      ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function auther(){
        return $this->belongsTo(Auther::class);
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function bookIssues(){
        return $this->hasMany(BookIssue::class);
    }

}
