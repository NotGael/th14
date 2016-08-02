<?php $asUser = false; ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Section</h1>
    </div>
    <div class="list-group">
        <ul>
            @foreach($sections as $section)
                <li>
                    @if($section->photography_id)
                        <img src="/th14/public/imgs/sections/thumbnails/{{ 'thumb-'. $section->photography->image_name . '.' . $section->photography->image_extension . '?'. 'time='. time() }}">
                    @endif
                    <h2>{{ $section->name }}</h2>
                    <p>{{ $section->content }}</p>
                    @if($section->user)
                            <p> Animateur responsable :
                            @if($section->user->totem)
                                {{ $section->user->totem }}</p>
                            @else
                                {{ $section->user->firstname }} {{ $section->user->lastname }}</p>
                            @endif
                    @endif
                    <?php
                        if($section->id == 1)
                        {
                            if($users_section1)
                            {
                                $users_section = $users_section1;
                            }
                        }
                        elseif($section->id == 2)
                        {
                            if($users_section2)
                            {
                                $users_section = $users_section2;
                            }
                        }
                        elseif($section->id == 3)
                        {
                            if($users_section3)
                            {
                                $users_section = $users_section3;
                            }
                        }
                        elseif($section->id == 4)
                        {
                            if($users_section4)
                            {
                                $users_section = $users_section4;
                            }
                        }
                        elseif($section->id == 5)
                        {
                            if($users_section5)
                            {
                                $users_section = $users_section5;
                            }
                        }
                    ?>
                    @if($users_section)
                        <h2>Liste des animateur/animé section<h2>
                        <ul  class="list-group">
                            @foreach($users_section as $user_section)
                                <li class="list-group-item small">
                                  <p>
                                    {{{ $user_section->firstname }}}
                                    {{{ $user_section->lastname }}}
                                    @if($user_section->totem)
                                    - {{{ $user_section->totem }}}
                                    @endif
                                  </p>
                                </li>
                                <?php $asUser = true; ?>
                            @endforeach
                            @if(!$asUser)
                              <li class="list-group-item">
                                  Section vide
                              </li>
                            @endif
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
