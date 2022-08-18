<div class="p-4 bg-white border rounded-lg shadow">
    <div class="flex-col items-center justify-center w-full">
        <x-forms.input x-ref="qrCodeInput"
            placeholder="Qr Code will appeare here" />
        <div class="flex items-center mt-5 space-x-2">
            <x-app.btn-default x-on:click="$refs.qrCodeInput.focus()"
                label="Scan Now"></x-app.btn-default>
            <x-app.btn-default label="Clear"></x-app.btn-default>
        </div>
    </div>
</div>
