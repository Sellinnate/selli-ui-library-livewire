<?php

it('renders the dashboard example page', function () {
    $html = view('selli::examples.dashboard')->render();

    expect($html)
        ->toContain('selli-app')
        ->toContain('Buongiorno, Filippo')
        ->toContain('selli-stat-card')
        ->toContain('Andamento ricavi')
        ->toContain('selli-chart__line')
        ->toContain('selli-donut')
        ->toContain('Attività recenti')
        ->toContain('Acme S.r.l.')
        ->toContain('selliCommand(')
        ->toContain('selli-toast-host');
});

it('renders the CRM example page', function () {
    $html = view('selli::examples.crm')->render();

    expect($html)
        ->toContain('Clienti')
        ->toContain('selli-navlist__item--active')
        ->toContain('Cerca cliente…')
        ->toContain('selli-table--striped')
        ->toContain('Globex SpA')
        ->toContain('selli-pagination');
});

it('renders the settings example page', function () {
    $html = view('selli::examples.settings')->render();

    expect($html)
        ->toContain('Impostazioni')
        ->toContain('selli-tabs__list')
        ->toContain('Informazioni profilo')
        ->toContain('selli-field__label')
        ->toContain('selli-switch__input')
        ->toContain('selli-callout--warning');
});
