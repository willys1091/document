<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class approval extends Model{
    use HasFactory;
    protected $table = 'approval';
    public $timestamps = false;

    public function document(){
        return $this->belongsTo('App\Models\document','document_id');
    }

    public function status(){
        return $this->belongsTo('App\Models\status','status_id');
    }
}
