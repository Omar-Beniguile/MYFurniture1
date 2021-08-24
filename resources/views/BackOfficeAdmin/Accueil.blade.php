@extends('BackOfficeAdmin.layout.layoutAdmin')

@section('linkcss')
<style>
    body {
        background: white;
    }
</style>
@endsection


@section('body')
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Message de bienvenue admin</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <div>
        <img src="{{url('img/adminHome.png')}}" alt="photo admin" style="width: 530px;margin-left: 25%;">
    </div>
</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        $('#linkAccueil').addClass('activeLink');
    });
</script>
@endsection