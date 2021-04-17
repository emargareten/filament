<x-forms::field-group
    :column-span="$formComponent->getColumnSpan()"
    :error-key="$formComponent->getName()"
    :for="$formComponent->getId()"
    :help-message="$formComponent->getHelpMessage()"
    :hint="$formComponent->getHint()"
    :label="$formComponent->getLabel()"
    :required="$formComponent->isRequired()"
>
    <button
        x-data="{ enabled: @entangle($formComponent->getName()){{ Str::of($formComponent->getBindingAttribute())->after('wire:model') }} }"
        x-on:click.prevent="enabled = !enabled"
        type="button"
        {!! $formComponent->getId() ? "id=\"{$formComponent->getId()}\"" : null !!}
        {!! $formComponent->isAutofocused() ? 'autofocus' : null !!}
        {!! $formComponent->isDisabled() ? 'disabled' : null !!}
        class="relative inline-flex flex-shrink-0 h-[30px] w-[74px] border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
        role="switch"
        tabindex="0"
        :class="enabled ? 'bg-primary-600' : 'bg-gray-300'"
        :aria-checked="enabled ? 'true' : 'false'"
    >
        <span
            class="pointer-events-none inline-block h-[26px] w-[26px] rounded-full bg-white shadow-lg ring-0 transform transition ease-in-out duration-200"
            :class="enabled ? 'translate-x-11' : 'translate-x-0'"
            aria-hidden="true">
        </span>
    </button>
</x-forms::field-group>
