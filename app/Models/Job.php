<?php
namespace App\Models;
class Job
{
    public static function all()
    {
        return [
            ["title" => "software engineer", 'salary' => 100000,],
            ["title" => "data scientist", 'salary' => 120000,],
        ];
    }
}
