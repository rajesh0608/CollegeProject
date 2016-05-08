

<div>
    @if(count($errors)> 0)
        <div class="alert alert-danger">
            <strong>Whoops,</strong>Somethings wrongs.<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    @if(Session::has('success'))
        {{ Session::get('success') }}
        Successfully signup

    @endif

    @if(Session::has('error'))
        {{  }}
        fialed.
    @endif

    {!! Form::open(array('url' => 'signMe')) !!}

    {!! Form::text('first_name', '', array('class'=>'formtext', 'id'=>'first_name', 'placeholder'=>'first_name')) !!}

    {!! Form::text('last_name', '', array('class'=>'formtext', 'id'=>'last_name', 'placeholder'=>'last_name')) !!}

    {!! Form::text('email', '', array('class'=>'formtext', 'id'=>'email', 'placeholder'=>'Email Address')) !!}

    {!! Form::password('password', '', array('class'=>'formtext', 'id'=>'password', 'placeholder'=>'Password')) !!} {{-- name, value, array(class and id and other) --}}

    {!! Form::password('c_password', '', array('class'=>'formtext', 'id'=>'c_password', 'placeholder'=>'Confirm Password')) !!}

    {!! Form::submit('submit') !!}

    {!! Form::close() !!}

</div>


