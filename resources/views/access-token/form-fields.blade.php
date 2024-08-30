{{-- URL --}}
<div class="col-span-6">
    <x-label for="url">{{ __('Link') }}</x-label>
    <x-input class="w-full" id="url" name="url" type="url"
        value="{{ old('url', $accessToken->url ?? route('register')) }}" maxlength="255" />
    <x-input-error for="url" />
</div>

{{-- Expires at --}}
<div class="col-span-6">
    <x-label for="expires_at">{{ __('Expires') }}</x-label>
    <x-input class="w-full dark:[color-scheme:dark]" id="expires_at" name="expires_at" type="datetime-local"
        value="{{ old('expires_at', $accessToken->expires_at ?? '') }}" />
    <x-input-error for="expires_at" />
</div>

{{-- Email --}}
<div class="col-span-6">
    <x-label for="email">{{ __('Email') }}</x-label>
    <x-input class="w-full" id="email" name="email" type="email" value="{{ old('email', $accessToken->email ?? '') }}"
        maxlength="255" />
    <x-input-error for="email" />
</div>