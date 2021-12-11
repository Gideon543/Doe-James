<?php
namespace controllers;
    class Validation{
        //Track number of errors
        public static $totalErrors;

        //Ensures that user's inputs are not empty
        public function checkEmptyFields($field){
            if(empty($field)){
                GLOBAL $totalErrors;
                $emptyFieldError = "Required field!"; 
                $totalErrors += 1;
                return $emptyFieldError;
            }
        }

        //Checks user email for the right format
        public function checkEmail($email){
            GLOBAL $totalErrors;
            if(empty($email)){
                $email_error = "Required field!"; 
                $totalErrors += 1;
                return $email_error;
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_error = "Incorrect email format!";
                    $totalErrors += 1;
                    return $email_error;
                }
            }
        }

        //Ensure users' passwords are strong by requiring special characters, digits etc.
        public function checkPassword($password){
            GLOBAL $totalErrors;
            if(empty($password)){
                $password_error = "Required field!";
                $totalErrors += 1;
                return $password_error;
            } else {
                $match = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,})/";
                if (!preg_match($match, $password)) {
                    $password_error = "Weak password. include lowercase, uppercase and special characters";
                    $totalErrors += 1;
                    return $password_error;
                }
            }
        }

        //Ensure that user passworad is accurate
        public function comparePasswords($password,$confirmPassword){
            GLOBAL $totalErrors;
            if(empty($confirmPassword)){
                $con_password_error = "Required field!";
                $totalErrors += 1;
                return $con_password_error;
            } elseif($password != $confirmPassword) {
                $con_password_error = "Passwords do not match! Try again. ";
                $totalErrors += 1;
                return $con_password_error;
            }
        }

        //Return the number of errors
        public function getErrorCount(){
            GLOBAL $totalErrors;
            return $totalErrors;
        }
    }









?>