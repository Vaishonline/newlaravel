<?php

namespace App\Http\Controllers;

use App\Transformers\UserTransformer;
use App\Transformers\AssignFourTransformer;
use App\Transformers\CTransformer;

use DB;
use App\Role;
use App\User;
use App\Classes;
use App\classUser;
use League\Fractal\Serializer\ArraySerializer;

class HomeController extends Controller
{
    public function getid() {
        return Role::where('name','student')->first();
    }


    public function assign1()
    {
//
        $users = User::where('role_id', Role::where('name','student')->first()->id)->get();
//
        return fractal($users, new UserTransformer())
            ->serializeWith(new ArraySerializer())
            ->toArray();
//        return view('assign1',compact('users'));
    }

    public function assign2()
    {


        $users = User::where('role_id', Role::where('name','teacher')->first()->id)->get();
//
        return fractal($users, new UserTransformer())
            ->serializeWith(new ArraySerializer())
            ->toArray();
        //return view('assign2',compact('users'));
        
        
        
    }

    /**
     * @return array
     */
    public function assign3()
    {
        
         $list = Classes::all();
        return fractal( $list , new UserTransformer())
            ->serializeWith(new ArraySerializer())
            ->toArray();
        
         //return view('assign3',compact('listclass'));
    }

    
    public function assign4()
    {

        $arr=array();
        $cc=classUser::where('student_id')->get();
        foreach($cc as $c) {
            $myArr = array();

            $sname = User::where('id', $c->student_id)->first();//student name
            array_push($myArr,$sname->name);
            $sclass = Classes::where('id', $c->class_id)->get();
            array_push($myArr,$sclass);
            $tname = User::where('id', $c->student_id)->first()->name;
            array_push($myArr,$tname);
            array_push($arr,$myArr);
        }

//
        return fractal( $arr, new AssignFourTransformer())
            ->serializeWith(new ArraySerializer())
            ->toArray();
//            foreach($sclass as $d){
//                $MyArray=array();
//                $MyArray[] = $d->name;
//                $steach = User::where('id', $c->teacher_id)->get();
//                $MyArray[] = $steach->name;
//                array_push($myArr,$MyArray);
//            }//$myArr[]=$MyArray;
//            //$arr[]=$MyArr;
//            array_push($arr,$myArr);
        }









    public function assign5()
    {
//$Id=classUser::where('student_id',NULL)->get('class_id');
        //$gg=classUser::get('student_id');
        //$category = new Classes;
        //$category->kk();
        //$gawd=Classes::where('id',$category);
        //dd($catagory);
        //return view('assign5')->with('c',$category);
        //$cl=classUser::all()->where('student_id',NULL)->toArray();
        //return view('assign5',compact('cl'));

        $myArr = array();


        $nullteach=classUser::where('student_id',NULL)->get();
        foreach ($nullteach as $nt) {
            $getthoseclasses = Classes::where('id', $nt->class_id)->get();
            foreach ($getthoseclasses as $gt)
            {
                $myArr[] = $gt->name;

            }


        }
        return fractal($myArr, new CTransformer())
            ->serializeWith(new ArraySerializer())
            ->toArray();
        }


    public function assign6()
    {
        //$cl=classUser::all()->where('teacher_id',NULL)->toArray();
        //return view('assign6',compact('cl'));
        $myArr = array();


        $nullteach=classUser::where('teacher_id',NULL)->get();
        foreach ($nullteach as $nt) {
            $getthoseclasses = Classes::where('id', $nt->class_id)->get();
            foreach ($getthoseclasses as $gt)
            {
                $myArr[] = $gt->name;

            }


        }
        return fractal($myArr, new CTransformer())
            ->serializeWith(new ArraySerializer())
            ->toArray();

    }
}
