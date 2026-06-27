<x-selli::app-shell title="CRM">
    <x-slot:brand><x-selli::brand text="Selli" /></x-slot:brand>
    <x-slot:sidebar>@include('selli::examples._sidebar', ['active' => 'crm'])</x-slot:sidebar>
    <x-slot:user><x-selli::avatar name="Filippo Calabrese" size="sm" status="online" /></x-slot:user>

    <x-selli::page-head title="Clienti" sub="42 clienti attivi · 12 nuovi questo mese">
        <x-slot:actions>
            <x-selli::button variant="ghost" icon="filter">Filtri</x-selli::button>
            <x-selli::button icon="user-plus">Nuovo cliente</x-selli::button>
        </x-slot:actions>
    </x-selli::page-head>

    <div style="display:flex;gap:.75rem;margin-bottom:20px;flex-wrap:wrap;">
        <div style="flex:1;min-width:240px;">
            <x-selli::input icon="search" placeholder="Cerca cliente…" clearable />
        </div>
        <x-selli::select :options="['all' => 'Tutti gli stati', 'active' => 'Attivi', 'lead' => 'Lead', 'churn' => 'Persi']" />
    </div>

    <x-selli::panel>
        <x-selli::table :columns="[
            ['key' => 'nome', 'label' => 'Cliente'],
            ['key' => 'referente', 'label' => 'Referente'],
            ['key' => 'stato', 'label' => 'Stato'],
            ['key' => 'mrr', 'label' => 'MRR', 'numeric' => true],
        ]" :rows="[
            ['nome' => 'Acme S.r.l.', 'referente' => 'Mario Rossi', 'stato' => 'Attivo', 'mrr' => '€2.400'],
            ['nome' => 'Globex SpA', 'referente' => 'Laura Bianchi', 'stato' => 'Attivo', 'mrr' => '€1.150'],
            ['nome' => 'Initech', 'referente' => 'Paolo Verdi', 'stato' => 'Lead', 'mrr' => '€0'],
            ['nome' => 'Umbrella Corp', 'referente' => 'Anna Neri', 'stato' => 'Attivo', 'mrr' => '€5.600'],
            ['nome' => 'Soylent', 'referente' => 'Marco Gialli', 'stato' => 'Lead', 'mrr' => '€0'],
        ]" striped />

        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:1.25rem;flex-wrap:wrap;gap:1rem;">
            <x-selli::text size="sm">Mostro 1–5 di 42 clienti</x-selli::text>
            <x-selli::pagination :current="1" :total="9" url="?page=:page" />
        </div>
    </x-selli::panel>

    <x-selli::toast-host />
</x-selli::app-shell>
