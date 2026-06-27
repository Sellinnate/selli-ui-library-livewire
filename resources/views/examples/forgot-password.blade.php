<x-selli::guest-layout>
    <x-selli::auth-card title="Reimposta la password" sub="Ti invieremo un link per reimpostarla">
        <x-selli::callout variant="info">
            Inserisci l'email associata al tuo account e controlla la posta in arrivo.
        </x-selli::callout>

        <form class="selli-auth-card__body" method="POST" action="#" onsubmit="return false" style="margin-top:1rem;">
            <x-selli::field label="Email" for="email">
                <x-selli::input id="email" type="email" name="email" icon="mail" placeholder="tu@azienda.it" required autofocus />
            </x-selli::field>

            <x-selli::button type="submit" :full="true" icon="send">Invia il link</x-selli::button>
        </form>

        <x-slot:footer>
            <a href="login.html">← Torna all'accesso</a>
        </x-slot:footer>
    </x-selli::auth-card>
</x-selli::guest-layout>
