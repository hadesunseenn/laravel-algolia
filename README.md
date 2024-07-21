# Laravel Algolia Indexer

Laravel Algolia Indexer is a Laravel package that simplifies the process of deploying models to an Algolia index based on user-defined configurations. This package provides an easy and efficient way to integrate Algolia search into your Laravel applications, allowing you to customize which models and attributes are indexed.


# Usage
## Publish the Configuration File
After installing the package, publish the configuration file using the following command:
```bash
 php artisan vendor:publish --provider="Laracore\LaravelAlgolia\LaravelAlgoliaServiceProvide" --tag="config"
```

This will create a __config/laracore-algolia.php__ file in your Laravel application.
# Features
- Seamless integration with Laravel models
- Customizable indexing configurations
- Support for various Algolia features and settings
- Easy setup and deployment

# Configuration
Explain how to configure the package to index specific models and attributes.


https://laraveldaily.com/lesson/create-laravel-package/dependencies-require-external-packages

https://github.com/spatie/package-skeleton-laravel
https://github.com/hadesunseenn/laravel-algolia
