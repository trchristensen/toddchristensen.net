<?php

namespace App\MediaLibrary;

use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Log;

class CustomPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        $siteName = env('APP_NAME', 'm');
        $modelInstance = app($media->model_type); // Create an instance of the model
        $modelName = $modelInstance->getTable();
        $modelId = $media->model_id; // Using the model's ID instead of the media ID

        $path = "{$siteName}/{$modelName}/{$modelId}/";

        Log::info('Generated path: ' . $path);

        return $path;
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media) . 'conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . 'responsive-images/';
    }
}