<?php

namespace App\Traits;

trait HttpResponses {

    protected function success($data, $message=null, $code=200)
    {
        return response()->json([
            'status'=>'Request Was successfull',
            'message'=>$message,
            'data'=>$data
        ],$code);
    }

    protected function error($data, $message=null,$code)
    {
        return response()->json([
            'status'=>'Error Has Accurred',
            'message'=>$message,
            'data'=>$data
        ],$code);
    }
}
