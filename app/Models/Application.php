<?php

namespace App\Models;

use App\Models\ApplicationInstallment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    // ─── Form Type Constants ───────────────────────────────────────────────────
    const FORM_TYPE_LIFETIME = 'lifetime';
    const FORM_TYPE_ONE_TIME = 'one_time';

    // ─── Processing Fees ───────────────────────────────────────────────────────
    const PAYMENT_FEE_LIFETIME = 1250;
    const PAYMENT_FEE_ONE_TIME = 250;

    // ─── Payment Status Constants ──────────────────────────────────────────────
    const PAYMENT_PENDING = 'pending';
    const PAYMENT_PAID    = 'paid';
    const PAYMENT_FAILED  = 'failed';

    protected $fillable = [
        'reference_no',
        'form_type',
        'payment_status',
        'payment_amount',
        'payment_reference',

        // Student
        'student_name',
        'father_name',
        'surname',
        'mother_name',
        'address',
        'student_aadhar',
        'father_aadhar',
        'mother_aadhar',

        // Family
        'parents_illness',
        'home_type',
        'phone',
        'email',
        'total_family_members',
        'parents_business',
        'monthly_income',

        // Location
        'village',
        'district',
        'state',
        'pincode',

        // School
        'school_name',
        'standard',
        'school_phone',
        'school_address',
        'school_ac_name',
        'school_ac_number',
        'school_ifsc',
        'school_bank_name',

        // Internal
        'remarks',
        'remark_updated_at',
        'status',
        'status_updated_at',
    ];

    protected $casts = [
        'status_updated_at' => 'datetime',
        'remark_updated_at' => 'datetime',
        'payment_amount'    => 'decimal:2',
    ];

    // ─── Query Scopes ──────────────────────────────────────────────────────────

    /**
     * Only applications with successful payment (admin visibility rule).
     */
    public function scopePaid($query)
    {
        return $query->where('payment_status', self::PAYMENT_PAID);
    }

    /**
     * Filter by form type.
     */
    public function scopeOfFormType($query, string $type)
    {
        return $query->where('form_type', $type);
    }

    // ─── Accessors ─────────────────────────────────────────────────────────────

    /**
     * Human-readable form type label.
     */
    public function getFormTypeLabelAttribute(): string
    {
        return match ($this->form_type) {
            self::FORM_TYPE_LIFETIME => 'Lifetime',
            self::FORM_TYPE_ONE_TIME => 'One-Time',
            default                  => ucfirst($this->form_type),
        };
    }

    /**
     * Resolve the processing fee for this application's form type.
     */
    public static function feeForType(string $formType): int
    {
        return match ($formType) {
            self::FORM_TYPE_LIFETIME => self::PAYMENT_FEE_LIFETIME,
            self::FORM_TYPE_ONE_TIME => self::PAYMENT_FEE_ONE_TIME,
            default                  => 0,
        };
    }

    // ─── Lifecycle ─────────────────────────────────────────────────────────────

    protected static function booted()
    {
        static::created(function ($application) {
            for ($i = 1; $i <= 3; $i++) {
                $application->installments()->create([
                    'installment_no' => $i,
                    'is_paid'        => false,
                ]);
            }
        });
    }

    // ─── Relationships ─────────────────────────────────────────────────────────

    /**
     * An application has many uploaded documents.
     */
    public function documents()
    {
        return $this->hasMany(ApplicationDocument::class);
    }

    public function installments()
    {
        return $this->hasMany(ApplicationInstallment::class)->orderBy('installment_no');
    }

    public function installment($number)
    {
        return $this->installments
            ->firstWhere('installment_no', $number);
    }
}
