<?php
namespace app\middlewares;
use Flight;

class AuthMiddleware
{
    public function before($params)
    {
        if (!isset($_SESSION['user'])) {
            Flight::redirect("/");
            exit;
        }
    }
}