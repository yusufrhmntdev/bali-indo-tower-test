<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Models\News;
use App\Events\NewsCreated;
use App\Events\NewsDeleted;
use App\Events\NewsUpdated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Repository\NewsRepository;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
        
    }
    public function index()
    {
        //
        $news =  $this->newsRepository->getAll();
        return response([
            "success" => true,
            "data" => New NewsResource($news),
            "message" => "Get Data successfully.",
        ], 200);
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
    public function store(Request $request)
    {
        //

        if(!Auth::user()->hasRole('admin'))
        {
            return response([
                "success" => true,
                "message" => "User Not Access.",
            ], 403);
        }
        $news =  $this->newsRepository->create($request->all());
      

        return response([
            "success" => true,
            "data" => New NewsResource($news),
            "message" => "Save News Data successfully.",
        ], 201);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        if(!Auth::user()->hasRole('user'))
        {
            return response([
                "success" => true,
                "message" => "User Not Access.",
            ], 403);
        }
        $news =  $this->newsRepository->getById($id);
        if (!$news) {
            return response([
                "success" => false,
                "message" => "Data Not Found"
            ], 404);
        }
        return response([
            "success" => true,
            "data" => New NewsResource($news),
            "message" => "Get  List News Data successfully.",
        ], 200);
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
        if(!Auth::user()->hasRole('admin'))
        {
            return response([
                "success" => true,
                "message" => "User Not Access.",
            ], 403);
        }
        $news =  $this->newsRepository->update($id, $request->all());
        if (!$news) {
            return response([
                "success" => false,
                "message" => "Data Not Found"
            ], 404);
        }
        return response([
            "success" => true,
            "data" => New NewsResource($news),
            "message" => "Update News Data successfully.",
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        if(!Auth::user()->hasRole('admin'))
        {
            return response()->json([
                "success" => false,
                "message" => "User Not Access.",
            ], 403);
        }
        $news =  $this->newsRepository->delete($id);
        if (!$news) {
            return response()->json([
                "success" => false,
                "message" => "Data Not Found.",
                "data" => $news
            ], 404);
        }

 
        return response([
            "success" => true,
            "message" => "News deleted successfully.",
        ], 200);
    }
}
