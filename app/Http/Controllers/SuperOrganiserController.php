<?php

namespace App\Http\Controllers;

use App\CertificateExcellence;
use App\Queries\SuperOrganiserQuery;
use Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SuperOrganiserController extends Controller
{
    public function report($edition): View
    {

        // Check if user is a winner for this edition
        if (Gate::denies('report-super-organiser', $edition)) {
            // The current user can't report for excellence...
            abort(403, 'You are not eligible to receive a Codeweek4All Super Organiser Certificate.');

        }

        return view('super-organiser.report', compact('edition'));

    }

    public function generate($edition, Request $request): RedirectResponse
    {

        if (Gate::denies('report-super-organiser', $edition)) {
            // The current user can't report for excellence...
            abort(403, 'You are not eligible to receive a Codeweek4All Super Organiser Certificate.');

        }

        $rules = [
            'name_for_certificate' => 'required|max:40|regex:/^[^ə]*$/u',
        ];

        $messages = [
            'name_for_certificate.regex' => 'The :attribute field must not contain the ə character.',
        ];

        $request->validate($rules, $messages);

        $name = $request['name_for_certificate'];

        $number_of_activities = auth()->user()->activities($edition);

        $certificate_url = (new CertificateExcellence($edition, $name, 'super-organiser', $number_of_activities))->generate();

        SuperOrganiserQuery::byYear($edition)
            ->update([
                'name_for_certificate' => $name,
                'certificate_url' => $certificate_url,
            ]);

        return redirect('certificates');

    }
}
