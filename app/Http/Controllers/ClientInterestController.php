<?php

namespace App\Http\Controllers;

use App\Interest;
use App\Lead;
use App\LeadInterest;
use App\CustomFieldValue;
use App\Services\LeadInterestService;
use Illuminate\Http\Request;

class ClientInterestController extends Controller
{
    public function create($id)
    {
        $interests = Interest::all();

        return view('clients.createClientInterest', compact('id', 'interests'));
    }

    public function store(Request $request, $id)
    {
        $lead = Lead::find($id);
        $lead->interests()->attach($request->interest, [
            'client' => $request->client, 
        ]);

        return redirect()->route('consumed.show', $id)->with('status', 'Interesse criado!');
    }

    public function show(LeadInterestService $leadInterestService, $id)
    {
        $results = $leadInterestService->findLeadInfo($id);

        $customFields = $results[0];
        $client = $results[1];
        $interests = $client->interests->unique();

        return view('tables.clients.clientInterests', compact('client', 'interests', 'customFields'));
    }

    public function edit($id)
    {
        $interests = Interest::all();
        $leadInterest = LeadInterest::find($id);

        return view('clients.editClientInterest', compact('leadInterest', 'interests'));
    }

    public function update(Request $request, $id)
    {
        $leadInterest = LeadInterest::find($id);

        $leadInterest->interest_id = $request->interest;
        $leadInterest->client = $request->client;

        if ($leadInterest->save()) {
            return redirect()->route('consumed.show', $leadInterest->lead_id)->with('status', 'Interesse atualizado!');
        }
    }

    public function destroy(Request $request, $id)
    {

        LeadInterest::find($id)->delete();

        return redirect()->back()->with('status', 'Interesse removido.');
    }
}
