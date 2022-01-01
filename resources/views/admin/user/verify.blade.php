@extends('shared.templates.admin')
@section('title', __('admin.user.verify.title'))
@section('content')
    <div class="login__page">
        <div class="login__container">
            <h1 class="mb-3">@lang('admin.user.verify.h1')</h1>
            <div class="alert alert-primary">
                <p class="mb-0">@lang('admin.user.verify.preamble')</p>
            </div>
            <form method="post" class="row g-3 needs-validation @if($errors->any()) was-validated @endif" novalidate>
                <div class="mb-3">
                    <label for="email" class="label">@lang('admin.labels.email')</label>
                    <input type="email" name="email" class="login__input" readonly value="{{$user->email}}">
                </div>
                <div class="mb-3">
                    <label for="name" class="label">@lang('admin.labels.name')</label>
                    <input type="text" name="name" class="login__input" required value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password">@lang('admin.labels.password')</label>
                    <input type="password" name="password" class="login__input" required value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    @csrf
                    <input type="submit" value="{{ __('admin.user.verify.submit') }}" class="btn-lg login__submit">
                </div>
            </form>
        </div>
    </div>
@endsection
