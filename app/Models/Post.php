<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'user'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            
            $query->where(function ($query) use ($search) {
                
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');

            });
        
    });

        $query->when($filters['category'] ?? false, fn ($query, $category) =>  $query
            ->whereHas('category', function ($query) use ($category) {
                $query->where('slug', '=', $category);
            })
         );
        
        
        $query->when($filters['user'] ?? false, fn ($query, $user) =>  $query
        ->whereHas('user', function ($query) use ($user) {
            $query->where('username', '=', $user);
        })
     );
    }
}

