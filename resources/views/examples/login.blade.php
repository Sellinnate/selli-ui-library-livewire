<x-selli::guest-layout>
    <x-selli::auth-card title="Bentornato" sub="Accedi al tuo account Selli">
        <form class="selli-auth-card__body" method="POST" action="#" onsubmit="return false">
            <x-selli::field label="Email" for="email">
                <x-selli::input id="email" type="email" name="email" icon="mail" placeholder="tu@azienda.it" required autofocus />
            </x-selli::field>

            <x-selli::field label="Password" for="password">
                <x-selli::input id="password" type="password" name="password" icon="lock" placeholder="••••••••" required />
            </x-selli::field>

            <div class="selli-auth-row">
                <x-selli::switch label="Ricordami" name="remember" />
                <a href="forgot-password.html" style="font-size:var(--text-sm);color:var(--primary);font-weight:500;">Password dimenticata?</a>
            </div>

            <x-selli::button type="submit" :full="true">Accedi</x-selli::button>

            <x-selli::separator label="oppure" />

            <x-selli::button variant="secondary" :full="true" icon="log-in" type="button">Continua con SSO</x-selli::button>
        </form>

        <x-slot:footer>
            Non hai un account? <a href="register.html">Registrati</a>
        </x-slot:footer>
    </x-selli::auth-card>
</x-selli::guest-layout>
