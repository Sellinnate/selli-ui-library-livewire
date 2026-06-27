<?php

it('renders a data-driven table with columns and rows', function () {
    $html = $this->render(
        '<x-selli::table :columns="$cols" :rows="$rows" :striped="true" />',
        [
            'cols' => [['key' => 'name', 'label' => 'Nome'], ['key' => 'mrr', 'label' => 'MRR', 'numeric' => true]],
            'rows' => [['name' => 'Acme', 'mrr' => '€1.200'], ['name' => 'Globex', 'mrr' => '€800']],
        ],
    );

    expect($html)
        ->toContain('selli-table')
        ->toContain('selli-table--striped')
        ->toContain('selli-table--hover')
        ->toContain('>Nome</th>')
        ->toContain('selli-table__num')
        ->toContain('Acme')
        ->toContain('€1.200')
        ->toContain('Globex');
});

it('shows the empty state when there are no rows', function () {
    $html = $this->render(
        '<x-selli::table :columns="$cols" :rows="$rows" empty="Nessun cliente" />',
        ['cols' => ['name' => 'Nome'], 'rows' => []],
    );

    expect($html)->toContain('Nessun cliente');
});

it('renders a table from slotted markup', function () {
    $html = $this->render('<x-selli::table><thead><tr><th>A</th></tr></thead></x-selli::table>');

    expect($html)->toContain('selli-table-wrap')->toContain('<th>A</th>');
});

it('renders a sparkline polyline from data', function () {
    $html = $this->render('<x-selli::sparkline :data="$d" />', ['d' => [3, 7, 4, 9, 6, 11]]);

    expect($html)
        ->toContain('selli-sparkline')
        ->toContain('<polyline')
        ->toContain('points=')
        ->toContain('selli-sparkline__area');
});

it('renders a donut with the given percentage', function () {
    $html = $this->render('<x-selli::donut :value="75" label="Completato" />');

    expect($html)
        ->toContain('selli-donut')
        ->toContain('75%')
        ->toContain('Completato')
        ->toContain('stroke-dasharray');
});

it('renders a bar chart with one rect per data point', function () {
    $html = $this->render(
        '<x-selli::chart type="bar" :data="$d" />',
        ['d' => ['Gen' => 12, 'Feb' => 18, 'Mar' => 9]],
    );

    expect($html)
        ->toContain('selli-chart')
        ->toContain('selli-chart__bar')
        ->toContain('Gen')
        ->toContain('Feb')
        ->toContain('Mar');

    expect(substr_count($html, 'selli-chart__bar'))->toBe(3);
});

it('renders a line chart with a polyline and dots', function () {
    $html = $this->render(
        '<x-selli::chart type="line" :data="$d" />',
        ['d' => [['label' => 'A', 'value' => 5], ['label' => 'B', 'value' => 9], ['label' => 'C', 'value' => 3]]],
    );

    expect($html)
        ->toContain('selli-chart__line')
        ->toContain('selli-chart__area')
        ->toContain('selli-chart__dot');
});

it('renders a calendar grid for a fixed month', function () {
    $html = $this->render(
        '<x-selli::calendar :month="2" :year="2027" selected="2027-02-14" :events="$e" />',
        ['e' => ['2027-02-10', '2027-02-20']],
    );

    expect($html)
        ->toContain('selli-calendar')
        ->toContain('Febbraio 2027')
        ->toContain('Lun')
        ->toContain('selli-calendar__day--selected')
        ->toContain('data-date="2027-02-14"')
        ->toContain('selli-calendar__day--event');

    // February 2027 has 28 days.
    expect(substr_count($html, 'selli-calendar__day--event'))->toBe(2);
});

it('renders a datepicker with calendar popover', function () {
    $html = $this->render('<x-selli::datepicker name="due" value="2027-03-01" />');

    expect($html)
        ->toContain('selli-datepicker')
        ->toContain('selliDatePicker(')
        ->toContain('name="due"')
        ->toContain('selli-calendar__grid');
});
