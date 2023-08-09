<div class="max-w-3xl mx-auto w-full p-8 space-y-6">
    <form wire:submit="submit">
        {{ $this->form }}

        <button type="submit">
            Submit
        </button>
    </form>

    {{ json_encode($data) }}

    <x-filament-actions::modals />
</div>
