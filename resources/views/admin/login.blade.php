@extends('shared.templates.admin')
@section('title', __('admin.login.h1'))
@section('content')
    <div class="login__page">
        <div class="login__container">
            <h1 class="mb-3">@lang('admin.login.h1')</h1>
            <form method="POST" class="row g-3 needs-validation @if($errors->any()) was-validated @endif" novalidate>
                <div class="mb-3">
                    <label for="email" class="label">@lang('admin.login.email')</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="label">@lang('admin.login.password')</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    @csrf
                    <input type="submit" value="{{ __('admin.login.submit') }}" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
