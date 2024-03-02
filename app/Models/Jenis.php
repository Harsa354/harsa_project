<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    public $table = 'jenis';

    // public $guarded = ['id'];
    protected $fillable = ['nama_jenis', 'kategori_id'];

    public function menu()
    {
        return $this->hasMany(Menu::class, 'jenis_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
