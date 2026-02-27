<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ColocationMemberRequest;
use App\Models\ColocationMember;

class ColocationMemberController extends Controller
{
    public static function create(ColocationMemberRequest $request){
        $validation = $request->validated();
        ColocationMember::create([
            'colocation_id' => $request->colocation_id,
            'member_id' => $request->member_id
        ]);
    }
}
