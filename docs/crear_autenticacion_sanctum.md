¡Claro! Vamos a crear un **sistema de registro y login usando Laravel Sanctum**, paso a paso. Te voy guiando en cada parte con explicaciones claras. Asumo que ya tienes PHP, Composer y Laravel instalados. Si no, dime y te ayudo con eso primero.

---

## 🧩 Paso 1: Crear un nuevo proyecto Laravel

```bash
composer create-project laravel/laravel proyecto-sanctum
cd proyecto-sanctum
```

---

## 🧩 Paso 2: Instalar Sanctum

```bash
composer require laravel/sanctum
```

Luego, publica su configuración:

```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

Y ejecuta las migraciones:

```bash
php artisan migrate
```

Esto crea la tabla `personal_access_tokens`, que es donde Sanctum guarda los tokens de acceso.

---

## 🧩 Paso 3: Configurar Sanctum

En el archivo `app/Http/Kernel.php`, añade esta línea al array `api` si no está ya:

```php
\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
```

Laravel Sanctum funciona bien para APIs que comparten dominio con el frontend (como una SPA con Vue o React), o puedes usarlo como una API con token.

---

## 🧩 Paso 4: Configurar el modelo `User`

Sanctum necesita que el modelo `User` use el trait `HasApiTokens`.

Abre `app/Models/User.php` y asegúrate de tener esto:

```php
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
}
```

---

## 🧩 Paso 5: Crear rutas de API para registro y login

Edita el archivo `routes/api.php`:

```php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    $token = $user->createToken('api_token')->plainTextToken;

    return response()->json([
        'user' => $user,
        'token' => $token,
    ]);
});

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Credenciales incorrectas'
        ], 401);
    }

    $token = $user->createToken('api_token')->plainTextToken;

    return response()->json([
        'user' => $user,
        'token' => $token,
    ]);
});
```

---

## 🧩 Paso 6: Ruta protegida con Sanctum

Agrega una ruta protegida con middleware `auth:sanctum`:

```php
Route::middleware('auth:sanctum')->get('/perfil', function (Request $request) {
    return $request->user();
});
```

---

## 🧪 Paso 7: Probar con Postman

1. **Registro**

   * Método: `POST`
   * URL: `http://localhost:8000/api/register`
   * Body (JSON):

     ```json
     {
       "name": "Juan",
       "email": "juan@example.com",
       "password": "123456"
     }
     ```

2. **Login**

   * Método: `POST`
   * URL: `http://localhost:8000/api/login`
   * Body (JSON):

     ```json
     {
       "email": "juan@example.com",
       "password": "123456"
     }
     ```

3. **Ruta protegida**

   * Método: `GET`
   * URL: `http://localhost:8000/api/perfil`
   * Headers:

     ```
     Authorization: Bearer TU_TOKEN
     ```

---

Importante crear 

cp .env.example .env

Crear el 

php artisan key:generate



Correr el proyecto en Laravel 

php artisan serve

Confirma listas de routers

php artisan route:list
