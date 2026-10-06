<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory; 

    // Doldurulabilir alanları buraya ekliyoruz ('id' otomatik yönetildiği için yazılmaz)
    protected $fillable = [
        'full_name',
        'description',
        'email',
        'tax_number',
        'phone',
        'created_at'
    ];           
}
