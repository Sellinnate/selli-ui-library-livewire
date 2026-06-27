<x-selli::app-shell title="Impostazioni">
    <x-slot:brand><x-selli::brand text="Selli" /></x-slot:brand>
    <x-slot:sidebar>@include('selli::examples._sidebar', ['active' => 'settings'])</x-slot:sidebar>
    <x-slot:user><x-selli::avatar name="Filippo Calabrese" size="sm" status="online" /></x-slot:user>

    <x-selli::page-head title="Impostazioni" sub="Gestisci il tuo profilo, l'account e le preferenze." />

    <x-selli::tabs :tabs="['Profilo', 'Notifiche', 'Sicurezza']" :default="0">
        <x-selli::tab-panel :index="0">
            <x-selli::panel title="Informazioni profilo" sub="Questi dati sono visibili agli altri membri del team.">
                <div style="display:flex;flex-direction:column;gap:1.25rem;max-width:38rem;">
                    <div style="display:flex;align-items:center;gap:1rem;">
                        <x-selli::avatar name="Filippo Calabrese" size="xl" />
                        <x-selli::button variant="secondary" size="sm" icon="upload">Cambia foto</x-selli::button>
                    </div>
                    <x-selli::field label="Nome completo" for="name">
                        <x-selli::input id="name" value="Filippo Calabrese" />
                    </x-selli::field>
                    <x-selli::field label="Email" for="email" hint="Useremo questo indirizzo per le notifiche.">
                        <x-selli::input id="email" type="email" icon="mail" value="filippo@selli.io" />
                    </x-selli::field>
                    <x-selli::field label="Bio" for="bio">
                        <x-selli::textarea id="bio" rows="4" placeholder="Raccontaci qualcosa di te…" />
                    </x-selli::field>
                    <div style="display:flex;gap:.5rem;">
                        <x-selli::button>Salva modifiche</x-selli::button>
                        <x-selli::button variant="ghost">Annulla</x-selli::button>
                    </div>
                </div>
            </x-selli::panel>
        </x-selli::tab-panel>

        <x-selli::tab-panel :index="1">
            <x-selli::panel title="Preferenze di notifica">
                <div style="display:flex;flex-direction:column;gap:1.1rem;max-width:38rem;">
                    <x-selli::switch label="Email per nuovi ordini" checked />
                    <x-selli::switch label="Riepilogo settimanale" checked />
                    <x-selli::switch label="Avvisi di sicurezza" />
                    <x-selli::separator />
                    <x-selli::callout variant="info" title="Suggerimento">
                        Puoi disattivare temporaneamente tutte le notifiche dalla modalità "Non disturbare".
                    </x-selli::callout>
                </div>
            </x-selli::panel>
        </x-selli::tab-panel>

        <x-selli::tab-panel :index="2">
            <x-selli::panel title="Sicurezza">
                <div style="display:flex;flex-direction:column;gap:1.25rem;max-width:38rem;">
                    <x-selli::field label="Password attuale"><x-selli::input type="password" icon="lock" /></x-selli::field>
                    <x-selli::field label="Nuova password"><x-selli::input type="password" icon="key" /></x-selli::field>
                    <x-selli::callout variant="warning" title="Autenticazione a due fattori disattivata">
                        Aumenta la sicurezza del tuo account abilitando la 2FA.
                    </x-selli::callout>
                    <div><x-selli::button>Aggiorna password</x-selli::button></div>
                </div>
            </x-selli::panel>
        </x-selli::tab-panel>
    </x-selli::tabs>

    <x-selli::toast-host />
</x-selli::app-shell>
