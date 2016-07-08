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
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4"></div>
                <div class="col-lg-4 col-md-4 col-sm-4">

                <img src="https://www.acato.nl/dist/assets/images/acato-logo-horizontal-@1x-white.svg"
                 alt="..." style="background-color: #2eaed9;" width="100" height="100"  class="img-circle center-block">

                    <form method="POST" action="{{url('/registeren')}}">
                    {!! csrf_field() !!}
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                          <label for="username">Gebruikersnaam</label>
                          <input type="text" class="form-control" id="username" name="username" placeholder="Gebruikersnaam">
                      </div>
                      <div class="form-group">
                          <label for="password">Wachtwoord</label>
                          <input type="password" class="form-control" id="password" name="password" >
                      </div>
                      <div class="form-group">
                          <label for="password_confirmed">Herhaal wachtwoord</label>
                          <input type="password" class="form-control" id="password_confirmed" name="password_confirmed" >
                      </div>
                      <div class="form-group">
                          <label for="streetname">Straatnaam</label>
                          <input type="text" class="form-control" id="streetname" name="streetname" placeholder="Straatnaam">
                      </div>
                      <div class="form-group">
                          <label for="postalcode">Postcode</label>
                          <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="Postcode">
                      </div>
                      <div class="form-group">
                          <label for="city">Stad</label>
                          <input type="text" class="form-control" id="city" name="city" placeholder="Stad">
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
