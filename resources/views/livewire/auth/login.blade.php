

<div class="auth-form">
    <h2>Iniciar Sesión</h2>
    <form wire:submit.prevent="login">
        <input type="email" wire:model.lazy="email" placeholder="Email">
        @error('email') <span class="error">{{ $message }}</span> @enderror

        <input type="password" wire:model.lazy="password" placeholder="Contraseña">
        @error('password') <span class="error">{{ $message }}</span> @enderror

        <button type="submit">Iniciar Sesión</button>
    </form>
</div>
