<?php
/**
 * Created by PhpStorm.
 * User: Stefano
 * Date: 8-7-2016
 * Time: 15:23
 */

 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <title>Acato Assignment</title>
         <link rel="stylesheet" href="{{ URL::asset('../public/assets/css/bootstrap.min.css') }}">
     </head>
     <body>
        <div class="container">
            @if (count($errors))
       			<ul class="list-unstyled">
        			@foreach($errors->all() as $error)
            			<li class="alert alert-danger"><i class="fa fa-exclamation"></i> {{ $error }}</li>
            		@endforeach
        	    </ul>
            @endif
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4"></div>
                <div class="col-lg-4 col-md-4 col-sm-4">

                <img src="https://www.acato.nl/dist/assets/images/acato-logo-horizontal-@1x-white.svg"
                 alt="..." style="background-color: #2eaed9;" width="100" height="100"  class="img-circle center-block">

                    <form method="POST" action="{{url('/registeren')}}">
                    {!! csrf_field() !!}
                      @if($errors->has('email'))
                        <div class="form-group has-error">
                      @else
                        <div class="form-group">
                      @endif
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="@if(old('email')){{old('email')}}@endif">
                      </div>
                      @if($errors->has('username'))
                        <div class="form-group has-error">
                      @else
                        <div class="form-group">
                      @endif
                          <label for="username">Gebruikersnaam</label>
                          <input type="text" class="form-control" id="username" name="username" placeholder="Gebruikersnaam" value="@if(old('username')){{old('username')}}@endif">
                      </div>
                      @if($errors->has('password') || $errors->has('password_confirmation'))
                        <div class="form-group has-error">
                      @else
                        <div class="form-group">
                      @endif
                          <label for="password">Wachtwoord</label>
                          <input type="password" class="form-control" id="password" name="password" >
                      </div>
                      @if($errors->has('password')  || $errors->has('password_confirmation'))
                        <div class="form-group has-error">
                      @else
                        <div class="form-group">
                      @endif
                          <label for="password_confirmation">Herhaal wachtwoord</label>
                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
                      </div>
                      @if($errors->has('streetname'))
                        <div class="form-group has-error">
                      @else
                        <div class="form-group">
                      @endif
                          <label for="streetname">Straatnaam</label>
                          <input type="text" class="form-control" id="streetname" name="streetname" placeholder="Straatnaam" value="@if(old('streetname')){{old('streetname')}}@endif">
                      </div>
                      @if($errors->has('postalcode'))
                        <div class="form-group has-error">
                      @else
                        <div class="form-group">
                      @endif
                          <label for="postalcode">Postcode</label>
                          <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="Postcode" value="@if(old('postalcode')){{old('postalcode')}}@endif">
                      </div>
                      @if($errors->has('city'))
                        <div class="form-group has-error">
                      @else
                        <div class="form-group">
                      @endif
                          <label for="city">Stad</label>
                          <input type="text" class="form-control" id="city" name="city" placeholder="Stad" value="@if(old('city')){{old('city')}}@endif">
                      </div>
                      <button type="submit" class="btn btn-info">Aanmelden</button>
                    </form>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4"></div>
            </div>
        </div>

     </body>
        <script src="{{ URL::asset('../public/assets/js/bootstrap.min.css') }} }}"></script>
 </html>
