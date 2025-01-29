<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaylistPostRequest;
use App\Services\PlaylistService;
use Illuminate\Http\Request;

use function Illuminate\Log\log;

class PlaylistController extends Controller
{

    public function __construct(private PlaylistService $playlistService) {}
    public function index()
    {
        $term = filter_input(INPUT_GET, 'term');
        $title = 'Playlists adicionadas';
        $playlists = $this->playlistService->get($term);
        return view('playlist.index', compact('playlists', 'title'));
    }

    public function home()
    {
        $title = 'Página inicial';
        $playlist = $this->playlistService->getRandom();
        return view('page.home', compact('title', 'playlist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlaylistPostRequest $request)
    {
        try {

            $playlist = $this->playlistService->createPlaylist($request->validated());

            return back()
                ->with('success', 'Playlist adicionada com sucesso!')
                ->with('playlist', $playlist);
        } catch (\Exception $e) {
            return back()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {

        $term = $request->input('term');
        $page = $request->input('page') ?? 1;
        $playlists = $term ? $this->playlistService->getPlaylists($term, $page) : (object)[
            'items' => [],
            'pagination' => []
        ];
        $title = 'Buscar playlist';
        return view('playlist.search', compact('playlists', 'title'));
    }
}
