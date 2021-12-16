<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function books() {
        return $this->belongsToMany(Book::class, 'loans');
    }

    public function loans() {
        return $this->hasMany(Loan::class);
    }
}
