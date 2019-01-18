<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;
use App\Lead;
use App\User;
use App\CustomField; 
use App\CustomFieldValue; 

class CustomFieldController extends Controller
{
    const types = [
        'boolean' => 'Sim/Não',
        'text' => 'Texto Curto',
        'textarea' => 'Texto Longo',
        'number' => 'Numérico',
    ];

    public function index()
    {
        $customFields = CustomField::with('user')->get();

        $users = User::all();

        return view('tables.customFields.customFields', compact('customFields', 'users'));
    }

    public function store(Request $request)
    {
        $customField = CustomField::create($request->all() + ['type_desc' => self::types[$request->type] ]);

        $leads = Lead::whereHas('interests', function($query) use ($request){
            $query->where('user_id', $request->user_id);
        })->get();

        foreach($leads as $lead) {
            CustomFieldValue::create([
                'lead_id' => $lead->id,
                'custom_field_id' => $customField->id,
            ]);
        }

        return redirect()->back()->with('status', 'Campo criado!');
    }

    public function update(Request $request, $id)
    {
        $customField = CustomField::find($request->id);
        $customField->name = $request->editName;
        $customField->type = $request->editType;
        $customField->type_desc = self::types[$request->editType];
        $customField->save();
        return redirect()->back()->with('status', 'Campo editado!');
    }

    public function destroy($id)
    {
        $customField = CustomField::find($id);
        $customField->delete();
        return redirect()->back()->with('status', 'Campo deletado!');        
    }

    public function customFieldType(Request $request, $id) 
    {
        if ($request->ajax()) {
            $field = CustomFieldValue::with('customField')->where('id', $id)->get();
            return response()->json([
                'customFieldType' => $field[0]->customField->type,
                'value' => ($field[0]->value == null ? '' : $field[0]->value),
            ]);
        }
    }
}
