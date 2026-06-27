<x-selli::guest-layout :split="true">
    <x-slot:brand><x-selli::brand size="lg" /></x-slot:brand>
    <x-slot:aside>
        <x-selli::eyebrow>Selli UI</x-selli::eyebrow>
        <x-selli::heading :level="2">Costruisci interfacce enterprise in minuti.</x-selli::heading>
        <x-selli::text size="lg">Oltre 70 componenti accessibili, sei temi colore e modalità chiara/scura — pronti all'uso.</x-selli::text>
    </x-slot:aside>
    <x-slot:asideFooter>
        <x-selli::text size="sm">© 2026 Sellinnate</x-selli::text>
    </x-slot:asideFooter>

    <x-selli::auth-card title="Crea il tuo account" sub="Inizia gratuitamente, nessuna carta richiesta">
        <form class="selli-auth-card__body" method="POST" action="#" onsubmit="return false">
            <x-selli::field label="Nome completo" for="name">
                <x-selli::input id="name" name="name" icon="user" placeholder="Mario Rossi" required autofocus />
            </x-selli::field>

            <x-selli::field label="Email aziendale" for="email">
                <x-selli::input id="email" type="email" name="email" icon="mail" placeholder="mario@azienda.it" required />
            </x-selli::field>

            <x-selli::field label="Password" for="password" hint="Almeno 8 caratteri.">
                <x-selli::input id="password" type="password" name="password" icon="lock" placeholder="••••••••" required describedby="password-hint" />
            </x-selli::field>

            <x-selli::checkbox name="terms" value="1" required>
                Accetto i <a href="privacy.html" style="color:var(--primary);">Termini</a> e la Privacy Policy
            </x-selli::checkbox>

            <x-selli::button type="submit" :full="true" icon-right="arrow-right">Crea account</x-selli::button>
        </form>

        <x-slot:footer>
            Hai già un account? <a href="login.html">Accedi</a>
        </x-slot:footer>
    </x-selli::auth-card>
</x-selli::guest-layout>
