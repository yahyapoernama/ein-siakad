<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string', // Validasi Kolom Username / Email
            'password' => 'required|string',
        ]);

        // Lakukan Pengecekan, Jika Inputan dari Username Berformat Email, maka Autentikasinya Email, Selain itu menggunakan Username
        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    
        // Masukkan Request Username dan Password ke dalam array, dengan kolom dinamis (username / email) berdasarkan pengecekan di atas
        $login = [
            $loginType => $request->username,
            'password' => $request->password
        ];
    
        // Login
        if (auth()->attempt($login)) {
            // Ambil data yang nantinya disimpan melalui session
            $data = DB::table('users')
                ->where('email', $request->username)
                ->orWhere('username', $request->username)
                ->first();
            $user_info['name'] = $data->name;
            $user_info['email'] = $data->email;
            $user_info['username'] = $data->username;
            $user_info['role'] = $data->role;
            Session::forget('user_info');
            Session::put('user_info', $user_info);
            if (in_array($data->role, ['Superadmin', 'Admin'])) {
                return redirect()->route('admin.home');
            }
            return redirect('/');
        }

        // Jika salah maka akan kembali ke halaman login dengan pesan error
        return redirect('/login')->with(['error' => 'Username dan Password tidak cocok!']);
    }
}
