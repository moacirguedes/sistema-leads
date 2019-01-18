<?php

namespace App\Services;

use App\Lead;
use App\LeadInterest;
use Jenssegers\Date\Date;

class AdminService
{

    public function dashboardData()
    {
        $date = Date::now();

        $leads = $this->leadsQuery($date);
        $clients = $this->clientsQuery($date);
        $leads = $this->sortByDate($leads);
        $clients = $this->sortByDate($clients);

        $values = [$date, $leads, $clients];

        return $values;
    }

    public function leadsQuery($date)
    {
        $leads = Lead::whereYear('created_at', $date->year)
                    ->whereHas('interests', function ($query) {
                        $query->where('client', 0);})
                    ->get()
                    ->groupBy(function ($val) {
                        return Date::parse($val->created_at)->format('n');
                    })->toArray();

        return $leads;
    }

    public function clientsQuery($date)
    {
        $clients = LeadInterest::whereYear('updated_at', $date->year)
                        ->where('client', 1)
                        ->get()
                        ->groupBy(function ($val) {
                            return Date::parse($val->created_at)->format('n');
                        })->toArray();

        return $clients;
    }

    public function sortByDate($leadsOrClients)
    {
        for ($i = 1; $i <= 12; $i++) {
            if (!array_key_exists($i, $leadsOrClients)) {
                $leadsOrClients[$i] = 0;
            } else {
                $leadsOrClients[$i] = count($leadsOrClients[$i]);
            }
        }
        
        return $leadsOrClients;
    }
}
