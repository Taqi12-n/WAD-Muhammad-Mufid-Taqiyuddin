<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    use HasFactory;

    protected $table = 'guestbook_entries'; // sesuaikan dengan nama tabel di migrasi
    protected $fillable = ['name', 'email', 'message'];
}
