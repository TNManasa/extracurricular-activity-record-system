<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Khill\Lavacharts\Volcano;
use Khill\Lavacharts\Symfony\Bundle;
use Khill\Lavacharts\Laravel;
use Khill\Lavacharts\Configs\UIs;


class ReportsController extends Controller
{
    public function getBarCharts()
    {
//        $lava = new Lavacharts; // See note below for Laravel

        $reasons = Lava::DataTable();

        $reasons->addStringColumn('Reasons')
            ->addNumberColumn('Percent')
            ->addRow(['Check Reviews', 5])
            ->addRow(['Watch Trailers', 2])
            ->addRow(['See Actors Other Work', 4])
            ->addRow(['Settle Argument', 89]);

        $chart = Lava::DonutChart('IMDB', $reasons, [
            'title' => 'Reasons I visit IMDB'
        ]);

        
        return view('reports.graphs_sports', [
            'chart' => $chart
        ]);
    }
}
