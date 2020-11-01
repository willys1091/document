<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model{
    use HasFactory;
    protected $table = 'status';
    public $timestamps = false;

    public function document(){
        return $this->HasMany('App\Models\document');
    }

    public function approval(){
        return $this->HasMany('App\Models\approval');
    }
}
