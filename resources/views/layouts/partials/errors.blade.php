@if (session('error'))

    <div class="alert alert-danger text-right" dir="rtl">
        <div class="container">
            {{ session('error') }}
        </div>
    </div>

@endif
