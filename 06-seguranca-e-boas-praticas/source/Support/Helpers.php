<?php

use Source\Core\Connect;


/**
 * ####################
 * ###   VALIDATE   ###
 * ####################
 */


 function is_email(string $email): bool 
 {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
 }

 function is_passwd(string $password):bool
 {
    return (mb_strlen($password) >= CONF_PASSWD_MIN_LEN && mb_strlen($password) <= CONF_PASSWD_MAX_LEN ? true : false);
 }

 function passwd(string $password): string 
 {
     return password_hash($password, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
 }

 function passwd_verify(string $password, string $hash): bool
 {
     return password_verify($password, $hash);
 }

 function passwd_rehash(string $hash): bool
 {
     return password_needs_rehash($hash, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
 }


/**
 * ##################
 * ###   STRING   ###
 * ##################
 */


function str_slug(string $string): string
{
    $string = filter_var(strtolower($string), FILTER_SANITIZE_STRIPPED) ;
    $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

    $slug = str_replace(
        ["-----", "----", "---", "--"],
        "-",
            str_replace(
                " ", 
                "-", 
                    trim(strtr(utf8_decode($string), utf8_decode($formats), $replace)))
    );

    return $slug;
}

function str_studly_case(string $string): string 
{
    $studlyCase = str_replace(" ", "", mb_convert_case(str_replace("-", " ", str_slug($string)), MB_CASE_TITLE));


    return $studlyCase;
}

function str_camel_case(string $string): string 
{
    return lcfirst(str_studly_case($string));
}

function str_title(string $string): string
{
    return mb_convert_case(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS), MB_CASE_TITLE);
}

function str_limit_words(string $string, int $limit, string $pointer = "..."): string
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    $arrayWords = explode(" ", $string);
    $numWords = count($arrayWords);

    if ($numWords < $limit) {
        return $string;
    }else {
        $words = implode(" ", array_slice($arrayWords, 0, $limit));
        return "{$words}{$pointer}";
    }

}

function str_limit_chars(string $string, int $limit, $pointer = "..."): string 
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    if (mb_strlen($string) <= $limit) {
        return $string;
    }

    $chars = mb_substr($string, 0, mb_strrpos(mb_substr($string, 0, $limit), " "));

    return "{$chars}{$pointer}";
}


/**
 * ######################
 * ###   NAVIGATION   ###
 * ######################
 */


 function url(string $path): string
 {
    return CONF_URL_BASE . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
 }

 function redirect(string $url):void
 {
    header("HTTP/1.1 302 Redirect");
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: {$url}");
        exit;
    }

    $location = url($url);
    header("Location: {$location}");
    exit;
 }


/**
 * ################
 * ###   CORE   ###
 * ################
 */


 /**
  * @return PDO
  */
function db(): PDO
{
    return \Source\Core\Connect::getInstance();
}

  /**
 * @return \Source\Core\Message
 */
 function message(): \Source\Core\Message
 {
    return new \Source\Core\Message();
 }

 /**
 * @return \Source\Core\Session
 */
 function session(): \Source\Core\Session
 {
    return new \Source\Core\Session();
 }


/**
 * #################
 * ###   MODEL   ###
 * #################
 */


/**
 * @return \Source\Models\User
 */
 function user(): \Source\Models\User
 {
     return new \Source\Models\User();
 }