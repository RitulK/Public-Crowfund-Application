<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'goal_amount',
        'image',
        'amount_raised',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
