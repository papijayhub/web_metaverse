<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $posts->title }}</p>
</div>

<!-- Category Field -->
<div class="col-sm-12">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $posts->category }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $posts->description }}</p>
</div>

<!-- Userid Field -->
<div class="col-sm-12">
    {!! Form::label('userid', 'Userid:') !!}
    <p>{{ $posts->userid }}</p>
</div>

