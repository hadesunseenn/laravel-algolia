<?php

namespace Laracore\LaravelAlgolia\Services;

use Exception;
use Illuminate\Support\Facades\File;

class AlgoliaService
{
    public static function listAllModels()
    {
        // get list of all models in app
        // Path to the models directory
        $modelsPath = app_path('Models');
        
        // Check if models directory exists
        if (!File::exists($modelsPath)) {
            throw new Exception('Models directory not found!');
        }

        // Get all model files
        $modelFiles = File::allFiles($modelsPath);

        $modelsAndTables = [];

        foreach ($modelFiles as $file) {
            // Get the class name from the file path
            $class = 'App\\Models\\' . str_replace(['/', '.php'], ['\\', ''], $file->getRelativePathname());
            
            if (class_exists($class)) {
                $model = new $class;
                if (method_exists($model, 'getTable')) {
                    $table = $model->getTable();
                    $modelsAndTables[] = [
                        'model' => $class,
                        'table' => $table
                    ];
                } else {
                    throw new Exception("Model: $class does not have a getTable method");
                }
            } else {
                throw new Exception("Class $class does not exist");
            }
        }
    }
}
