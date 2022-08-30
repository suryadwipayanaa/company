<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function scopeFilter($query, array $filters){
        $query->when($filters['search']?? false , function($query , $search){
            return $query->where('name' , 'like' , '%' . $search . '%')
            ->orWhere('join' , 'like' ,'%' . $search . '%');
        });
    }

    public function boking(){
        return $this->belongsTo(Boking::class);
    }

    public function hari(){
        return $this->hasMany(Hari::class);
    }

}
