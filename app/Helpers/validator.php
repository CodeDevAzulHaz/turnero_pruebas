<?php
class Validator {
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validatePassword($password) {
        return strlen($password) >= 8;
    }

    public static function sanitizeString($string) {
        return htmlspecialchars(strip_tags($string));
    }
}
