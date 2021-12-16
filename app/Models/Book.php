<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function clients() {
        return $this->belongsToMany(Client::class, 'loans');
    }

    public function loans() {
        return $this->hasMany(Loan::class);
    }
}
