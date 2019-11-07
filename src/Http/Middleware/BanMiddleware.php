<?php

namespace Torralbodavid\DuckFunkCore\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Torralbodavid\DuckFunkCore\Models\Arcturus\Bans;

class BanMiddleware
{
    private $currentTimestamp;
    private $ban;
    private $banRoute;

    public function handle($request, Closure $next)
    {
        $this->currentTimestamp = Carbon::now()->timestamp;
        $this->banRoute = Route::current()->getAction('as') == 'ban';

        if ($this->accountBan() || $this->ipBan() || $this->machineBan() || $this->superBan()) {
            if ($this->banRoute) {
                app()->instance('expulsion', $this->ban);
                app()->instance('user_session', Auth::user()->username);

                Auth::logout();

                return $next($request);
            } else {
                return redirect()->route('ban');
            }
        } elseif (! $this->accountBan() && $this->banRoute) {
            return redirect()->route('home');
        }

        return $next($request);
    }

    /*
     * Get the longest ban for an account ban type
     */
    private function accountBan(): bool
    {
        if (Auth::check()) {
            $ban = Bans::with('user')
                ->where('user_id', auth()->id())
                ->where('ban_expire', '>', $this->currentTimestamp)
                ->where('type', 'account')
                ->get()
                ->sortByDesc('ban_expire')
                ->first();

            if (! is_null($ban)) {
                $this->ban = $ban;

                return true;
            }
        }

        return false;
    }

    /*
     * Get the longest ban for an IP ban type
     */
    private function ipBan(): bool
    {
        if (Auth::check()) {
            $ban = Bans::with('user')
                ->where('ip', request()->ip())
                ->where('ban_expire', '>', $this->currentTimestamp)
                ->where('type', 'ip')
                ->get()
                ->sortByDesc('ban_expire')
                ->first();

            if (! is_null($ban)) {
                $this->ban = $ban;

                return true;
            }
        }

        return false;
    }

    /*
     * Get the longest ban for a machine ban type
     */
    private function machineBan(): bool
    {
        if (Auth::check()) {
            $ban = Bans::with('user')
                ->where('machine_id', Auth::user()->machine_id)
                ->where('ban_expire', '>', $this->currentTimestamp)
                ->where('type', 'machine')
                ->get()
                ->sortByDesc('ban_expire')
                ->first();

            if (! is_null($ban)) {
                $this->ban = $ban;

                return true;
            }
        }

        return false;
    }

    /*
     * Get the longest ban for a superban type
     */
    private function superBan(): bool
    {
        if (Auth::check()) {
            $ban = Bans::with('user')
                ->where('user_id', auth()->id())
                ->where('ban_expire', '>', $this->currentTimestamp)
                ->where('type', 'super')
                ->get()
                ->sortByDesc('ban_expire')
                ->first();

            if (! is_null($ban)) {
                $this->ban = $ban;

                return true;
            }
        }

        return false;
    }
}
