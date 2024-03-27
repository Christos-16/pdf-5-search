<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
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
        $foundFile = null;
        $numPages = null;
        $filename = null;
        $error = null;
        $fileNotFound = null;

        if ($request->isMethod('post')) {
            $filename = $request->input('filename');
            $filePath = "public/{$filename}.pdf";

            if (Storage::exists($filePath)) {
                try {
                    $pdf = $this->parser->parseFile(storage_path("app/{$filePath}"));
                    $numPages = count($pdf->getPages());
                    $foundFile = asset("storage/{$filename}.pdf");
                } catch (Exception $e) {
                    $error = 'Failed to parse PDF. Please try again.';
                }
            } else {
                $fileNotFound = 'No file found with that name. Please try again.';
            }
        }

        return view('search_results', compact('foundFile', 'numPages', 'filename', 'error', 'fileNotFound'));
    }
}
