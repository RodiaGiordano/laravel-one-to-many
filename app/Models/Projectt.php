<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectt extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'type_id'
        
    ];

    public function type(){
        return $this->belongsTo(Type::class);


    }

    public function getTypeBadge(){
        return $this->type ? "<span class='badge' style='background-color: {$this->type->color}'>{$this->type->label}</span>" : "Undefined";

        
    }
}
