@extends('core::public.master')

@section('title', trans('news::global.name') . ' – ' . $websiteTitle)
@section('ogTitle', trans('news::global.name'))
@section('bodyClass', 'body-news-index')

@section('main')

    <h2>@lang('news::global.name')</h2>

    @if ($models->count())
    <ul>
        @foreach ($models as $model)
        <li>
            <strong>{{ $model->title }}</strong>
            <div class="date">@lang('news::global.Published on') 
                <time datetime="{{ $model->date }}">{{ $model->present()->dateLocalized }}</time>
            </div>
            <a href="{{ route($lang.'.news.slug', $model->slug) }}">@lang('db.More')</a>
        </li>
        @endforeach
    </ul>
    @endif

    {!! $models->appends(Input::except('page'))->render() !!}

@stop
