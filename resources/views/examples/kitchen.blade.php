{{-- Kitchen-sink page used by the Playwright interaction suite. Each
     interactive component carries a data-testid for stable selectors. --}}
<div style="max-width:880px;margin:0 auto;padding:40px 24px 120px;display:flex;flex-direction:column;gap:32px;">
    <x-selli::section-heading eyebrow="Selli UI" title="Kitchen sink" accent="interattivo" lead="Pagina di prova per i test di Playwright." />

    <div style="display:flex;align-items:center;gap:12px;flex-wrap:wrap;">
        <x-selli::theme-toggle data-testid="theme-toggle" />
        <x-selli::theme-switcher data-testid="theme-switcher" />
        <span data-testid="theme-state" x-data x-text="document.documentElement.classList.contains('light') ? 'light' : 'dark'"></span>
    </div>

    {{-- Dropdown --}}
    <x-selli::dropdown align="start" data-testid="dropdown">
        <x-slot:trigger><x-selli::button data-testid="dropdown-trigger">Apri menu</x-selli::button></x-slot:trigger>
        <x-selli::menu.item icon="user" data-testid="dropdown-item">Profilo</x-selli::menu.item>
        <x-selli::menu.item icon="settings">Impostazioni</x-selli::menu.item>
    </x-selli::dropdown>

    {{-- Tabs --}}
    <x-selli::tabs :tabs="['Uno', 'Due']" :default="0" data-testid="tabs">
        <x-selli::tab-panel :index="0"><p data-testid="panel-0">Pannello uno</p></x-selli::tab-panel>
        <x-selli::tab-panel :index="1"><p data-testid="panel-1">Pannello due</p></x-selli::tab-panel>
    </x-selli::tabs>

    {{-- Accordion --}}
    <x-selli::accordion>
        <x-selli::accordion.item heading="Sezione A" data-testid="accordion-item">Contenuto A</x-selli::accordion.item>
    </x-selli::accordion>

    {{-- Modal --}}
    <x-selli::modal name="demo" title="Finestra di dialogo" data-testid="modal">
        <x-slot:trigger><x-selli::button data-testid="modal-trigger">Apri modale</x-selli::button></x-slot:trigger>
        <p data-testid="modal-body">Sei dentro la modale.</p>
        <x-slot:footer><x-selli::button data-testid="modal-confirm">Conferma</x-selli::button></x-slot:footer>
    </x-selli::modal>

    {{-- Toast --}}
    <x-selli::button data-testid="toast-trigger" onclick="window.selliToast({ title: 'Salvato', message: 'Tutto a posto.', variant: 'success' })">Mostra toast</x-selli::button>

    {{-- Command palette --}}
    <x-selli::button data-testid="command-trigger" onclick="window.dispatchEvent(new CustomEvent('selli-open-command'))">Apri comandi (⌘K)</x-selli::button>
    <x-selli::command :items="[
        ['label' => 'Vai alla Dashboard', 'shortcut' => 'D'],
        ['label' => 'Apri il CRM', 'shortcut' => 'C'],
        ['label' => 'Crea cliente'],
    ]" data-testid="command" />

    {{-- Autocomplete --}}
    <x-selli::autocomplete :options="['Milano', 'Roma', 'Napoli', 'Torino']" name="city" data-testid="autocomplete" />

    <x-selli::toast-host />
</div>
