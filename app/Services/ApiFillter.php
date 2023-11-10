<?php

namespace App\Services;

use Illuminate\Http\Request;

class ApiFillter  {

    protected $allowedParms = [];

    protected $columnMap = [];

    protected $operatorMap = [];

    public function transform(Request $request){

        $eloQuery=[];

        foreach($this->allowedParms as $parm => $operatorMap){
            $query = $request->query($parm);

            if(!isset($query)){
                continue;
            }
            $column = $this->columnMap[$parm]??$parm;

            foreach($operatorMap as $operator){
                if(isset($query[$operator])){
                    $eloQuery[]= [$column,$this->operatorMap[$operator],$query[$operator]];
                }
            }
        }
        return $eloQuery;
    }

}
