@extends('layouts.master')

@section('title' , '| Contact')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <h1>Contact</h1>
                 <hr>
                 <form action="{{ url('contact') }}"  method="POST">
                    @csrf
                    <div class="form-group">
                        <label name="email">Email:</label>
                        <input type="text" id="email" name="email"  class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="subject">Subject:</label>
                        <input  id="subject" name="subject" class="form-control" >
                    </div>

                     <div class="form-group">
                        <label name="email">Message:</label>
                        <textarea name="message" id="message" class="form-control"></textarea>
                    </div>
                      <input type="submit" value="Send Message" class="btn btn-success">
                 </form>
            </div>
        </div>
@endsection