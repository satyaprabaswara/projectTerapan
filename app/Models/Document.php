<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama_dokumen',
        'deskripsi',
        'tanggal_upload',
        'category_id',
        'user_id',
        'visibility',
        'file',
        'file_size',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shares()
    {
        return $this->hasMany(DocumentShare::class, 'document_id');
    }

    public function sharedUsers()
    {
        return $this->belongsToMany(
            User::class,
            'document_shares'
        )->withPivot('permission');
    }
}

