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

    // ── Toast host ────────────────────────────────────────────────
    const TOAST_ICONS = {
      info: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>',
      success: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>',
      warning: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>',
      danger: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>',
    };
    Alpine.data('selliToastHost', () => ({
      toasts: [],
      seq: 0,
      push(detail = {}) {
        const id = ++this.seq;
        const t = {
          id,
          title: detail.title || '',
          message: detail.message || '',
          variant: detail.variant || 'info',
          timeout: detail.timeout == null ? 4000 : detail.timeout,
        };
        this.toasts.push(t);
        if (t.timeout) setTimeout(() => this.dismiss(id), t.timeout);
      },
      dismiss(id) {
        this.toasts = this.toasts.filter((t) => t.id !== id);
      },
      icon(variant) {
        return TOAST_ICONS[variant] || TOAST_ICONS.info;
      },
    }));

    // ── Command palette (⌘K) ──────────────────────────────────────
    Alpine.data('selliCommand', (config = {}) => ({
      items: config.items || [],
      open: false,
      query: '',
      active: 0,
      init() {
        this._onKey = (e) => {
          if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') {
            e.preventDefault();
            this.toggle();
          }
        };
        window.addEventListener('keydown', this._onKey);
        window.addEventListener('selli-open-command', () => this.show());
      },
      destroy() {
        window.removeEventListener('keydown', this._onKey);
      },
      get filtered() {
        const q = this.query.toLowerCase().trim();
        if (!q) return this.items;
        return this.items.filter((it) => it.label.toLowerCase().includes(q));
      },
      toggle() { this.open ? this.close() : this.show(); },
      show() {
        this.open = true;
        this.query = '';
        this.active = 0;
        this.$nextTick(() => this.$refs.input && this.$refs.input.focus());
      },
      close() { this.open = false; },
      move(dir) {
        const n = this.filtered.length;
        if (!n) return;
        this.active = (this.active + dir + n) % n;
      },
      run(i) {
        const it = this.filtered[i == null ? this.active : i];
        if (!it) return;
        this.close();
        if (it.url) window.location = it.url;
      },
    }));

    // ── Date picker ───────────────────────────────────────────────
    const DP_MONTHS = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];
    const pad2 = (n) => String(n).padStart(2, '0');
    Alpine.data('selliDatePicker', (config = {}) => ({
      dow: ['Lun', 'Mar', 'Mer', 'Gio', 'Ven', 'Sab', 'Dom'],
      open: false,
      value: config.value || '',
      view: new Date(),
      init() {
        if (this.value) {
          const d = new Date(this.value + 'T00:00:00');
          if (!isNaN(d)) this.view = d;
        }
      },
      get display() {
        if (!this.value) return '';
        const d = new Date(this.value + 'T00:00:00');
        return isNaN(d) ? '' : `${pad2(d.getDate())}/${pad2(d.getMonth() + 1)}/${d.getFullYear()}`;
      },
      set display(v) { /* readonly */ },
      get title() {
        return `${DP_MONTHS[this.view.getMonth()]} ${this.view.getFullYear()}`;
      },
      get cells() {
        const y = this.view.getFullYear();
        const m = this.view.getMonth();
        const first = new Date(y, m, 1);
        const lead = (first.getDay() + 6) % 7; // Monday-first
        const days = new Date(y, m + 1, 0).getDate();
        const todayIso = (() => { const t = new Date(); return `${t.getFullYear()}-${pad2(t.getMonth() + 1)}-${pad2(t.getDate())}`; })();
        const out = [];
        for (let i = 0; i < lead; i++) out.push(null);
        for (let d = 1; d <= days; d++) {
          const iso = `${y}-${pad2(m + 1)}-${pad2(d)}`;
          out.push({ day: d, iso, today: iso === todayIso });
        }
        return out;
      },
      prev() { this.view = new Date(this.view.getFullYear(), this.view.getMonth() - 1, 1); },
      next() { this.view = new Date(this.view.getFullYear(), this.view.getMonth() + 1, 1); },
      pick(cell) {
        if (!cell) return;
        this.value = cell.iso;
        this.open = false;
        this.$refs.hidden && this.$refs.hidden.dispatchEvent(new Event('input', { bubbles: true }));
      },
    }));
  }

  function registerTheming(Alpine) {
    // ── Colour-theme switcher ─────────────────────────────────────
    Alpine.data('selliThemeSwitcher', () => ({
      open: false,
      current: document.documentElement.getAttribute('data-theme') || 'violet',
      pick(theme) {
        this.current = theme;
        if (theme === 'violet') {
          document.documentElement.removeAttribute('data-theme');
        } else {
          document.documentElement.setAttribute('data-theme', theme);
        }
        try { localStorage.setItem('selli-color', theme); } catch (e) {}
        this.open = false;
      },
    }));
  }

  // Apply the persisted colour theme + appearance as early as possible.
  // (For zero flash in production, also inline this in <head>; see the docs.)
  try {
    var savedColor = localStorage.getItem('selli-color');
    if (savedColor && savedColor !== 'violet') {
      document.documentElement.setAttribute('data-theme', savedColor);
    }
    if (localStorage.getItem('selli-theme') === 'light') {
      document.documentElement.classList.add('light');
      document.documentElement.classList.remove('dark');
    }
  } catch (e) {}

  if (window.Alpine) {
    registerTheming(window.Alpine);
  } else {
    document.addEventListener('alpine:init', () => registerTheming(window.Alpine));
  }

  // Global imperative toast helper.
  window.selliToast = function (detail) {
    window.dispatchEvent(new CustomEvent('selli-toast', { detail: detail || {} }));
  };

  if (window.Alpine) {
    register(window.Alpine);
  } else {
    document.addEventListener('alpine:init', () => register(window.Alpine));
  }
})();
