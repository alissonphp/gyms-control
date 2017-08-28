<?php

abstract class TestCase extends Laravel\Lumen\Testing\TestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */

    protected function headers($user = null)
    {
        $headers = ['Accept' => 'application/json'];

        if (!is_null($user)) {
            $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user);
            $headers['Authorization'] = 'Bearer '.$token;
        }

        return $headers;
    }

    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }
}
