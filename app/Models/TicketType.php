<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'image'];


    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function getDateOfCreationAttribute(): ?string
    {
        return date('Y-m-d', strtotime($this->created_at));
    }

    public function getlastUpdateAttribute(): ?string
    {
        return date('Y-m-d', strtotime($this->updated_at));
    }
}
