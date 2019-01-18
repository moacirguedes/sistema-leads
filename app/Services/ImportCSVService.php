<?php

namespace App\Services;

use App\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ImportCSVService
{

    public function importCSV(Request $request)
    {

        $path = $request->file('csv_file')->getRealPath();  

        try{
            
            $csv = array_map('str_getcsv', file($path)); 
            $insertStatus = $this->importToDatabase($csv);
            
            return redirect()
                    ->back()
                    ->with('success', true)
                    ->with("message", "Leads importados com sucesso!"."<br>".
                                        "<ul><li>".$insertStatus[0]." Novos leads cadastrados. </li>".
                                        "<li>".$insertStatus[1]." Leads duplicados. </li>".
                                        "<li>".$insertStatus[2]." Leads com email inválido. </li></ul>");                
        } catch(\Exception $e) {

            return redirect()
                    ->back()
                    ->with("message", "Não foi possível importar os Leads, arquivo inválido!");
        }
    }
    
    public function importToDatabase($csv)
    {
        
        $count = ['sucesso' => 0, 'duplicado' => 0, 'invalido' => 0];
        $emailList = Lead::all()->pluck('email')->toArray();
        
        foreach ($csv as $lead) {
             
            //caso email já seja cadastrado
            if(in_array($lead[1], $emailList)) {
                $count['duplicado']++;
                continue;
            }

            //caso email seja invalido
            if(!filter_var($lead[1], FILTER_VALIDATE_EMAIL)) {
                $count['invalido']++;
                continue;
            }

            //atribui 0 para score caso campo esteja vazio
            if($lead[3] == '') $lead[3] = 0;

            $lead_create = Lead::create([
                'name' => $lead[0],
                'email'=> $lead[1],
                'telephone'=>$lead[2],
                'score' => $lead[3]
            ]);
                    
            $count['sucesso']++; 
        }
        return array_values($count);
    }
}