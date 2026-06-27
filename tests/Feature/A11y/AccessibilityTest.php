<?php

it('switch exposes role=switch with aria-checked', function () {
    expect($this->render('<x-selli::switch label="x" />'))
        ->toContain('role="switch"')
        ->toContain(':aria-checked');
});

it('autocomplete has full combobox/listbox ARIA wiring', function () {
    $html = $this->render('<x-selli::autocomplete :options="$o" label="Città" />', ['o' => ['Roma']]);

    expect($html)
        ->toContain('role="combobox"')
        ->toContain('aria-autocomplete="list"')
        ->toContain('aria-controls=')
        ->toContain(':aria-expanded')
        ->toContain(':aria-activedescendant="activeId"')
        ->toContain('role="listbox"')
        ->toContain('role="option"')
        ->toContain('aria-label="Città"');
});

it('command palette dialog and listbox are labelled', function () {
    $html = $this->render('<x-selli::command :items="$i" label="Comandi" />', ['i' => ['A']]);

    expect($html)
        ->toContain('role="dialog"')
        ->toContain('aria-label="Comandi"')
        ->toContain('role="combobox"')
        ->toContain('role="listbox"')
        ->toContain(':aria-activedescendant="activeId"');
});

it('modal links its title with aria-labelledby and traps Tab', function () {
    $html = $this->render('<x-selli::modal name="m" title="Conferma">body</x-selli::modal>');

    expect($html)
        ->toContain('aria-labelledby="selli-modal-title-')
        ->toContain('@keydown.tab="trap($event)"')
        ->toContain('selliModal()')
        ->toContain('onOpen()');
});

it('an untitled modal still has an accessible name', function () {
    expect($this->render('<x-selli::modal name="m">body</x-selli::modal>'))
        ->toContain('aria-label="Finestra di dialogo"');
});

it('dropdown trigger is keyboard-wired (haspopup, controls, expanded)', function () {
    $html = $this->render('<x-selli::dropdown><x-slot:trigger><x-selli::button>x</x-selli::button></x-slot:trigger><x-selli::menu.item>a</x-selli::menu.item></x-selli::dropdown>');

    expect($html)
        ->toContain('aria-haspopup="menu"')
        ->toContain(':aria-expanded="open"')
        ->toContain('aria-controls="selli-dd-')
        ->toContain('@keydown.down.prevent="nav(1)"')
        ->toContain('@keydown.escape.prevent="close()"');
});

it('tabs wire aria-controls and roving tabindex; panels are focusable', function () {
    $html = $this->render('<x-selli::tabs :tabs="[\'A\',\'B\']"><x-selli::tab-panel :index="0">p</x-selli::tab-panel></x-selli::tabs>');

    expect($html)
        ->toContain('role="tablist"')
        ->toContain('role="tab"')
        ->toContain('aria-controls="selli-tabs-')
        ->toContain(':tabindex="active === 0 ? 0 : -1"')
        ->toContain('@keydown.arrow-right.prevent="move(1)"')
        ->toContain('role="tabpanel"')
        ->toContain('tabindex="0"');
});

it('field error is announced via role=alert', function () {
    expect($this->render('<x-selli::field label="Email" error="Obbligatorio"><input></x-selli::field>'))
        ->toContain('class="selli-field__error" role="alert"');
});

it('inputs accept aria-describedby and mark invalid', function () {
    $html = $this->render('<x-selli::input :invalid="true" describedby="email-error" />');

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('aria-describedby="email-error"');
});

it('table headers are scoped and support a caption', function () {
    $html = $this->render(
        '<x-selli::table :columns="$c" :rows="$r" caption="Clienti" />',
        ['c' => ['name' => 'Nome'], 'r' => [['name' => 'Acme']]],
    );

    expect($html)
        ->toContain('<th scope="col"')
        ->toContain('<caption class="selli-sr-only">Clienti</caption>');
});

it('calendar days carry a full-date accessible label', function () {
    $html = $this->render('<x-selli::calendar :month="2" :year="2027" selected="2027-02-14" />');

    expect($html)
        ->toContain('aria-label="14 Febbraio 2027"')
        ->toContain('role="columnheader"');
});

it('calendar nav renders disabled buttons when no url is given', function () {
    expect($this->render('<x-selli::calendar :month="2" :year="2027" />'))
        ->toContain('<button type="button" class="selli-calendar__nav-btn" aria-label="Mese precedente" disabled>');
});

it('avatar status has a screen-reader text equivalent', function () {
    expect($this->render('<x-selli::avatar name="A B" status="online" />'))
        ->toContain('selli-avatar__status--online')
        ->toContain('<span class="selli-sr-only">Online</span>');
});

it('tooltip associates the bubble via aria-describedby', function () {
    $html = $this->render('<x-selli::tooltip label="Aiuto"><button>?</button></x-selli::tooltip>');

    expect($html)
        ->toContain('aria-describedby="selli-tip-')
        ->toContain('role="tooltip"');
});

it('the stylesheet ships a screen-reader-only utility and visible focus styles', function () {
    $css = file_get_contents(__DIR__.'/../../../resources/css/tokens/base.css');

    expect($css)
        ->toContain('.selli-sr-only')
        ->toContain(':focus-visible');
});
