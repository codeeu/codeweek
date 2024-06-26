<?php

namespace App\Http\Controllers;

use App\CertificateExcellence;
use App\Excellence;
use App\Queries\ExcellenceQuery;
use Gate;
use Illuminate\Http\Request;


class ExcellenceController extends Controller
{

    public function report($edition)
    {

        // Check if user is a winner for this edition
        if (Gate::denies('report-excellence', $edition)) {
            // The current user can't report for excellence...
            abort(403, 'You are not eligible to receive a Codeweek4All Excellence Certificate.');

        }


        return view('excellence.report', compact('edition'));

    }

    public function generate($edition, Request $request)
    {


        if (Gate::denies('report-excellence', $edition)) {
            // The current user can't report for excellence...
            abort(403, 'You are not eligible to receive a Codeweek4All Excellence Certificate.');

        }

        $rules = [
            'name_for_certificate' => 'required|max:40|regex:/^[^ə]*$/u'
        ];

        $messages = [
            'name_for_certificate.regex' => 'The :attribute field must not contain the ə character.',
        ];

        $request->validate($rules, $messages);

        $name = $request["name_for_certificate"];

        $certificate_url = (new CertificateExcellence($edition, $name,'excellence',null))->generate();

        ExcellenceQuery::byYear($edition)
            ->update([
                'name_for_certificate' => $name,
                'certificate_url' => $certificate_url
            ]);


        return redirect('certificates');


    }



}
