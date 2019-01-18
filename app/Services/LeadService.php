<?php

namespace App\Services;

use App\Lead;
use App\CustomField;
use App\CustomFieldValue;
use Illuminate\Support\Facades\Auth;

class LeadService
{

    const IS_LEAD = 0, IS_CLIENT = 1;

    public function findLeadsOrClients($isClient)
    {
        if (Auth::guard('web')->check()) {
            $leadOrClient = Lead::whereHas('interests', function ($query) use ($isClient) {
                $query->where('user_id', Auth::id())
                    ->where('clients', $isClient);
            })->with('channels')->get();
        } else {
            $leadOrClient = Lead::whereHas('interests', function ($query) use ($isClient) {
                $query->where('client', $isClient);
            })->with('channels')->get();
        }
        return $leadOrClient;
    }

    public function storeLead($request)
    {
        $lead = Lead::where('email', $request->email)->first() ?: new Lead();

        $lead->fill($request->all());

        if ($lead->save()) {
            $lead->interests()->attach($request->interest, [
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
            return "Lead Criado com Sucesso!";
        }
    }
}
