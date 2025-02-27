<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\UpdateRequest;


class StudentController extends Controller
{
    // variables inside a class is called properties 
    // functions are called methods

    public function registration(RegistrationRequest $request){
        // echo "Registrating";
        // dd($request->all()); // to grab all the data
        // dd($request->name); // to grab only one data just write the name of the field in html

        $name = $request->name; // These are coming html form
        $address = $request->add;
        $gender = $request->gender;
        $date = $request->date;
        $email = $request->email;
        $password = $request->password;
        $photo_name = '';
        // $password = $request->input('password');
        // $photo = $request->file('photo');

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            // $photo_name = $photo->getClientOriginalNAme();// file name , we will not use this here because the same name can clash
            //but we can use getclientorginalname function with something like datetime to make it unique if the client want original name

            $photo_name= $photo->hashName(); // hashName will give new unique name to the file
            $photo->move('uploads/', $photo_name);
        }

        //data validation

        // $student = new Student;
        // $student->name = $name; // this is going to database
        // $student->add = $address;
        // $student->dob = $date;
        // $student->email= $email;
        // $student->password= $password;
        // $student->gender= $gender;
        // $student->photo = $photo_name;
        // $student ->save(); // saving in database

        Student::create([
            'name' => $name, // this is going to database
            'add' => $address,
            'dob' => $date,
            'email'=> $email,
            'password'=> $password,
            'gender'=> $gender,
            'photo' => $photo_name
        ]);

        //form request file ,to create a form file.

        return redirect('/')->with('message','Registration successfull.');

    }

    public function delete(Request $request){
        // echo"deleting";

        // echo $request->id;
        $student_id = $request->id;
        $student = Student::find($student_id);

        // if ($student->photo) //we can use this as well but below one is more better
        if (!empty($student->photo)) {
            $image_path = public_path('uploads/.$student->photo');

            if (file_exists($image_path)) {
                unlink('$image_path');                
            }
        }

        $student->delete();
        // Student::destroy($student_id); // destroy is only for primary key
        // Student::destroy([1,2,3]);
        // Student::where('id', '$student_id')->delete();
        // return redirect('/');
        return back()->with('success','Student record deleted sucessfully!');//for loading same page


        
    }

    public function updateForm(Request $request){
        $student_id = $request->id;
        $student = Student::find($student_id);

        if (empty($student)) {
            return redirect('/students')->with('success', 'The Student does not exist');
        }
        return view('update', ['student'=> $student]);
    }

    public function update(UpdateRequest $request)
{
    $name       = $request->name; 
    $address    = $request->add;
    $gender     = $request->gender;
    $date       = $request->date;
    $email      = $request->email;
    // Hash the password for security
    $password   = $request->password; 
    $photo_name = '';

    // Retrieve student record first
    $student_id = $request->id;
    $student    = Student::find($student_id);

    if (!$student) {
        return redirect('/students')->with('error', 'Student not found');
    }

    // If a new photo was uploaded
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $photo_name = $photo->hashName();
        $photo->move('uploads/', $photo_name);

        // Delete the old photo if it exists
        if (!empty($student->photo)) {
            $image_path = public_path('uploads/' . $student->photo);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
    }

    // Now update the student record
    $student->update([
        'name'     => $name,
        'add'      => $address,
        'dob'      => $date,
        'email'    => $email,
        'password' => $password,
        'gender'   => $gender,
        'photo'    => $photo_name
    ]);

    return redirect('/students')->with('success', 'Student updated successfully');
}

}