<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'nama_dokumen',
        'tanggal_upload',
        'category_id',
        'file'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}