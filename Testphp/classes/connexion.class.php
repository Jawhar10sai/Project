<?php

class Connection
{

    public static function getConnection()
    {
        return new PDO('mysql:dbname=test;host=localhost', 'root', '');
    }
}
