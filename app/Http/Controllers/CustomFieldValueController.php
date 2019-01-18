<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomFieldValue; 

class CustomFieldValueController extends Controller
{
    public function update(Request $request)
    {
        $customField = CustomFieldValue::find($request->id);
        $customField->value = $request->editValue;
        $customField->save();
        return redirect()->back()->with('status', 'Campo editado!');
    }
}
