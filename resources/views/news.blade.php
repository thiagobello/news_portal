@extends('home')

@section('text')

<form class="form-align" action="/news/create" method="post">
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">With Floating Label</label>
     <input type="email" class="form-control" id="exampleInput1">
     <span class="bmd-help">We'll never share your email with anyone else.</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
      <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Option one is this
          <span class="form-check-sign">
              <span class="check"></span>
          </span>
      </label>
  </div>

  <button type="submit" class="btn btn-info">Submit</button>
</form>

@stop