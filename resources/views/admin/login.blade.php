@extends('shared.templates.admin')
@section('content')
    <div class="login__page">
        <div class="login__container">
            <h1 class="mb-3">@lang('admin.login.h1')</h1>
            <form method="POST">
                <div class="mb-3">
                    <label for="email" class="label">@lang('admin.login.email')</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="label">@lang('admin.login.password')</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    @csrf
                    <input type="submit" value="{{ __('admin.login.submit') }}" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
