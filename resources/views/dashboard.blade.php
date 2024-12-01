@extends('layouts.admin')

@section('title', 'Feed Page')

@section('content')
<h1>Feed</h1>

<!-- Form to specify number of months -->
<form method="GET" action="{{ route('dashboard') }}" style="margin-bottom: 20px;">
    <label for="months" style="font-weight: bold;">Show posts from the last:</label>
    <input 
        type="number" 
        id="months" 
        name="months" 
        value="{{ request('months', 1) }}" 
        min="1" 
        style="margin: 0 10px; padding: 5px; width: 60px;" 
        required
    >
    <span>month(s)</span>
    <button type="submit" style="padding: 5px 10px; background-color: #007bff; color: white; border: none; border-radius: 3px;">Submit</button>
</form>

<div class="feed">
    @forelse ($posts as $post)
        <div class="card" style="border: 1px solid #ddd; padding: 10px; margin: 10px; width: 300px;">
            <h3>{{ $post['Username'] }}</h3>
            <p style="color: gray; font-size: 0.8em;">Posted on {{ $post['date'] }}</p>
            <p>{{ $post['content'] }}</p>
            <button 
                type="button" 
                style="padding: 5px 10px; background-color: #28a745; color: white; border: none; border-radius: 3px;"
                onclick="alert('Liked post from {{ $post['Username'] }}!')"
            >
                Like
            </button>
        </div>
    @empty
        <p>No posts available for the selected timeframe.</p>
    @endforelse
</div>
@endsection
