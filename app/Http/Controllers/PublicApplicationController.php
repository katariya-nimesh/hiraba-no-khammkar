<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ApplicationDocument;
use App\Http\Requests\ApplicationStoreRequest;

class PublicApplicationController extends Controller
{
    public function create()
    {
        return view('public.application-form');
    }

    public function store(ApplicationStoreRequest $request)
    {
        $application = Application::create([
            'reference_no' => 'APP-' . strtoupper(Str::random(8)),

            //Student Details
            'student_name' => $request->student_name,
            'father_name' => $request->father_name,
            'surname' => $request->surname,
            'mother_name' => $request->mother_name,

            //Aadhar Details
            'student_aadhar' => str_replace(' ', '', $request->student_aadhar),
            'father_aadhar' => str_replace(' ', '', $request->father_aadhar),
            'mother_aadhar' => str_replace(' ', '', $request->mother_aadhar),

            //Address Details
            'home_type' => $request->home_type,
            'address' => $request->address,
            'village' => $request->village,
            'district' => $request->district,
            'state' => $request->state,

            //Contact & Family Details
            'phone' => $request->phone,
            'email' => $request->email,
            'total_family_members' => $request->total_family_members,
            'parents_business' => $request->business,
            'monthly_income' => $request->income,
            'parents_illness' => $request->illness,

            //School Info
            'school_name' => $request->school_name,
            'standard' => $request->standard,
            'school_phone' => $request->school_phone,
            'school_address' => $request->school_address,

            'application_status' => 'pending',
        ]);

        $docs = [
            'student_aadhar_doc',
            'father_aadhar_doc',
            'mother_aadhar_doc',
            'passport_photo',
            'school_letterhead',
            'electricity_bill',
            'death_certificate',
            'last_year_marksheet',
            'other_document',
        ];

        foreach ($docs as $doc) {
            if ($request->hasFile($doc)) {
                $path = $request->file($doc)
                    ->store("applications/{$application->id}", 'public');

                ApplicationDocument::create([
                    'application_id' => $application->id,
                    'type' => $doc,
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->back()
            ->with(['success' => 'Application submitted successfully', 'reference_no' => $application->reference_no]);
    }
}
