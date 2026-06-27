<?php

it('renders a field with label, description, required marker and error', function () {
    $html = $this->render('<x-selli::field label="Email" description="La tua email" error="Campo obbligatorio" :required="true" for="email"><input id="email"></x-selli::field>');

    expect($html)
        ->toContain('selli-field__label')
        ->toContain('for="email"')
        ->toContain('selli-field__req')
        ->toContain('La tua email')
        ->toContain('selli-field__error')
        ->toContain('Campo obbligatorio');
});

it('shows a hint only when there is no error', function () {
    expect($this->render('<x-selli::field hint="Suggerimento"><input></x-selli::field>'))
        ->toContain('selli-field__hint')
        ->toContain('Suggerimento');

    expect($this->render('<x-selli::field hint="Suggerimento" error="Errore"><input></x-selli::field>'))
        ->toContain('selli-field__error')
        ->not->toContain('selli-field__hint');
});

it('renders an input and forwards wire:model + attributes', function () {
    $html = $this->render('<x-selli::input wire:model="name" placeholder="Nome" icon="user" size="lg" />');

    expect($html)
        ->toContain('selli-input')
        ->toContain('selli-input--lg')
        ->toContain('selli-input--has-icon')
        ->toContain('wire:model="name"')
        ->toContain('placeholder="Nome"');
});

it('marks an invalid input with aria-invalid', function () {
    expect($this->render('<x-selli::input :invalid="true" />'))
        ->toContain('selli-input--invalid')
        ->toContain('aria-invalid="true"');
});

it('renders a clearable input with a clear button', function () {
    expect($this->render('<x-selli::input :clearable="true" />'))
        ->toContain('selli-input-clear')
        ->toContain('selli-input--has-trailing');
});

it('renders a textarea with rows and content', function () {
    $html = $this->render('<x-selli::textarea rows="6" wire:model="bio">Testo</x-selli::textarea>');

    expect($html)
        ->toContain('selli-textarea')
        ->toContain('rows="6"')
        ->toContain('wire:model="bio"')
        ->toContain('Testo');
});

it('renders a checkbox with label and description', function () {
    $html = $this->render('<x-selli::checkbox label="Accetto" description="i termini" value="1" wire:model="agree" />');

    expect($html)
        ->toContain('type="checkbox"')
        ->toContain('selli-check__box')
        ->toContain('Accetto')
        ->toContain('i termini')
        ->toContain('wire:model="agree"');
});

it('renders a radio button', function () {
    expect($this->render('<x-selli::radio label="Opzione A" name="opt" value="a" />'))
        ->toContain('type="radio"')
        ->toContain('selli-radio__box')
        ->toContain('Opzione A');
});

it('renders a switch', function () {
    expect($this->render('<x-selli::switch label="Notifiche" wire:model="notify" />'))
        ->toContain('selli-switch__input')
        ->toContain('selli-switch__thumb')
        ->toContain('Notifiche')
        ->toContain('wire:model="notify"');
});

it('renders checkbox and radio groups', function () {
    expect($this->render('<x-selli::checkbox-group label="Permessi" :horizontal="true"><x-selli::checkbox label="A" /></x-selli::checkbox-group>'))
        ->toContain('role="group"')
        ->toContain('selli-control-group--horizontal')
        ->toContain('Permessi');

    expect($this->render('<x-selli::radio-group label="Piano"><x-selli::radio label="Free" /></x-selli::radio-group>'))
        ->toContain('role="radiogroup"')
        ->toContain('Piano');
});

it('renders a select from an options array with a placeholder and selection', function () {
    $html = $this->render(
        '<x-selli::select :options="$opts" placeholder="Scegli" :selected="2" wire:model="plan" />',
        ['opts' => [1 => 'Base', 2 => 'Pro', 3 => 'Enterprise']],
    );

    expect($html)
        ->toContain('selli-select')
        ->toContain('wire:model="plan"')
        ->toContain('<option value="" disabled')
        ->toContain('Scegli')
        ->toContain('>Base</option>')
        ->toContain('value="2" selected')
        ->toContain('selli-select-wrap__chevron');
});

it('renders an autocomplete with normalized options', function () {
    $html = $this->render(
        '<x-selli::autocomplete :options="$opts" name="city" placeholder="Città" />',
        ['opts' => ['Milano', 'Roma', 'Napoli']],
    );

    expect($html)
        ->toContain('selli-autocomplete')
        ->toContain('selliAutocomplete(')
        ->toContain('Milano')
        ->toContain('name="city"')
        ->toContain('x-data');
});

it('renders an editor with a toolbar and hidden field', function () {
    $html = $this->render('<x-selli::editor name="content" value="<p>Ciao</p>" />');

    expect($html)
        ->toContain('selli-editor')
        ->toContain('selliEditor()')
        ->toContain('contenteditable="true"')
        ->toContain("cmd('bold')")
        ->toContain('name="content"')
        ->toContain('<p>Ciao</p>');
});
