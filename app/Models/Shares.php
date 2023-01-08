<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shares extends Model
{
    use HasFactory;


    protected $fillable = [
      'file_id',
      'receiver_id',
      'sender_id',
        'status',
    ];

    public function sharedBy()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function sharedTo()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    public function file()
    {
        return $this->belongsTo(Files::class, 'file_id','id');
    }
}
