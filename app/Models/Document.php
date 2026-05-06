<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_dokumen',
        'deskripsi',
        'file',
        'tanggal_upload',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}