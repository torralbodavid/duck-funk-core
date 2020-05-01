<?php

namespace Torralbodavid\DuckFunkCore\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Torralbodavid\DuckFunkCore\Models\Arcturus\Ban;

class BanMiddleware
{
    private $currentTimestamp;
    private Ban $ban;
    private $banRoute;

    public function handle($request, Closure $next)
    {
        $this->currentTimestamp = Carbon::now()->timestamp;
        $this->banRoute = Route::current()->getAction('as') == 'ban';

        $accountBan = $this->isBanned();

        if ($accountBan) {
            if ($this->banRoute) {
                app()->instance('expulsion', $this->ban);
                app()->instance('user_session', core()->user()->username);

                Session::flush();

                return $next($request);
            } else {
                return redirect()->route('ban');
            }
        }

        if (! $accountBan && $this->banRoute) {
            return redirect()->route('welcome', [], 301);
        }

        return $next($request);
    }

    /*
     * Get the longest ban for an account or super ban type
     */
    private function isBanned(): bool
    {
        if (Auth::check()) {
            $ban = Ban::where(function ($q) {
                    $q->where('ban_expire', '>', $this->currentTimestamp)
                        ->where('user_id', core()->user()->id)
                        ->where('type', 'account');
                })
                ->orWhere(function ($q) {
                    $q->where('ban_expire', '>', $this->currentTimestamp)
                        ->where('user_id', core()->user()->id)
                        ->Where('type', 'super');
                })
                ->orWhere(function ($q) {
                    $q->where('ban_expire', '>', $this->currentTimestamp)
                        ->where('ip', request()->ip())
                        ->where('type', 'ip');
                })->orWhere(function ($q) {
                    $q->where('ban_expire', '>', $this->currentTimestamp)
                        ->where('machine_id', core()->user()->machine_id)
                        ->where('type', 'machine');
                })
                ->get()
                ->sortByDesc('ban_expire')
                ->first();

            if (!is_null($ban)) {
                $this->ban = $ban;

                return true;
            }
        }

        return false;
    }
}
