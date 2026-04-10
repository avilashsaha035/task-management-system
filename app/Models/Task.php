<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'due_date',
        'create_by',
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    public function getIsOverdueAttribute(): bool
    {
        return $this->status !== 'completed' && $this->due_date !== null && $this->due_date->isPast();
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
