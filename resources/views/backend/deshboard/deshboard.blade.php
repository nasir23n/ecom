@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header">
        <h2>Header</h2>
        <button class="nl primary ml_auto">Click</button>
    </div>
    <div class="body">
        Some body <button class="nl green">&#9587;</button>
        <div class="form_row">
            <div class="col_md_6">
                <input type="text" class="form_control" placeholder="Some">
            </div>
            <div class="col_md_6">
                <input type="text" class="form_control danger" placeholder="Some">
            </div>
        </div>
    </div>
    <div class="footer">Footer</div>
</div>
@endsection