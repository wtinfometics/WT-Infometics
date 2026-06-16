@php
    $alertType = null;
    $alertMessage = null;

    if (!empty($message)) {
        $alertType = ($success ?? false) ? 'success' : 'danger';
        $alertMessage = $message;
    } elseif (session('success')) {
        $alertType = 'success';
        $alertMessage = session('success');
    } elseif (session('error')) {
        $alertType = 'danger';
        $alertMessage = session('error');
    }
@endphp

@if($alertMessage)
    <div class="alert alert-{{ $alertType }} auto-hide">
        {{ $alertMessage }}
    </div>
@endif