<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'nama',
        'alamat',
        'kota',
        'telepon',
        'status',
        'url_tokopedia',
        'url_bukalapak',
        'url_lazada',
        'url_shopee',
        'url_facebook',
        'url_instagram',
        'url_tiktok',
    ];
}
