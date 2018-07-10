<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Team;
use App\Http\Controllers\Controller;

class TeamController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $teams = Team::with('players')->get();
        $response = ['response' => ['success' => 'true', 'teams' => $teams]];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = \Validator::make($request->all(), [
                    'name' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            $response = [
                'response' => [
                    'success' => 'false',
                    'errors' => array_flatten($validator->messages()->toArray())
            ]];
            return response()->json($response,400);
        }

        $team = new Team();
        $team->name = $request->name;
        $result = $team->save();
        if (!$result) {
            $response = [
                'response' => [
                    'success' => 'false',
                    'error' => 'Sorry! something went wrong, try again'
                ]
            ];
        }
        $response = [
            'response'=>[
                'success' => 'true',
                'msg' => 'The team was added successfully'
            ]
        ];
        return response()->json($response);
    }

}
