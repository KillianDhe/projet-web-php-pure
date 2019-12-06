<?php


class Validation {

    /**
     * Enlève les possibles
     * injections XSS
     *
     * @param string $string
     * @return string
     */
    public static function purify(string $string) {
        $string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
        $string = filter_var($string, FILTER_SANITIZE_STRING);
        return $string;
    }


    /**
     * Vérifie si la valeur
     * est un int
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isInt($value) {
        return filter_var($value, FILTER_VALIDATE_INT);
    }

    /**
     * Vérifie si la valeur
     * est un float
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isFloat($value) {
        return filter_var($value, FILTER_VALIDATE_FLOAT);
    }

    /**
     * Valide si c'est une
     * lettre de l'alphabet + espace et "-"
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isAlpha($value) {
        return preg_match("/^[a-zA-Z -]+$/", $value);
    }

    /**
     * Verifie sir la valeur
     * est  une lettre oou un nombre
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isAlphaNum($value) {
        return preg_match("/^[a-zA-Z0-9]+$/", $value);
    }

    /**
     * Verifie si c'est
     * un email
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isEmail($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Verifie si c'est
     * un mot de passe valide
     * suivant le regex suivant
     * entre 8 et 20 caractères avec au moin une minuscule une majuscule et un chiffre
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isValidPassword($password) {
        return filter_var($password, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$"]]);
    }
}