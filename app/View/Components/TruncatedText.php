<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TruncatedText extends Component
{
    public $text;
    public $limit;
    public $link;

    public function __construct($text, $limit = 100, $link = '#')
    {
        $this->text = $text;
        $this->limit = $limit;
        $this->link = $link;
    }

    public function render()
    {
        return view('components.truncated-text');
    }
}
