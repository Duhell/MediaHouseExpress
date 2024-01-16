<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __invoke(){
        $latestEpisode = \App\Models\Episode::orderBy('created_at', 'desc')->first() ?? null;
        $episodes = \App\Models\Episode::orderBy('created_at', 'desc')->skip(1)->take(3)->get();

        if($latestEpisode != null){
            $latestEpisode = $this->extractYoutubeID($latestEpisode->yt_url);
        }

        foreach($episodes as $episode){
            $episode->yt_url = $this->extractYoutubeID($episode->yt_url);
        }
        return view('landing')
            ->with('episodes',$episodes)
            ->with('latest_episode',$latestEpisode);
    }

    private function extractYoutubeID($url){
        parse_str(parse_url($url, PHP_URL_QUERY), $params);
        return $params['v'];
    }
}
