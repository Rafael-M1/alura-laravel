<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticator;
use App\Http\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $repository) {
        $this->middleware(Authenticator::class)->except("index");
    }

    public function index(Request $request)
    {
        Debugbar::info("Entrando na view index");
        $series = Series::with(["seasons"])->get();
        $mensagemSucesso = session("mensagem.sucesso");
        return view("series.index")->with("series", $series)->with("mensagemSucesso", $mensagemSucesso);
    }

    public function create(Request $request)
    {
        return view("series.create");
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = $this->repository->add($request);
        return to_route("series.index")->with("mensagem.sucesso", "Série '{$serie->nome}' cadastrada com sucesso");
    }

    public function destroy(Series $series)
    {
        $series->delete();
        return to_route('series.index')->with("mensagem.sucesso", "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Series $series, Request $request)
    {
        // return to_route('series.index')->with("mensagem.sucesso", "Série '{$series->nome}' alterada com sucesso");
        return view("series.edit")->with("serie", $series);
    }

    public function update(Series $series, Request $request)
    {
        $series->nome = $request->nome;
        $series->save();
        return to_route('series.index')->with("mensagem.sucesso", "Série '{$series->nome}' alterada com sucesso");
    }
}
