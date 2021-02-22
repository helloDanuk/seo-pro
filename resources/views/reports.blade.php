@extends('statamic::layout')
@section('title', __('seo-pro::messages.seo_reports'))

@section('content')
    <seo-reports
        listing-route="{{ cp_route('seo-pro.reports.index') }}"
        generate-route="{{ cp_route('seo-pro.reports.store') }}"
        :can-delete-reports="{{ json_encode(auth()->user()->can('delete seo reports')) }}"
    ></seo-reports>

    @include('statamic::partials.docs-callout', [
        'topic' => 'SEO Pro',
        'url' => 'https://statamic.com/addons/statamic/seo-pro'
    ])

@stop
