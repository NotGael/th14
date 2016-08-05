<?php
    $asUser = false;
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Sections</h2>
            <ul class="list-unstyled">
                @if(isset($sections))
                    @foreach($sections as $section)
                        <div class="row">
                            <li>
                                @if($section->id == 1)
                                    <h3 class="text-info">
                                @elseif($section->id == 2)
                                    <h3 class="text-success">
                                @elseif($section->id == 3)
                                    <h3 class="text-primary">
                                @elseif($section->id == 4)
                                    <h3 class="text-danger">
                                @elseif($section->id == 5)
                                    <h3 class="text-warning">
                                @endif
                                {{ $section->name }}</h3>
                                @if($section->photography)
                                    <img src="/th14/public/imgs/sections/thumbnails/{{ 'thumb-'. $section->photography->image_name . '.' . $section->photography->image_extension . '?'. 'time='. time() }}">
                                @endif
                                <p>{{ $section->content }}</p>
                                @if($section->id == 5)
                                    <p>Chef d'unité :
                                @else
                                    <p>Animateur responsable :
                                @endif
                                    @if($section->id == 1)
                                        <em class="text-info">
                                    @elseif($section->id == 2)
                                        <em class="text-success">
                                    @elseif($section->id == 3)
                                        <em class="text-primary">
                                    @elseif($section->id == 4)
                                        <em class="text-danger">
                                    @elseif($section->id == 5)
                                        <em class="text-warning">
                                    @endif
                                    @if($section->user)
                                        @if($section->user->totem)
                                            {{ $section->user->totem }}
                                        @else
                                            {{ $section->user->firstname }} {{ $section->user->lastname }}
                                        @endif
                                        <br>
                                        @if($section->user->tel)
                                            Tel : {{ $section->user->tel }}
                                        @endif
                                    @endif
                                    </em>
                                </p>
                                @if($users_section)
                                    @if($section->id == 1)
                                        <h3 class="text-info">
                                    @elseif($section->id == 2)
                                        <h3 class="text-success">
                                    @elseif($section->id == 3)
                                        <h3 class="text-primary">
                                    @elseif($section->id == 4)
                                        <h3 class="text-danger">
                                    @elseif($section->id == 5)
                                        <h3 class="text-warning">
                                    @endif
                                    @if($section->id == 5)
                                        Liste des membres du staff d'unité</h3>
                                    @else
                                        Liste des animateur/animé section</h3>
                                    @endif
                                    <ul class="list-unstyled">
                                        @foreach($users_section as $user_section)
                                            @if($user_section->section_id == $section->id)
                                                <div class="col-md-4">
                                                    <li>
                                                        @if($user_section->photography)
                                                            <img src="/th14/public/{{ $user_section->photography->image_path . 'thumbnails/thumb-'. $user_section->photography->image_name . '.' . $user_section->photography->image_extension }}">
                                                        @endif
                                                        <p>{{{ $user_section->firstname }}} {{{ $user_section->lastname }}}
                                                            @if($user_section->totem)
                                                                - <em>{{{ $user_section->totem }}}</em>
                                                            @endif
                                                        </p>
                                                    </li>
                                                </div>
                                                <?php
                                                    $asUser = true;
                                                ?>
                                            @endif
                                        @endforeach
                                        @if(!$asUser)
                                            <li class="list-group-item">
                                                Section vide
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </li>
                        </div>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endsection
