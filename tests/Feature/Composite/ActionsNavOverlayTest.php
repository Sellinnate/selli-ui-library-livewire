<?php

it('renders an attached and a spaced button group', function () {
    expect($this->render('<x-selli::button-group><x-selli::button>A</x-selli::button></x-selli::button-group>'))
        ->toContain('selli-btn-group--attached')
        ->toContain('role="group"');

    expect($this->render('<x-selli::button-group :attached="false"><x-selli::button>A</x-selli::button></x-selli::button-group>'))
        ->toContain('selli-btn-group--spaced');
});

it('renders a dropdown with trigger and menu items', function () {
    $html = $this->render(<<<'BLADE'
        <x-selli::dropdown align="end">
            <x-slot:trigger><x-selli::button>Menu</x-selli::button></x-slot:trigger>
            <x-selli::menu.label>Azioni</x-selli::menu.label>
            <x-selli::menu.item icon="pencil" shortcut="E">Modifica</x-selli::menu.item>
            <x-selli::menu.separator />
            <x-selli::menu.item icon="trash-2" :danger="true">Elimina</x-selli::menu.item>
        </x-selli::dropdown>
    BLADE);

    expect($html)
        ->toContain('selli-dropdown')
        ->toContain('selli-dropdown__panel--end')
        ->toContain('selliDropdown()')
        ->toContain('aria-haspopup="menu"')
        ->toContain('aria-controls=')
        ->toContain('selli-menu__label')
        ->toContain('Azioni')
        ->toContain('selli-menu__item')
        ->toContain('selli-menu__shortcut')
        ->toContain('selli-menu__sep')
        ->toContain('selli-menu__item--danger')
        ->toContain('Modifica')
        ->toContain('Elimina');
});

it('renders a menu item as a link when href is set', function () {
    expect($this->render('<x-selli::menu.item href="/x">Vai</x-selli::menu.item>'))
        ->toContain('<a')
        ->toContain('href="/x"')
        ->toContain('role="menuitem"');
});

it('renders a context menu', function () {
    $html = $this->render('<x-selli::context-menu><x-slot:trigger><div>Right click</div></x-slot:trigger><x-selli::menu.item>Copia</x-selli::menu.item></x-selli::context-menu>');

    expect($html)
        ->toContain('@contextmenu.prevent')
        ->toContain('Copia');
});

it('renders a popover', function () {
    $html = $this->render('<x-selli::popover align="end"><x-slot:trigger><button>Info</button></x-slot:trigger><p>Dettagli</p></x-selli::popover>');

    expect($html)
        ->toContain('selli-popover__panel--end')
        ->toContain('Dettagli');
});

it('renders tabs with panels', function () {
    $html = $this->render(<<<'BLADE'
        <x-selli::tabs :tabs="['Generale', 'Avanzate']" :default="1">
            <x-selli::tab-panel :index="0">Pannello uno</x-selli::tab-panel>
            <x-selli::tab-panel :index="1">Pannello due</x-selli::tab-panel>
        </x-selli::tabs>
    BLADE);

    expect($html)
        ->toContain('selliTabs(')
        ->toContain('role="tab"')
        ->toContain('aria-controls=')
        ->toContain('role="tablist"')
        ->toContain('Generale')
        ->toContain('active === 0')
        ->toContain('active === 1')
        ->toContain('Pannello uno')
        ->toContain('Pannello due');
});

it('renders an accordion using native details', function () {
    $html = $this->render(<<<'BLADE'
        <x-selli::accordion>
            <x-selli::accordion.item heading="Domanda 1" :open="true">Risposta 1</x-selli::accordion.item>
            <x-selli::accordion.item heading="Domanda 2">Risposta 2</x-selli::accordion.item>
        </x-selli::accordion>
    BLADE);

    expect($html)
        ->toContain('selli-accordion')
        ->toContain('<details class="selli-accordion__item"')
        ->toContain('open')
        ->toContain('selli-accordion__chevron')
        ->toContain('Domanda 1')
        ->toContain('Risposta 1');
});

it('renders a navbar with start and end slots', function () {
    $html = $this->render('<x-selli::navbar><x-slot:start><x-selli::brand /></x-slot:start><x-slot:end><x-selli::button size="sm">Login</x-selli::button></x-slot:end></x-selli::navbar>');

    expect($html)
        ->toContain('selli-navbar')
        ->toContain('selli-brand')
        ->toContain('Login');
});

it('renders a navlist with active item and badge', function () {
    $html = $this->render(<<<'BLADE'
        <x-selli::navlist>
            <x-selli::navlist.label>Menu</x-selli::navlist.label>
            <x-selli::navlist.item icon="home" href="/" :active="true">Dashboard
                <x-slot:badge><x-selli::badge tone="violet">3</x-selli::badge></x-slot:badge>
            </x-selli::navlist.item>
        </x-selli::navlist>
    BLADE);

    expect($html)
        ->toContain('selli-navlist')
        ->toContain('selli-navlist__label')
        ->toContain('selli-navlist__item--active')
        ->toContain('aria-current="page"')
        ->toContain('selli-navlist__badge')
        ->toContain('Dashboard');
});

it('renders breadcrumbs with a current page', function () {
    $html = $this->render(
        '<x-selli::breadcrumbs :items="$crumbs" />',
        ['crumbs' => [['label' => 'Home', 'url' => '/'], ['label' => 'Clienti', 'url' => '/clienti'], ['label' => 'Acme']]],
    );

    expect($html)
        ->toContain('selli-breadcrumbs')
        ->toContain('href="/"')
        ->toContain('Clienti')
        ->toContain('selli-breadcrumbs__item--current')
        ->toContain('aria-current="page"')
        ->toContain('Acme');
});

it('renders pagination with a window and ellipsis', function () {
    $html = $this->render('<x-selli::pagination :current="5" :total="20" url="?page=:page" />');

    expect($html)
        ->toContain('selli-pagination')
        ->toContain('selli-pagination__btn--active')
        ->toContain('selli-pagination__ellipsis')
        ->toContain('href="?page=1"')
        ->toContain('href="?page=20"')
        ->toContain('href="?page=6"');
});

it('disables the previous control on the first page', function () {
    $html = $this->render('<x-selli::pagination :current="1" :total="5" url="?page=:page" />');

    // The disabled prev control is a real disabled <button>, not a live link.
    expect($html)->toMatch('/<button[^>]*aria-label="Precedente"[^>]*\sdisabled/');
});

it('renders an event-driven modal with title, body and footer', function () {
    $html = $this->render(<<<'BLADE'
        <x-selli::modal name="confirm" title="Conferma" size="lg">
            Sei sicuro?
            <x-slot:footer><x-selli::button>OK</x-selli::button></x-slot:footer>
        </x-selli::modal>
    BLADE);

    expect($html)
        ->toContain('selli-open-modal.window')
        ->toContain('selli-modal__panel--lg')
        ->toContain('role="dialog"')
        ->toContain('aria-modal="true"')
        ->toContain('Conferma')
        ->toContain('Sei sicuro?')
        ->toContain('selli-modal__footer')
        ->toContain('x-teleport="body"');
});

it('renders the toast host', function () {
    expect($this->render('<x-selli::toast-host />'))
        ->toContain('selli-toast-host')
        ->toContain('selliToastHost()')
        ->toContain('selli-toast.window')
        ->toContain('selli-toast.window');
});

it('renders the command palette with normalized items', function () {
    $html = $this->render(
        '<x-selli::command :items="$cmds" />',
        ['cmds' => [['label' => 'Nuovo cliente', 'shortcut' => 'N', 'url' => '/new'], 'Impostazioni']],
    );

    expect($html)
        ->toContain('selliCommand(')
        ->toContain('Nuovo cliente')
        ->toContain('selli-command__input')
        ->toContain('x-teleport="body"');
});
