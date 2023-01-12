@if (session()->has('created'))
<div class="bg-green-200 rounded-md py-4 px-2">
    <strong>{{ session('created')}}</strong>
</div>
@endif
