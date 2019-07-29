<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use Throwable;
use RuntimeException;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Cache\CacheManager;
use Illuminate\Database\DatabaseManager;
use Illuminate\Session\Store as SessionStore;
use Illuminate\Contracts\Routing\ResponseFactory;

class StatusController extends Controller
{
    /**
     * @param ResponseFactory $factory
     * @param SessionStore    $session_store
     * @param CacheManager    $cache_manager
     * @param DatabaseManager $database_manager
     *
     * @return JsonResponse
     */
    public function status(ResponseFactory $factory,
                           SessionStore $session_store,
                           CacheManager $cache_manager,
                           DatabaseManager $database_manager): JsonResponse
    {
        try {
            // Check cache working
            $cache_manager->store()->set($key = Str::random(), $value = Str::random(), 3);

            if ($cache_manager->store()->get($key) !== $value) {
                throw new RuntimeException('Cache does not works as expected', 510);
            }

            // Check sessions storage
            $session_store->put($key = Str::random(), $value = Str::random());

            if ($session_store->get($key) !== $value) {
                throw new RuntimeException('Sessions storage does not works as expected', 520);
            }

            // Check default database connection
            if ($database_manager->connection()->unprepared('SELECT 1') !== true) {
                throw new RuntimeException('Database does not works as expected', 530);
            }
        } catch (Throwable $e) {
            return $factory->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
                'code'    => $e->getCode(),
            ], 500);
        }

        return $factory->json([
            'status' => 'ok',
            'code'   => 0,
        ], 200);
    }
}
