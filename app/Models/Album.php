<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $primaryKey = 'id';
    protected $fillable = ['name','image','content','year','slug','view','featured'];
    public function music(){
        return $this->hasMany(Music::class);
    }
}
