<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    //*Nome da tabela
    protected $table='blogs';

    //*Incluindo as colunas
    protected $fillable=[
        'Title','Subtitle_blog','Title_blog','Another','Category'
    ];
}
