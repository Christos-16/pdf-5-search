<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Smalot\PdfParser\Parser;
use Exception;

class PdfController extends Controller
{
    private $parser;

    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    public function search(Request $request)
    {
        $foundFiles = [];
        $numPages = null;
        $filename = null;
        $error = null;

        if ($request->isMethod('post')) {
            $searchTerm = $request->input('filename');
            $files = Storage::files('public'); // Get all files in the 'public' directory

            // Filter files whose names start with the input
            foreach ($files as $file) {
                if (Str::startsWith(basename($file, '.pdf'), $searchTerm)) {
                    try {
                        $pdf = $this->parser->parseFile(storage_path("app/{$file}"));
                        $numPages = count($pdf->getPages());
                        $foundFiles[] = ['url' => asset("storage/" . basename($file)), 'numPages' => $numPages];
                    } catch (Exception $e) {
                        $error = 'Failed to parse PDF: ' . $e->getMessage();
                        break;
                    }
                }
            }

            if (empty($foundFiles)) {
                $error = 'No file found starting with that name. Please try again.';
            }
        }

        return view('search_results', compact('foundFiles', 'error'));
    }
}
