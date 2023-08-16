<div class="px-4 py-3">
    <div
        x-data="{
            state: @js($getState()),
        }"
        x-init="
            $watch('state', () => {
                $wire.updateTableColumnState(
                    @js($getName()),
                    @js($recordKey),
                    state,
                )
            })
        "
    >
        <input
            x-model.lazy="state"
            type="color"
        />
    </div>
</div>
