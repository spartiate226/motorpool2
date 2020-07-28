@extends('dispatcher.dashboard')

@section('dispatcher_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" id="passenger"  action="@if(isset($user)){{ url('update') }}@else {{ url('sign') }} @endif" aria-label="{{ __('Register') }}">
                            @csrf
                            @if(isset($user))
                            <input name="id" hidden value="{{$user->id}}">
                            @endif
                            <input name="role" hidden value="{{$form}}">
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" @if(isset($user)) {{'value='.$user->username}} @endif type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="first-name" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                                <div class="col-md-6">
                                    <input id="first-name" @if(isset($user)) {{'value='.$user->first_name}} @endif type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" @if(isset($user)) {{'value='.$user->last_name}} @endif type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile_phone" class="col-md-4 col-form-label text-md-right">{{ __('Mobile phone number') }}</label>

                                <div class="col-md-6">
                                    <input id="mobile_phone" @if(isset($user)) {{'value='.$user->mobile_phone}} @endif type="text" class="form-control{{ $errors->has('mobile_phone') ? ' is-invalid' : '' }}" name="mobile_phone" value="{{ old('mobile_phone') }}" required autofocus>

                                    @if ($errors->has('mobile_phone'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile_phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" @if(isset($user)) {{'value='.$user->email}} @endif type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            @if($form=='Passenger')
                                <input id="role" type="text" class="" name="role" hidden  value="0" required>
                                <div class="form-group row">
                                    <label for="office" class="col-md-4 col-form-label text-md-right">{{ __('Office') }}</label>

                                    <div class="col-md-6">
                                        <input id="office" @if(isset($user)) {{'value='.$user->Passenger->office}} @endif type="text" class="form-control{{ $errors->has('office') ? ' is-invalid' : '' }}" name="office" required>

                                        @if ($errors->has('office'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('office') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if($form=='Driver')
                                <div class="form-group row">
                                    <label  class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                    <div class="col-md-6">
                                        <select name="status" class="form-control">
                                            <option value="Available" @if(isset($user) && $user->Driver->status=="Available") {{'selected'}} @endif>Available</option>
                                            <option value="Not available" @if(isset($user) && $user->Driver->status=="Not available") {{'selected'}} @endif>Not available</option>
                                        </select>
                                    </div>
                                </div>
                            @endif
                            @if(!isset($user))
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                            @endif
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
