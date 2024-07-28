<?php

namespace Laracore\LaravelAlgolia\Http\Controllers;

use Exception;
use Illuminate\Routing\Controller;
use Laracore\LaravelAlgolia\Services\AlgoliaService;
use Illuminate\Support\Facades\File;
use Algolia\AlgoliaSearch\SearchClient;
use Illuminate\Support\Facades\Log;

class AlgoliaController extends Controller
{
    protected $algoliaClient;

    public function __construct()
    {
        // $applicationId = config('laracore-algolia.application_id');
        // $adminKey = config('laracore-algolia.admin_key');
        // Log::info('AlgoliaController constructor'. $applicationId . ' ' . $adminKey);
        $this->algoliaClient = SearchClient::create(
            config('laracore-algolia.application_id'),
            config('laracore-algolia.admin_key')
        );
    }
 
    public function index()
    {
        return view('laracore-algolia::index');
    }

    public function settings()
    {
        $allModels = $this->listAllModels();
        $configs = config('laracore-algolia');
        $indexes = $this->getAllAloliaIndexes();
        // dd($indexes);
        return view('laracore-algolia::settings', compact('allModels', 'configs', 'indexes'));

    }

    // TODO:: move this to a service
    public static function listAllModels()
    {
        $modelsAndTables = [];
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
        return $modelsAndTables;
    }

    //Todo::move this to a service
    public function getAllAloliaIndexes()
    {
        try {
            $indexes = $this->algoliaClient->listIndices();

            // check if the indexes are empty
            if (empty($indexes['items'])) {
                throw new Exception('No indexes found');
            }
            return $indexes['items'];
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
 
}