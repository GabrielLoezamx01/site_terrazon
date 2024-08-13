<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ReferralsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Obtener el valor de 'refe_id' de la sesión
        $refeId = $request->session()->get('refe_id');

        // Verificar si 'refe_id' es válido (aquí puedes agregar una verificación más rigurosa según tu lógica)
        if ($refeId && $this->isValidRefeId($refeId)) {
            // Si 'refe_id' es válido, permite que la solicitud continúe
            return $next($request);
        }

        // Registrar el intento fallido
        Log::warning('Invalid referral session attempt', ['refe_id' => $refeId]);

        // Si 'refe_id' no es válido, devolver un error
        return response()->json(['error' => 'Invalid referral session'], 403);
    }

    /**
     * Verifica si el 'refe_id' es válido.
     *
     * @param  mixed  $refeId
     * @return bool
     */
    protected function isValidRefeId($refeId)
    {
        // Implementa tu lógica de validación aquí. Por ejemplo, verifica en la base de datos.
        // return YourModel::where('id', $refeId)->exists();

        // Para fines de demostración, supondremos que el 'refe_id' debe ser un entero positivo.
        return is_numeric($refeId) && $refeId > 0;
    }
}
