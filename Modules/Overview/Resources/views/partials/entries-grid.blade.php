<div class="entries-grid">
    @forelse($entries as $entry)
        <div class="grid-item">{{ $entry }}</div>
    @empty
        @includeIf('theme::defaults.grid-empty')
    @endforelse
</div>