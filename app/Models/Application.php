<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

        // School
        'school_name',
        'standard',
        'school_phone',
        'school_address',

        // Internal
        'remarks',
        'status',
        'status_updated_at',
    ];

    protected $casts = [
        'status_updated_at' => 'datetime',
    ];

    /**
     * An application has many uploaded documents
     */
    public function documents()
    {
        return $this->hasMany(ApplicationDocument::class);
    }
}
