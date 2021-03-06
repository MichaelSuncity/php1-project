<?php

function getDb ()
{
    static $link = null;

    if (is_null($link)){
    $link = @mysqli_connect(HOST, USER, PASS, DB) or die ("Не могу соединиться с БД!" . mysqli_connect_error());
    }
    return $link;
}

function closeDb ()
{
    mysqli_close (getDb());
}

function executeQuery ($sql)
{
    $link = getDb();
    $result = @mysqli_query($link, $sql) or die (mysqli_error($link));
    return $result;
}

function getAssocResult ($sql)
{
    $link = getDb();
    $result = @mysqli_query($link, $sql) or die (mysqli_error($link));
    $array_result = [];
    while ($row = mysqli_fetch_assoc ($result))
        $array_result[] = $row;
    return  $array_result;
}