@if ($errors->any())

    @foreach ($errors->all() as $error)
        <div class="alert alert-warning text-right" dir="rtl">
            <div class="container">
                {{ $error }}
            </div>
        </div>
    @endforeach

@endif

@if (session('success'))

    <div class="alert alert-success text-right" dir="rtl">
        <div class="container">
            {{ session('success') }}
        </div>
    </div>

@endif

@if (session('error'))

    <div class="alert alert-danger text-right" dir="rtl">
        <div class="container">
            {{ session('error') }}
        </div>
    </div>

@endif
