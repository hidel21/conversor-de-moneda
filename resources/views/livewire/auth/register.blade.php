

<div class="auth-form">
    <h2>Registrarse</h2>
    <form wire:submit.prevent="register">
        <input type="text" wire:model.lazy="name" placeholder="Nombre">
        @error('name') <span class="error">{{ $message }}</span> @enderror

        <input type="email" wire:model.lazy="email" placeholder="Email">
        @error('email') <span class="error">{{ $message }}</span> @enderror

        <input type="password" wire:model.lazy="password" placeholder="Contraseña">
        @error('password') <span class="error">{{ $message }}</span> @enderror

        <input type="password" wire:model.lazy="passwordConfirmation" placeholder="Confirmar Contraseña">
        @error('passwordConfirmation') <span class="error">{{ $message }}</span> @enderror

        <button type="submit">Registrarse</button>
    </form>
</div>
