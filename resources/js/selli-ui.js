/**
 * Selli UI — Alpine helpers
 *
 * Registers the Alpine.data() factories used by the interactive Selli
 * components (autocomplete, editor, …). Livewire 4 ships Alpine, so in a
 * Livewire app this file only needs to be loaded once, after Livewire.
 *
 * Usage (Blade layout):
 *   <script src="{{ \Selli\Ui\Facades\SelliUi::js() }}" defer></script>
 */
(function () {
  function register(Alpine) {
    // ── Autocomplete ──────────────────────────────────────────────
    Alpine.data('selliAutocomplete', (config = {}) => ({
      options: config.options || [],
      query: '',
      selected: config.value || '',
      open: false,
      active: 0,
      init() {
        const match = this.options.find((o) => String(o.value) === String(this.selected));
        if (match) this.query = match.label;
      },
      get filtered() {
        const q = this.query.toLowerCase().trim();
        if (!q) return this.options;
        return this.options.filter((o) => o.label.toLowerCase().includes(q));
      },
      move(dir) {
        if (!this.open) { this.open = true; return; }
        const n = this.filtered.length;
        if (!n) return;
        this.active = (this.active + dir + n) % n;
      },
      choose(i) {
        const o = this.filtered[i];
        if (!o) return;
        this.selected = o.value;
        this.query = o.label;
        this.open = false;
        this.$refs.hidden && this.$refs.hidden.dispatchEvent(new Event('input', { bubbles: true }));
      },
    }));

    // ── Editor (lightweight contenteditable) ──────────────────────
    Alpine.data('selliEditor', () => ({
      cmd(command) {
        document.execCommand(command, false, null);
        this.$refs.area.focus();
        this.sync();
      },
      sync() {
        if (!this.$refs.hidden) return;
        this.$refs.hidden.value = this.$refs.area.innerHTML;
        this.$refs.hidden.dispatchEvent(new Event('input', { bubbles: true }));
      },
    }));
  }

  if (window.Alpine) {
    register(window.Alpine);
  } else {
    document.addEventListener('alpine:init', () => register(window.Alpine));
  }
})();
