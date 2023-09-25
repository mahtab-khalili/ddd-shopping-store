<?php

use Illuminate\Pagination\Paginator;

if(!function_exists('responseApi')){
    function responseApi(
        string $status,
        string $message = null,
        array $data = null,
        int $code = 200
    ){
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}

if(!function_exists('pagination')){
    function pagination($data, $page = 1, $per_page = 20)
    {
        $data = $data->slice($per_page * ($page - 1));

        return new Paginator(
            $data,
            $per_page,
            $page
        );
    }
}