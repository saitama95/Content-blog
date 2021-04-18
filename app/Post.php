<?php

namespace App;

use App\Tag;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable=['title','category_id','features','content','slug'];

    protected $dates=['deleted_at'];

    public function category(){
        
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
