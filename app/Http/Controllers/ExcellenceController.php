<?php

/**
 * @Author: Bernard Hanna
 * @Date:   2025-01-29 14:25:28
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2025-03-13 17:52:44
 */

namespace App\Http\Controllers;

use App\CertificateExcellence;
use App\Excellence;
use App\Queries\ExcellenceQuery;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExcellenceController extends Controller
{
    public function report($edition): View
    {
        if (Gate::denies('report-excellence', $edition)) {
            abort(403);
        }

        return view('excellence.report', compact('edition'));
    }

    public function generate($edition, Request $request): RedirectResponse
    {
        if (Gate::denies('report-excellence', $edition)) {
            abort(403);
        }

        $rules = [
            'name_for_certificate' => 'required|max:40|regex:/^[^ə]*$/u',
        ];

        $messages = [
            'name_for_certificate.regex' => 'The :attribute field must not contain the ə character.',
        ];

        $request->validate($rules, $messages);

        $name = $request['name_for_certificate'];

        $certificate_url = (new CertificateExcellence($edition, $name, 'excellence', null))->generate();

        ExcellenceQuery::byYear($edition)
            ->update([
                'name_for_certificate' => $name,
                'certificate_url' => $certificate_url,
            ]);

        return redirect('certificates');
    }
}
