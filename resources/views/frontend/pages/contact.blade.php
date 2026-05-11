@extends('frontend.layouts.app')

@section('title','Contact')

@section('content')

<div class="container py-5">
    <div class="entry-content clear mt-5 pt-5" itemprop="text">
    <div class="elementor elementor-20">
        <div class="elementor-widget-container text-center">
            <h2 class="elementor-heading-title elementor-size-default">Book a Free Discovery Call</h2>
            <h4 class="elementor-heading-title elementor-size-default">Schedule a 30-minute strategy call with our team. We’ll understand your business, goals, and suggest the best way forward.</h4>
        </div>

        <div id="book" class="my-4">
            <!-- Calendly inline widget begin -->
            <div class="calendly-inline-widget" data-url="https://calendly.com/theventurebeast/book?primary_color=ff7f30" style="min-width:320px;height:700px;"></div>
            <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
            <!-- Calendly inline widget end -->
        </div>
    </div>
</div>
</div>

@endsection
