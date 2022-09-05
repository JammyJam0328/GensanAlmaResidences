@props(['expires'])
<div x-data="{
    expires: @js($expires),
    days: 0,
    hours: 0,
    minutes: 0,
    seconds: 0,
    interval: null,
    diff: null,
    startAlarm() {
        let expires = new Date(this.expires);
        let now = new Date();
        let diff = expires - now;
        this.diff = diff;
        if (diff <= 0) {
            this.days = 0;
            this.hours = 0;
            this.minutes = 0;
            this.seconds = 0;
            return;
        }
        this.days = Math.floor(diff / (1000 * 60 * 60 * 24));
        this.hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        this.minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        this.seconds = Math.floor((diff % (1000 * 60)) / 1000);
        this.interval = setInterval(() => {
            this.startAlarm();
        }, 1000);
    }
}"
    x-init="startAlarm();
    $watch('diff', (value) => {
        if (value <= 0) {
            clearInterval(interval);
            $dispatch('alarm-ready');
        }
    });">
</div>
