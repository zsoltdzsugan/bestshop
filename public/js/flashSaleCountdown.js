function getTimeRemaining(targetDate) {
    const now = new Date();
    const timeLeft = targetDate - now;

    if (timeLeft <= 0) {
        return { days: 0, hours: 0, minutes: 0, seconds: 0, expired: true };
    }

    return {
        days: Math.floor(timeLeft / (1000 * 60 * 60 * 24)),
        hours: Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
        minutes: Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60)),
        seconds: Math.floor((timeLeft % (1000 * 60)) / 1000),
        expired: false,
    }
}

function updateCountdownDisplay(timeLeft) {
    const dayElement = document.querySelector('.remaining-day');
    const hourElement = document.querySelector('.remaining-hour');
    const minuteElement = document.querySelector('.remaining-minute');
    const secondElement = document.querySelector('.remaining-second');

    dayElement.innerHTML = timeLeft.days;
    hourElement.innerHTML = timeLeft.hours;
    minuteElement.innerHTML = timeLeft.minutes;
    secondElement.innerHTML = timeLeft.seconds;
}

function tick(targetDate, interval) {
    const timeLeft = getTimeRemaining(targetDate);
    updateCountdownDisplay(timeLeft);

    if (timeLeft.expired) {
        clearInterval(interval);
    }
}

function startCountdown(targetDate) {
    const interval = setInterval(() => tick(targetDate, interval), 1000);
    tick(targetDate, interval);
}
