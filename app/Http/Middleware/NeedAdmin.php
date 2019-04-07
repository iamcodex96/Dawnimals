<?php
namespace App\Http\Middleware;

use Closure;
use App;
use Auth;

class NeedAdmin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->admin) {
            return redirect('backend');
        }

        return $next($request);
    }
}
?>
