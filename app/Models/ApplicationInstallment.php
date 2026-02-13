<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplicationInstallment extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'installment_no',
        'is_paid',
        'note',
        'paid_at',
    ];

    protected $casts = [
        'is_paid' => 'boolean',
        'paid_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helper Methods (Optional but Recommended)
    |--------------------------------------------------------------------------
    */

    public function markAsPaid($note = null)
    {
        $this->update([
            'is_paid' => true,
            'note' => $note,
            'paid_at' => now(),
        ]);
    }

    public function markAsPending()
    {
        $this->update([
            'is_paid' => false,
            'note' => null,
            'paid_at' => null,
        ]);
    }
}
