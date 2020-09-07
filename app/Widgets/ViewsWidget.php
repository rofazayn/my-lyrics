<?php

namespace App\Widgets;
use App\Song;

use Arrilot\Widgets\AbstractWidget;

class ViewsWidget extends AbstractWidget
{

    public $reloadTimeout = 1;
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'id'=>1
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $songs=Song::all();

        return view('widgets.views_widget', [
            'config' => $this->config,
            'songs' =>$songs
        ]);
    }
}
