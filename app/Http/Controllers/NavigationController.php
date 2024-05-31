<?php

namespace App\Http\Controllers;

use App\Models\Papers;
use App\Models\Courses;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class NavigationController extends Controller
{
    // public function index() {
    //     return view("layouts.index");
    // }
    public function __construct()
    {
        // Fetch data and share it with all views
        $allSchools = Courses::select('school_name')->distinct()->get();
        View::share('schools', $allSchools);
    }
    public function index()
    {
        return view('home');
    }
    public function courses($school)
    {
        $courses = Courses::where('school_name', $school)->get();
        return view('navigation.course', [
            'courses' => $courses,
            'school' => $school,
        ]);
    }
    public function branches($school, $course)
    {
        $branches = Subjects::where('course_name', $course)->distinct()->pluck('branch_name');
        return view('navigation.branch', [
            'branches' => $branches,
            'course' => $course,
            'school' => $school
        ]);
    }
    public function semesters($school, $course, $branch)
    {
        $semesters = Courses::where('course_name', $course)->pluck('no_of_semesters');
        return view('navigation.semesters', [
            'semesters' => $semesters,
            'branch' => $branch,
            'course' => $course,
            'school' => $school
        ]);
    }
    public function subjects($school, $course, $branch, $semester)
    {
        $subjects = Subjects::where([
            'course_name' => $course,
            'branch_name' => $branch,
            'semester' => $semester,
        ])->pluck('subject');

        return view('navigation.subjects', compact(
            'subjects',
            'semester',
            'branch',
            'course',
            'school',
        )); // [
        //    'subjects' => $subjects,
        //    'semester' => $semester,
        //    'branch' => $branch,
        //    'course' => $course,
        //    'school' => $school
        //]
    }
    public function papers($school, $course, $branch, $semester, $subject)
    {
        return view('navigation.papers', [
            'subject' => $subject,
            'semester' => $semester,
            'branch' => $branch,
            'course' => $course,
            'school' => $school
        ]);
    }

    public function exams($school, $course, $branch, $semester, $subject)
    {
        $examinations = Papers::where('subject',$subject)->select('examination')->distinct()->pluck('examination');
        return view('paper.exams', [
            'exams' => $examinations,
            'subject' => $subject,
            'semester' => $semester,
            'branch' => $branch,
            'course' => $course,
            'school' => $school,
        ]);
    }

    public function years($school, $course, $branch, $semester, $subject, $examination)
    {
        $years = Papers::where([
            'subject' => $subject,
            'examination' => $examination,
        ])->pluck('year');
        return view('paper.years', [
            'years' => $years,
            'exams' => $examination,
            'subject' => $subject,
            'semester' => $semester,
            'branch' => $branch,
            'course' => $course,
            'school' => $school,
        ]);
    }

    public function view($school, $course, $branch, $semester, $subject, $examination, $year)
    {
        $paper = Papers::where([
            'subject' => $subject,
            'examination' => $examination,
            'year' => $year
        ])->value('question_paper');
        return view('paper.view', [
            'paper' => $paper,
        ]);
    }

    public function download($school, $course, $branch, $semester, $subject, $examination, $year)
    {
        $paper = Papers::where([
            'subject' => $subject,
            'examination' => $examination,
            'year' => $year
        ])->value('question_paper');
        return response()->download(public_path('assets/' . $paper));
    }

    public function create($school, $course, $branch, $semester, $subject)
    {
        $allSchools = Courses::select('school_name')->distinct()->get();

        return view('paper.create', [
            'schools' => $allSchools,
            'subject' => $subject,
            'semester' => $semester,
            'branch' => $branch,
            'course' => $course,
            'school' => $school
        ]);
    }
    public function store(Request $request, $school, $course, $branch, $semester, $subject)
    {
        $request->validate([
            'examination_type' => 'required|in:mid-term,end-term',
            'year' => 'required|integer',
            'paper' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('paper');
        if ($file->isValid()) {
            $filename = $file->getClientOriginalName();
            $request->file('paper')->move('assets', $filename);
            Papers::create([
                'subject' => $request->route('subject'),
                'examination' => $request->input('examination_type'),
                'year' => $request->input('year'),
                'question_paper' => $filename,
            ]);
            return redirect()->route('show', [$school, $course, $branch, $semester, $subject])->with('message', 'Question paper uploaded successfully.');
        } else {
            return redirect()->back()->withErrors(['paper'=>'The uploaded file is not valid. Please try again.']);
        }
        
    }
}
