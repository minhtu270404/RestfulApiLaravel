<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\v2\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;
use function Laravel\Prompts\password;


class AdminAuthController extends Controller
{
    public function __construct(
        protected UserRepository $userRepository
    ) {
    }
    public function GoogleLogin()
    {
        return Socialite::driver('google')
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $googleAccountUser = Socialite::driver('google')->user();
            $emailGoogle = $googleAccountUser->getEmail();
            $avatarGoogle = $this->downloadGoogleAvatar($googleAccountUser->getAvatar());
            $user = $this->userRepository->findByField('email', $emailGoogle)->first();
            //chua login bao gio va chua co du lieu thi tao moi
            if (!$user) {
                $user=$this->userRepository->create([
                    'name' => $googleAccountUser->getName(),
                    'email' => $emailGoogle,
                    'google_id'=> $googleAccountUser->getId(),
                    'password' => Hash::make('12345678'),
                    'avatar' => $avatarGoogle,
                    'check_first_login' => 1,
                ]);
            } else {
                $updateData = [];

                if(empty($user->google_id))
                {
                    $updateData['google_id'] = $googleAccountUser->getId();
                }

                if($avatarGoogle){
                 $updateData['avatar'] = $avatarGoogle;
                }

                if(!empty($updateData))
                {
                    $this->userRepository->update($updateData,$user->id);
                }


            }
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Login Successfully');

        }
         catch (Exception $e) {
            Log::error('Something went wrong: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
    protected function downloadGoogleAvatar(?string $avatarUrl): ?string
    {
        if (empty($avatarUrl)) {
            return null;
        }

        try {
            $contents = file_get_contents($avatarUrl);
            $fileName = 'avatars/' . uniqid() . '.jpg';
            Storage::disk('admin')->put($fileName, $contents);
            return $fileName;
        } catch (Exception $e) {
            Log::warning('Unable to download Google avatar: ' . $e->getMessage());
            return null;
        }
    }
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('login');
}
}
