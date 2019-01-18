<?php

namespace App\Http\Controllers;

use App\Interest;
use App\Lead;
use App\Channel;
use App\User;
use App\Services\LeadService;
use Illuminate\Http\Request;

class LeadController extends Controller
{

    public function index(LeadService $leadService)
    {
        $leads = $leadService->findLeadsOrClients(LeadService::IS_LEAD);
        $channels = Channel::all();
        return view('tables.leads.leadTable', compact('leads', 'channels'));
    }

    public function clients(LeadService $leadService)
    {
        $clients = $leadService->findLeadsOrClients(LeadService::IS_CLIENT);
        $channels = Channel::all();
        return view('tables.clients.clientTable', compact('clients', 'channels'));
    }

    public function create()
    {
        $users = User::all();
        $interests = Interest::all();

        return view('leads.createLead', compact('users', 'interests'));
    }

    public function store(LeadService $leadService, Request $request)
    {
        $message = $leadService->storeLead($request);
        return redirect()->route('lead.create')->with('status', $message);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $lead = Lead::find($request->id);
        $lead->fill($request->all())->save();
        return redirect()->back()->with('status', 'Alteração realizada com sucesso!');
    }

    public function destroy($id)
    {
        //
    }
}
