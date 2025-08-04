<?php

// API Specification for Real-Time Game Prototype Tracker

// Endpoints

// 1. Game Creation
/api/games
METHOD: POST
BODY: JSON
{
  "game_name": string (required),
  "game_description": string,
  "game_type": string (required) // e.g. FPS, RPG, etc.
}

// 2. Game Details
/api/games/:game_id
METHOD: GET
PARAMS: game_id (integer, required)
RETURNS: JSON
{
  "game_id": integer,
  "game_name": string,
  "game_description": string,
  "game_type": string,
  "created_at": timestamp,
  "updated_at": timestamp
}

// 3. Track Prototype Update
/api/games/:game_id/prototype
METHOD: PATCH
PARAMS: game_id (integer, required)
BODY: JSON
{
  "prototype_version": string (required),
  "prototype_changes": string,
  "prototype_screenshot": binary (optional)
}

// 4. Get Prototype History
/api/games/:game_id/prototype/history
METHOD: GET
PARAMS: game_id (integer, required)
RETURNS: JSON
[
  {
    "prototype_version": string,
    "prototype_changes": string,
    "prototype_screenshot": string (URL),
    "created_at": timestamp
  }
]

// 5. Delete Game
/api/games/:game_id
METHOD: DELETE
PARAMS: game_id (integer, required)

// Error Handling

// 400 Bad Request
{
  "error": "Invalid request"
}

// 401 Unauthorized
{
  "error": "Unauthorized access"
}

// 404 Not Found
{
  "error": "Resource not found"
}

// 500 Internal Server Error
{
  "error": "Internal server error"
}

?>