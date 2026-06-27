<x-selli::app-shell title="Dashboard">
    <x-slot:brand><x-selli::brand text="Selli" /></x-slot:brand>
    <x-slot:sidebar>@include('selli::examples._sidebar', ['active' => 'dashboard'])</x-slot:sidebar>
    <x-slot:user>
        <x-selli::dropdown align="start">
            <x-slot:trigger>
                <button type="button" style="display:flex;align-items:center;gap:.65rem;width:100%;background:none;border:none;cursor:pointer;padding:.4rem;border-radius:var(--radius-lg);">
                    <x-selli::avatar name="Filippo Calabrese" size="sm" status="online" />
                    <span style="display:flex;flex-direction:column;text-align:left;min-width:0;">
                        <span style="font-size:var(--text-sm);font-weight:600;color:var(--foreground);">Filippo Calabrese</span>
                        <span style="font-size:var(--text-xs);color:var(--muted-foreground);">filippo@selli.io</span>
                    </span>
                </button>
            </x-slot:trigger>
            <x-selli::menu.item icon="user">Profilo</x-selli::menu.item>
            <x-selli::menu.item icon="settings">Impostazioni</x-selli::menu.item>
            <x-selli::menu.separator />
            <x-selli::menu.item icon="log-out" :danger="true">Esci</x-selli::menu.item>
        </x-selli::dropdown>
    </x-slot:user>
    <x-slot:actions>
        <button type="button" class="selli-app__iconbtn" aria-label="Notifiche" onclick="window.selliToast({ title: '3 nuove notifiche', variant: 'info' })">
            <x-selli::icon name="bell" :size="18" /><span class="selli-app__iconbtn-dot"></span>
        </button>
    </x-slot:actions>

    <x-selli::page-head title="Buongiorno, Filippo" sub="Ecco cosa succede oggi nella tua attività.">
        <x-slot:actions>
            <x-selli::button variant="ghost" icon="download">Esporta</x-selli::button>
            <x-selli::button icon="plus">Nuovo report</x-selli::button>
        </x-slot:actions>
    </x-selli::page-head>

    <div class="selli-grid selli-grid--4" style="margin-bottom:20px;">
        <x-selli::stat-card icon="dollar-sign" label="Ricavi mensili" value="€48.250" delta="+12,5%" :spark="[12,18,15,22,19,26,31]" />
        <x-selli::stat-card icon="users" label="Nuovi clienti" value="312" delta="+8,1%" accent="var(--blue-500)" :spark="[5,8,6,9,12,11,14]" />
        <x-selli::stat-card icon="shopping-cart" label="Ordini" value="1.204" delta="-2,3%" delta-dir="down" :spark="[20,18,22,17,15,16,14]" />
        <x-selli::stat-card icon="gauge" label="Tasso conversione" value="3,8%" delta="+0,6%" accent="var(--success)" :spark="[2,3,2.5,3.2,3.5,3.6,3.8]" />
    </div>

    <div class="selli-grid" style="grid-template-columns:2fr 1fr;margin-bottom:20px;">
        <x-selli::panel title="Andamento ricavi" sub="Ultimi 6 mesi">
            <x-slot:action><x-selli::badge tone="success" icon="trending-up">+18%</x-selli::badge></x-slot:action>
            <x-selli::chart type="line" :height="240" :data="[
                ['label' => 'Gen', 'value' => 32],
                ['label' => 'Feb', 'value' => 41],
                ['label' => 'Mar', 'value' => 38],
                ['label' => 'Apr', 'value' => 52],
                ['label' => 'Mag', 'value' => 49],
                ['label' => 'Giu', 'value' => 61],
            ]" />
        </x-selli::panel>
        <x-selli::panel title="Obiettivo trimestrale">
            <div style="display:flex;flex-direction:column;align-items:center;gap:1rem;padding:1rem 0;">
                <x-selli::donut :value="72" :size="160" label="del target" />
                <x-selli::text size="sm" style="text-align:center;">€36.000 su €50.000 — mancano 28 giorni.</x-selli::text>
            </div>
        </x-selli::panel>
    </div>

    <x-selli::panel title="Attività recenti">
        <x-slot:action><x-selli::button size="sm" variant="ghost" icon-right="arrow-right">Vedi tutto</x-selli::button></x-slot:action>
        <x-selli::table :columns="[
            ['key' => 'cliente', 'label' => 'Cliente'],
            ['key' => 'azione', 'label' => 'Azione'],
            ['key' => 'data', 'label' => 'Data'],
            ['key' => 'importo', 'label' => 'Importo', 'numeric' => true],
        ]" :rows="[
            ['cliente' => 'Acme S.r.l.', 'azione' => 'Nuovo ordine', 'data' => 'Oggi, 14:32', 'importo' => '€2.400'],
            ['cliente' => 'Globex SpA', 'azione' => 'Pagamento', 'data' => 'Oggi, 11:08', 'importo' => '€1.150'],
            ['cliente' => 'Initech', 'azione' => 'Rinnovo', 'data' => 'Ieri, 17:45', 'importo' => '€890'],
            ['cliente' => 'Umbrella', 'azione' => 'Preventivo', 'data' => 'Ieri, 09:21', 'importo' => '€5.600'],
        ]" />
    </x-selli::panel>

    <x-selli::command :items="[
        ['label' => 'Vai alla Dashboard', 'shortcut' => 'D', 'url' => 'dashboard.html'],
        ['label' => 'Apri il CRM', 'shortcut' => 'C', 'url' => 'crm.html'],
        ['label' => 'Impostazioni', 'shortcut' => ',', 'url' => 'settings.html'],
        ['label' => 'Crea nuovo report'],
        ['label' => 'Invita un membro'],
    ]" />
    <x-selli::toast-host />
</x-selli::app-shell>
