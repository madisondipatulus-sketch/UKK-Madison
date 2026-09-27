<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Support\LogOptions;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
class Ticket extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty();
    }
    protected $fillable = [
        'user_id',
        'asset_id',
        'ticket_number',
        'qty',
        'book_at',
        'borrowed_at',
        'due_at',
        'returned_at',
        'status',
        'note'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function asset(){
        return $this->belongsTo(Asset::class);
    }

    public function AssetReturns()
    {
        return $this->hasMany(AssetReturn::class);
    }

    protected $casts = [
        'book_at' => 'datetime',
        'borrowed_at' => 'datetime',
        'due_at' => 'date',
        'returned_at' => 'datetime',
    ];
}
