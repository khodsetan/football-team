<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Player;
use App\Team;

class PlayerController extends Controller {

    public function store(Request $request) {
        $validator = \Validator::make($request->all(), [
                    'team_id' => 'required',
                    'first_name' => 'required|max:255',
                    'last_name' => 'required|max:255'
                        ], [
                    'team_id.required' => 'The team_id is required',
                    'first_name.required' => 'The first_name is required',
                    'last_name.required' => 'The last_name is required'
        ]);
        if ($validator->fails()) {
            $response = [
                'response' => [
                    'success' => 'false',
                    'errors' => array_flatten($validator->messages()->toArray())
            ]];
            return response()->json($response, 400);
        }

        // Check if The team that has been request is exist
        $team = Team::find($request->team_id);
        if (!$team) {
            $response = [
                'response' => [
                    'success' => 'false',
                    'error' => "Sorry! The team not found."
            ]];
            return response()->json($response, 400);
        }

        $player = new Player([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ]);

        $result = $team->players()->save($player);
        if (!$result) {
            $response = [
                'response' => [
                    'success' => 'false',
                    'error' => 'Sorry! something went wrong, try again'
                ]
            ];
        }
        $response = [
            'response' => [
                'success' => 'true',
                'msg' => 'The Player was added successfully'
            ]
        ];
        return response()->json($response);
    }

    public function update(Request $request) {
        $validator = \Validator::make($request->all(), [
                    'player_id' => 'required',
                    'first_name' => 'required|max:255',
                    'last_name' => 'required|max:255'
                        ], [
                    'player_id.required' => 'The player_id is required',
                    'first_name.required' => 'The first_name is required',
                    'last_name.required' => 'The last_name is required'
        ]);
        if ($validator->fails()) {
            $response = [
                'response' => [
                    'success' => 'false',
                    'errors' => array_flatten($validator->messages()->toArray())
            ]];
            return response()->json($response, 400);
        }

        $player = Player::find($request->player_id);
        if (!$player) {
            $response = [
                'response' => [
                    'success' => 'false',
                    'error' => "Sorry! player not found"
            ]];
            return response()->json($response, 400);
        }

        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $result = $player->save();

        if (!$result) {
            $response = [
                'response' => [
                    'success' => 'false',
                    'error' => 'Sorry! something went wrong, try again'
                ]
            ];
        }
        $response = [
            'response' => [
                'success' => 'true',
                'msg' => 'The Player updated successfully'
            ]
        ];
        return response()->json($response);
    }

}
