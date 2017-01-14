<?php defined('SYSPATH') or die('No direct script access.');

class Model_Users extends Model {

    // Все новости
    public function all_users()
    {
        $query=DB::query(Database::SELECT,'SELECT *FROM users');
        return $query->execute();
    }
}