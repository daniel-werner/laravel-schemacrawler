<?php

use Illuminate\Support\Facades\Route;

Route::get('/schema', 'DanielWerner\LaravelSchemaCrawler\Http\Controllers\SchemaController@show')->name('schema.show');