@props([
    'label' => 'Select Option',
    'id' => null,
    'name' => 'select_name',
    'options' => [],
    'selected' => null,
])

<div x-data="{
        options: @js($options),
        isOpen: false,
        openedWithKeyboard: false,
        selectedOption: @js($selected),
        setSelectedOption(option) {
            this.selectedOption = option
            this.isOpen = false
            this.openedWithKeyboard = false
            this.$refs.hiddenTextField.value = option.id
        },
        getFilteredOptions(query) {
            this.options = this.options.filter((option) =>
                option.name.toLowerCase().includes(query.toLowerCase()),
            )
            if (this.options.length === 0) {
                this.$refs.noResultsMessage.classList.remove('hidden')
            } else {
                this.$refs.noResultsMessage.classList.add('hidden')
            }
        },
        handleKeydownOnOptions(event) {
            // if the user presses backspace or the alpha-numeric keys, focus on the search field
            if ((event.keyCode >= 65 && event.keyCode <= 90) || (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode === 8) {
                this.$refs.searchField.focus()
            }
        },
    }" class="flex w-full max-w-xs flex-col gap-1" x-on:keydown="handleKeydownOnOptions($event)" x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false">
    <label for="{{ $id }}" class="w-fit pl-0.5 text-sm text-on-surface dark:text-on-surface-dark">{{ $label }}</label>
    <div class="relative bg-surface-alt dark:bg-surface-dark-alt">

        <!-- trigger button  -->
        <button type="button" class="inline-flex w-full items-center justify-between gap-2 rounded-radius bg-surface-alt px-4 py-2 text-sm font-medium tracking-wide text-on-surface transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary dark:bg-surface-dark-alt/50 dark:text-on-surface-dark dark:focus-visible:outline-primary-dark" role="combobox" aria-controls="optionsList" aria-haspopup="listbox" x-on:click="isOpen = ! isOpen" x-on:keydown.down.prevent="openedWithKeyboard = true" x-on:keydown.enter.prevent="openedWithKeyboard = true" x-on:keydown.space.prevent="openedWithKeyboard = true" x-bind:aria-expanded="isOpen || openedWithKeyboard" x-bind:aria-label="selectedOption ? selectedOption.name : 'Please Select'" >
            <span class="text-sm font-normal" x-text="selectedOption ? selectedOption.name : 'Please Select'"></span>
            <!-- Chevron  -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"class="size-5" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
            </svg>
        </button>

        <!-- Hidden Input To Grab The Selected Value  -->
        <input id="{{ $id }}" name="{{ $name }}" autocomplete="off" x-ref="hiddenTextField" hidden/>

        <div x-show="isOpen || openedWithKeyboard" id="optionsList" class="absolute left-0 top-11 z-10 w-full overflow-hidden rounded-radius bg-surface-alt dark:bg-surface-dark-alt" role="listbox" aria-label="options list" x-on:click.outside="isOpen = false, openedWithKeyboard = false" x-on:keydown.down.prevent="$focus.wrap().next()" x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition x-trap="openedWithKeyboard">

            <!-- Search  -->
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="1.5" class="absolute left-3 top-7 size-5 -translate-y-1/2 text-on-surface/50 dark:text-on-surface-dark/50" aria-hidden="true" >
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                </svg>
                <input type="text" class="w-full border-b border-outline bg-surface-alt py-2.5 pl-11 pr-4 text-sm text-on-surface focus:outline-hidden focus-visible:border-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark dark:focus-visible:border-primary-dark" name="searchField" aria-label="Search" x-on:input="getFilteredOptions($el.value)" x-ref="searchField" placeholder="Search" />
            </div>

            <!-- Options  -->
            <ul class="flex max-h-44 flex-col overflow-y-auto z-20">
                <li class="hidden px-4 py-2 text-sm text-on-surface dark:text-on-surface-dark" x-ref="noResultsMessage">
                    <span>No matches found</span>
                </li>
                <template x-for="(item, index) in options" x-bind:key="item.id">
                    <li class="combobox-option inline-flex justify-between gap-6 bg-surface-alt px-4 py-2 text-sm text-on-surface hover:bg-surface-dark-alt/5 hover:text-on-surface-strong focus-visible:bg-surface-dark-alt/5 focus-visible:text-on-surface-strong focus-visible:outline-hidden dark:bg-surface-dark-alt dark:text-on-surface-dark dark:hover:bg-surface-alt/5 dark:hover:text-on-surface-dark-strong dark:focus-visible:bg-surface-alt/10 dark:focus-visible:text-on-surface-dark-strong" role="option" x-on:click="setSelectedOption(item)" x-on:keydown.enter="setSelectedOption(item)" x-bind:id="'option-' + index" tabindex="0">
                        <div class="flex items-center gap-2">
                            <!-- Image -->
                            <img class="w-5 h-3.5 pr-1" x-bind:src="item.image ? '{{ asset('storage/') }}/' + item.image : ''" alt="" aria-hidden="true" x-show="item.image"/>
                            <!-- Option name  -->
                            <span x-bind:class="selectedOption && selectedOption.id === item.id ? 'font-bold' : null" x-text="item.name"></span>
                            <!-- Screen reader 'selected' indicator  -->
                            <span class="sr-only" x-text="selectedOption && selectedOption.id === item.id ? 'selected' : null"></span>
                        </div>
                        <!-- Checkmark  -->
                        <svg x-cloak x-show="selectedOption && selectedOption.id === item.id" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" class="size-4" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5">
                        </svg>
                    </li>
                </template>
            </ul>
        </div>
    </div>
</div>
