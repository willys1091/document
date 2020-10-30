<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class division extends Model{
    use HasFactory;
    protected $table = 'division';
    public $timestamps = false;

    public function document(){
        return $this->HasMany('App\Models\document');
    }
}
