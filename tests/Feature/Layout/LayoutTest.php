<?php

it('renders the app shell with brand, sidebar, title, user and content', function () {
    $html = $this->render(<<<'BLADE'
        <x-selli::app-shell title="Dashboard">
            <x-slot:brand><x-selli::brand text="Selli" /></x-slot:brand>
            <x-slot:sidebar>
                <x-selli::navlist><x-selli::navlist.item icon="home" :active="true">Home</x-selli::navlist.item></x-selli::navlist>
            </x-slot:sidebar>
            <x-slot:user><x-selli::avatar name="Filippo" /></x-slot:user>
            <x-slot:actions><x-selli::button size="sm">Nuovo</x-selli::button></x-slot:actions>
            <p>Contenuto principale</p>
        </x-selli::app-shell>
    BLADE);

    expect($html)
        ->toContain('selli-app')
        ->toContain('selli-app__sidebar')
        ->toContain('selli-app__topbar')
        ->toContain('Dashboard')
        ->toContain('selli-brand')
        ->toContain('selli-navlist__item--active')
        ->toContain('selli-app__user')
        ->toContain('selli-app__search')
        ->toContain('selli-theme-toggle')
        ->toContain('Nuovo')
        ->toContain('Contenuto principale')
        ->toContain('selli-open-command');
});

it('falls back to the default brand and can hide the search trigger', function () {
    $html = $this->render('<x-selli::app-shell :search="false">x</x-selli::app-shell>');

    expect($html)
        ->toContain('selli-brand')
        ->not->toContain('selli-app__search');
});

it('renders a panel with header, sub and action', function () {
    $html = $this->render(<<<'BLADE'
        <x-selli::panel title="Vendite" sub="Ultimi 30 giorni">
            <x-slot:action><x-selli::button size="sm" variant="ghost">Esporta</x-selli::button></x-slot:action>
            Corpo del pannello
        </x-selli::panel>
    BLADE);

    expect($html)
        ->toContain('selli-panel__header')
        ->toContain('Vendite')
        ->toContain('Ultimi 30 giorni')
        ->toContain('Esporta')
        ->toContain('Corpo del pannello');
});

it('renders a stat card with delta direction and sparkline', function () {
    $html = $this->render(
        '<x-selli::stat-card icon="dollar-sign" label="MRR" value="€12.400" delta="+8%" delta-dir="up" :spark="$s" />',
        ['s' => [3, 5, 4, 8, 7, 11]],
    );

    expect($html)
        ->toContain('selli-stat-card')
        ->toContain('€12.400')
        ->toContain('MRR')
        ->toContain('selli-stat-card__delta--up')
        ->toContain('+8%')
        ->toContain('selli-sparkline');

    expect($this->render('<x-selli::stat-card value="9" delta="-2%" delta-dir="down" />'))
        ->toContain('selli-stat-card__delta--down');
});

it('renders a page head with title, sub and actions', function () {
    $html = $this->render(<<<'BLADE'
        <x-selli::page-head title="Clienti" sub="42 attivi">
            <x-slot:actions><x-selli::button icon="plus">Aggiungi</x-selli::button></x-slot:actions>
        </x-selli::page-head>
    BLADE);

    expect($html)
        ->toContain('selli-page-head__title')
        ->toContain('Clienti')
        ->toContain('42 attivi')
        ->toContain('selli-page-head__actions')
        ->toContain('Aggiungi');
});

it('renders an empty state with an action', function () {
    $html = $this->render(<<<'BLADE'
        <x-selli::empty-state icon="inbox" title="Nessun messaggio" desc="La tua casella è vuota.">
            <x-slot:action><x-selli::button>Componi</x-selli::button></x-slot:action>
        </x-selli::empty-state>
    BLADE);

    expect($html)
        ->toContain('selli-empty')
        ->toContain('Nessun messaggio')
        ->toContain('La tua casella è vuota.');
});

it('renders the theme toggle', function () {
    expect($this->render('<x-selli::theme-toggle />'))
        ->toContain('selli-theme-toggle')
        ->toContain('toggle()')
        ->toContain('selli-theme');
});
