<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    protected $table = "news";

    protected $fillable = ['kategori_id','title','tags','content','image','status'];


    public function kategori()
    {
        return $this->belongsTo('App\Models\kategori');
    }

}
