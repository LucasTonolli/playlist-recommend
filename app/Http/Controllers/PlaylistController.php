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
        $playlists = $this->playlistService->get();
        return view('playlist.index', compact('playlists'));
    }

    public function home()
    {
        $playlist = $this->playlistService->getRandom();
        return view('page.home', ['playlist' => $playlist]);
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
            return response()->json($playlist);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $playlist = $this->playlistService->get($id);
            return response()->json($playlist);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

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
        $playlists = $this->playlistService->getPlaylists($term);

        return view('playlist.search', compact('playlists'));
    }
}
