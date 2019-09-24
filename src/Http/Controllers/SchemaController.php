<?php
/**
 * Created by PhpStorm.
 * User: vernerd
 * Date: 2019-09-24
 * Time: 20:07
 */

namespace DanielWerner\LaravelSchemaCrawler\Http\Controllers;


use DanielWerner\LaravelSchemaCrawler\Facades\SchemaCrawler;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SchemaController extends Controller
{
    public function show(Request $request)
    {
        SchemaCrawler::crawl();
        response()->file('schema.pdf');
    }
}