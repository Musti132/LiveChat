<?php
if (! function_exists('json_response')) {
    function json_response(array $response, $status = 200) {
        return response()->json($response, $status);
    }
}
?>