<?php

namespace App\Http\Controllers;

use App\CertificateParticipation;
use App\Jobs\GenerateCertificatesOfParticipation;
use App\Participation;
use Illuminate\Http\Request;

class ParticipationController extends Controller
{
    public function show()
    {
        return view('participation.index');
    }

    public function test()
    {
        $name = 'Μαρία';
        //$event_name = "Learn something with Laravel & PHP & Scratch";
        $event_name = '(L.I.F.E.) OWL ALERT!! Can you help?';
        $event_date = 'Οκτώβριος 2021';

        return (new CertificateParticipation($name, $event_name, $event_date))->generate();
    }

    public function generate(Request $request)
    {

        $rules = [
            'event_name' => 'required|max:50',
            'event_date' => 'required|max:20',
            'names' => 'required|regex:/^[^ə]*$/u',
        ];

        $messages = [
            'names.regex' => 'The :attribute field must not contain the ə character.',
        ];

        $request->validate($rules, $messages);

        $participation = new Participation([
            'user_id' => auth()->id(),
            'names' => $request['names'],
            'event_name' => $request['event_name'],
            'event_date' => $request['event_date'],
        ]
        );

        $participation->save();

        //Dispatch Job
        GenerateCertificatesOfParticipation::dispatch($participation);

        return redirect()->route('certificates');

    }
}
