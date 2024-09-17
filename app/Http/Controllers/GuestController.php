<?php

namespace App\Http\Controllers;

use App\Debuger;
use App\Http\Requests\GuestCreateRequest;
use App\Http\Requests\GuestUpdateRequest;
use App\Models\Guest;
use App\Services\GuestService;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function list()
    {
        return $this->response(Guest::all());
    }

    public function create(GuestCreateRequest $request, GuestService $guestService)
    {
        if ($guest = $guestService->create($request->validated())) {
            return $this->response(['result' => $guest]);
        }
        return $this->response(['error' => 'Guest not created'], 500);
    }

    public function update($id, GuestUpdateRequest $request, GuestService $guestService)
    {
        $data = $request->validated();

        if (empty($data)) {
            return $this->response(['error' => 'Bad request'], 401);
        }

        return $this->response(['result' => $guestService->update($id, $data)]);
    }

    public function get($id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return $this->response(['error' => 'Guest not found'], 404);
        }

        return $this->response($guest);
    }

    public function delete($id, GuestService $guestService)
    {
        return $this->response(['result' => Guest::destroy($id)]);
    }

    public function response(mixed $data, int $code = 200)
    {
        $debuger_final = Debuger::getInstance()->getFinalResults();
        return response()->json($data, $code)->header('X-Debug-Time', $debuger_final['run_time'] . ' ms')->header(
            'X-Debug-Memory',
            $debuger_final['memory_usage'] . ' kb'
        );
    }
}
