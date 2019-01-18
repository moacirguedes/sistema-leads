<?php

namespace App\Services;

use App\Interest;
use App\Lead;
use App\LeadInterest;
use App\User;
use App\CustomField;
use App\CustomFieldValue;
use Illuminate\Http\Request;

class LeadInterestService
{
    public function storeLeadInterest(Request $request, $id)
    {
        foreach ($request->fields as $field) {
            $lead = Lead::find($id);
            $lead->interests()->attach($request->interest, [
                'client' => $request->client,
                'custom_field_id' => $field == '0' ? null : $field,
            ]);
        }
    }

    public function findLeadInfo($id)
    {
        if (\Auth::guard('web')->check()) {
            $customFields = CustomFieldValue::with(['customField' => function ($query) use ($id) {
                $query->where('user_id', \Auth::user()->id);
            }])->where('lead_id', $id)->get();

            $lead = Lead::with(['interests' => function ($query) {
                $query->where('user_id', \Auth::user()->id);
            }])->find($id);
        } else {
            $customFields = CustomFieldValue::with(['customField' => function ($query) {
                $query->with('user');
            }])->where('lead_id', $id)->get();

            $lead = Lead::with(['interests' => function ($query) {
                $query->with('user');
            }])->find($id);
        }

        $result[0] = $customFields;
        $result[1] = $lead;

        return $result;
    }

    public function updateLeadInterest(Request $request, $id)
    {
        $leadInterest = LeadInterest::find($id);
        
        $leadInterest->interest_id = $request->interest;
        $leadInterest->client = $request->client;
        
        if ($leadInterest->save()) return $leadInterest->lead_id;
    }

    public function destroyLeadInterest(Request $request, $lead_id, $id)
    {
        $ids = json_decode($request->ids, true);
        
        if ($ids != null) 
        {
            LeadInterest::destroy($ids);
        } else {
            LeadInterest::find($id)->delete();
        }
    }
}
