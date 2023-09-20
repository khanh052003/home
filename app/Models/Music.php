<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;
    protected $table = 'musics';
    protected $primaryKey = 'id';
    protected $fillable = ['title','content','image','artist','song','year','album_id','slug','view','streams','featured'];
    //
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
