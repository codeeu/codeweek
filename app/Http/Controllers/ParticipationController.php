<?php

namespace App\Http\Controllers;


use App\CertificateParticipation;


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

    private function doGenerate($names, $event_name, $event_date)
    {

        $filenames = [];
        foreach ($names as $name) {
            $filenames[] = (new CertificateParticipation($name, $event_name, $event_date))->generate();
        }

        //Zip based on the filenames
        $zipname = "participation-certificates-" . Str::random(10) . ".zip";
        $zipfull = resource_path() . "/latex/" . $zipname;

        $zip = new ZipArchive;
        $zip->open($zipfull, ZipArchive::CREATE);
        foreach ($filenames as $file) {
            $zip->addFile(resource_path() . "/latex/" . $file . ".pdf", $file . ".pdf");
        }
        $zip->close();
        //Clean them All


        //Upload to S3
        $inputStream = Storage::disk('latex')->getDriver()->readStream($zipname);
        $destination = Storage::disk('s3')->path('/participation/' . $zipname);
        Storage::disk('s3')->put($destination, $inputStream);


        foreach ($filenames as $file) {
            Storage::disk('latex')->delete($file . ".pdf");
        }

        Storage::disk('latex')->delete($zipname);



        return Storage::disk('s3')->url('participation/' . $zipname);


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


        $names = array_map('trim', explode(',', $request["names"]));

        $zipUrl = $this->doGenerate($names, $request["event_name"], $request["event_date"]);

        $participation["participation_url"] = $zipUrl;
        $participation["status"] = "DONE";

        $participation->save();

        return redirect()->route('certificates');
        /*$certificate_url = (new CertificateExcellence($edition, $name))->generate();

        ExcellenceQuery::byYear($edition)
            ->update([
                'name_for_certificate' => $name,
                'certificate_url' => $certificate_url
            ]);

*/
        //return view('participation.success');
    }
}
