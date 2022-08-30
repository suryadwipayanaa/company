<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tampilan.dasboard.course',[
            'title' => 'Course',
            'course' => Course::latest()->filter(request(['search']))->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tampilan.dasboard.addCourse',[
            'title' => 'Add Course'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'image' => 'file|required|max:1500',
            'harga' => 'required',
            'fasilitas' => 'required',
            'slug' => 'required|unique:courses',
            'deskripsi' => 'required'
        ]);


        $validateData['image'] = $request->file('image')->store('course');

        Course::create($validateData);

        return redirect('/dashboard/course')->with('success','Add New Course Succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('tampilan.dasboard.detailCourse',[
            'title' => 'Detail Course',
            'course' => $course
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('tampilan.dasboard.editCourse', [
            'title' => 'EditCourse',
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $rules = [
            'title' => 'required',
            'image' => 'file|max:1500',
            'harga' => 'required',
            'fasilitas' => 'required',
            'deskripsi' => 'required'
        ];

        if($request->slug != $course->slug){
            $rules['slug'] = 'required|unique:courses';
        }

        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('course');
        }

        Course::where('id' , $course->id)->update($validateData);

        return redirect('/dashboard/course')->with('successUpdated', 'Updated Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if($course->image){
            Storage::delete($course->image);
        }

        Course::destroy($course->id);


        return redirect('/dashboard/course')->with('successDelete','Delete Succesfully!');
    }
}
