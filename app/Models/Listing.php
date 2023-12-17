<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Listing extends Model
{
public $timestamps = true;
use HasFactory;

public function scopeFliter($query,array $filters){
if($filters['tag'] ?? false){
$query->where('tags','like','%'.request('tag').'%');
}
if($filters['search'] ?? false){
$query->where('title','like','%'.request('search').'%')
->orwhere('description','like','%'.request('search').'%')
->orwhere('tags','like','%'.request('search').'%');

}
}

// Relationship to user

public function user(){
    return $this->belongsTo(User::class,'user_id');
}





}
