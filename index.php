<?php

if (preg_match('~/$|\.php$~', $_SERVER['REQUEST_URI'])) {
    header("location: web/");
} else {
    header("location: ". basename($_SERVER['REQUEST_URI']) .'/web/');
}
