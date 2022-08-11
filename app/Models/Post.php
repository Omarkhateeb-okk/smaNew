<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\tag;


class Post extends Model
{
    use HasFactory;
    protected $table ='posts';
    protected $fillable=[
      'category_id',
      'name',
      'description',
      'status',
      'created_by'
    ];
    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
