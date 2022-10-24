<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory; 

    public function scopeFilter($query, array $filters){
        if($filters['tag']?? false){
            $query->where('tags','like','%'. request('tag').'%');
        }
        //like is sql query language
        //2:03:00 for clockwork

        if($filters['search']?? false){
            $query->where('title','like','%'. request('search').'%')
            ->orWhere('tags','like','%'. request('search').'%')
            ->orWhere('description','like','%'. request('search').'%');
        }
        // $x = expr1 ?? expr2
        // The value of $x is expr1 if expr1 exists, and is not NULL.
        // If expr1 does not exist, or is NULL, the value of $x is expr2.

    }
    
    // Photo Relationship to User
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
