<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Tests;
use App\Models\Patients;
use App\Models\ICU ;
use App\Models\Doctors ;
use App\Models\deadpatients ;
use App\Models\admitted ;
use App\Models\checkedout;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class userController extends Controller
{
    //
    public function createpatients(Request $request){

        $validator = Validator::make( $request->all(),
        [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:patients,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
            'Insurance' => ['required'],

        ]

    );
    if($validator->fails()){
        return response()->json(['success'=>false,
        'message'=>$validator->messages(),
        'data'=>null],400);
    }

    else{

        DB::beginTransaction();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Insurance'=>$request->Insurance,
        ];
        try {
            $patients = Patients::create($data);

            DB::commit();


        }
         catch (\Exception $e) {
        echo $e->getMessage();
            DB::rollback();
            $patients =null;
        }
    }

        if ($patients!= null) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'patients have submitted successfully',
                    'data'=>$patients,

                ],
                200);

    }
    else {
        return response()->json(
            [ 'success' => false,
                'message' => 'Unsuccessfully,error',
                'data' => null,

            ],
            500);
    }

}
public function createadmit(Request $request){
$validator = Validator::make( $request->all(),
            [
                'pateint_id' => ['required'],
                'Disease' => ['required'],
                'BillPayment'=>['required'],


            ]

        );
        if($validator->fails()){
            return response()->json(['success'=>false,
            'message'=>$validator->messages(),
            'data'=>null],400);
        }
        $pateintid=Patients::where('id',$request->pateint_id);

        if($pateintid){

            DB::beginTransaction();
            $data = [
                'pateint_id' => $request->pateint_id,
                'Disease' => $request->Disease,
                'BillPayment' => $request->BillPayment,

            ];
            try {
                $admit= admitted::create($data);

                DB::commit();

            } catch (\Exception $e) {
                //  echo $e->getMessage();
                DB::rollback();
                $admit =null;
            }


            if ( $admit!=null) {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'you have admitted successfully',
                        'data'=> $admit,

                    ],
                    200);

        }
        else {
            return response()->json(
                [ 'success' => false,
                    'message' => 'Unsuccessfully,error',
                    'data' => null,

                ],
                500);
        }


    }


}
public function testcreate(Request $request){
    $validator = Validator::make( $request->all(),
    [
        'pateint_id' => ['required'],
        'date' => ['required','date'],
        'time'=>['required'],
        'result'=>['required'],


    ]

);
if($validator->fails()){
    return response()->json(['success'=>false,
    'message'=>$validator->messages(),
    'data'=>null],400);
}
$pateintid=Patients::where('id',$request->pateint_id);

if($pateintid){

    DB::beginTransaction();
    $data = [
        'pateint_id' => $request->pateint_id,
        'date' => $request->date,
        'time' => $request->time,
        'result' => $request->result,

    ];
    try {
        $test= Tests::create($data);

        DB::commit();

    } catch (\Exception $e) {
        // echo $e->getMessage();
        DB::rollback();
        $test =null;
    }


    if ( $test!=null) {
        return response()->json(
            [
                'success' => true,
                'message' => 'you have admitted successfully',
                'data'=> $test,

            ],
            200);

}
else {
    return response()->json(
        [ 'success' => false,
            'message' => 'Unsuccessfully,error',
            'data' => null,

        ],
        500);
}


}


}

public function createcheckout(Request $request){

    $validator = Validator::make( $request->all(),
    [
        'pateint_id' => ['required'],
        'Bill' => ['required'],


    ]

);
if($validator->fails()){
    return response()->json(['success'=>false,
    'message'=>$validator->messages(),
    'data'=>null],400);
}
$pateintid=admitted::where('id',$request->pateint_id);
if($request->Bill!='paid'){
    return response()->json([
        'success'=>false,
        'message'=>'Must clear the bill',
        'data'=>null,


    ], 200,);
}
if($pateintid){

    DB::beginTransaction();
    $data = [
        'pateint_id' => $request->pateint_id,
        'Bill' => $request->Bill,

    ];
    try {
        $check= checkedout::create($data);

        DB::commit();

    } catch (\Exception $e) {
        // echo $e->getMessage();
        DB::rollback();
        $check =null;
    }


    if ( $check!=null) {
        return response()->json(
            [
                'success' => true,
                'message' => 'you have checkedout successfully',
                'data'=> $check,

            ],
            200);

}
else {
    return response()->json(
        [ 'success' => false,
            'message' => 'Unsuccessfully,error',
            'data' => null,

        ],
        500);
}


}

}
public function createdoctors(Request $request){
    $validator = Validator::make( $request->all(),
    [
        'name' => ['required'],
        'email' => ['required', 'email', 'unique:_doctors,email'],
        'password' => ['required', 'min:8', 'confirmed'],
        'password_confirmation' => ['required'],
        'specialization' => ['required'],

    ]

);
if($validator->fails()){
    return response()->json(['success'=>false,
    'message'=>$validator->messages(),
    'data'=>null],400);
}


else{

    DB::beginTransaction();
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'specialization'=>$request->specialization,
    ];
    try {
        $doctor = Doctors::create($data);

        DB::commit();


    }
     catch (\Exception $e) {
    // echo $e->getMessage();
        DB::rollback();
        $doctor =null;
    }
}

    if ($doctor!= null) {
        return response()->json(
            [
                'success' => true,
                'message' => 'doctors have created successfully',
                'data'=>$doctor,

            ],
            200);

}
else {
    return response()->json(
        [ 'success' => false,
            'message' => 'Unsuccessfully,error',
            'data' => null,

        ],
        500);
}
}
public function creteicu(Request $request){

    $validator = Validator::make( $request->all(),
    [
        'Pateint_name' => ['required'],
        'Pateint_status' => ['required'],
        'admit_id' => ['required'],
        'Days'=>['required']

    ]

);
if($validator->fails()){
    return response()->json(['success'=>false,
    'message'=>$validator->messages(),
    'data'=>null],400);
}
$admit=admitted::where('id',$request->admit_id);


if($admit){

    DB::beginTransaction();
    $data = [
        'Pateint_name' => $request->Pateint_name,
        'Pateint_status' => $request->Pateint_status,
        'admit_id' => $request->admit_id,
        'Days' => $request->Days,
    ];
    try {
        $icu = ICU::create($data);

        DB::commit();


    }
     catch (\Exception $e) {
    // echo $e->getMessage();
        DB::rollback();
        $icu =null;
    }
}

    if ($icu!= null) {
        return response()->json(
            [
                'success' => true,
                'message' => 'patients have submitted  in icu successfully',
                'data'=>$icu,

            ],
            200);

}
else {
    return response()->json(
        [ 'success' => false,
            'message' => 'Unsuccessfully,error',
            'data' => null,

        ],
        500);

}
}
public function createdead(Request $request)
{
    $validator = Validator::make( $request->all(),
    [
        'patient_id' => ['required'],

    ]

);
if($validator->fails()){
    return response()->json(['success'=>false,
    'message'=>$validator->messages(),
    'data'=>null],400);
}
$patient=ICU::where('id',$request->patient_id)->first();


if(!$patient||$patient->Days<8){
    return response()->json([
    'success'=>false,
    'message'=>'the pateint is not dead may be in ICU or not a pateint',
    'data'=>null
], 200,);
}
else{
    DB::beginTransaction();
    $data = [
        'patient_id' => $request->patient_id,

    ];
    try {
        $dead = deadpatients::create($data);

        DB::commit();


    }
     catch (\Exception $e) {
    // echo $e->getMessage();
        DB::rollback();
        $dead =null;
    }
}

    if ($dead!= null) {
        return response()->json(
            [
                'success' => true,
                'message' => 'patients has been passed away ',
                'data'=>$dead,

            ],
            200);

}
else {
    return response()->json(
        [ 'success' => false,
            'message' => 'Unsuccessfully,error',
            'data' => null,

        ],
        500);

}
}
public function getpatients(string $id){

    $pateints =Patients::where('id', $id)->first();
    if ( $pateints == null) {
        return response()->json([
            'success' => false,
            'message' => 'The user doest exist',
            'data'=>null,
        ], 404);
    }

    else{
        return response()->json([
            'success'=>true,
            'data'=>[

            'id' => $pateints->id,
            'ame' =>  $pateints->name,
            'email' =>  $pateints->email,
            'Insurance' => $pateints->Insurance,
            'password' =>  $pateints->password,

       ]
     ], 200);
    }


}
public function doctorlogin(Request $request){
    $validator = Validator::make(
        $request->all(),
        [

            'email' => ['required', 'email'],
            'password' => ['required'],

        ]
    );


    if ($validator->fails()) {
        return response()->json($validator->messages(), 400);
    }


    $doct= Doctors::where('email', $request->email)->first();


    if ($doct == null) {
        return response()->json('email could not found', 404);
    }
              $doctors = Doctors::where('password', Hash::check($request->password, $doct->password))->first();
             print_r($doctors);
             die();
if($doctors==null){

    return response()->json('password could not found', 404);

}

            if ($doctors && $doct) {
                try{

                $token = $doct->createToken('token')->accessToken;
                return response()->json([
                    'successs' => true,
                    'message' => 'you have logged in successfully',
                    'token' => $token,
                    'doctors' => $doctors,
                    // 'd'=>$d,
                ]);
            }
            catch(\Exception $e){
                $doctors=null;

 return response()->json('error', 404);
            }

    }

}
public function loginPatients(Request $request)
{
    $validator = Validator::make(
        $request->all(),
        [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]
    );

    if ($validator->fails()) {
        return response()->json($validator->messages(), 400);
    }

    $user = Patients::where('email', $request->email)->first();

    if ($user == null) {
        return response()->json('Email not found', 404);
    } else {
        try {
            if (Hash::check($request->password, $user->password)) {
            // print_r('kashan');
            // die();
            //     // Password is correct
                 $token = $user->createToken('Token')->accessToken;
                return response()->json([
                    'success' => true,
                    'message' => 'You have logged in successfully',
                     'token' => $token,
                    'user' => $user, // Return the user information if needed
                ]);
            } else {
                // Password is incorrect
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid password',
                ], 401); // Use 401 for unauthorized access
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
            ], 500);
        }
    }
}

}
