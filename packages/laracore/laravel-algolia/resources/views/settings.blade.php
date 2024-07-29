@extends('laracore-algolia::layouts.app')
 
@section('content')
<div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Settings</h1>
        </div>
    </div>
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <h2 class="text-l font-semibold text-gray-900">Config</h2>
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Key
                            </th>
                            <th scope="col"
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Value
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($configs as $key => $value)
                            <tr>
                                <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-900 sm:pl-6 border-r border-gray-200">
                                    {{ $key }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-900 sm:pl-6 border-r border-gray-200">
                                    {{ $value }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <h2 class="text-l mt-3 font-semibold text-gray-900">Model</h2>            
                <div class="overflow-hidden  shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Models
                            </th>
                            <th scope="col"
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Table
                            </th>
                            <!-- <th scope="col"></th> -->
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($allModels as $model)
                            <tr>
                                <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-900 sm:pl-6 border-r border-gray-200">
                                    {{ $model['model'] }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-900 sm:pl-6 border-r border-gray-200">
                                    {{ $model['table'] }}
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>

                <h2 class="text-l mt-3 font-semibold text-gray-900">Algolia Indexes</h2>
                <div class="overflow-hidden  shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Indexes
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($indexes as $index)
                            <tr>
                                <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-900 sm:pl-6 border-r border-gray-200">
                                        {{ $index['name'] }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection