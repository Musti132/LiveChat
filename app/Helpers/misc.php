<?php
if (! function_exists('json_response')) {
    function json_response($response, int $status = 200) {
        return response()->json($response, $status);
    }
}
?>