<?php

if (! function_exists('media')) {
    function media($file) {
        return rtrim(env('MEDIA_DIRECTORY_URL'), '/').'/'.ltrim($file, '/');
    }
}
