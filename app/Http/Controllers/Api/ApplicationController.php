<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use App\Models\Factories\CsvSaverFactory;
use App\Models\Factories\DatabaseSaverFactory;
use App\Models\Factories\JsonSaverFactory;
use App\Models\Factories\MailSaverFactory;

class ApplicationController extends Controller
{
    public function index()
    {
        return ApplicationResource::collection(Application::latest()->paginate(5));
    }

    public function store(ApplicationRequest $request)
    {
        $content = $request->validated();
        $factories = [
            DatabaseSaverFactory::class,
            JsonSaverFactory::class,
            CsvSaverFactory::class,
            MailSaverFactory::class,
        ];
        foreach ($factories as $factory) {
            (new $factory())->getSaver()->save($content);
        }
        return ApplicationResource::make($content);
    }
}
