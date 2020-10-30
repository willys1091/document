<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document extends Model{
    use HasFactory;
    protected $table = 'document';
    public $timestamps = false;

    public function division(){
        return $this->belongsTo('App\Models\division','division_id');
    }

    public function doctype(){
        return $this->belongsTo('App\Models\doctype','doctype_id');
    }

    public function status(){
        return $this->belongsTo('App\Models\status','status_id');
    }
}
