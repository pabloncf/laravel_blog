<x-guest-layout>
    <div class="login-card">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-row d-flex justify-content-between">
                <div class="form-group flex-fill me-2">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="form-input" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="form-error" />
                </div>

                <div class="form-group flex-fill ms-2">
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" class="form-input" type="text" name="username" :value="old('username')"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="form-error" />
                </div>
            </div>

            <div class="form-group">
                <x-input-label for="bio" :value="__('Bio')" />
                <textarea id="bio" class="form-input" name="bio" rows="3">{{ old('bio') }}</textarea>
                <x-input-error :messages="$errors->get('bio')" class="form-error" />
            </div>

            <div class="form-group">
                <x-input-label for="profile_picture" :value="__('Profile Picture')" />
                <input id="profile_picture" class="form-input" type="file" name="profile_picture" accept="image/*">
                <x-input-error :messages="$errors->get('profile_picture')" class="form-error" />
            </div>

            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="form-input" type="email" name="email" :value="old('email')"
                    required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="form-error" />
            </div>

            <div class="form-row d-flex justify-content-between">
                <div class="form-group flex-fill me-2">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="form-input" type="password" name="password" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="form-error" />
                </div>

                <div class="form-group flex-fill ms-2">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="form-input" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="form-error" />
                </div>
            </div>
            <div class="form-actions">
                <a class="form-link" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="btn-primary">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
