<?php

namespace App\Http\Controllers;

use App\Interest;
use App\Lead;
use App\LeadInterest;
use App\CustomFieldValue;
use App\User;
use App\CustomField;
use App\Services\LeadInterestService;
use Illuminate\Http\Request;

class LeadInterestController extends Controller
{
    public function create($id)
    {
        $interests = Interest::all();
        return view('leads.createLeadInterest', compact('id', 'interests'));
    }

    public function store(LeadInterestService $leadInterestService, Request $request, $id)
    {   
        $leadInterestService->storeLeadInterest($request, $id);
        return redirect()->route('interest.show', $id)->with('status', 'Interesse criado!');
    }

    public function show(LeadInterestService $leadInterestService, $id)
    {
        $results = $leadInterestService->findLeadInfo($id);

        $customFields = $results[0];
        $lead = $results[1];
        $interests = $lead->interests->unique();

        return view('tables.leads.leadInterests', compact('lead', 'interests', 'customFields'));
    }

    public function edit($id)
    {
        $interests = Interest::all();
        $leadInterest = LeadInterest::find($id);

        return view('leads.editLeadInterest', compact('leadInterest', 'interests'));
    }

    public function update(LeadInterestService $leadInterestService, Request $request, $id)
    {
        $lead_id = $leadInterestService->updateLeadInterest($request, $id);
        return redirect()->route('interest.show', $lead_id)->with('status', 'Interesse atualizado!');
    }

    public function destroy(LeadInterestService $leadInterestService, Request $request, $lead_id, $id)
    {
        $leadInterestService->destroyLeadInterest($request, $lead_id, $id);
        return redirect()->route('interest.show', $lead_id)->with('status', 'Interesse removido.');
    }
}
