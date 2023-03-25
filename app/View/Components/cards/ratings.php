<?php

namespace App\View\Components\cards;

use App\Models\song_ratings as SongRating;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ratings extends Component
{
    public $average_rating;
    public $ratings_last_30_days;
    public $percentage;
    public $total_ratings;
    public $grow = true;
    public function __construct()
    {

        $this->total_ratings = SongRating::count();
        $this->average_rating = round(SongRating::average('rating'), 2);
        $this->ratings_last_30_days = SongRating::where('created_at', '>=', now()->subDays(30))->count();
        $ratings_previous_30_days = SongRating::whereBetween('created_at', [now()->subDays(60), now()->subDays(30)])->count();

        $growth = $this->ratings_last_30_days - $ratings_previous_30_days;
        $this->percentage = ($growth / max(1, $ratings_previous_30_days)) * 100;
        $this->percentage = number_format((float)$this->percentage, 2, '.', '');
        $this->percentage = 100;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.ratings');
    }
}
