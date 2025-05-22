<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    use HasFactory;
}
