@extends('layout.base')

@section('content')
    <section id="codeweek-resources-import-preview-page" class="codeweek-page">
        <section class="codeweek-content-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h1>Resources import – preview</h1>
            <a href="{{ route('admin.resources-import.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Upload another file</a>
        </section>

        <section class="codeweek-content-wrapper">
            <p class="mb-4">Review and edit the parsed rows below. All fields are editable. Then click <strong>Import</strong> to run the import. Complete the import soon; if you see &ldquo;419 Page Expired&rdquo;, your session timed out — go back to <a href="{{ route('admin.resources-import.index') }}">Upload &amp; verify</a> and try again.</p>

            @if ($errors->any())
                <div class="mb-4 p-4 rounded bg-red-50 border border-red-200">
                    <ul class="list-disc list-inside text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="resources-import-form" method="POST" action="{{ route('admin.resources-import.import') }}" class="codeweek-form">
                @csrf
                @if(!empty($import_token))
                    <input type="hidden" name="import_token" value="{{ $import_token }}">
                @else
                    <input type="hidden" name="import_payload" value="{{ $import_payload ?? '' }}">
                @endif

                <div class="overflow-x-auto mb-4">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-3 py-2 text-left">#</th>
                                <th class="border border-gray-300 px-3 py-2 text-left">Name</th>
                                <th class="border border-gray-300 px-3 py-2 text-left">Link</th>
                                <th class="border border-gray-300 px-3 py-2 text-left">Description</th>
                                <th class="border border-gray-300 px-3 py-2 text-left">Type</th>
                                <th class="border border-gray-300 px-3 py-2 text-left">Target audience</th>
                                <th class="border border-gray-300 px-3 py-2 text-left">Level of difficulty</th>
                                <th class="border border-gray-300 px-3 py-2 text-left">Programming language</th>
                                <th class="border border-gray-300 px-3 py-2 text-left">Subject</th>
                                <th class="border border-gray-300 px-3 py-2 text-left">Topics</th>
                                <th class="border border-gray-300 px-3 py-2 text-left">Language</th>
                                <th class="border border-gray-300 px-3 py-2 text-left">Category</th>
                                <th class="border border-gray-300 px-3 py-2 text-left">Group name</th>
                                <th class="border border-gray-300 px-3 py-2 text-left">Image (URL)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rows as $index => $row)
                                @php
                                    $val = function ($key) use ($row, $index) {
                                        $v = $row[$key] ?? '';
                                        if (is_array($v)) {
                                            $v = implode(', ', $v);
                                        }
                                        return old("edits.{$index}.{$key}", trim((string) $v));
                                    };
                                @endphp
                                <tr>
                                    <td class="border border-gray-300 px-3 py-2">{{ $index + 1 }}</td>
                                    <td class="border border-gray-300 px-3 py-2">
                                        <input type="text" name="edits[{{ $index }}][name_of_the_resource]" value="{{ $val('name_of_the_resource') }}"
                                               class="w-full min-w-[120px] px-2 py-1 border rounded text-sm" placeholder="Name">
                                    </td>
                                    <td class="border border-gray-300 px-3 py-2">
                                        <input type="text" name="edits[{{ $index }}][link]" value="{{ $val('link') }}"
                                               class="w-full min-w-[160px] px-2 py-1 border rounded text-sm" placeholder="https://...">
                                    </td>
                                    <td class="border border-gray-300 px-3 py-2">
                                        <textarea name="edits[{{ $index }}][description]" rows="2" class="w-full min-w-[160px] px-2 py-1 border rounded text-sm" placeholder="Description">{{ $val('description') }}</textarea>
                                    </td>
                                    <td class="border border-gray-300 px-3 py-2">
                                        <input type="text" name="edits[{{ $index }}][filters_type]" value="{{ $val('filters_type') }}"
                                               class="w-full min-w-[80px] px-2 py-1 border rounded text-sm" placeholder="e.g. Activity, Video">
                                    </td>
                                    <td class="border border-gray-300 px-3 py-2">
                                        <input type="text" name="edits[{{ $index }}][filters_target_audience]" value="{{ $val('filters_target_audience') }}"
                                               class="w-full min-w-[80px] px-2 py-1 border rounded text-sm" placeholder="e.g. Primary, Secondary">
                                    </td>
                                    <td class="border border-gray-300 px-3 py-2">
                                        <input type="text" name="edits[{{ $index }}][filters_level_of_difficulty]" value="{{ $val('filters_level_of_difficulty') }}"
                                               class="w-full min-w-[80px] px-2 py-1 border rounded text-sm" placeholder="e.g. Beginner">
                                    </td>
                                    <td class="border border-gray-300 px-3 py-2">
                                        <input type="text" name="edits[{{ $index }}][filters_programming_language]" value="{{ $val('filters_programming_language') }}"
                                               class="w-full min-w-[80px] px-2 py-1 border rounded text-sm" placeholder="e.g. Scratch">
                                    </td>
                                    <td class="border border-gray-300 px-3 py-2">
                                        <input type="text" name="edits[{{ $index }}][filters_subject]" value="{{ $val('filters_subject') }}"
                                               class="w-full min-w-[80px] px-2 py-1 border rounded text-sm" placeholder="Subject">
                                    </td>
                                    <td class="border border-gray-300 px-3 py-2">
                                        <input type="text" name="edits[{{ $index }}][filters_topics]" value="{{ $val('filters_topics') }}"
                                               class="w-full min-w-[80px] px-2 py-1 border rounded text-sm" placeholder="Topics">
                                    </td>
                                    <td class="border border-gray-300 px-3 py-2">
                                        <input type="text" name="edits[{{ $index }}][filters_language]" value="{{ $val('filters_language') }}"
                                               class="w-full min-w-[80px] px-2 py-1 border rounded text-sm" placeholder="e.g. English">
                                    </td>
                                    <td class="border border-gray-300 px-3 py-2">
                                        <input type="text" name="edits[{{ $index }}][category]" value="{{ $val('category') }}"
                                               class="w-full min-w-[80px] px-2 py-1 border rounded text-sm" placeholder="Category">
                                    </td>
                                    <td class="border border-gray-300 px-3 py-2">
                                        <input type="text" name="edits[{{ $index }}][group_name]" value="{{ $val('group_name') }}"
                                               class="w-full min-w-[80px] px-2 py-1 border rounded text-sm" placeholder="Group name">
                                    </td>
                                    <td class="border border-gray-300 px-3 py-2">
                                        <input type="url" name="edits[{{ $index }}][image]" value="{{ $val('image') }}"
                                               class="w-full min-w-[160px] px-2 py-1 border rounded text-sm" placeholder="https://...">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="codeweek-form-button-container">
                    <div class="codeweek-button">
                        <input type="submit" value="Import" class="bg-primary cursor-pointer px-6 py-3 rounded-full font-semibold text-[#20262C] hover:bg-hover-orange duration-300">
                    </div>
                </div>
            </form>
            <script>
                document.getElementById('resources-import-form').addEventListener('submit', function () {
                    var meta = document.querySelector('meta[name="csrf-token"]');
                    var tokenInput = this.querySelector('input[name="_token"]');
                    if (meta && tokenInput) tokenInput.value = meta.getAttribute('content');
                });
            </script>
        </section>
    </section>
@endsection
