<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait RespondsWithHttpStatus
{
    protected function success($message='The operation has been completed successfully', $data = [], $status = Response::HTTP_OK)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], $status);
    }

    protected function successWithPagination($message='The operation has been completed successfully', $data = [], $status = Response::HTTP_OK)
    {
        $meta = [
            'total' => $data->total(),
            'per_page' => $data->perPage(),
            'current_page' => $data->currentPage(),
            'last_page' => $data->lastPage(),
            // Add any additional meta information you need
        ];

        $links = [
            'prev' => $data->previousPageUrl(),
            'next' => $data->nextPageUrl(),
            // Add any additional links you need
        ];
        return response([
            'success' => true,
            'data' => $data->items(),
            'links' => $links,
            'meta' => $meta,
            'message' => $message,
        ], $status);
    }

    protected function successWithPaginationResource($message='The operation has been completed successfully', $data = [], $status = Response::HTTP_OK)
    {
        // Access the paginator instance from the resource collection
        $paginator = $data->resource;

        // Retrieve meta and links information
        $meta = [
            'total' => $paginator->total(),
            'per_page' => $paginator->perPage(),
            'current_page' => $paginator->currentPage(),
            'last_page' => $paginator->lastPage(),
            // Add any additional meta information you need
        ];

        $links = [
            'prev' => $paginator->previousPageUrl(),
            'next' => $paginator->nextPageUrl(),
            // Add any additional links you need
        ];

        return response([
            'success' => true,
            'data' => $data,
            'links' => $links,
            'meta' => $meta,
            'message' => $message,
        ], $status);
    }

    protected function failure($message, $status = Response::HTTP_BAD_REQUEST)
    {
        return response([
            'success' => false,
            'message' => $message,
        ], $status);
    }

    protected function validationFailure($errors, $status = Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        return response([
            'message' => "The given data was invalid.",
            "errors" => $errors
        ], $status);
    }


    public function notFound($message='this record not found',$status = Response::HTTP_NOT_FOUND)
    {
        return response([
            'status' => false,
            'message' => $message,
        ],$status);
    }
}
