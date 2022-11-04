<?php

namespace App\Helpers;

use App\CertificateParticipation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;

class CertificatesHelper
{
    public static function doGenerateCertificatesOfParticipation($names, $event_name, $event_date)
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
}