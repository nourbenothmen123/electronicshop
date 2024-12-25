{{-- @component('mail::message')
# Réinitialisation de Mot de Passe

Bonjour {{ $user->name }},

Vous avez demandé à réinitialiser votre mot de passe. Cliquez sur le bouton ci-dessous pour procéder.

@component('mail::button', ['url' => url('reset-password/'.$user->remember_token )])
Réinitialiser le mot de passe
@endcomponent

Si vous n'avez pas demandé cette réinitialisation, veuillez ignorer cet email.

Merci,<br>
{{ config('app.name') }}
@endcomponent --}}
@component('mail::message')
# Réinitialisation de Mot de Passe

Bonjour {{ $user->name }},

Vous avez demandé à réinitialiser votre mot de passe. Cliquez sur le bouton ci-dessous pour procéder.

@php
    // Vérifiez si l'utilisateur a le rôle 'client'
    $resetUrl = $user->hasRole('client') 
        ? url('reset-password-client/' . $user->remember_token) 
        : url('reset-password/' . $user->remember_token);
@endphp

@component('mail::button', ['url' => $resetUrl])
Réinitialiser le mot de passe
@endcomponent

Si vous n'avez pas demandé cette réinitialisation, veuillez ignorer cet email.

Merci,<br>
{{ config('app.name') }}
@endcomponent
