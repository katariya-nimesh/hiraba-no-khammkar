<?php

namespace App\Models;

use App\Models\ApplicationInstallment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_no',

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
        'remark_updated_at' => 'datetime'
    ];

    protected static function booted()
    {
        static::created(function ($application) {

            for ($i = 1; $i <= 3; $i++) {
                $application->installments()->create([
                    'installment_no' => $i,
                    'is_paid' => false,
                ]);
            }
        });
    }

    /**
     * An application has many uploaded documents
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
