<!-- uses the layout from contact skeleton  -->
@extends('contact_layout')

@section('head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Contact Form</title>
@endsection

@section('body')
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Contact us - {{ date('Y') }}
                </div>
                <div class="card-block">
                    <!-- store is a function inside contactUsController  -->
                    <form role="form" method="POST" action="{{ route('contactus.store') }}">
                        <!-- cross site request. will always write in POST-->
                        {{ csrf_field() }}
                        <div class="form-group col-lg-4">
                            <label class="form-control-label" for="form-group-input">Name</label>
                            <!-- value = old('name') keeps the value if there is a mistake/redirect to the same page-->
                            <input type="text" class="form-control" id="form-group-input" name="name" value="{{ old('name') }}">
                            <!-- this shows an error so if a mistake is made, it shows the error-->
                            @if($errors->has('name'))
                                <!-- first means getting the first error that comes up-->
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="form-control-label" for="form-group-input">Email</label>
                            <input type="text" class="form-control" id="form-group-input" name="email" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="form-control-label" for="form-group-input">Reason</label>
                            <select size="0" class="form-control" name="reason">
                                <option value="sales" {{ old('reason') == 'sales' ? 'selected' : '' }}>Sales</option>
                                <option value="techsupport" {{ old('reason') == 'techsupport' ? 'selected' : '' }}>Tech Support</option>
                                <option value="generalfeedback" {{ old('reason') == 'generalfeedback' ? 'selected' : '' }}>General Feedback</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="form-control-label" for="form-group-input">Notes</label>
                            <textarea class="form-control" id="form-group-input" name="notes" rows="6"></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <button type="submit" class="btn btn-primary">Send Information</button>
                        </div>
                        <div class="form-group col-lg-12">
                            <!-- isset means if you have a variable called message, it will send the message. its on contactUsController-->
                            @isset($message)
                                {{ $message }}
                            @endisset
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
