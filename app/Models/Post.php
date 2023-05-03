<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comentario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['name','username']);
    }
    public function comentario()
    {
        return $this->hasMany(Comentario::class);
    }
    //relacion de likes en el post es de muchos a muchos
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    //verifica en la basxe de datos si ya hay el registro
    public function checklike(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
}
