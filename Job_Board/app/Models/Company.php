<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // Permitir atribuição massiva para estes campos
    protected $fillable = ['name', 'description', 'address','website'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
