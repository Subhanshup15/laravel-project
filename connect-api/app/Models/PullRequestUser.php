<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class PullRequestUser extends Model
{
    public static function fetchUsers()
    {
        $response = Http::get('https://24pullrequests.com/users.json?page=2');

        if ($response->successful()) {
            return $response->json(); // returns array
        }

        return []; // return empty array if API fails
    }
}
