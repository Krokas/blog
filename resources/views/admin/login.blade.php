@extends('shared.templates.admin')
@section('title', __('admin.login.h1'))
@section('content')
    <div class="login__page">
        <div class="login__container">
            <h1 class="mb-3">@lang('admin.login.h1')</h1>
            @error('authenticate.failed')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span>{{ $message }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
            <form method="POST" class="row g-3 needs-validation @if($errors->any()) was-validated @endif" novalidate>
                <div class="mb-3">
                    <label for="email" class="label">@lang('admin.labels.email')</label>
                    <input type="email" name="email" class="login__input" required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="label">@lang('admin.labels.password')</label>
                    <input type="password" name="password" class="login__input" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    @csrf
                    <input type="submit" value="{{ __('admin.login.submit') }}" class="login__submit">
                </div>
            </form>
        </div>
    </div>
@endsection
