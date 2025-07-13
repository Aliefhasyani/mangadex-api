<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;  
use Illuminate\Http\Request;
class ApiController extends Controller
{
    public function getAllManga() {
        
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://api.mangadex.org/manga', [
            'limit' => 15,
            'includes[]' => 'cover_art', 
        ]);

        $mangas = $response->json();


        foreach ($mangas['data'] as &$manga) {
            $manga['cover_url'] = $this->getCoverUrl($manga);
        }

        return view('home', compact('mangas'));
    }

    public function getCoverUrl($manga) {
        foreach ($manga['relationships'] as $rel) {
            if ($rel['type'] === 'cover_art') {
                $fileName = $rel['attributes']['fileName'] ?? null;
                $mangaId = $manga['id'];
                if ($fileName) {
                    return "https://uploads.mangadex.org/covers/{$mangaId}/{$fileName}.256.jpg";
                }
            }
        }
        return null;
    }

    public function getChapter($mangaId){

        $chapterList = Http::withOptions([
            'verify' => false,
        ])->get('https://api.mangadex.org/chapter', [
            'manga' => $mangaId,
            'translatedLanguage[]' => 'en',
            'limit' => 55, 
            'order[chapter]' => 'asc',
        ])->json();

   
        $chapterId = $chapterList['data'][0]['id'];

        $chapterResponse = Http::withOptions([
            'verify' => false,
        ])->get("https://api.mangadex.org/at-home/server/{$chapterId}")->json();

        $server = $chapterResponse['baseUrl'];
        $hash = $chapterResponse['chapter']['hash'];
        $images = $chapterResponse['chapter']['data'];

        $pageUrls = array_map(function ($fileName) use ($server, $hash) {
            return "{$server}/data/{$hash}/{$fileName}";
        }, $images);

        return view('mangaRead', [
            'pages' => $pageUrls,
        ]);
    }


}
