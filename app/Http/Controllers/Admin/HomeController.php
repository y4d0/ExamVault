<?php

namespace App\Http\Controllers\Admin;

use App\Models\Courses;
use App\Http\Controllers\Controller;
use App\Models\Subjects;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }
    public function showSchoolForm()
    {
        return view('admin.manageSchool', [
            'schools'=>Courses::select('school_name')->distinct()->get(),
        ]);
    }
    public function storeSchool(Request $request)
    {
        $request->validate([
            'school' => 'required|max:255',
        ]);
        Courses::create([
            'school_name' => $request->input('school')
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'School Added Succesfully!');
    }
    public function editSchool($school) {
        return view('admin.editSchool',[
            'school'=>$school,
        ]);
    }
    public function updateSchool(Courses $school, Request $request) {
        $formFields = $request->validate([
            'school' => 'required|max:255',
        ]);
        Courses::where('school_name','=',$school)->update($formFields);
        return redirect()->route('admin.dashboard')->with('success', 'School updated successfully!');
    }
    public function deleteSchool($school) {
        Courses::where('school_name',$school)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'School Deleted Succesfully!');
    }
    public function showCourseForm()
    {
        return view('admin.manageCourse', [
            'schools' => Courses::select('school_name')->distinct()->get(),
            'courses' => Courses::all()
        ]);
    }
        public function storeCourse(Request $request)
    {
        $request->validate([
            'school' => 'required|max:255',
            'course' => 'required|max:255',
            'semesters' => 'required|max:11',
        ]);
        $conditions = ['school_name' => $request->input('school')];
        $data = [
            'course_name' => $request->input('course'),
            'no_of_semesters' => $request->input('semesters'),
        ];
        Courses::updateOrCreate($conditions,$data);
        return redirect()->route('admin.dashboard')->with('success', 'Course Added Succesfully!');
    }
    public function deleteCourse($course) {
        Courses::where('course_name', $course)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Course Deleted Succesfully!');
    }
    public function showBranchForm()
    {
        $allSchools = Courses::select('school_name')->distinct()->get();
        $branches = Subjects::select(['branch_name','course_name'])->distinct()->get();
        return view('admin.manageBranch', [
            'schools'=>$allSchools,
            'branches'=>$branches
        ]);
    }
    public function getCourses($school_name)
    {
        $courses=Courses::where('school_name', $school_name)->get();
        return response()->json($courses);
    }
    public function storeBranch(Request $request)
    {
        $request->validate([
            'school' => 'required|max:255',
            'course' => 'required|max:255',
            'branch' => 'required|max:255',
        ]);
        Subjects::create([
            'course_name' => $request->input('course'),
            'branch_name' => $request->input('branch')
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Branch Added Succesfully!');
    }
    public function showSubjectForm()
    {
        $allSchools = Courses::select('school_name')->distinct()->get();
        $branches=Subjects::select('course_name','branch_name','semester','subject')->get();

        return view('admin.manageSubject', [
            'schools'=>$allSchools,
            'branches'=>$branches
        ]);
    }
    public function getBranches($course_name)
    {
        $branches = Subjects::where('course_name', $course_name)->pluck('branch_name')->unique();
        $semesters = Courses::where('course_name', $course_name)->pluck('no_of_semesters');
        return response()->json([$branches, $semesters]);
    }
    public function storeSubject(Request $request)
    {
        $request->validate([
            'course' => 'required|max:255',
            'branch' => 'required|max:255',
            'semester' => 'required',
            'subject' => 'required|max:255'
        ]);
        $conditions = ['course_name' => $request->input('course'), 'branch_name' => $request->input('branch')];
        $data = [
            'semester' => $request->input('semester'),
            'subject' => $request->input('subject'),
        ];
        Subjects::updateOrCreate($conditions, $data);
        return redirect()->route('admin.dashboard')->with('success', 'Subject Added Succesfully!');
    }
}
