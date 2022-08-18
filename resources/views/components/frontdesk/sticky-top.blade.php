<div id="stickyBlurContainer"
    x-data="{ scrollTop: 0 }"
    x-on:scroll.window="scrollTop = window.scrollY"
    x-bind:class="scrollTop > 0 ? 'backdrop-blur-sm shadow-md' : ''"
    class="sticky top-0 z-50">
    {{ $slot }}
</div>
