

The JWT is used for authentication so plaese login and provide the given token in requests.

APIs Content-Type: application/json

API endpoint to login : /api/login with Post
Params: email (admin@gmail.com), password (123456)

API endpoint to add a team : /api/team Post
Params: name, token

API endpoint to add a player : /api/player Post
Params: team_id, first_name, last_name, token

API endpoint to update a player : /api/player Put
Params: player_id, first_name, last_name, token

API endpoint to get a team and its players : /api/team Get
Param: token
