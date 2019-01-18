<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Lead;
use App\CustomField;
use App\CustomFieldValue;
use Illuminate\Http\Request;
use App\Http\Resources\Lead as LeadResource;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LeadResource::collection(Lead::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lead = Lead::where('email', '=', $request->lead['email'])->first() ?: new Lead();

        $lead->fill($request->only('lead')['lead']);
        $lead->score = $this->calculateScoreOnStore($lead);

        if ($lead->save()) {
            $lead->interests()->attach($request->interest['id'], [
                'client' => $request->client,
            ]);

            if ($lead->wasRecentlyCreated) {
                $user = User::FindByInterest($request->interest)->get();

                $customFields = CustomField::where('user_id', $user[0]->id)->get();

                foreach ($customFields as $field) {
                    CustomFieldValue::create([
                        'lead_id' => $lead->id,
                        'custom_field_id' => $field->id,
                    ]);
                }
            }
            
            return new LeadResource($lead);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lead = Lead::findOrFail($id);

        return new LeadResource($lead);
    }


    public function calculateScoreOnStore($lead)
    {
        $score = 0;

        foreach ($lead->toArray() as $leadField) {
            
            if (!is_null($leadField)) $score++;

        }

        return $score;
    }
}
