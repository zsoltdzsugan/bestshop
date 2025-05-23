@props([
    'id' => null,
    'name' => 'select_name',
    'selected' => null,
    'label' => 'Select Date',
    'value' => null,
    'format' => 'M d, Y',
])


<div x-data="{
      datePickerOpen: false,
      datePickerValue: '',
      datePickerFormat: '{{ $format }}',
      datePickerMonth: '',
      datePickerYear: '',
      datePickerDay: '',
      datePickerDaysInMonth: [],
      datePickerBlankDaysInMonth: [],
      datePickerMonthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datePickerDays: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      datePickerDayClicked(day) {
        let selectedDate = new Date(this.datePickerYear, this.datePickerMonth, day);
        this.datePickerDay = day;
        this.datePickerValue = this.datePickerFormatDate(selectedDate);
        this.datePickerIsSelectedDate(day);
        this.datePickerOpen = false;
      },
      datePickerPreviousMonth(){
        if (this.datePickerMonth == 0) {
            this.datePickerYear--;
            this.datePickerMonth = 12;
        }
        this.datePickerMonth--;
        this.datePickerCalculateDays();
      },
      datePickerNextMonth(){
        if (this.datePickerMonth == 11) {
            this.datePickerMonth = 0;
            this.datePickerYear++;
        } else {
            this.datePickerMonth++;
        }
        this.datePickerCalculateDays();
      },
      datePickerIsSelectedDate(day) {
        const d = new Date(this.datePickerYear, this.datePickerMonth, day);
        return this.datePickerValue === this.datePickerFormatDate(d) ? true : false;
      },
      datePickerIsToday(day) {
        const today = new Date();
        const d = new Date(this.datePickerYear, this.datePickerMonth, day);
        return today.toDateString() === d.toDateString() ? true : false;
      },
      datePickerCalculateDays() {
        let daysInMonth = new Date(this.datePickerYear, this.datePickerMonth + 1, 0).getDate();
        // find where to start calendar day of week
        let dayOfWeek = new Date(this.datePickerYear, this.datePickerMonth).getDay();
        let blankdaysArray = [];
        for (var i = 1; i <= dayOfWeek; i++) {
            blankdaysArray.push(i);
        }
        let daysArray = [];
        for (var i = 1; i <= daysInMonth; i++) {
            daysArray.push(i);
        }
        this.datePickerBlankDaysInMonth = blankdaysArray;
        this.datePickerDaysInMonth = daysArray;
      },
      datePickerFormatDate(date) {
        let formattedDay = this.datePickerDays[date.getDay()];
        let formattedDate = ('0' + date.getDate()).slice(-2); // appends 0 (zero) in single digit date
        let formattedMonth = this.datePickerMonthNames[date.getMonth()];
        let formattedMonthShortName = this.datePickerMonthNames[date.getMonth()].substring(0, 3);
        let formattedMonthInNumber = ('0' + (parseInt(date.getMonth()) + 1)).slice(-2);
        let formattedYear = date.getFullYear();

        if (this.datePickerFormat === 'M d, Y') {
          return `${formattedMonthShortName} ${formattedDate}, ${formattedYear}`;
        }
        if (this.datePickerFormat === 'MM-DD-YYYY') {
          return `${formattedMonthInNumber}-${formattedDate}-${formattedYear}`;
        }
        if (this.datePickerFormat === 'DD-MM-YYYY') {
          return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`;
        }
        if (this.datePickerFormat === 'YYYY-MM-DD') {
          return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`;
        }
        if (this.datePickerFormat === 'D d M, Y') {
          return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`;
        }

        return `${formattedMonth} ${formattedDate}, ${formattedYear}`;
      },
    }" x-init="
        let currentDate;
        if ('{{ $value }}') {
            // If value is provided, parse it as a date
            currentDate = new Date('{{ $value }}');
            if (isNaN(currentDate.getTime())) {
                // If parsing fails, use current date
                currentDate = new Date();
            }
        } else {
            // If no value provided, use current date
            currentDate = new Date();
        }
        datePickerMonth = currentDate.getMonth();
        datePickerYear = currentDate.getFullYear();
        datePickerDay = currentDate.getDate();
        datePickerValue = datePickerFormatDate(currentDate);
        datePickerCalculateDays();
    " x-cloak>
    <div class="container relative flex mt-1 w-full max-w-sm flex-col gap-1 text-on-surface dark:text-on-surface-dark">
        <div class="w-full mb-5">
            <label for="{{ $name }}" class="block mb-1 text-sm font-medium text-neutral-500">{{ $label }}</label>
            <div class="relative w-[17rem]">
                <input x-ref="datePickerInput" id="{{ $id }}" name="{{ $name }}" type="text" @click="datePickerOpen=!datePickerOpen" x-model="datePickerValue" x-on:keydown.escape="datePickerOpen=false" class="flex w-full h-10 px-3 w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt dark:focus-visible:outline-primary-dark" placeholder="Select date" readonly />
                <div @click="datePickerOpen=!datePickerOpen; if(datePickerOpen){ $refs.datePickerInput.focus() }" class="absolute top-0 right-0 px-3 py-2 cursor-pointer text-on-surface/75 dark:text-on-surface-dark/75 hover:brightness-75">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                </div>
                <div
                    x-show="datePickerOpen"
                    x-transition
                    @click.away="datePickerOpen = false"
                    class="z-20 absolute top-0 left-0 max-w-lg p-4 mt-12 antialiased bg-surface-alt dark:bg-surface-dark-alt border rounded-radius shadow w-[17rem] border-outline dark:border-outline-dark">
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <span x-text="datePickerMonthNames[datePickerMonth]" class="text-lg font-bold text-on-surface-strong dark:text-on-surface-dark-strong"></span>
                            <span x-text="datePickerYear" class="ml-1 text-lg font-normal text-on-surface dark:text-on-surface-dark"></span>
                        </div>
                        <div>
                            <button @click="datePickerPreviousMonth()" type="button" class="group inline-flex p-1 transition duration-100 ease-in-out rounded-radius cursor-pointer focus:outline-none focus:shadow-outline">
                                <svg class="inline-flex w-6 h-6 text-on-surface dark:text-on-surface-dark group-hover:text-on-surface-strong dark:group-hover:text-on-surface-dark-strong" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                            </button>
                            <button @click="datePickerNextMonth()" type="button" class="group inline-flex p-1 transition duration-100 ease-in-out rounded-radius cursor-pointer focus:outline-none focus:shadow-outline">
                                <svg class="inline-flex w-6 h-6 text-on-surface dark:text-on-surface-dark group-hover:text-on-surface-strong dark:group-hover:text-on-surface-dark-strong" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-7 mb-3">
                        <template x-for="(day, index) in datePickerDays" :key="index">
                            <div class="px-0.5">
                                <div x-text="day" class="text-xs font-medium text-center text-on-surface-strong dark:text-on-surface-dark-strong"></div>
                            </div>
                        </template>
                    </div>
                    <div class="grid grid-cols-7">
                        <template x-for="blankDay in datePickerBlankDaysInMonth">
                            <div class="p-1 text-sm text-center border border-transparent"></div>
                        </template>
                        <template x-for="(day, dayIndex) in datePickerDaysInMonth" :key="dayIndex">
                            <div class="px-0.5 mb-1 aspect-square">
                                <div
                                    x-text="day"
                                    @click="datePickerDayClicked(day)"
                                    :class="{
                                        'bg-outline dark:bg-outline-dark text-on-surface-strong dark:text-on-surface-dark-strong': datePickerIsToday(day) == true,
                                        'text-on-surface dark:text-on-surface-dark hover:bg-outline/75 dark:hover:bg-outline-dark/75': datePickerIsToday(day) == false && datePickerIsSelectedDate(day) == false,
                                        'bg-primary dark:bg-primary-dark text-on-primary dark:text-on-primary-dark hover:bg-opacity-75': datePickerIsSelectedDate(day) == true
                                    }"
                                    class="flex items-center justify-center text-sm leading-none text-center rounded-radius cursor-pointer h-7 w-7"></div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
