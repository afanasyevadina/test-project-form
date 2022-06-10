<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function json()
    {
        if(!file_exists(storage_path('app/applications.json')))
            file_put_contents(storage_path('app/applications.json'), json_encode([]));
        return response()->download(storage_path('app/applications.json'), 'applications.json');
    }

    public function csv()
    {
        if(!file_exists(storage_path('app/applications.csv')))
            file_put_contents(storage_path('app/applications.csv'), '');
        return response()->download(storage_path('app/applications.csv'), 'applications.csv');
    }
}
