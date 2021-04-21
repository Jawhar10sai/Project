<?php

class Connection
{

    public static function getConnection()
    {
        return new PDO('mysql:dbname=questionnaire;host=localhost', 'root', '');
    }
}
