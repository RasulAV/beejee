<?php

namespace App;

use App\Models\User;

/**
 * Authentication
 *
 * PHP version 7.3
 */
class Auth
{
    /**
     * Login the user
     *
     * @param User $user The user model
     *
     * @return void
     */
    public static function login($user)//($user, $remember_me)
    {
        session_regenerate_id(true);

        $_SESSION['user_id'] = $user->id;
	
    }

    /**
     * Logout the user
     *
     * @return void
     */
    public static function logout()
    {
        // Unset all of the session variables
        $_SESSION = [];

        // Destroy the session
        session_destroy();
    }

    /**
     * Get the current logged-in user, from the session 
     *
     * @return mixed The user model or null if not logged in
     */
    public static function getUser()
    {
        if (isset($_SESSION['user_id']))  return User::findByID($_SESSION['user_id']);  

    }
}