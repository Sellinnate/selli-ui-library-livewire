<x-selli::guest-layout>
    <x-selli::auth-card title="Verifica la tua email" sub="Ti abbiamo inviato un link di conferma">
        <div style="display:flex;flex-direction:column;align-items:center;gap:1rem;text-align:center;">
            <span style="width:64px;height:64px;border-radius:var(--radius-2xl);background:var(--surface-raised);display:grid;place-items:center;color:var(--primary);">
                <x-selli::icon name="mail" :size="30" />
            </span>
            <x-selli::text>
                Abbiamo inviato un'email a <strong style="color:var(--foreground);">mario@azienda.it</strong>.
                Clicca sul link contenuto per attivare il tuo account.
            </x-selli::text>
        </div>

        <form method="POST" action="#" onsubmit="return false" style="margin-top:1.25rem;">
            <x-selli::button type="submit" :full="true" icon="refresh-cw">Reinvia l'email</x-selli::button>
        </form>

        <x-slot:footer>
            Email sbagliata? <a href="register.html">Modifica l'indirizzo</a> · <a href="login.html">Esci</a>
        </x-slot:footer>
    </x-selli::auth-card>
</x-selli::guest-layout>
