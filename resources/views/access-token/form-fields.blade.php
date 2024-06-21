{{-- URL --}}
<div class="col-span-6">
    <label for="url">{{ __('Link') }}</label>
    <input class="w-full" id="url" name="url" type="url" value="{{ old('url', $accessToken->url ?? route('register')) }}" maxlength="255" />
    <x-forms.input-error for="url" />
</div>

{{-- Expires at --}}
<div class="col-span-6">
    <label for="expires_at">{{ __('Expires') }}</label>
    <input class="w-full" id="expires_at" name="expires_at" type="datetime-local" value="{{ old('expires_at', $accessToken->expires_at ?? '') }}" />
    <x-forms.input-error for="expires_at" />
</div>

{{-- Email --}}
<div class="col-span-6">
    <label for="email">{{ __('Email') }}</label>
    <input class="w-full" id="email" name="email" type="email" value="{{ old('email', $accessToken->email ?? '') }}" maxlength="255" />
    <x-forms.input-error for="email" />
</div>
