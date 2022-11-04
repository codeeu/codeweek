<?php

namespace App\Http\Controllers;


use App\CertificateParticipation;


use App\Jobs\GenerateCertificatesOfParticipation;
use App\Participation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;

class ParticipationController extends Controller
{
    public function show()
    {
        return view('participation.index');
    }

    public function test()
    {
        $name = "Μαρία";
        //$event_name = "Learn something with Laravel & PHP & Scratch";
        $event_name = "(L.I.F.E.) OWL ALERT!! Can you help?";
        $event_date = "Οκτώβριος 2021";

        return (new CertificateParticipation($name, $event_name, $event_date))->generate();
    }



    public function generate(Request $request)
    {


        $this->validate($request, [
            'names' => 'required',
            'event_name' => 'required|max:50',
            'event_date' => 'required|max:20'
        ]);

        $participation = new Participation([
                "user_id" => auth()->id(),
                "names" => $request["names"],
                "event_name" => $request["event_name"],
                "event_date" => $request["event_date"]
            ]
        );

        $participation->save();

        //Dispatch Job
        GenerateCertificatesOfParticipation::dispatch($participation);

        return redirect()->route('certificates');

    }
}
